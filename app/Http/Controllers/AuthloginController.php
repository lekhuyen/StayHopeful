<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthloginController extends Controller
{
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
    public function register(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "bail|required|email",
            "password" => "bail|required|min:5|max:20",
        ]);
        $email = $request->email;
        $existingUser = User::where("email", $email)->first();
        if ($existingUser) {
              return response()->json(['status' => 'error', 'message' => 'Email đã tồn tại']);
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
        $user = session()->get('userInfo')['id'];
        $posts = UserPost::orderBy('id','desc')
                            ->where('user_id',$user)
                            ->where('status', 0)
                            ->get();
        return view('frontend.profile.index', compact('posts'));
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
