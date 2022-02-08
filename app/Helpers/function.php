<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

    //kiêm tra đăng nhập 
    if (!function_exists('qtyProduct')) {
        function qtyProduct($catId)
        {
            # code...
            $qty = DB::table('products')
            ->where('pro_category_id', $catId)
            ->count('id');
            return $qty;
        }
    }

    //hàm lấy thông tin user đang login, sau này dùng trong middleware để check
    if (!function_exists('get_data_user')) {
        function get_data_user($type, $field = 'id')
        {
            return Auth::guard($type)->user() ? Auth::guard($type)->user()->$field :'';
        }
    }

    //tính tiền sau trừ sale
    if (!function_exists('price_after_sale')) {
        function price_after_sale($priceOld, $sale)
        {
            $priceSale = $priceOld*$sale/100;
            $price = $priceOld - $priceSale;

            return $price;
        }
    }

?>