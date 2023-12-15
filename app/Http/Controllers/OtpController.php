<?php

namespace App\Http\Controllers;

use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'bail|required|email',
        ]);

        $email = $request->email;
        $otp = Str::random(6);
        $name = 'StayHopeful';
        $expiredAt = now()->addMinutes(1);
        $now = Carbon::now();
        $currentDatetime = $now->toDateTimeString();
        $otpUser = Otp::where('user_email', $email)->first();
        // Kiểm tra xem đã gửi bao nhiêu lần trong khoảng thời gian nhất định
        $user = User::where('email', $email)->first();
        if ($user) {
            if (!$otpUser) {
                $otp_info = new Otp();
                $emailUser = $otp_info->user_email = $request->email;
                $otp_info->otp = $otp;
                $otp_info->expired_at = $expiredAt;
                $otp_info->save();
                Mail::send('frontend.login.otp', compact('otp'), function ($email) use ($name, $emailUser) {
                    $email->subject('OTP');
                    $email->to($emailUser, $name);
                });
                // Nếu chưa vượt quá số lần cho phép, tăng số lần thử
                $user->increment('otp_attempts');
                return response()->json(['status' => 'success',
                                         'message' => 'OTP sent successfully',
                                         'email' => $emailUser]);
            }else if ($user->otp_attempts < 5 && $otpUser->updated_at->diffInMinutes(Carbon::now()) > 1){
                $sendUpdateOtpEmail = $otpUser->user_email;
                $otpUser->otp = $otp;
                $otpUser->expired_at = $expiredAt;
                $otpUser->save();
                Mail::send('frontend.login.otp', compact('otp'), function ($email) use ($name, $sendUpdateOtpEmail) {
                    $email->subject('OTP');
                    $email->to($sendUpdateOtpEmail, $name);
                });
                $user->increment('otp_attempts');
                return response()->json(['status' => 'update_success',
                                         'message' => 'OTP resend successfully',
                                         'email' => $email]);

            }else if ($user->otp_attempts >= 5 && $otpUser->created_at->isToday()) {
                // Nếu đã vượt quá số lần cho phép, trả về thông báo hoặc thực hiện các hành động khác
                return response()->json(['status' => 'daily_error', 'message' => 'Một ngày chỉ được gửi OTP tối đa 5 lần']);
            }else if ($otpUser->updated_at && $otpUser->updated_at->diffInMinutes(Carbon::now()) < 1) {
                return response()->json(['status' => 'time_error', 'message' => 'Bạn chỉ có thể gửi OTP mỗi 1 phút một lần']);
            }
        }
    }

        public function verifyOtp(Request $request)
    {
        $request->validate([
            'user_email' => 'required',
            'otp' => 'required',
            'new_password' => 'required',
        ]);

        $email = $request->user_email;
        $count = 0;
        $user = User::where('email', $email)->first();

        $otpRecord = Otp::where('user_email', $email)
            ->where('otp', $request->otp)
            ->where('expired_at', '>', Carbon::now())
            ->first();

        if (!$otpRecord) {
            // Nếu xác nhận thất bại, tăng số lần thử
            $user->increment('otp_attempts');
            return response()->json(['status' => 'error', 'message' => 'Invalid OTP or OTP has expired']);
        }
        // if (Carbon::now() > $otpRecord->expired_at) {
        //     // Nếu hết hạn, tăng số lần thử và trả về thông báo
        //     $user->increment('otp_attempts');
        //     return response()->json(['status' => 'expired', 'message' => 'The OTP has expired'], 422);
        // }
        // Xác nhận OTP thành công, cập nhật mật khẩu người dùng
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);


        // Xóa OTP và reset số lần thử sau khi xác nhận thành công
        $otpRecord->delete();
        $user->otp_attempts = $count;
        $user->save();

        return response()->json(['status' => 'success', 'message' => 'Password updated successfully']);
    }
}
