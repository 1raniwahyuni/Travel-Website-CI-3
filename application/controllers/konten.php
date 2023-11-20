<?php
class Konten extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_konten');
        $this->load->model('m_penulis'); 
        // untuk memanggil dr luar harus diload dulu
    }
    public function index()
    {
        $data = array(
            'title2'    => 'Konten Wisata - Tourist View',
            'konten'    => $this->m_konten->lists(),
            'isi'       => 'admin/konten/v_konten'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('judul_konten', 'Judul Konten', 'required');
        $this->form_validation->set_rules('isi_konten', 'Isi Konten', 'required',array('required'=>'%s Isi Konten Harus Diisi'));
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './gambar_konten/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2000';
            $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar_konten'))
                {
                    $data = array(
                        'title2'   => 'Tambah Konten Wisata',
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'admin/konten/v_add'
                    );
                    $this->load->view('admin/layout/v_wrapper',$data,FALSE);
                }
                else 
                {
                    $upload_data = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2' ;
                    $config['source_image']  = './gambar_konten/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);

                    $data = array(
                        'judul_konten'      => $this->input->post('judul_konten'),
                        'slug_konten'       => url_title($this->input->post('slug_konten'),'dash',TRUE),
                        'id_penulis'      => $this->session->userdata('id_penulis'),
                        'isi_konten'        => $this->input->post('isi_konten'),
                        'id_penulis'        => $this->session->userdata('id_penulis'),
                        'tgl_upload'        => date('Y-m-d'),
                        'gambar_konten'    => $upload_data['uploads']['file_name']  
                        );
                    $this->m_konten->add($data);
                    $this->session->set_flashdata('pesan', 'Data Konten Berhasil Di Tambahkan');
                    redirect('konten');
                }
            }
        $data = array(
            'title2'    => 'Tambah Konten Wisata - Tourist View',
            'penulis'    =>$this->m_penulis->lists(),
            'isi'       => 'admin/konten/v_add'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

}   