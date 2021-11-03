<?php

namespace App\Controllers;

class HomePage extends BaseController
{
    public function index()
    {
        $data['file_name'] = 'homepage/home.php';
        echo view('render.php', $data);
    }

    function booked(){
        echo "Test rent";
    }
}
