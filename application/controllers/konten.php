<?php
class Konten extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_konten');
    }
    
    public function index()
    {
        $data = array(
            'title2'     => 'Isi Konten - Tourist View',
            'konten'    => $this->m_konten->lists(),
            'isi'       => 'admin/konten/v_lists'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function add()
    {
        $data = array(
            'title2'     => 'Tambah Konten - Tourist View',
            'isi'       => 'admin/konten/v_add'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }
}