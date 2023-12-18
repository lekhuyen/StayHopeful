<?php

namespace App\Http\Controllers;

use App\Mail\EmailDonate;
use App\Models\DonateInfo;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class detaildonateController extends Controller
{

    public function index()
    {
        $projects = Project::all();
        $project = null;
        return view('frontend.detaildonate.donatepage', compact('projects', 'project'));

    }


    // public function donatepage($title)
    // {
    //     $project = Project::where('title',  $title)->select('*')->first();
    //     $projects = Project::all();


    //     return view('frontend.detaildonate.donatepage', compact('projects', 'project'));
    // }
    public function viewlistdonate()
    {
        $donateinfo = DonateInfo::orderBy('amount', 'desc')->get();
        return view('frontend.detaildonate.listdonate', compact('donateinfo'));
    }


    public function payment(Request $request)
    {

        $request->validate([
            'amount' => 'required|numeric|min:0',
        ], [
            'amount.numeric' => 'Please enter a valid number.',
            'amount.min' => 'Please enter a Amount greater than 0.',
        ]);
        $data = $request->all();
        session()->put('infopay', $data);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('detail.paymentsuccess'),
                "cancel_url" => route('detail.donate')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => session('userinfo')['amount'],
                    ]
                ]
            ]
        ]);



        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    // dd($data);
                    return redirect()->away($link['href']);

                }
            }
        } else {

            return redirect()->back()->with('error', 'Payment not accepted')->withInput();
        }
    }
    public function paymentsuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);


        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $user = Auth::user();
            $userinfo = session()->get('infopay');


            $tomail = $userinfo['emailget'];
            $message = $userinfo['project'];
            $name = $userinfo['fullname'];
            Mail::to($tomail)->send(new EmailDonate($message,$name));
            if ($user) {
                $username = "";
                if ($userinfo['fullname'] == "Anonymous") {
                    $username = "Anonymous";
                } else {
                    $username = $userinfo['fullname'];
                }

                $donateinfo = new DonateInfo();
                $donateinfo->name = $username;
                $donateinfo->email = $user->email;
                $donateinfo->user_id = $user->id;
                $donateinfo->phone = $userinfo['phone'];
                $project = Project::where('title', $userinfo['project'])->first();
                if ($project) {
                    $donateinfo->project_id = $project->id;
                }

                $donateinfo->method = "bank";
                $donateinfo->amount = $userinfo['amount'];
                $donateinfo->message = $userinfo['message'];
                $donateinfo->save();
                $findUser = User::where('email', $user->email)->first();
                if ($findUser) {
                    $findUser->is_sponsor = true;
                    $findUser->save();
                }
            } else {

                $username = "";
                if ($userinfo['fullname'] == "Anonymous") {
                    $username = "Anonymous";
                } else {
                    $username = $userinfo['fullname'];
                }

                $donateinfo = new DonateInfo();
                $donateinfo->name = $username;
                $donateinfo->email = $userinfo['emailget'];
                $donateinfo->user_id = null;
                $donateinfo->phone = $userinfo['phone'];
                $project = Project::where('title', $userinfo['project'])->first();
                if ($project) {
                    $donateinfo->project_id = $project->id;
                }

                $donateinfo->method = "bank";
                $donateinfo->amount = $userinfo['amount'];
                $donateinfo->message = $userinfo['message'];
                $donateinfo->save();

            }
            return redirect()->route('detail.listdonate')->with('success', 'Success Payment');


        } else {
            return redirect()->back()->with('error', 'Error');
        }
    }

}
