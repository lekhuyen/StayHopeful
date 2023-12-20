<?php

namespace App\Http\Controllers;

use App\Models\DonateInfo;
use App\Models\User;
use App\Models\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthloginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the login request data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email = $request->email;
        // $password = $request->password;
        $user = User::where("email", $email)->first();
        $role = $user->role;
        $status = $user->status;
        if ($status == 1) {
            // Attempt login with provided credentials
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

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
                ]);
            }
        } else {
            return response()->json(['status' => 'email_error', 'message' => 'Must verify email before login']);
        }

    }

    public function register(Request $request)
    {
        $verify_token = Str::random(6);
        $request->validate([
            "name" => "required",
            "email" => "bail|required|email",
            "password" => "bail|required|min:5|max:20",
        ]);
        $email = $request->email;
        $existingUser = User::where("email", $email)->first();
        if ($existingUser) {
            return response()->json(['status' => 'error', 'message' => 'Email đã tồn tại']);
        } else {
            //$password = $request->password;
            $hashPassword = Hash::make($request->password);
            $user = new User();
            $user->name = $request->name;
            $emailUser = $user->email = $request->email;
            $user->password = $hashPassword;
            $user->verified_token = $verify_token;
            $user->save();
            $name = 'StayHopeful';

            Mail::send('frontend.login.verified_email', compact('verify_token'), function ($email) use ($name, $emailUser) {
                $email->subject('Confirm Register');
                $email->to($emailUser, $name);
            });
            return response()->json(['status' => 'success', 'message' => 'Đăng kí thành công! Vui lòng xác nhận email']);
        }
    }
    public function verified_email($verify_token)
    {
        $user = User::where("verified_token", $verify_token)->first();
        if ($user) {
            $user->update(['status' => 1]);
            return redirect()->route('/')->with("isVerified", true);
        }
    }
    public function viewprofile()
    {

        $userInfo = session()->get('userInfo');
        $usercheck = Auth::user();
        if ($userInfo && isset($userInfo['id'])) {
            $users = $userInfo['id'];
            $userupdate = User::where("id", '=', $users)->select('*')->first();

            $posts = UserPost::orderBy('id', 'desc')
                ->where('user_id', $users)
                ->where('status', 0)
                ->get();
            $user = User::all();
            $userinfo = DonateInfo::where('user_id', $usercheck->id)->select('*')->paginate(5);
            return view('frontend.profile.index', compact('posts', 'userinfo', 'userupdate', 'user'));
        } else {
            return redirect()->route('/')->with('error', 'You Need to login');
        }
    }
    //login bằng email
    public function redirectgoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleback()
    {
        $usergoogle = Socialite::driver('google')->user();

        try {
            $existingUser = User::where('email', $usergoogle->email)->first();

            if ($existingUser) {
                // Update existing user information if needed
                $existingUser->update([
                    'name' => $usergoogle->name,
                    'avatar' => $usergoogle->avatar,
                ]);

                $user = $existingUser;
            } else {
                // Create a new user
                $user = User::create([
                    'name' => $usergoogle->name,
                    'email' => $usergoogle->email,
                    'avatar' => $usergoogle->avatar,
                    'role' => 0,
                    'password' => '123456',
                    'status' => 1,
                    'is_volunteer' => 0,
                    'is_sponsor' => 0,
                ]);
            }
            Auth::login($user);
            session()->put('userInfo', [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar,
                'role' => 0,
                'status' => 1,
                'is_volunteer' => 0,
                'is_sponsor' => 0,
            ]);

            return redirect()->route('/');
        } catch (\Throwable $th) {
            return redirect()->route('/')->with('error', $th->getMessage());
        }
    }
    //login bằng facebook
    public function redirectfacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handlefacebookback()
    {
        try {
            $userfacebook = Socialite::driver('facebook')->user();
            if ($userfacebook) {
                session()->put("userInfo", $userfacebook);
                return redirect()->route('/');
            } else {
                return redirect()->back()->with('error', 'Lỗi đăng nhập');
            }
            ;
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Lỗi đăng nhập email');
        }
    }
    public function redirectTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }
    public function handleTwitterCallback()
    {
        try {
            $usertwitter = Socialite::driver('twitter')->user();

            if ($usertwitter) {
                session()->put("userInfo", $usertwitter);
                return redirect()->route('/');
            } else {
                return redirect()->back()->with('error', 'Login error');
            }

        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Login error');
        }
    }
    public function logout()
    {
        session()->forget('userInfo');
        Auth::logout();
        return redirect()->route('/');
    }

    //edit-post
    public function post_edit($post_id)
    {
        $post = UserPost::find($post_id);
        $image = $post->images;
        return response()->json(['post' => $post, 'images' => $image]);
    }
    public function post_edit_1($post_id)
    {
        $post = UserPost::find($post_id);
        // $image = $post->images;
        return view('frontend.post_page.form_edit-post', compact('post'));
        // return response()->json(['post' => $post, 'images' => $image]);
    }
    public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);
        // $old_password = $request-> old_password;
        // $new_password = $request-> new_password;
        $email = session()->get('userInfo')['email'];
        $user = User::where("email", $email)->first();
        if (Auth::attempt(['email' => $email, 'password' => $request->old_password])) {
            // $user->update(['password' => $request->new_password]);
            $user->password = Hash::make($request->new_password);
            $user->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Change password successfully'
            ], 200);

        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Post not Found'
            ]);
        }


    }


    public function user_profile($postId)
    {
        $posts = UserPost::where('user_id', $postId)->get();
        $user = User::find($postId);
        if ($posts) {
            return view('frontend.profile.profile_user', compact('posts', 'user'));
        } else {
            return abort(404);
        }
    }
}
