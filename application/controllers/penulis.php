<?php

class penulis extends CI_Controller{
    // memanggil data dgn construct 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_penulis');

    }
        
    public function index()
    {
        $data = array(
            'title'     => 'Tourist View',
            'title2'    => 'Daftar Penulis',
            'penulis'    => $this->m_penulis->lists(),
            'isi'       => 'admin/v_penulis'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function add()
    {
        $data = array(
            'nama_penulis' => $this->input->post('nama_penulis'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'email' => $this->input->post('email')
        );
        $this->m_penulis->add($data);
        $this->session->set_flashdata('pesan','Data Berhasil Ditambahkan');
        redirect('penulis');
    }

    public function edit($id_penulis)
    {
        $data = array(
            'id_penulis' =>$id_penulis,
            'nama_penulis' => $this->input->post('nama_penulis'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'email' => $this->input->post('email')
        );
        $this->m_penulis->edit($data);
        $this->session->set_flashdata('pesan','Data Berhasil Diperbarui');
        redirect('penulis');
    }

    public function delete($id_penulis)
    {
        $data = array(
            'id_penulis' =>$id_penulis
        );
        $this->m_penulis->delete($data);
        $this->session->set_flashdata('pesan','Data Berhasil Dihapus');
        redirect('penulis');
    }

    public function detail($id_penulis)
    {
        $data['detail_penulis'] = $this->m_penulis->getDetailById($id_penulis);

        $data = array(
            'title2' => 'Detail penulis',
            'detail_penulis' => $data['detail_penulis'],
            'isi' => 'admin/v_detail_penulis'
        );

        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }


}   