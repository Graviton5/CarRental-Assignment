<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RentModel;

class AddNew extends BaseController
{
    public function index()
    {
        // $model = new UserModel();
        // $data['users'] =$model->getUsers();
        $data = [];
        $data['file_name'] = "addnew/newcar.php";
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'model' => 'required|min_length[3]|max_length[32]',
                'address' => 'required|min_length[3]|max_length[1024]',
                'number' => 'required',
                'price' => 'required|greater_than[1]|less_than[10000000]',
                'seats' => 'required|greater_than[1]',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('render.php', $data);
            } else {
                $carmodel = new RentModel();
                $usermodel = new UserModel();

                $newData = [
                    'model' => $this->request->getVar('model'),
                    'available_at' => $this->request->getVar('address'),
                    'number' => $this->request->getVar('number'),
                    'price' => $this->request->getVar('price'),
                    'seats' => $this->request->getVar('seats'),
                    'owner' => session()->get('id'),
                    'start_date' => NULL,
                    'for_days' => NULL, 
                    'bookedby' => NULL,
                ];
                
                $carmodel->save($newData);
                session()->setFlashdata('success', 'Successfully Added');

                return redirect()->to('/AddNew');
            }
        }
        echo view("render.php", $data);
    }
}