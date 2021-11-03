<?php namespace App\Models;

use CodeIgniter\Model;
use App\Model\UserModel;

class RentModel extends Model{
	protected $table = 'available';
	protected $allowedFields = [
		"model", "available_at", "number", "price", "seats", "owner", "bookedby", "start_date", "for_days"
	];
	protected $primaryKey = 'car_id';
	protected $useAutoIncrement = true;


	public function getCarModels($carid = null){
		if(!$carid){
			return $this->findAll();
		}

		return $this->asArray()->where(['car_id' => $carid])->first();
	}
}