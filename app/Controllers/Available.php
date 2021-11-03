<?php

namespace App\Controllers;

use App\Models\RentModel;
use App\Models\UserModel;

class Available extends BaseController
{
    public function index()
    {
        $model = new RentModel();
        $ownerModel = new UserModel();

        $data['rents'] =$model->getCarModels();

        if($data['rents'] != NULL):
            for($i = 0; $i < count($data['rents']); $i++):
                $temp = $ownerModel->getUsers($data['rents'][$i]['owner']);
                $data['rents'][$i]['car_owner'] = $temp['uname'];
            endfor;
        endif;

        $data['file_name'] = "available/rent.php";
        echo view("render.php", $data);
    }

    public function booked(){
        $data = [];
        $data['file_name'] = 'available/booked.php';

        if(session()->get('isLogged')){
            $model = new RentModel();
            $ownerModel = new UserModel();

            $booked = $model->where('bookedby', session()->get('id'))->findAll();
            if(!is_null($booked)){
                $data['booked'] = $booked;
                for($i = 0; $i < count($data['booked']); $i++):
                    $temp = $ownerModel->getUsers($data['booked'][$i]['owner']);
                    $data['booked'][$i]['car_owner'] = $temp['uname'];
                endfor;
            }
        }
        echo view('render.php', $data);
    }

    public function rentnow(){
        $data = [];
        $data['file_name'] = 'available/rent.php';
        if(session()->get('isLogged') && (session()->get('id_type') == 0) && $this->request->getMethod() == 'post'){
            $rules = [
                'startDate' => 'required',
                'forDays' => 'required',
            ];
            if (!$this->validate($rules)) {
                session()->setFlashdata('validation', $this->validator);
                return redirect()->to('/');
            } else {
                $uri = service('uri', current_url());

                $customer_id = session()->get('id');
                $carid = $uri->getSegment(2);
                $model = new RentModel();

                $data = $model->where('car_id', $carid)->first();

                $data['bookedby'] = $customer_id;
                $data['start_date'] = $this->request->getVar('startDate');
                $data['for_days'] = $this->request->getVar('forDays');
                
                $model->update($carid, $data);
                $session = session();
                $session->setFlashdata('success-rent', 'Successfully Rented!');
                return redirect()->to('/');
            }

            return redirect()->to('/');
        }
        elseif (session()->get('isLogged') && (session()->get('id_type') == 1) && $this->request->getMethod() == 'post') {
                $session = session();
                $session->setFlashdata('fail', 'Cannot Rent Cars as an Agency.');
                return redirect()->to('/');
          }  
        else{
            return redirect()->to('/Login');
        }
        return redirect()->to('/Available');
    }

    public function bookedAgency(){
        $data = [];
        $data['file_name'] = 'available/bookedAgency.php';

        if(session()->get('isLogged')){
            $model = new RentModel();
            $ownerModel = new UserModel();

            $booked = $model->where('owner', session()->get('id'))->findAll();
            // print_r($booked);
            if(!is_null($booked)){
                $temp = [];
                for($i = 0; $i < count($booked); $i++){
                    if(!is_null($booked[$i]['bookedby'])){
                        $booker = $ownerModel->getUsers($booked[$i]['bookedby']);
                        $booked[$i]['booker_name'] = $booker['uname'];
                        array_push($temp, $booked[$i]);
                    }
                }
                $data['bookedAgency'] = $temp;
            }
        }
        echo view('render.php', $data);
    }

}
