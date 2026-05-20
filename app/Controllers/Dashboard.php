<?php

namespace App\Controllers;

use App\Models\RecordModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (! session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $recordModel = new RecordModel();
        $userModel   = new UserModel();

        $userId = session()->get('user_id');

        // BUGÜNÜN KAYDI
        $today = $recordModel
            ->where('user_id', $userId)
            ->where('record_date', date('Y-m-d'))
            ->first();

        // KULLANICI HEDEFİ
        $user = $userModel->find($userId);

        return view('dashboard', [
            'todayCalories' => $today['burned_calories'] ?? 0,
            'todaySteps'    => $today['steps'] ?? 0,
            'goal'          => $user['step_goal'] ?? 10000
        ]);
    }
}


