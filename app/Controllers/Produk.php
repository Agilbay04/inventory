<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $ProdukModel;
    protected $session;

    public function __construct()
    {
        $this->ProdukModel = new ProdukModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Produk',
            'produk' => $this->ProdukModel->findAll(),
        ];
        return view('index', $data);
    }

    public function tambah_produk()
    {
        $data = [
            'nama_produk' => $this->request->getVar('nama_produk'),
            'keterangan' => $this->request->getVar('keterangan'),
            'harga' => $this->request->getVar('harga'),
            'jumlah' => $this->request->getVar('jumlah'),
        ];
        $this->ProdukModel->save($data);
        return redirect()->to('/');
    }

    public function edit_produk()
    {
        $data = [
            'id_produk' => $this->request->getVar('id'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'keterangan' => $this->request->getVar('keterangan'),
            'harga' => $this->request->getVar('harga'),
            'jumlah' => $this->request->getVar('jumlah'),
        ];
        $this->ProdukModel->save($data);
        return redirect()->to('/');
    }

    public function hapus_produk()
    {
        $id = $this->request->getVar('id');
        $this->ProdukModel->delete($id);
        return redirect()->to('/');
    }
}
