<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $getData = $this->PontrenModel->findAll();
        $data = [
            'data_guru'=>$getData
        ];
        return view('index',$data);
    }
}
