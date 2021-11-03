<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        // $model = new UserModel();
        // $data['users'] =$model->getUsers();
        $data = [];
        $data['file_name'] = "login/login.php";
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required|min_length[3]|max_length[32]',
                'login-choice' => 'required',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[username, password, login-choice]',
            ];
            $errors = [
            	'password' => [
            		'validateUser' => 'Email or Password don\'t match'
            	]
            ];
            if (!$this->validate($rules, $errors)) {
            	$data['validation'] = $this->validator;
                return view('render.php', $data);
            } else {
                $model = new UserModel();

                $user = $model->where('uname', $this->request->getVar('username'))->first();
                
                $this->setUserSession($user);

                $session = session();
                $session->setFlashdata('success-login', 'Successfully Logged in');
                return redirect()->to('/');
            }
        }
        echo view("render.php", $data);
    }

    function setUserSession($user){
    	$data = [
    		'id' => $user['id'],
    		'username' => $user['uname'],
    		'password' => $user['pword'],
    		'email' => $user['email'],
    		'address' => $user['address'],
    		'contact' => $user['contact'],
    		'id_type' => $user['id_type'],
            'isLogged' => true,
    	];

    	session()->set($data);

    	return true;
    }
    function logout(){
        session()->destroy();
        return redirect()->to('/');
    }
}
