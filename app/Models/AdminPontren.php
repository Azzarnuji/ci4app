<?php

namespace App\Models;
use CodeIgniter\Model;
class AdminPontren extends Model
{
    protected $table = 'data_guru';
    protected function initialize()
    {
        $this->allowedFields[] = 'nama_guru';
        $this->allowedFields[] = 'id_guru';
        $this->allowedFields[] = 'pendidikan_terakhir';
        $this->allowedFields[] = 'tanggal_lahir';

    }
}