<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('admin/menu'));
        }

        $data = [
            'title'      => 'Login Admin - Aprilianto\'s Tinutuan',
            'validation' => \Config\Services::validation(),
        ];

        return view('auth/login', $data);
    }

    public function processLogin()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        $messages = [
            'username' => [
                'required' => 'Username wajib diisi.',
            ],
            'password' => [
                'required' => 'Password wajib diisi.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('username', $username)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Username atau password salah.');
        }

        // Set session
        session()->set([
            'isLoggedIn' => true,
            'userId'     => $user['id'],
            'username'   => $user['username'],
            'name'       => $user['name'],
            'role'       => $user['role'],
        ]);

        return redirect()->to(base_url('admin/menu'))->with('success', 'Selamat datang kembali, ' . esc($user['name']) . '!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'))->with('success', 'Anda telah berhasil logout.');
    }
}
