<?php 
namespace App\Controllers;

use App\Models\KegiatanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Kegiatan extends BaseController
{
    public function index()
    {
        helper('url');
        $model = new KegiatanModel();
        return view('kegiatan/index',[
            'kegiatan' => $model->semua()
        ]);
    }

    public function detail(int $id)
    {
        helper('url');
        $model = new KegiatanModel();
        $item = $model->cari($id);

        if($item === null){
            throw PageNotFoundException::forPageNotFound(
                'Kegiatan Tidak ditemukan.'
            );
        }
        return view('kegiatan/detail', ['item' => $item]);
    }
}