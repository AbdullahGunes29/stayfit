<?php

namespace App\Controllers;

use App\Models\RecordModel;

class Record extends BaseController
{
    public function add()
    {
        if (! session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        $model = new RecordModel();

        $data = [
            'user_id' => session()->get('user_id'),
            'record_date' => date('Y-m-d'),
            'burned_calories' => $this->request->getPost('calories'),
            'steps' => $this->request->getPost('steps')
        ];

        $existingRecord = $model
        ->where('user_id', $data['user_id'])
        ->where('record_date', $data['record_date'])
        ->first();

        if ($existingRecord) {
            $model->update($existingRecord['id'], [
                'burned_calories' => $data['burned_calories'],
                'steps' => $data['steps']
            ]);
        } else {
            $model->insert($data);
        }

        return redirect()->to('/dashboard');
    }

    public function list()
    {
        if (! session()->get('logged_in')) {
            return redirect()->to('/login');
        }
    
        $model = new \App\Models\RecordModel();
    
        $userId = session()->get('user_id');
        $filter = $this->request->getGet('filter');
    
        if ($filter == 'monthly') {
            $records = $model
                ->where('user_id', $userId)
                ->where('record_date >=', date('Y-m-d', strtotime('-30 days')))
                ->findAll();
        } else {
            // default weekly
            $records = $model
                ->where('user_id', $userId)
                ->where('record_date >=', date('Y-m-d', strtotime('-7 days')))
                ->findAll();
        }
    
        return view('records', [
            'records' => $records,
            'filter'  => $filter ?? 'weekly'
        ]);
    }
}