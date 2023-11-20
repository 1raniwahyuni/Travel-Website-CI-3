<?php

class Gallery extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_gallery');
    }

    public function index(){
        $data = array(
            'title2'    => 'Gallery - Tourist View',
            'gallery'    => $this->m_gallery->lists(),
            'isi'       => 'admin/gallery/v_gallery'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_gallery', 'Nama Gallery', 'required');

        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './sampul_gallery/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2000';
            $this->upload->initialize($config);
                if (!$this->upload->do_upload('sampul_gallery'))
                {
                    $data = array(
                        'title2'   => 'Tambah Gallery',
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'admin/gallery/v_add'
                    );
                    $this->load->view('admin/layout/v_wrapper',$data,FALSE);
                }
                else 
                {
                    $upload_data = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2' ;
                    $config['source_image']  = './sampul_gallery/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);

                    $data = array(
                        'nama_gallery'      => $this->input->post('nama_gallery'),
                        'sampul_gallery'    => $upload_data['uploads']['file_name']  
                        );
                    $this->m_gallery->add($data);
                    $this->session->set_flashdata('pesan', 'Data Gallery Berhasil Di Tambahkan');
                    redirect('gallery');
                }
            }
                $data = array(
                    'title2'    => 'Tambah Gallery - Tourist View',
                    'isi'       => 'admin/gallery/v_add'
                );
                $this->load->view('admin/layout/v_wrapper',$data,FALSE);
            }
}