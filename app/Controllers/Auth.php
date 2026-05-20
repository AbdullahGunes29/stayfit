<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        return view('register');
    }

    public function registerPost()
    {
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Aynı email var mı kontrol et
        $existingUser = $model->where('email', $email)->first();

        if ($existingUser) {
            return redirect()->to('/register')
                ->with('error', 'Bu e-posta adresi zaten kullanılıyor.');
        }

        // Şifre kontrolü: 8 karakter, büyük harf, rakam
        if (! preg_match('/^(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
            return redirect()->to('/register')
                ->with('error', 'Şifre en az 8 karakter, 1 büyük harf ve 1 rakam içermelidir.');
        }

        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name'  => $this->request->getPost('last_name'),
            'email'      => $email,
            'password'   => password_hash($password, PASSWORD_DEFAULT),
            'gender'     => $this->request->getPost('gender'),
            'age'        => $this->request->getPost('age'),
            'height'     => $this->request->getPost('height'),
            'weight'     => $this->request->getPost('weight'),
            'step_goal'  => $this->request->getPost('step_goal'),
        ];

        $model->insert($data);

        return redirect()->to('/login')
            ->with('success', 'Kayıt başarılı. Giriş yapabilirsiniz.');
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost()
    {
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id'   => $user['id'],
                'user_name' => $user['first_name'] . ' ' . $user['last_name'],
                'logged_in' => true
            ]);

            return redirect()->to('/');
        }

        return redirect()->to('/login')
            ->with('error', 'Email veya şifre hatalı.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}




