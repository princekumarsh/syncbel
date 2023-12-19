<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\CPU\CartManager;
use App\CPU\Helpers;
use App\CPU\OrderManager;
use App\Model\Cart;
use App\CPU\Convert;
use App\Model\BusinessSetting;

use App\Model\Currency;
use Illuminate\Support\Facades\DB;

class PayUMoneyController extends Controller
{
    //
    public function payWithRazorpay()
    {
        return view('razor-pay');
    }

    // public function payment(Request $request)
    // {
    //     try {
    //         $api = new Api(config('razor.razor_key'), config('razor.razor_secret'));
    //         $payment = $api->payment->fetch($request['razorpay_payment_id']);
    //         /*$api->transfer->create(array('account' => 'acc_id', 'amount' => 500, 'currency' => 'INR'));*/

    //         if (count($request->all()) && !empty($request['razorpay_payment_id'])) {
    //             $response = $api->payment->fetch($request['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
    //             $unique_id = OrderManager::gen_unique_id();
    //             $order_ids = [];
    //             foreach (CartManager::get_cart_group_ids() as $group_id) {
    //                 $data = [
    //                     'payment_method' => 'razor_pay',
    //                     'order_status' => 'confirmed',
    //                     'payment_status' => 'paid',
    //                     'transaction_ref' => $response['id'],
    //                     'order_group_id' => $unique_id,
    //                     'cart_group_id' => $group_id
    //                 ];
    //                 $order_id = OrderManager::generate_order($data);
    //                 array_push($order_ids, $order_id);
    //             }
    //         }
    //         CartManager::cart_clean();
    //     } catch (\Exception $exception) {
    //         Toastr::error('Payment process failed');
    //         return back();
    //     }

    //     if (session()->has('payment_mode') && session('payment_mode') == 'app') {
    //         return redirect()->route('payment-success');
    //     }

    //     return view('web-views.checkout-complete');
    // }
    public function payUMoneyView(Request  $request)
    {
        //dd($request->all());
        $MERCHANT_KEY = "BMlQyy"; // TEST MERCHANT KEY
        $SALT = "fZmvh3xSyBK8RhifrqQy9OCB4JiBmOJ3"; // TEST SALT
        // $MERCHANT_KEY = "fB7m8s"; // TEST MERCHANT KEY
        // $SALT = "eRis5Chv"; // TEST SALT
        // $PAYU_BASE_URL = "https://test.payu.in";
        $currency_model = Helpers::get_business_settings('currency_model');
        if ($currency_model == 'multi_currency') {
            $currency_code = 'BDT';
        } else {
            $default = BusinessSetting::where(['type' => 'system_default_currency'])->first()->value;
            $currency_code = Currency::find($default)->code;
        }

        $discount = session()->has('coupon_discount') ? session('coupon_discount') : 0;
        $value = CartManager::cart_grand_total() - $discount;
        $user = Helpers::get_customer();
        // dd($value);
        $config = Helpers::get_business_settings('ssl_commerz_payment');

        $post_data = array();
        $post_data['store_id'] = $config['store_id'];
        $post_data['store_passwd'] = $config['store_password'];
        $post_data['total_amount'] = $value;
        $post_data['currency'] = $currency_code;
        $post_data['tran_id'] = OrderManager::gen_unique_id(); // tran_id must be unique

        $post_data['success_url'] = route('pay.u.response');
        $post_data['fail_url'] = route('ssl-fail');
        $post_data['cancel_url'] = route('pay.u.cancel');

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $user->f_name . ' ' . $user->l_name;
        $post_data['cus_email'] = $user->email;
        $post_data['cus_add1'] = $user->street_address == null ? 'address' : $user->user()->street_address;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "";
        $post_data['cus_phone'] = $user->phone;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Shipping";
        $post_data['ship_add1'] = "address 1";
        $post_data['ship_add2'] = "address 2";
        $post_data['ship_city'] = "City";
        $post_data['ship_state'] = "State";
        $post_data['ship_postcode'] = "ZIP";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Country";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";
     //    dd($post_data);
        $PAYU_BASE_URL = "https://secure.payu.in"; // PRODUCATION

      //  $PAYU_BASE_URL = "https://secure.payu.in"; // PRODUCATION
        // $name = 'Haresh Chauhan';
        // $successURL = route('pay.u.response');
        // $failURL = route('pay.u.cancel');
        // $email = 'example@gmail.com';
        // $amount = 1000;

        $action = '';
       $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        $posted = array();
        $posted = array(
            'key' => $MERCHANT_KEY,
            'txnid' => $post_data['tran_id'],
            'amount' => $post_data['total_amount'],
            'firstname' => $post_data['cus_name'],
            'email' => $post_data['cus_email'],
            'productinfo' => $post_data['product_name'],
            'surl' => $post_data['success_url'],
            'furl' => $post_data['cancel_url'],
            'service_provider' => 'payu_paisa',
        );

        if (empty($posted['txnid'])) {
            $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        } else {
            $txnid = $posted['txnid'];
        }

        $hash = '';
        $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

        if (empty($posted['hash']) && sizeof($posted) > 0) {
            $hashVarsSeq = explode('|',
                $hashSequence
            );
            $hash_string = '';
            foreach ($hashVarsSeq as $hash_var) {
                $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                $hash_string .= '|';
            }
            $hash_string .= $SALT;

            $hash = strtolower(hash('sha512', $hash_string));
            $action = $PAYU_BASE_URL . '/_payment';
        } elseif (!empty($posted['hash'])) {
            $hash = $posted['hash'];
            $action = $PAYU_BASE_URL . '/_payment';
        }

        return view('web-views.payUmoney',  compact('action', 'hash', 'MERCHANT_KEY', 'txnid',   'post_data'));
    }
    public function payUResponse(Request $request)
    {    //dd($request->all());
        $tran_id = $request->input('txnid');
        $unique_id = OrderManager::gen_unique_id();
        $order_ids = [];
        foreach (CartManager::get_cart_group_ids() as $group_id) {
            $data = [
                'payment_method' => 'pay_u_money',
                'order_status' => 'confirmed',
                'payment_status' => 'paid',
                'transaction_ref' => $tran_id,
                'order_group_id' => $unique_id,
                'cart_group_id' => $group_id
            ];
            $order_id = OrderManager::generate_order($data);
            array_push($order_ids, $order_id);
        }
        if ($request['status'] == 'success') {
            CartManager::cart_clean();
            return view('web-views.checkout-complete');
        } else {
            DB::table('orders')
                ->whereIn('id', $order_ids)
                ->update(['order_status' => 'failed']);
            Toastr::error('Payment failed!');
            return back();
        }
        // if (session()->has('payment_mode') && session('payment_mode') == 'app') {
        //     if ($request['status'] == 'VALID') {
        //         CartManager::cart_clean();
        //         return redirect()->route('payment-success');
        //     } else {
        //         return redirect()->route('payment-fail');
        //     }
        // } else {
        //     if ($request['status'] == 'success') {
        //         CartManager::cart_clean();
        //         return view('web-views.checkout-complete');
        //     } else {
        //         DB::table('orders')
        //         ->whereIn('id', $order_ids)
        //             ->update(['order_status' => 'failed']);
        //         Toastr::error('Payment failed!');
        //         return back();
        //     }
        // }
    }

    public function payUCancel(Request $request)
    {   //dd($request->all());
        if (auth('customer')->check()) {
            Toastr::error('Payment failed.');
            return redirect()->route('payment-fail');
        }
        return response()->json(['message' => 'Payment failed'], 403);
    }
}
