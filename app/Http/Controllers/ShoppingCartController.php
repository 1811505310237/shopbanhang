<?php

namespace App\Http\Controllers;

use App\Mail\TransactionSuccess;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ShoppingCartController extends Controller
{
    //Add to cart
    public function add($proID)
    {
        if ($proID) {
            $product = DB::table('products')->where('id', $proID)->get();
            if ($product[0]->pro_number > 0) {
                Cart::add([
                    'id' => $proID,
                    'name' => $product[0]->pro_name,
                    'qty' => 1,
                    'price' => price_after_sale($product[0]->pro_price,$product[0]->pro_sale),
                    'options' => [
                        'priceOld' => $product[0]->pro_price,
                        'priceSale' => $product[0]->pro_sale,
                        'slug' => $product[0]->pro_slug,
                        'avatar' => $product[0]->pro_avatar,
                    ]
                ]);
                return redirect()->route('shopping.get.index')->with('success', 'Đã thêm vào giỏ hàng');
            }else{
                return redirect()->route('fe.home')->with('err', 'Số lượng không đủ');
            }   
        }
    }

    //List product in cart
    public function index()
    {
        $listCart = Cart::content();
        return view('pages.cart.index', compact('listCart'));
    }
    
    //Delete 1 product in Cart
    public function remove($rowID)
    {
        if ($rowID) {
            Cart::remove($rowID);
            return redirect()->back();
        }
        return view(404);
    }
    //Update item in cart using ajax
    public function update(Request $request, $rowID)
    {
        if ($request->ajax()) {
            $qty = $request->qty;
            $proID = $request->proID;
            $product = DB::table('products')->where('id', $proID)->get();
            $proNumAvaible = $product[0]->pro_number;

            //nếu số lượng mua nhỏ hơn số sp hiện có thì ok, còn ko thì fail
            if ($qty <= $proNumAvaible) {
                Cart::update($rowID, $qty);
                return response(1);
            }else{
                return response(0);
            }
        }
    }





    // ===========================FINISH MUA HÀNG=============================
    //1.Tiến hành thanh toán (get giao diện thanh toán)
    public function checkout()
    {
        $listCart = Cart::content();
        return view('pages.checkout.index', compact('listCart'));
    }
    //2.gửi dữ liệu lên để lưu vào đơn hàng và chi tiết đơn hàng
    public function postCheckout(Request $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        if (get_data_user('web', 'id')) {
            $data['tr_user_id'] = get_data_user('web', 'id');
        }
        $data['tr_total_money'] = str_replace(',', '', Cart::subtotal());

        //Lưu đơn hàng và lấy ID
        $transactionID = DB::table('transactions')->insertGetId($data);

        //Lưu chi tiết đơn(duyệt cart::content() để lưu vào DB)
        if ($transactionID) {
            //Gửi mail xác nhận ĐH luôn
            $data = array('cart' => Cart::content(), 'email'=>$request->tr_email );
            Mail::to($request->tr_email)->send(new TransactionSuccess($data));


            $cart = Cart::content();
            foreach ($cart as $key => $item) {
                DB::table('orders')->insert([
                    'od_transaction_id' => $transactionID,
                    'od_product_id'     =>$item->id,
                    'od_sale'           =>$item->options->priceSale,
                    'od_qty'            =>$item->qty,
                    'od_price'            =>$item->options->priceOld,
                ]);

                #Giảm số lượng sản phẩm
                DB::table('products')->where('id', $item->id)->decrement('pro_number', $item->qty);
            }

            Cart::destroy();
            
            return redirect()->to('/')->with('success', 'Đã đặt hàng thành công');

            
            
        }


    }

}
