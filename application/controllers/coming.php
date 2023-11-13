<?php 
class Coming extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_coming');
    }

    public function index()
    {
        $data = array(
            'title2'    => 'Coming Soon Event - Tourist View',
            'coming'    => $this->m_coming->lists(),
            'isi'       => 'admin/coming/v_lists'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('judul_coming', 'Judul Konten', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Konten', 'required');
        $this->form_validation->set_rules('jadwal_upload', 'Jadwal Upload', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        // $this->form_validation->set_rules('gambar_coming', 'Foto Konten', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './gambar_coming/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2000';
            $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar_coming'))
                {
                    $data = array(
                        'title_2'   => 'Tambah Konten Coming Soon',
                        'error'     => $this->upload->display_errors(),
                        'coming'    => $this->m_coming->lists(),
                        'isi'       => 'admin/coming/v_add'
                    );
                    $this->load->view('admin/layout/v_wrapper',$data,FALSE);
                }
                else 
                {
                    $upload_data = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2' ;
                    $config['source_image']  = './gambar_coming/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);

                    $data = array(
                        'judul_coming'  => $this->input->post('judul_coming'),
                        'deskripsi'     => $this->input->post('deskripsi'),
                        'jadwal_upload' => $this->input->post('jadwal_upload'),
                        'penulis'       => $this->input->post('penulis'),
                        'gambar_coming' => $upload_data['uploads']['file_name']  
                        );
                    $this->m_coming->add($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan !!');
                    redirect('coming');
                }
        } 
                $data = array(
                    'title2' => 'Tambah Konten Coming Soon',
                    'coming' => $this->m_coming->lists(),
                    'isi' => 'admin/coming/v_add'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }
}

    