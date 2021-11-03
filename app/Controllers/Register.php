<?php

namespace App\Controllers;

use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        $data = [];
        $data['file_name'] = "register/register.php";
        return view("render.php", $data);
    }

    function customer(){
        $data = [];
        $data['file_name'] = "register/register_customer.php";
        return view("render.php", $data);
    }

    function agency(){
        $data = [];
        $data['file_name'] = "register/register_agency.php";
        return view("render.php", $data);
    }

    function addCustomer(){
        $data = [];
        $data['file_name'] = "register/register_customer.php";
        helper(['form']);
        
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required|min_length[3]|max_length[32]|is_unique[users.uname]',
                'contact' => 'min_length[9]|max_length[20]',
                'email' => 'min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('render.php', $data);
            } else {
                $model = new UserModel();

                $newData = [
                    'uname' => $this->request->getVar('username'),
                    'contact' => $this->request->getVar('contact'),
                    'email' => $this->request->getVar('email'),
                    'pword' => $this->request->getVar('password'),
                    'id_type' => 0,
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/Login');
            }
        }
    }

    function addAgency(){
        $data = [];
        $data['file_name'] = "register/register_agency.php";
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required|min_length[3]|max_length[32]|is_unique[users.uname]',
                'contact' => 'min_length[9]|max_length[20]',
                'email' => 'min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'address' => 'required',
                'password_confirm' => 'matches[password]',
            ];

            if (!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                return view('render.php', $data);
            } else {
                $model = new UserModel();

                $newData = [
                    'uname' => $this->request->getVar('username'),
                    'contact' => $this->request->getVar('contact'),
                    'email' => $this->request->getVar('email'),
                    'pword' => $this->request->getVar('password'),
                    'address' => $this->request->getVar('address'),
                    'id_type' => 1,
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');

                return redirect()->to('/Login');
            }
        }
    }
}
