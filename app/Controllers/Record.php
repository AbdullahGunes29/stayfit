<?php

namespace App\Controllers;

use App\Models\RecordModel;

class Record extends BaseController
{
    public function add()
    {
        $model = new RecordModel();

        $data = [
            'user_id' => session()->get('user_id'),
            'record_date' => date('Y-m-d'),
            'burned_calories' => $this->request->getPost('calories'),
            'steps' => $this->request->getPost('steps')
        ];

        $model->insert($data);

        return redirect()->to('/dashboard');
    }

    public function list()
    {
        $model = new RecordModel();

        $data['records'] = $model
            ->where('user_id', session()->get('user_id'))
            ->findAll();

        return view('records', $data);
    }
}