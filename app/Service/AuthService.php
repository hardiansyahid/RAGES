<?php

namespace App\Service;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthService
{
    public function doLogin($email, $password)
    {
        $user = (new UserService)->getUserByEmail($email);
        if ($user) {
            if (Hash::check($password, $user->password)) {
                if (Auth::attempt(['email' => $email, 'password' => $password])) {
                    Session::put('user', Auth::user());
                    return [
                        'status' => 'success',
                        'message' => 'Selamat datang ' . $user->email
                    ];
                }
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Password salah'
                ];
            }
        } else {
            return [
                'status' => 'error',
                'message' => 'Email belum terdaftar'
            ];
        }
    }

    public function encrypt($password)
    {
        return bcrypt($password);
    }
}
