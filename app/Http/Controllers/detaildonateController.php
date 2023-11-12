<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class detaildonateController extends Controller
{
    public function index()
    {
        return view('fontend.detaildonate.donate');
    }
    public function viewlistdonate()
    {
        return view('fontend.detaildonate.listdonate');
    }
    public function thanhtoanvnpay(Request $request)
    {

            if(isset($_POST['redirect'])){
                $rname = $request->andanh;
            $name = $request->name;
            if ($rname === "Andanh") {
                $name = "Ẩn Danh";
            } else {
                $name = $request->name;
            }
            $banktype = $request->banktype;
            if ($banktype === "Bank") {
                $bank = $request->bank;
            } else if ($banktype === "Momo") {
                $momo = $request->momoSelect;
            }


            $date = date('YmdHis');
            $project = $request->project;

            $amount = $request->amount;
            $order_id = rand(10000000, 99999999);
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://127.0.0.1:8000/camon";
            $vnp_TmnCode = "JDTIQ2LS"; //Mã website tại VNPAY 
            $vnp_HashSecret = "GOZHPSSCWYEILRDETJAJTHHDVAHUZAWW"; //Chuỗi bí mật

            $vnp_TxnRef = $order_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = $project;
            $vnp_OrderType = "card";
            $vnp_Amount = $amount * 100;
            $vnp_Locale = "vi";
            $vnp_BankCode = $bank;
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,

            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00'
                ,
                'message' => 'success'
                ,
                'data' => $vnp_Url
            );
            if (isset($_POST['redirect'])) {
                // if($returnData['code'] == '00'){  // phải có database mới bật
                //     $bill = new billpayment;
                //     $bill->name = $name;
                //     $bill->orderid = $order_id;
                //     $bill->project = $project;
                //     $bill->bank = $bank;
                //     $bill->Date_time = $date;
                //     $bill->Amount = $amount;
                //     $bill->Method = "VNPAY";
                //     $bill->save();
                // }
                return redirect($vnp_Url)->withInput();

            } else {
                return response()->json($returnData);
            }
            }elseif(isset($_POST['payUrl'])) {
                $momomethod = $request->momoSelect;
                if($momomethod == 'momocard'){
                    function execPostRequest($url, $data)
                    {
                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt(
                            $ch,
                            CURLOPT_HTTPHEADER,
                            array(
                                'Content-Type: application/json',
                                'Content-Length: ' . strlen($data)
                            )
                        );
                        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                        //execute post
                        $result = curl_exec($ch);
                        //close connection
                        curl_close($ch);
                        return $result;
                    }
        
        
                    $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
                    $order_id = rand(10000000, 99999999);
                    $amountotal = $request->amount;
        
                    $partnerCode = 'MOMOBKUN20180529';
                    $accessKey = 'klm05TvNBzhg7h7j';
                    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                    $orderInfo = "Thanh toán qua MoMo";
                    $amount = $amountotal;
                    $orderId = $order_id;
                    $redirectUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
                    $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
                    $extraData = "";
        
                    $requestId = time() . "";
                    $requestType = "payWithATM";
                    //before sign HMAC SHA256 signature
                    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                    $signature = hash_hmac("sha256", $rawHash, $secretKey);
                    $data = array(
                        'partnerCode' => $partnerCode,
                        'partnerName' => "Test",
                        "storeId" => "MomoTestStore",
                        'requestId' => $requestId,
                        'amount' => $amount,
                        'orderId' => $orderId,
                        'orderInfo' => $orderInfo,
                        'redirectUrl' => $redirectUrl,
                        'ipnUrl' => $ipnUrl,
                        'lang' => 'vi',
                        'extraData' => $extraData,
                        'requestType' => $requestType,
                        'signature' => $signature
                    );
                    $result = execPostRequest($endpoint, json_encode($data));
                    // dd($result);
                    $jsonResult = json_decode($result, true); // decode json
        
                    //Just a example, please check more in there
                   return redirect()->to($jsonResult['payUrl']);
                }elseif($momomethod == 'momoqr'){
                    function execPostRequest($url, $data)
                    {
                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt(
                            $ch,
                            CURLOPT_HTTPHEADER,
                            array(
                                'Content-Type: application/json',
                                'Content-Length: ' . strlen($data)
                            )
                        );
                        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                        //execute post
                        $result = curl_exec($ch);
                        //close connection
                        curl_close($ch);
                        return $result;
                    }
        
        
                    $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
                    $order_id = rand(10000000, 99999999);
                    $amountotal = $request->amount;
        
                    $partnerCode = 'MOMOBKUN20180529';
                    $accessKey = 'klm05TvNBzhg7h7j';
                    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                    $orderInfo = "Thanh toán qua MoMo";
                    $amount = $amountotal;
                    $orderId = $order_id;
                    $redirectUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
                    $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
                    $extraData = "";
        
                    $requestId = time() . "";
                    $requestType = "captureWallet";
                    //before sign HMAC SHA256 signature
                    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                    $signature = hash_hmac("sha256", $rawHash, $secretKey);
                    $data = array(
                        'partnerCode' => $partnerCode,
                        'partnerName' => "Test",
                        "storeId" => "MomoTestStore",
                        'requestId' => $requestId,
                        'amount' => $amount,
                        'orderId' => $orderId,
                        'orderInfo' => $orderInfo,
                        'redirectUrl' => $redirectUrl,
                        'ipnUrl' => $ipnUrl,
                        'lang' => 'vi',
                        'extraData' => $extraData,
                        'requestType' => $requestType,
                        'signature' => $signature
                    );
                    $result = execPostRequest($endpoint, json_encode($data));
                    // dd($result);
                    $jsonResult = json_decode($result, true); // decode json
        
                    //Just a example, please check more in there
                   return redirect()->to($jsonResult['payUrl']);
                }
                
            }
            
        
    }

}
