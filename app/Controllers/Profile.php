<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        if (! session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id'));

        return view('profile', [
            'user' => $user
        ]);
    }

    public function update()
    {
        if (! session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $userId = session()->get('user_id');

        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name'  => $this->request->getPost('last_name'),
            'gender'     => $this->request->getPost('gender'),
            'age'        => $this->request->getPost('age'),
            'height'     => $this->request->getPost('height'),
            'weight'     => $this->request->getPost('weight'),
            'step_goal'  => $this->request->getPost('step_goal'),
        ];

        $userModel->update($userId, $data);

        session()->set('user_name', $data['first_name'] . ' ' . $data['last_name']);

        return redirect()->to('/profile')->with('success', 'Profil bilgileri güncellendi.');
    }
}


