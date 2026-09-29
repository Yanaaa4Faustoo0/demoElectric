<?php

namespace App\Controllers;

use App\Models\User;

class Login extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        return view('login', [
            'title' => 'Login - Puihaha Electric',
            'page' => 'login',
            'error' => session()->getFlashdata('error'),
            'success' => session()->getFlashdata('success')
        ]);
    }

    public function authenticate()
    {
        $email = trim($this->request->getPost('email'));
        $password = $this->request->getPost('password');

        if (empty($email) || empty($password)) {
            return redirect()
                ->to('/login')
                ->with('error', 'Please enter your email and password.');
        }

        $user = $this->userModel->findByEmail($email);

        if (!$user) {
            return redirect()
                ->to('/login')
                ->with('error', 'Invalid email or password.');
        }

        if (!$user['is_active']) {
            return redirect()
                ->to('/login')
                ->with('error', 'Your account is inactive.');
        }

        if (!$this->userModel->verifyPassword($password, $user['password'])) {
            return redirect()
                ->to('/login')
                ->with('error', 'Invalid email or password.');
        }

        session()->set([
            'user_id' => $user['id'],
            'user_email' => $user['email'],
            'user_name' => $user['first_name'] . ' ' . $user['last_name'],
            'user_type' => $user['user_type'],
            'is_logged_in' => true
        ]);

        return redirect()->to('/accounts');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()
            ->to('/login')
            ->with('success', 'You have been logged out.');
    }
}