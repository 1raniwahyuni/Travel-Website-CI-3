<?php 
class Coming extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_coming');
        $this->load->model('m_penulis');
    }

    public function index()
    {
        $data = array(
            'title2'    => 'Coming Soon Event - Tourist View',
            'coming'    => $this->m_coming->lists(),
            'isi'       => 'admin/coming/v_coming'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('judul_coming', 'Judul Konten', 'required');
        $this->form_validation->set_rules('jenis_konten', 'Jenis Konten', 'required');
        $this->form_validation->set_rules('jadwal_upload', 'Jadwal Upload', 'required');
        $this->form_validation->set_rules('id_penulis', 'Nama Penulis', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']      = 'foto/gambar_coming/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2000';
            $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar_coming'))
                {
                    $data = array(
                        'title2'   => 'Tambah Konten Coming Soon',
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
                    $config['source_image']  = 'foto/gambar_coming/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);

                    $data = array(
                        'judul_coming'  => $this->input->post('judul_coming'),
                        'jenis_konten'     => $this->input->post('jenis_konten'),
                        'jadwal_upload' => $this->input->post('jadwal_upload'),
                        'id_penulis'       => $this->input->post('id_penulis'),
                        'gambar_coming' => $upload_data['uploads']['file_name']  
                        );
                    $this->m_coming->add($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan');
                    redirect('coming');
                }
        }
                $data = array(
                    'title2' => 'Tambah Konten Coming Soon',
                    // 'coming' => $this->m_coming->lists(),
                    'penulis' =>  $this->m_penulis->lists(),
                    'isi' => 'admin/coming/v_add'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }
    
    // EDIT EDIT
    public function edit($id_coming)
    {
        $this->form_validation->set_rules('judul_coming', 'Judul Konten', 'required');
        $this->form_validation->set_rules('jenis_konten', 'Jenis Konten', 'required');
        $this->form_validation->set_rules('jadwal_upload', 'Jadwal Upload', 'required');
        $this->form_validation->set_rules('id_penulis', 'Nama Penulis', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = 'foto/gambar_coming/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2000';
            $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar_coming'))
                {
                    $data = array(
                        'title2'   => 'Edit Konten Coming Soon',
                        'error'     => $this->upload->display_errors(),
                        'coming' => $this->m_coming->detail_edit($id_coming),
                        'penulis' =>  $this->m_penulis->lists(),
                        'isi'       => 'admin/coming/v_edit'
                    );
                    $this->load->view('admin/layout/v_wrapper',$data,FALSE);
                }
                else 
                {
                    $upload_data = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2' ;
                    $config['source_image']  = 'foto/gambar_coming/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);
                    
                    // agar tdk memenuhi file foto / menghapus file foto lama
                    $coming = $this->m_coming->detail_edit($id_coming);
                    if ($coming->gambar_coming != "") {
                        unlink('foto/gambar_coming/' . $coming->gambar_coming);
                    }
                    // end menghapus foto
                    
                    $data = array(
                        'id_coming'     =>$id_coming,
                        'judul_coming'  => $this->input->post('judul_coming'),
                        'jenis_konten'     => $this->input->post('jenis_konten'),
                        'jadwal_upload' => $this->input->post('jadwal_upload'),
                        'id_penulis'       => $this->input->post('id_penulis'),
                        'gambar_coming' => $upload_data['uploads']['file_name']  
                        );
                    $this->m_coming->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Di Perbarui');
                    redirect('coming');
                }

                // JIKA TIDAK UPLOAD FOTO
                // jika tidak mengupload foto, maka pada array, var gambar bs dihapus
                $upload_data = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2' ;
                    $config['source_image']  = 'foto/gambar_coming/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);
                    
                    $data = array(
                        'id_coming'     =>$id_coming,
                        'judul_coming'  => $this->input->post('judul_coming'),
                        'jenis_konten'     => $this->input->post('jenis_konten'),
                        'jadwal_upload' => $this->input->post('jadwal_upload'),
                        'id_penulis'       => $this->input->post('id_penulis'), 
                        );
                    $this->m_coming->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Di Perbarui');
                    redirect('coming');
        } 
        $data = array(
            'title2' => 'Edit Konten Coming Soon',
            'penulis' =>  $this->m_penulis->lists(),
            'coming' => $this->m_coming->detail_edit($id_coming),
            'isi' => 'admin/coming/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }


    // DELETE
    public function delete($id_coming)
    {
        //menghapus file foto lama saat kita delete file agar foto ikut terhapus jugax
         $coming = $this->m_coming->detail_edit($id_coming);
        if ($coming->gambar_coming != "") {
        unlink('foto/gambar_coming/' . $coming->gambar_coming);
        }

        $data = array('id_coming' => $id_coming);
        $this->m_coming->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus');
        redirect('coming');
    }        

    // detail semua
    public function detail($id_coming)
    {
        $data['detail_coming'] = $this->m_coming->getDetailById($id_coming);

        $data = array(
            'title2' => 'Detail Konten Coming Soon',
            'detail_coming' => $data['detail_coming'],
            'isi' => 'admin/coming/v_detail_coming'
        );

        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

}

    