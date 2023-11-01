<?php

class Anggota extends CI_Controller{
    // memanggil data dgn construct 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_anggota');

    }
        
    public function index()
    {
        $data = array(
            'title'     => 'Tourist View',
            'title2'    => 'Anggota',
            'anggota'    => $this->m_anggota->lists(),
            'isi'       => 'admin/v_anggota'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function add()
    {
        $data = array(
            'kode_anggota' => $this->input->post('kode_anggota'),
            'nama_anggota' => $this->input->post('nama_anggota'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'email' => $this->input->post('email')
        );
        $this->m_anggota->add($data);
        $this->session->set_flashdata('pesan','Data Berhasil Ditambahkan');
        redirect('anggota');
    }

    public function edit($id_anggota)
    {
        $data = array(
            'id_anggota' =>$id_anggota,
            'kode_anggota' => $this->input->post('kode_anggota'),
            'nama_anggota' => $this->input->post('nama_anggota'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'email' => $this->input->post('email')
        );
        $this->m_anggota->edit($data);
        $this->session->set_flashdata('pesan','Data Berhasil Diperbarui');
        redirect('anggota');
    }

    public function delete($id_anggota)
    {
        $data = array(
            'id_anggota' =>$id_anggota
        );
        $this->m_anggota->delete($data);
        $this->session->set_flashdata('pesan','Data Berhasil Dihapus');
        redirect('anggota');
    }

    public function detail($id_anggota)
    {
        $data['detail_anggota'] = $this->m_anggota->getDetailById($id_anggota);

        $data = array(
            'title2' => 'Detail Anggota',
            'detail_anggota' => $data['detail_anggota'],
            'isi' => 'admin/v_detail_anggota'
        );

        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }


}   