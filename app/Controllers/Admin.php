<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(){

        $getData = $this->PontrenModel->countAll();
        $data = [
            'data_all'=>$getData
        ];
        return view('admin/index',$data);
    }
    public function dataguru(){
        $getData = $this->PontrenModel->findAll();
        $data = [
            'data_guru'=>$getData,
        ];
        return view('admin/data_guru',$data);
    }
    public function postData()
    {

        $name = $_REQUEST['nama_guru'];
        $pt_guru = $_REQUEST['pt_guru'];
        $ttl_guru = $_REQUEST['ttl_guru'];
        $createId = str_replace(' ', '_', $name);
        $finalId = 'pons_' . $createId;
        $data = [
            'id_guru' => $finalId,
            'nama_guru' => $name,
            'pendidikan_terakhir' => $pt_guru,
            'tanggal_lahir' => $ttl_guru
        ];
//        dd($_REQUEST);
        $exe = $this->PontrenModel->insert($data);
        if ($exe) {
            session()->setFlashdata('tambah', 'berhasil');
            return redirect()->to('/admin/dataguru');
        }
    }
    public function delete($slug){
        $queryDelete = $this->PontrenModel->where('id_guru',$slug);
        $exe = $queryDelete->delete();
        if ($exe) {
            session()->setFlashdata('hapus', 'berhasil');
            return redirect()->to('/admin/dataguru');
        }
    }
}