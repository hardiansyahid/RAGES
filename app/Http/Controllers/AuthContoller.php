<?php

namespace App\Http\Controllers;

use App\Service\AuthService;
use App\Service\UserService;
use Illuminate\Http\Request;

class AuthContoller extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new AuthService();
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        try {
            $login = $this->service->doLogin($data['email'], $data['password']);
        } catch (\Exception $error) {
            throw new \Exception($error->getMessage());
        }

        if ($login['status'] == 'success') {
            return redirect('/loggedin')->with($login['status'], $login['message']);
        } else {
            return redirect()->back()->with($login['status'], $login['message']);
        }
    }

    public function daftar()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'nama' => 'required',
        ]);

        $EmailRegistered = (new UserService)->getUserByEmail($data['email']);
        if ($EmailRegistered) {
            return redirect()->back()->with('error', 'Email sudah terdaftar');
        } else {

            try {
                $data['role'] = 'USER';
                $data['password'] = (new AuthService)->encrypt($data['password']);
                $request = (new UserService)->create($data);
            } catch (\Exception $error) {
                throw new \Exception($error->getMessage());
            }

            if ($request) {
                return redirect('/')->with('success', 'Akun berhasil dibuat');
            } else {
                return redirect()->back()->with('error', 'Akun gagal dibuat, hub admin untuk bantuan');
            }
        }
    }

    public function lupaPassword()
    {
    }

    public function logout()
    {
        session()->flush('user');
        return redirect('/')->with('success', 'Anda telah keluar');
    }

    public function loggedin()
    {
        return "Hallo selamat datang " . session('user')->email;
    }
}
