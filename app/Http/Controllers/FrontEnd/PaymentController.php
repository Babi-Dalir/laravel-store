<?php

namespace App\Http\Controllers\FrontEnd;

use App\Enums\CartType;
use App\Enums\OrderDetailStatus;
use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Discount;
use App\Models\GiftCart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class PaymentController extends Controller
{
    public function payment()
    {
        $shop_data = Session::get('shop_data');
        $user = auth()->user();
        $address = Address::query()
            ->where('user_id',$user->id)
            ->where('is_default',true)
            ->first();

        $carts = UserCart::query()
            ->where('user_id',$user->id)
            ->where('type',CartType::Main->value)->get();
        $total_price = 0;
        $discount_price = 0;
        foreach ($carts as $cart){
            $product_price = ProductPrice::query()
                ->where('product_id',$cart->product_id)
                ->where('color_id',$cart->color_id)
                ->where('guaranty_id',$cart->guaranty_id)
                ->first();
            $total_price += ($product_price->price) * $cart->count;
            $discount_price += ($product_price->main_price - $product_price->price) * $cart->count;
        }
        //discount
        if ($shop_data['discount_code']){
            $discount = Discount::query()
                ->where('code',$shop_data['discount_code'])
                ->where('discount','>',0)
                ->first();
            if ($discount){
                $this->total_price -= $discount->discount;
                $this->discount_price += $discount->discount;
                $discount_price = $discount->discount;
            }
        }else{
            $discount_price = 0;
        }

        //gift_cart
        if ($shop_data['gift_cart_code']){
            $gift_cart = GiftCart::query()
                ->where('code',$shop_data['gift_cart_code'])
                ->where('user_id',auth()->user()->id)
                ->where('gift_price','>',0)
                ->first();
            if ($gift_cart){
                $this->total_price -= $gift_cart->gift_price;
                $this->discount_price += $gift_cart->gift_price;
                $gif_cart_price = $gift_cart->gift_price;
            }
        }else{
            $gif_cart_price = 0;
        }

        $order = Order::query()->create([
            'user_id'=>$user->id,
            'address_id'=>$address->id,
            'order_code'=>rand(11111,99999),
            'status'=>OrderStatus::WaitPayment->value,
            'total_price'=>$total_price,
            'receive_day'=>$shop_data['receive_day'],
            'receive_time'=>$shop_data['receive_time'],
            'send_type'=>$shop_data['send_type'],
            'discount_price'=>$discount_price,
            'discount_code'=>$shop_data['discount_code'],
            'gift_cart_price'=>$gif_cart_price,
            'gift_cart_code'=>$shop_data['gift_cart_code'],
            'payment_type'=>$shop_data['payment_type'],
        ]);
        foreach ($carts as $cart){
            $product_price = ProductPrice::query()
                ->where('product_id',$cart->product_id)
                ->where('color_id',$cart->color_id)
                ->where('guaranty_id',$cart->guaranty_id)
                ->first();
            OrderDetail::query()->create([
                'order_id'=>$order->id,
                'product_id'=>$cart->product_id,
                'color_id'=>$cart->color_id,
                'guaranty_id'=>$cart->guaranty_id,
                'main_price'=>$product_price->main_price,
                'price'=>$product_price->price,
                'discount'=>$product_price->discount,
                'count'=>$cart->count,
                'status'=>OrderDetailStatus::Waiting->value,
            ]);
        }
        return Payment::purchase(
            (new Invoice)->amount($total_price),function ($driver,$transactionId) use ($order){
                $order->update([
                    'transaction_id'=>$transactionId
                ]);
        }
        )->pay()->render();
    }
    public function callback(Request $request)
    {
        $authority = $request->Authority;
        $order = Order::query()->where('transaction_id',$authority)->first();
        $order_details = OrderDetail::query()->where('order_id',$order->id)->get();
        if ($request->Status =="OK"){
            DB::beginTransaction();
            try {
                $order->update([
                    'status'=>OrderStatus::Payed->value
                ]);
                foreach ($order_details as $order_detail){
                    $order_detail->update([
                        'status'=>OrderDetailStatus::Received->value
                    ]);

                    $product_price = ProductPrice::query()
                        ->where('product_id',$order_detail->product_id)
                        ->where('color_id',$order_detail->color_id)
                        ->where('guaranty_id',$order_detail->guaranty_id)
                        ->first();
                    $product_price->decrement('count',$order_detail->count);

                    $product = Product::query()->find($order_detail->product_id);
                    $product->increment('sold',$order_detail->count);
                }
                $carts = UserCart::query()
                    ->where('user_id',$order->user_id)
                    ->where('type',CartType::Main->value)->get();
                foreach ($carts as $cart){
                    $cart->delete();
                }
                $result = "success";
                DB::commit();

                return view('frontend.shopping_result',compact('order'));

            }catch (\Exception $exception){

                DB::rollBack();
                $result = "failed";

                return view('frontend.shopping_result',compact('order'));
            }
        }else{
            $result = "failed";

            return view('frontend.shopping_result',compact('order'));

        }

    }
}
