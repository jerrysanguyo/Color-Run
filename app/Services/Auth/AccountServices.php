<?php

namespace App\Services\Auth;

use App\Mail\OtpMail;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class AccountServices
{
    public function authenticate(array $data): User
    {
        if($user = Auth::attempt($data))
        {
            request()->session()->regenerate();
            return Auth::user();
        }

        throw new AuthenticationException('Invalid login credentials.');
    }

    public function register(array $data)
    {
        $register =  User::create([
            'name' => $data['name'],
            'email'=> $data['email'],
            'contact_number'=> $data['contact'],
            'password'=> bcrypt($data['password']),
        ]);

        if ($register) {
            $register->assignRole('user');
            $this->confirmationSent($register);
        }

        return $register;
    }

    private function generateUniqueOtp(): string
    {
        do {
            $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        } while (Otp::where('otp', $otp)->exists());

        return $otp;
    }

    public function confirmationSent(User $user)
    {
        $otp = $this->generateUniqueOtp();

        Otp::updateOrCreate([
            'user_id' => $user->id,
        ], [
            'otp' => $otp,
            'remarks' => 'registration',
        ]);

        $message = "Thank you for registering. Here's your OTP: {$otp}";
        $mobile = $user->contact_number;
        
        $encodedMessage = urlencode($message);
        $url = "https://tagatext.taguig.gov.ph/api/sms/c18b09e4-29e8-4b2d-b034-61c9830cc403/{$mobile}/{$encodedMessage}";
        $response = Http::get($url);

        if (!$response->successful()) {
            \Log::error("Failed to send SMS to {$mobile}: " . $response->body());
        }

        try {
            Mail::to($user->email)->send(new OtpMail($otp, $user->name));
        } catch (\Exception $e) {
            \Log::error("Failed to send OTP email to {$user->email}: " . $e->getMessage());
        }
    }

    public function confirm(array $data, User $user)
    {
        $otpVerification = Otp::where('user_id', $user->id)
                            ->where('otp', $data['otp'])
                            ->where('remarks', 'registration')
                            ->first();
                            
        if($otpVerification)
        {
            $otpVerification->delete();
            $user->update(['email_verified_at' => now()]);
        }

        return $otpVerification ? $user : null;
    }

    public function updateProfile()
    {

    }

    public function logout(): void
    {
        Auth::logout();
        request()->session()->invalidate();
    }
}