<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_admin');
    $this->load->library('upload');
  }

  public function index()
  {
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
      $data['MasukRoom'] = $this->M_admin->sum('tb_masuk_room', 'jumlah');
      //$data['KeluarRoom'] = $this->M_admin->sum('tb_keluar_room', 'jumlah');
      $data['dataUser'] = $this->M_admin->numrows('user');
      $this->load->view('admin/index', $data);
    } else {
      $this->load->view('login/login');
    }
  }

  public function sigout()
  {
    session_destroy();
    redirect('login');
  }

  ####################################
  // Profile
  ####################################

  public function profile()
  {
    $data['token_generate'] = $this->token_generate();
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $this->session->set_userdata($data);
    $this->load->view('admin/profile', $data);
  }

  public function token_generate()
  {
    return $tokens = md5(uniqid(rand(), true));
  }

  private function hash_password($password)
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  public function proses_new_password()
  {
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('new_password', 'New Password', 'required');
    $this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'required|matches[new_password]');

    if ($this->form_validation->run() == TRUE) {
      if ($this->session->userdata('token_generate') === $this->input->post('token')) {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $new_password = $this->input->post('new_password');

        $data = array(
          'email'    => $email,
          'password' => $this->hash_password($new_password)
        );

        $where = array(
          'id' => $this->session->userdata('id')
        );

        $this->M_admin->update_password('user', $where, $data);
        $this->session->set_flashdata('msg_berhasil', 'Password Telah Diganti');
        redirect(base_url('admin/profile'));
      }
    } else {
      $this->load->view('admin/profile');
    }
  }

  public function proses_gambar_upload()
  {
    $config =  array(
      'upload_path'     => "./assets/upload/user/img/",
      'allowed_types'   => "gif|jpg|png|jpeg",
      'encrypt_name'    => False, //
      'max_size'        => "50000",  // ukuran file gambar
      'max_height'      => "9680",
      'max_width'       => "9024"
    );
    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if (!$this->upload->do_upload('userpicture')) {
      $data['cacad'] = '';
      $this->session->set_flashdata('msg_error_gambar', $this->upload->display_errors());
      $this->load->view('admin/profile', $data);
    } else {
      $upload_data = $this->upload->data();
      $nama_file = $upload_data['file_name'];
      $ukuran_file = $upload_data['file_size'];

      //resize img + thumb Img -- Optional
      $config['image_library']     = 'gd2';
      $config['source_image']      = $upload_data['full_path'];
      $config['create_thumb']      = FALSE;
      $config['maintain_ratio']    = TRUE;
      $config['width']             = 150;
      $config['height']            = 150;

      $this->load->library('image_lib', $config);
      $this->image_lib->initialize($config);
      if (!$this->image_lib->resize()) {
        $data['pesan_error'] = $this->image_lib->display_errors();
        $this->load->view('admin/profile', $data);
      }

      $where = array(
        'username_user' => $this->session->userdata('name')
      );

      $data = array(
        'nama_file' => $nama_file,
        'ukuran_file' => $ukuran_file
      );
      //$data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
      $this->M_admin->update('tb_upload_gambar_user', $data, $where);
      $this->session->set_flashdata('msg_berhasil_gambar', 'Gambar Berhasil Di Upload');
      redirect(base_url('admin/profile'));
    }
  }

  ####################################
  // End Profile
  ####################################



  ####################################
  // Users
  ####################################
  public function users()
  {
    $data['list_users'] = $this->M_admin->kecuali('user', $this->session->userdata('name'));
    $data['token_generate'] = $this->token_generate();
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $this->session->set_userdata($data);
    $this->load->view('admin/users', $data);
  }

  public function form_user()
  {
    $data['list_room'] = $this->M_admin->select('tb_room');
    $data['token_generate'] = $this->token_generate();
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $this->session->set_userdata($data);
    $this->load->view('admin/form_users/form_insert', $data);
  }

  public function update_user()
  {
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $data['token_generate'] = $this->token_generate();
    $data['list_data'] = $this->M_admin->get_data('user', $where);
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $this->session->set_userdata($data);
    $this->load->view('admin/form_users/form_update', $data);
  }

  public function proses_delete_user()
  {
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $this->M_admin->delete('user', $where);
    $this->session->set_flashdata('msg_berhasil', 'User Behasil Di Delete');
    redirect(base_url('admin/users'));
  }

  public function proses_tambah_user()
  {
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[password]');

    if ($this->form_validation->run() == TRUE) {
      if ($this->session->userdata('token_generate') === $this->input->post('token')) {

        $username     = $this->input->post('username', TRUE);
        $email        = $this->input->post('email', TRUE);
        $password     = $this->input->post('password', TRUE);
        $role         = $this->input->post('role', TRUE);

        $data = array(
          'username'     => $username,
          'email'        => $email,
          'password'     => $this->hash_password($password),
          'role'         => $role,
        );
        $this->M_admin->insert('user', $data);

        $this->session->set_flashdata('msg_berhasil', 'User Berhasil Ditambahkan');
        redirect(base_url('admin/form_user'));
      }
    } else {
      $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
      $this->load->view('admin/form_users/form_insert', $data);
    }
  }

  public function proses_update_user()
  {
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');


    if ($this->form_validation->run() == TRUE) {
      if ($this->session->userdata('token_generate') === $this->input->post('token')) {
        $id           = $this->input->post('id', TRUE);
        $username     = $this->input->post('username', TRUE);
        $email        = $this->input->post('email', TRUE);
        $role         = $this->input->post('role', TRUE);

        $where = array('id' => $id);
        $data = array(
          'username'     => $username,
          'email'        => $email,
          'role'         => $role,
        );
        $this->M_admin->update('user', $data, $where);
        $this->session->set_flashdata('msg_berhasil', 'Data User Berhasil Diupdate');
        redirect(base_url('admin/users'));
      }
    } else {
      $this->load->view('admin/form_users/form_update');
    }
  }


  ####################################
  // End Users
  ####################################



  ####################################
  // DATA ROOM MASUK
  ####################################

  public function form_masukroom()
  {
    $data['list_room'] = $this->M_admin->select('tb_room');
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $this->load->view('admin/form_masukroom/form_insert', $data);
  }

  public function tabel_masukroom()
  {
    $data = array(
      'list_data' => $this->M_admin->select('tb_masuk_room'),
      'avatar'    => $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'))
    );
    $this->load->view('admin/tabel/tabel_masukroom', $data);
  }

  public function update_room($id)
  {
    $where = array('id' => $id);
    $data['data_room_update'] = $this->M_admin->get_data('tb_masuk_room', $where);
    //var_dump($data['data_room_update']);
    //die;
    $data['list_room'] = $this->M_admin->select('tb_room');
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $this->load->view('admin/form_masukroom/form_update', $data);
  }

  public function delete_room($id)
  {
    $where = array('id' => $id);
    $this->M_admin->delete('tb_masuk_room', $where);
    redirect(base_url('admin/tabel_masukroom'));
  }

  public function delete_participant($id)
  {
    $where = array('id' => $id);
    $this->M_admin->delete('tb_masuk_room', $where);
    redirect(base_url('admin/tabel_masukroom'));
  }

  public function proses_dataroom_masuk_insert()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    $this->form_validation->set_rules('cabang_si', 'Cabang si', 'required');
    $this->form_validation->set_rules('jam', 'Jam', 'required');
    $this->form_validation->set_rules('selesai', 'Selesai', 'required');
    $this->form_validation->set_rules('topik', 'Topik', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

    //var_dump($this->input->post());
    //die;
    if ($this->form_validation->run() == TRUE) {
      $id           = $this->input->post('id', TRUE);
      $nama         = $this->input->post('nama', TRUE);
      $tanggal      = $this->input->post('tanggal', TRUE);
      $cabang_si    = $this->input->post('cabang_si', TRUE);
      $jam          = $this->input->post('jam', TRUE);
      $selesai      = $this->input->post('selesai', TRUE);
      $topik        = $this->input->post('topik', TRUE);
      $room         = $this->input->post('room', TRUE);
      //$jumlah       = $this->input->post('jumlah', TRUE);

      $data = array(
        'id'           => $id,
        'nama'         => $nama,
        'tanggal'      => $tanggal,
        'cabang_si'    => $cabang_si,
        'jam'          => $jam,
        'selesai'      => $selesai,
        'topik'        => $topik,
        'room'         => $room,
        //'jumlah'       => $jumlah
      );
      $data = $this->M_admin->insert('tb_masuk_room', $data);

      $this->session->set_flashdata('msg_berhasil', 'Data Room Berhasil Ditambahkan');
      redirect(base_url('admin/form_masukroom'));
    } else {
      $data['list_room'] = $this->M_admin->select('tb_room');
      redirect(base_url('admin/form_masukroom'));
      $this->load->view('admin/form_masukroom/form_insert', $data);
    }
  }

  public function proses_datamasuk_room_update()
  {
    $this->form_validation->set_rules('cabang_si', 'Cabang si', 'required');
    $this->form_validation->set_rules('jam', 'Jam', 'required');
    $this->form_validation->set_rules('selesai', 'Selesai', 'required');
    $this->form_validation->set_rules('topik', 'Topik', 'required');
    $this->form_validation->set_rules('room', 'Room', 'required');

    if ($this->form_validation->run() == TRUE) {
      $id           = $this->input->post('id', TRUE);
      $nama         = $this->input->post('nama', TRUE);
      $tanggal      = $this->input->post('tanggal', TRUE);
      $cabang_si    = $this->input->post('cabang_si', TRUE);
      $topik        = $this->input->post('jam', TRUE);
      $jam          = $this->input->post('topik', TRUE);
      $selesai      = $this->input->post('selesai', TRUE);
      $room         = $this->input->post('room', TRUE);
      //$jumlah       = $this->input->post('jumlah', TRUE);

      $where = array('id' => $id);
      $data = array(
        'id'           => $id,
        'nama'         => $nama,
        'tanggal'      => $tanggal,
        'cabang_si'    => $cabang_si,
        'jam'          => $jam,
        'topik'        => $topik,
        'jam'          => $jam,
        'selesai'      => $selesai,
        'room'         => $room,
        //'jumlah'       => $jumlah
      );
      $this->M_admin->update('tb_masuk_room', $data, $where);
      $this->session->set_flashdata('msg_berhasil', 'Data Room Berhasil Diupdate');
      redirect(base_url('admin/tabel_masukroom'));
    } else {
      $this->load->view('admin/form_masukroom/form_update');
    }
  }
  ####################################
  // END DATA MASUK ROOM
  ####################################


  ####################################
  // ROOM
  ####################################

  public function form_room()
  {
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $this->load->view('admin/form_room/form_insert', $data);
  }

  public function tabel_room()
  {
    $data['list_data'] = $this->M_admin->select('tb_room');
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $this->load->view('admin/tabel/tabel_room', $data);
  }

  public function update_room2()
  {
    $uri = $this->uri->segment(3);
    $where = array('id_room' => $uri);
    $data['id_room'] = $this->M_admin->get_data('tb_room', $where);
    //var_dump($data['id_room']);
    //die;
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $this->load->view('admin/form_room/form_update', $data);
  }

  public function delete_room2()
  {
    $uri = $this->uri->segment(3);
    $where = array('id_room' => $uri);
    $this->M_admin->delete('tb_room', $where);
    redirect(base_url('admin/tabel_room'));
  }

  public function proses_room_insert()
  {
    $this->form_validation->set_rules('kode_room', 'Kode Room', 'trim|required|max_length[100]');
    $this->form_validation->set_rules('nama_room', 'Nama Room', 'trim|required|max_length[100]');

    if ($this->form_validation->run() ==  TRUE) {
      $kode_room = $this->input->post('kode_room', TRUE);
      $nama_room = $this->input->post('nama_room', TRUE);

      $data = array(
        'kode_room' => $kode_room,
        'nama_room' => $nama_room
      );
      $this->M_admin->insert('tb_room', $data);

      $this->session->set_flashdata('msg_berhasil', 'Data room Berhasil Ditambahkan');
      redirect(base_url('admin/form_room'));
    } else {
      $this->load->view('admin/form_room/form_insert');
    }
  }

  public function proses_room_update()
  {
    $this->form_validation->set_rules('kode_room', 'Kode Room', 'trim|required|max_length[100]');
    $this->form_validation->set_rules('nama_room', 'Nama Room', 'trim|required|max_length[100]');

    if ($this->form_validation->run() ==  TRUE) {
      $id_room   = $this->input->post('id_room', TRUE);
      $kode_room = $this->input->post('kode_room', TRUE);
      $nama_room = $this->input->post('nama_room', TRUE);

      $where = array(
        'id_room' => $id_room
      );

      $data = array(
        'kode_room' => $kode_room,
        'nama_room' => $nama_room
      );
      $this->M_admin->update('tb_room', $data, $where);

      $this->session->set_flashdata('msg_berhasil', 'Data room Berhasil Di Update');
      redirect(base_url('admin/tabel_room'));
    } else {
      $this->load->view('admin/form_room/form_update');
    }
  }

  ####################################
  // END ROOM
  ####################################


  ####################################
  // DATA MASUK KE DATA KELUAR
  ####################################

  //public function keluar_room()
  //{
  //$uri = $this->uri->segment(3);
  //$where = array('nama' => $uri);
  //$data['list_data'] = $this->M_admin->get_data('tb_masuk_room', $where);
  //$data['list_room'] = $this->M_admin->select('tb_room');
  //$data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
  //$this->load->view('admin/perpindahan_zoom/form_update', $data);
  //}

  public function proses_data_keluar()
  {
    $this->form_validation->set_rules('tanggal_keluar', 'Tanggal Keluar', 'trim|required');
    if ($this->form_validation->run() === TRUE) {
      $nama           = $this->input->post('nama', TRUE);
      $tanggal_masuk  = $this->input->post('tanggal', TRUE);
      $tanggal_keluar = $this->input->post('tanggal_keluar', TRUE);
      $cabang_si      = $this->input->post('cabang_si', TRUE);
      $jam            = $this->input->post('jam', TRUE);
      $selesai        = $this->input->post('selesai', TRUE);
      $topik          = $this->input->post('topik', TRUE);
      $room           = $this->input->post('room', TRUE);
      $jumlah         = $this->input->post('jumlah', TRUE);

      $where = array('nama' => $nama);
      $data = array(
        'nama'   => $nama,
        'tanggal_masuk'  => $tanggal_masuk,
        'tanggal_keluar' => $tanggal_keluar,
        'cabang_si'      => $cabang_si,
        'jam'            => $jam,
        'selesai'        => $selesai,
        'topik'          => $topik,
        'room'           => $room,
        'jumlah'         => $jumlah
      );
      //$this->M_admin->insert('tb_keluar_room', $data);
      $this->session->set_flashdata('msg_berhasil_keluar', 'Data Berhasil Keluar');
      redirect(base_url('admin/tabel_masukroom'));
    } else {
      $this->load->view('perpindahan_zoom/form_update/');
    }
  }
  ####################################
  // END DATA MASUK KE DATA KELUAR
  ####################################


  ####################################
  // DATA KELUAR ROOM
  ####################################

  //public function tabel_keluarroom()
  //{
  //$data['list_data'] = $this->M_admin->select('tb_room_masuk');
  //$data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
  //$this->load->view('admin/tabel/tabel_Room', $data);
  //}
}
