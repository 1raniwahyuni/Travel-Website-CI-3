<?php

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('m_login');
    }

    public function login($username, $password)
    {
        $cek = $this->ci->m_login->login($username, $password);
        if ($cek) {
            $username = $cek->username;
            $nama_user = $cek->nama_user;
            $level = $cek->level;

            // Buat session
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('nama_user', $nama_user);
            $this->ci->session->set_userdata('level', $level);

            redirect('admin'); // Ganti 'admin' dengan halaman tujuan setelah login
        } else {
            $this->ci->session->set_flashdata('pesan', 'Username atau Password salah.');
            redirect('login'); // Ganti 'login' dengan halaman login
        }
    }

    public function cek_login()
    {
        if (empty($this->ci->session->userdata('username'))) {
            $this->ci->session->set_flashdata('pesan', 'Anda Belum Login');
            redirect('login'); // Ganti 'login' dengan halaman login
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('nama_user');
        $this->ci->session->unset_userdata('level');
        $this->ci->session->set_flashdata('pesan', 'Logout Sukses');
        redirect('login'); // Ganti 'login' dengan halaman login
    }
}
