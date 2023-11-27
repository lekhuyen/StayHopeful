<?php

namespace App\Http\Controllers;

use App\Mail\EmailDonate;
use App\Models\DonateInfo;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class detaildonateController extends Controller
{

    public function index()
    {
        $projects = Project::all();

        return view('frontend.detaildonate.donatepage', compact('projects'));
    }




    public function viewlistdonate()
    {
        return view('frontend.detaildonate.listdonate');
    }
    public function thanhtoan(Request $request)
    {
        $fullname = "";
        if ($request->hidename == "hidename") {
            $fullname = $request->hidename;
        } else {
            $fullname = $request->fullname;
        }
        $email = $request->email;
        $phone = $request->phone;
        $project = $request->project;
        $type = $request->type;
        $amounttotal = $request->amount;
        $message = $request->message;

        if (isset($_POST['redirect'])) {
            $order_id = rand(10000000, 99999999);
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://127.0.0.1:8000/";
            $vnp_TmnCode = "JDTIQ2LS";
            $vnp_HashSecret = "GOZHPSSCWYEILRDETJAJTHHDVAHUZAWW";

            $vnp_TxnRef = $order_id;
            $vnp_OrderInfo = $project;
            $vnp_OrderType = "card";
            $vnp_Amount = $amounttotal * 100;
            $vnp_Locale = "vi";
            $vnp_BankCode = "";
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
                $donateinfo = new DonateInfo();
                $donateinfo->name = $fullname;
                $donateinfo->email = $email;
                $donateinfo->phone = $phone;
                $donateinfo->project_id = $project;
                $donateinfo->method = $type;
                $donateinfo->amount = $amounttotal;
                $donateinfo->message = $message;
                $donateinfo->save();
                if ($returnData['code'] == '00') {
                    $tomail = $request->email;

                    Mail::to($tomail)->send(new EmailDonate());
                    return redirect()->back()->with('success', 'Send Mail Success');
                }
                return redirect($vnp_Url)->withInput();


            } else {
                return response()->json($returnData);
            }
        }
    }

}
