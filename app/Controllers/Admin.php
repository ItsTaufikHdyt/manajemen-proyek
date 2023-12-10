<?php

namespace App\Controllers;

use App\Database\Migrations\Proyek;
use App\Models\UsersModel;
use App\Models\KaryawanModel;
use App\Models\ProyekKaryawanModel;
use App\Models\ProyekModel;

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends BaseController
{
    protected $user, $karyawan, $proyek, $proyekKaryawan, $db;

    function __construct()
    {
        $this->user = new UsersModel();
        $this->karyawan = new KaryawanModel();
        $this->proyek = new ProyekModel();
        $this->proyekKaryawan = new ProyekKaryawanModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $proyek = new ProyekModel();

        $data = [
            'datax' => $proyek->paginate(10),
            'pager' => $proyek->pager,
            'waiting' => $this->proyek->where(["status" => 1])->countAllResults(),
            'onprogress' => $this->proyek->where(["status" => 2])->countAllResults(),
            'finished' => $this->proyek->where(["status" => 3])->countAllResults(),
        ];
        echo view('admin/dashboard', $data);
    }

    public function addProyek()
    {

        $data = [
            'datax' => $this->karyawan->get()->getResult(),
        ];
        echo view('admin/proyek/add', $data);
    }

    public function showProyek($id)
    {
        $dataProyek = $this->proyek->find($id);
        $dataKaryawan = $this->proyekKaryawan->select('*')->join('karyawan', 'proyek_karyawan.id_karyawan = karyawan.id')->where('id_proyek', $id)->get()->getResult();
        $data = [
            'proyek' => $dataProyek,
            'karyawan' => $dataKaryawan,
        ];
        echo view('admin/proyek/show', $data);
    }


    public function storeProyek()
    {
        if (!$this->validate(
            [

                'judul' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Judul field can not be blank value'
                    ]
                ],
                'instansi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Instansi field can not be blank value'
                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama field can not be blank value'
                    ]
                ],
                'kontak' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kontak field can not be blank value'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat field can not be blank value'
                    ]
                ],
                'kota' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kota field can not be blank value'
                    ]
                ],
                'provinsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Provinsi field can not be blank value'
                    ]
                ],
                'desc' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Desc field can not be blank value'
                    ]
                ],
                'start' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Start field can not be blank value'
                    ]
                ],
                'end' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'End field can not be blank value'
                    ]
                ],
                'biaya' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Biaya field can not be blank value'
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status field can not be blank value'
                    ]
                ],
            ]
        )) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        };

        $biaya = str_replace(".", "", $this->request->getVar('biaya'));
        $karyawan = $this->request->getVar('karyawan');

        $this->proyek->insert([
            'judul' => $this->request->getVar('judul'),
            'instansi' => $this->request->getVar('instansi'),
            'nama' => $this->request->getVar('nama'),
            'kontak' => $this->request->getVar('kontak'),
            'alamat' => $this->request->getVar('alamat'),
            'kota' => $this->request->getVar('kota'),
            'provinsi' => $this->request->getVar('provinsi'),
            'desc' => $this->request->getVar('desc'),
            'start' => $this->request->getVar('start'),
            'end' => $this->request->getVar('end'),
            'biaya' => $biaya,
            'status' => $this->request->getVar('status'),
        ]);


        foreach ($karyawan as $data) {
            $this->proyekKaryawan->insert([
                'id_proyek' => $this->proyek->getInsertID(),
                'id_karyawan' => $data
            ]);
        }

        return redirect()->to(url_to('adminDashboard'));
    }

    public function editProyek($id)
    {
        $dataProyek = $this->proyek->find($id);
        $dataKaryawan = $this->db->table('proyek_karyawan as pk')->select('pk.id_karyawan')->join('karyawan AS k', 'pk.id_karyawan = k.id')->where('id_proyek', $id)->get()->getResult();

        $data = [
            'proyek' => $dataProyek,
            'karyawan' => $this->karyawan->get()->getResult(),
            'karyawan_proyek' => $dataKaryawan,
        ];
        echo view('admin/proyek/edit', $data);
    }

    public function updateProyek($id)
    {
        if (!$this->validate(
            [

                'judul' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Judul field can not be blank value'
                    ]
                ],
                'instansi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Instansi field can not be blank value'
                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama field can not be blank value'
                    ]
                ],
                'kontak' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kontak field can not be blank value'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat field can not be blank value'
                    ]
                ],
                'kota' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kota field can not be blank value'
                    ]
                ],
                'provinsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Provinsi field can not be blank value'
                    ]
                ],
                'desc' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Desc field can not be blank value'
                    ]
                ],
                'start' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Start field can not be blank value'
                    ]
                ],
                'end' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'End field can not be blank value'
                    ]
                ],
                'biaya' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Biaya field can not be blank value'
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status field can not be blank value'
                    ]
                ],
            ]
        )) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        };

        $biaya = str_replace(".", "", $this->request->getVar('biaya'));
        $karyawan = $this->request->getVar('karyawan');

        $this->proyek->update($id, [
            'judul' => $this->request->getVar('judul'),
            'instansi' => $this->request->getVar('instansi'),
            'nama' => $this->request->getVar('nama'),
            'kontak' => $this->request->getVar('kontak'),
            'alamat' => $this->request->getVar('alamat'),
            'kota' => $this->request->getVar('kota'),
            'provinsi' => $this->request->getVar('provinsi'),
            'desc' => $this->request->getVar('desc'),
            'start' => $this->request->getVar('start'),
            'end' => $this->request->getVar('end'),
            'biaya' => $biaya,
            'status' => $this->request->getVar('status'),
        ]);

        if (!empty($karyawan)) {
            $dataKaryawan = $this->db->table('proyek_karyawan as pk')->select('pk.*')->join('karyawan AS k', 'pk.id_karyawan = k.id')->where('id_proyek', $id)->get()->getResult();

            foreach ($dataKaryawan as $data) {
                $this->proyekKaryawan->delete($data->id);
            }
            
            foreach ($karyawan as $data) {
                $this->proyekKaryawan->insert([
                    'id_proyek' => $id,
                    'id_karyawan' => $data
                ]);
            }
        }

        return redirect()->to(url_to('adminDashboard'));
    }

    public function deleteProyek($id)
    {
        $this->proyek->delete($id);
        return redirect()->to(url_to('adminDashboard'));
    }

    public function user()
    {
        $user = new UsersModel();
        $data = [
            'datax' => $user->paginate(10),
            'pager' => $user->pager,
        ];
        echo view('admin/user/index', $data);
    }

    public function addUser()
    {
        echo view('admin/user/add');
    }

    public function storeUser()
    {
        if (!$this->validate(
            [

                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'The Username field can not be blank value'
                    ]
                ],
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'The Name field can not be blank value'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'The password field can not be blank value'
                    ]
                ]
            ]
        )) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        };
        $this->user->insert([
            'username' => $this->request->getVar('username'),
            'name' => $this->request->getVar('name'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
        ]);
        return redirect()->to(url_to('adminUser'));
    }

    public function editUser($id)
    {
        $dataUser = $this->user->find($id);
        $data['user'] = $dataUser;
        echo view('admin/user/edit', $data);
    }

    public function updateUser($id)
    {
        if (!$this->validate(
            [

                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'The Usernmae field can not be blank value'
                    ]
                ],
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'The Name field can not be blank value'
                    ]
                ],
            ]
        )) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        };
        if (empty($this->request->getVar('password'))) {
            $this->user->update($id, [
                'username' => $this->request->getVar('username'),
                'name' => $this->request->getVar('name'),
            ]);
        } else {
            $this->user->update($id, [
                'username' => $this->request->getVar('username'),
                'name' => $this->request->getVar('name'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            ]);
        }
        return redirect()->to(url_to('adminUser'));
    }

    public function deleteUser($id)
    {
        $this->user->delete($id);
        return redirect()->to(url_to('adminUser'));
    }

    public function karyawan()
    {
        $karyawan = new KaryawanModel();
        $data = [
            'datax' => $karyawan->paginate(10),
            'pager' => $karyawan->pager,
        ];
        echo view('admin/karyawan/index', $data);
    }

    public function addKaryawan()
    {
        return view('admin/Karyawan/add');
    }

    public function storeKaryawan()
    {
        if (!$this->validate(
            [
                'nip' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => ' nip field can not be blank value'
                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => ' Nama field can not be blank value'
                    ]
                ],
                'jenis_kelamin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => ' Jenis Kelamin field can not be blank value'
                    ]
                ],
                'tempat_lahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => ' Tempat Lahir field can not be blank value'
                    ]
                ],
                'tgl_lahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => ' Tanggal Lahir field can not be blank value'
                    ]
                ],
                'telpon' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => ' Telpon field can not be blank value'
                    ]
                ],
                'agama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => ' Agama field can not be blank value'
                    ]
                ],
                'status_nikah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => ' Status Nikah field can not be blank value'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => ' Alamat field can not be blank value'
                    ]
                ],
            ]
        )) {
            session()->setFlashdata('error', $this->validator->listErrors());
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput();
        };

        $this->karyawan->insert([
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'telpon' => $this->request->getVar('telpon'),
            'agama' => $this->request->getVar('agama'),
            'status_nikah' => $this->request->getVar('status_nikah'),
            'alamat' => $this->request->getVar('alamat'),
        ]);
        return redirect()->to(url_to('adminKaryawan'));
    }

    public function editKaryawan($id)
    {
        $dataKaryawan = $this->karyawan->find($id);
        $data['karyawan'] = $dataKaryawan;
        echo view('admin/karyawan/edit', $data);
    }

    public function updateKaryawan($id)
    {
        if (!$this->validate(
            [
                'nip' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => ' nip field can not be blank value'
                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => ' Nama field can not be blank value'
                    ]
                ],
                'jenis_kelamin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => ' Jenis Kelamin field can not be blank value'
                    ]
                ],
                'tempat_lahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => ' Tempat Lahir field can not be blank value'
                    ]
                ],
                'tgl_lahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => ' Tanggal Lahir field can not be blank value'
                    ]
                ],
                'telpon' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => ' Telpon field can not be blank value'
                    ]
                ],
                'agama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => ' Agama field can not be blank value'
                    ]
                ],
                'status_nikah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => ' Status Nikah field can not be blank value'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => ' Alamat field can not be blank value'
                    ]
                ],
            ]
        )) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        };

        $this->karyawan->update($id, [
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'telpon' => $this->request->getVar('telpon'),
            'agama' => $this->request->getVar('agama'),
            'status_nikah' => $this->request->getVar('status_nikah'),
            'alamat' => $this->request->getVar('alamat'),
        ]);

        return redirect()->to(url_to('adminKaryawan'));
    }

    public function deleteKaryawan($id)
    {
        $this->karyawan->delete($id);
        return redirect()->to(url_to('adminKaryawan'));
    }
}
