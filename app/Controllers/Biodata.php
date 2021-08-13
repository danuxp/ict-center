<?php

namespace App\Controllers;

use App\Models\Biodata_model;

class Biodata extends BaseController
{
    protected $biodataModel;
    public function __construct()
    {
        $this->biodataModel = new Biodata_model();
        helper(['form', 'tanggal']);
    }

    public function index()
    {
        $data = [
            'judul' => 'Biodata',
            'bio' => $this->biodataModel->getData()
        ];
        return view('biodata/index', $data);
    }

    public function tambah()
    {
        session();
        $data = [
            'judul' => 'Tambah Data',
            'validation' => \Config\Services::validation()
        ];
        return view('biodata/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama lengkap harus di isi'
                ]
            ],
            'nama_cantik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama cantik harus di isi'
                ]
            ],
            'angkatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Angkatan harus di isi'
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal lahir harus di isi'
                ]
            ],
            'no_wa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No WA harus di isi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus di isi'
                ]
            ],
            'img' =>  [
                'rules' => 'uploaded[img]|max_size[img,2024]|is_image[img]|mime_in[img,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu',
                    'max_size' => 'Ukuran foto terlalu besar',
                    'is_image' => 'Yang anda pilih bukan foto',
                    'mime_in' => 'Yang anda pilih bukan foto'
                ]
            ]
        ])) {
            return redirect()->to('/biodata/tambah')->withInput();
        }

        // ambil foto
        $fileFoto = $this->request->getFile('img');
        // nama random foto
        $namaFoto = $fileFoto->getRandomName();
        // pindah ke folder yg ditentukan
        $fileFoto->move('foto', $namaFoto);

        $this->biodataModel->save([
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'nama_cantik' => $this->request->getVar('nama_cantik'),
            'angkatan' => $this->request->getVar('angkatan'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'no_wa' => $this->request->getVar('no_wa'),
            'alamat' => $this->request->getVar('alamat'),
            'img' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/biodata');
    }

    public function edit($id)
    {
        $data = [
            'judul' => 'Edit Data Biodata',
            'bio' => $this->biodataModel->getData($id)->getRow(),
            'validation' => \Config\Services::validation()

        ];
        return view('biodata/edit', $data);
    }

    public function update()
    {
        // $fileFoto = $this->request->getFile('img');
        $id = $this->request->getVar('id');
        $data = [
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'nama_cantik' => $this->request->getVar('nama_cantik'),
            'angkatan' => $this->request->getVar('angkatan'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'no_wa' => $this->request->getVar('no_wa'),
            'alamat' => $this->request->getVar('alamat'),
            'img' => $this->request->getVar('img')
        ];

        $this->biodataModel->updateData($data, $id);



        // session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/biodata');
        dd($this->request->getVar());
    }

    public function hapus($id)
    {
        $bio = $this->biodataModel->find($id);
        dd($bio['img']);

        if ($bio->img) {
            unlink('foto/' . $bio->img);
        }
        $this->biodataModel->hapusData($id);
        return redirect()->to('/biodata');
    }
}
