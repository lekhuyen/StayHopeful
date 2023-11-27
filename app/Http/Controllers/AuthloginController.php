<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class AuthloginController extends Controller
{
    // use Queueable, SerializesModels;
    // public $toMail;
    // public $subject;
    // public $message;

    // public function __construct($subject,$message)
    // {
    //     $this->subject = $subject;
    //     $this->message = $message;

    // }
    public function login(Request $request) {

        // Validate the login request data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email = $request->email;
        $password = $request->password;
        $user = User::where("email", $email)->first();
        $role = $user->role;
        // Attempt login with provided credentials
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            session()->put("userInfo", $user->toArray());
            // User logged in successfully
            return response()->json([
                'status' => 'success',
                'role' => $role,
                'message' => 'User logged in successfully'
            ], 200);
    
        } else {
        
            // Login failed
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized'
            ], 401);
        }
    
    }
   
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         from: new Address("xuyenlt1@gmail.com","XYZ Company"),
    //         subject: $this->subject,
    //     );
    // }
    // public function content(): Content
    // {
    //     return new Content(
    //         html:"mail.template",
    //         with:[
    //             "messageMail"=>$this->message
    //         ]
    //     );
    // }
    public function register(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "bail|required|email",
            "password" => "bail|required|min:5|max:20",
        ]);
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
        return response()->json(['status' => 'error','message' => 'Email đã tồn tại']);
        }
        else{
        //$password = $request->password;
        $hashPassword = Hash::make($request->password);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        
        $user->password = $hashPassword;
        // $user->role = $request->role;
        // $user->status = $request->status;
        $user->save();

        return response()->json(['status' => 'success', 'message' => 'Dữ liệu đã được nhận và xử lý thành công.']);
        }
    }
    public function viewprofile(){
        return view('frontend.profile.index');
    }
    //login bằng email
    public function redirectgoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleback(){
        try {
            $usergoogle = Socialite::driver('google')->user();
        if($usergoogle){
            session()->put('user', $usergoogle);
            return redirect()->route('/');  
        }else{
            return redirect()->back()->with('error', 'Lỗi đăng nhập');
        };
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Lỗi đăng nhập email');
        }
    }
    //login bằng facebook
    public function redirectfacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function handlefacebookback(){
        try {
            $userfacebook = Socialite::driver('facebook')->user();
        if($userfacebook){
            session()->put('user', $userfacebook);
            return redirect()->route('/');  
        }else{
            return redirect()->back()->with('error', 'Lỗi đăng nhập');
        };
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Lỗi đăng nhập email');
        }
    }
    public function logout(){
        session()->forget('userInfo');
        return redirect()->route('/');
    }
}
