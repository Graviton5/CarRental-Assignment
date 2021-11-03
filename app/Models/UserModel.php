<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
	protected $table = 'users';
	protected $allowedFields = [
		"uname", "pword", "email", "contact", "address", "id_type"
	];
	protected $beforeInsert = ['beforeInsert'];
	protected $beforeUpdate = ['beforeUpdate'];

	public function getUsers($user = null){
		if(!$user){
			return $this->findAll();
		}

		return $this->asArray()->where(['id' => $user])->first();
	}

	protected function beforeInsert(array $data){
		$data = $this->passwordHash($data);

		return $data;
	}

	protected function beforeUpdate(array $data){
		$data = $this->passwordHash($data);
		
		return $data;
	}
	protected function passwordHash(array $data){
		if(isset($data['data']['pword']))
			$data['data']['pword'] = password_hash($data['data']['pword'], PASSWORD_DEFAULT);
		return $data;
	}
}