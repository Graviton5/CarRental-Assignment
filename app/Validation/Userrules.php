<?php
namespace App\Validation;
use App\Models\UserModel;

class Userrules{

  public function validateUser(string $str, string $fields, array $data){
    $model = new UserModel();
    $user = $model->where('uname', $data['username'])->first();

    if(!$user){
      	return false;
    }
  	else if($data['login-choice'] == 'renter' && $user['id_type'] == 1){
  		return false;
  	}
  	else if($data['login-choice'] == 'agency' && $user['id_type'] == 0){
  		return false;
  	}

  	
    return password_verify($data['password'], $user['pword']);
  }
}