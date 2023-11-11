<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class detaildonateController extends Controller
{
    public function index(){
        return view('fontend.detaildonate.donate');
    }
    public function viewlistdonate(){
        return view('fontend.detaildonate.listdonate');
    }
    // public function thanhtoanvnpay(Request $request)
    // {
    //     $rname = $request->andanh;
    //     $name = $request->name;
    //     if($rname === "Andanh"){
    //         $name = "Ẩn Danh";
    //     }else{
    //         $name = $request->name;
    //     }
    //     $date = date('YmdHis');
    //     $project = $request->project;
    //     $bank = $request->bank;
    //     $amount = $request->amount;
    //     $order_id = rand(10000000, 99999999);
    //     error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
    //     date_default_timezone_set('Asia/Ho_Chi_Minh');

    //     $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    //     $vnp_Returnurl = "http://127.0.0.1:8000/camon";
    //     $vnp_TmnCode = "JDTIQ2LS"; //Mã website tại VNPAY 
    //     $vnp_HashSecret = "GOZHPSSCWYEILRDETJAJTHHDVAHUZAWW"; //Chuỗi bí mật

    //     $vnp_TxnRef = $order_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    //     $vnp_OrderInfo = $project;
    //     $vnp_OrderType = "card";
    //     $vnp_Amount = $amount * 100;
    //     $vnp_Locale = "vi";
    //     $vnp_BankCode = $bank;
    //     $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

    //     $inputData = array(
    //         "vnp_Version" => "2.1.0",
    //         "vnp_TmnCode" => $vnp_TmnCode,
    //         "vnp_Amount" => $vnp_Amount,
    //         "vnp_Command" => "pay",
    //         "vnp_CreateDate" => date('YmdHis'),
    //         "vnp_CurrCode" => "VND",
    //         "vnp_IpAddr" => $vnp_IpAddr,
    //         "vnp_Locale" => $vnp_Locale,
    //         "vnp_OrderInfo" => $vnp_OrderInfo,
    //         "vnp_OrderType" => $vnp_OrderType,
    //         "vnp_ReturnUrl" => $vnp_Returnurl,
    //         "vnp_TxnRef" => $vnp_TxnRef,

    //     );

    //     if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    //         $inputData['vnp_BankCode'] = $vnp_BankCode;
    //     }

    //     //var_dump($inputData);
    //     ksort($inputData);
    //     $query = "";
    //     $i = 0;
    //     $hashdata = "";
    //     foreach ($inputData as $key => $value) {
    //         if ($i == 1) {
    //             $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    //         } else {
    //             $hashdata .= urlencode($key) . "=" . urlencode($value);
    //             $i = 1;
    //         }
    //         $query .= urlencode($key) . "=" . urlencode($value) . '&';
    //     }

    //     $vnp_Url = $vnp_Url . "?" . $query;
    //     if (isset($vnp_HashSecret)) {
    //         $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
    //         $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    //     }
    //     $returnData = array(
    //         'code' => '00'
    //         ,
    //         'message' => 'success'
    //         ,
    //         'data' => $vnp_Url
    //     );
    //     if (isset($_POST['redirect'])) {
    //         if($returnData['code'] == '00'){
    //             $bill = new billpayment;
    //             $bill->name = $name;
    //             $bill->orderid = $order_id;
    //             $bill->project = $project;
    //             $bill->bank = $bank;
    //             $bill->Date_time = $date;
    //             $bill->Amount = $amount;
    //             $bill->Method = "VNPAY";
    //             $bill->save();
    //         }
    //         header('Location: ' . $vnp_Url);
    //         die();
    //     } else {
    //         echo json_encode($returnData);
    //     }
    // }
}
