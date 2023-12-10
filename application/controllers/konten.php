<?php 
class Konten extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_konten');
        $this->load->model('m_penulis');

    }

    public function index()
    {
        $data = array(
            'title2'    => 'Konten - Tourist View',
            'konten'    => $this->m_konten->lists(),
            'isi'       => 'admin/konten/v_konten'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('judul_konten', 'Judul konten', 'required');
        $this->form_validation->set_rules('id_penulis', 'Nama Penulis', 'required');
        $this->form_validation->set_rules('sub_judul', 'Sub Judul', 'required');
        $this->form_validation->set_rules('isi_konten', 'Isi Konten', 'required');
        $this->form_validation->set_rules('jenis_konten', 'Kategori Konten', 'required');
      
        if ($this->form_validation->run() == TRUE)
        {
            $config['upload_path']      = 'foto/gambar_konten/';
            $config['allowed_types']    = 'gif|jpg|jpeg|png';
            $config['max_size']         = '2000';
            $this->upload->initialize($config);
            // jika tidak melakukan upload akan muncul error display/ pesan eror ada di add
            if (!$this->upload->do_upload('gambar_konten'))
            {
                    $data = array(
                        'title2'    => 'Tambah Data Konten - Tourist View',
                        'penulis'   => $this->m_penulis->lists(),
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'admin/konten/v_add'
                        );
                        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
            }
            // jika upload berhasil maka akan menyimpan
            else
            {
                $upload_data             = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image']  = 'foto/gambar_konten/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'judul_konten'     => $this->input->post('judul_konten'),
                    'id_penulis'        => $this->input->post('id_penulis'),
                    'sub_judul'     => $this->input->post('sub_judul'),
                    'isi_konten'     => $this->input->post('isi_konten'),
                    'jenis_konten'   => $this->input->post('jenis_konten'),
                    'gambar_konten' => $upload_data['uploads']['file_name']   
                );

                $this->m_konten->add($data);
                $this->session->set_flashdata('pesan','Data Berhasil Ditambahkan');
                redirect('konten');

            }
        } 
        $data = array(
            'title2'    => 'Tambah Data Konten - Tourist View',
            'penulis'      => $this->m_penulis->lists(),
            'isi'       => 'admin/konten/v_add'
            );
            $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }
    // EDIT EDIT
    public function edit($id_konten)
    {
        $this->form_validation->set_rules('judul_konten', 'Judul konten', 'required');
        $this->form_validation->set_rules('id_penulis', 'Nama Penulis', 'required');
        $this->form_validation->set_rules('sub_judul', 'Sub Judul', 'required');
        $this->form_validation->set_rules('isi_konten', 'Isi Konten', 'required');
        $this->form_validation->set_rules('jenis_konten', 'Kategori Konten', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = 'foto/gambar_konten/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2000';
            $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar_konten'))
                {
                    $data = array(
                        'title2'    => 'Edit Konten',
                        'error'     => $this->upload->display_errors(),
                        'konten'    => $this->m_konten->detail_edit($id_konten),
                        'penulis'   => $this->m_penulis->lists(),
                        'isi'       => 'admin/konten/v_edit'
                    );
                    $this->load->view('admin/layout/v_wrapper',$data,FALSE);
                }
                else 
                {
                    $upload_data = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2' ;
                    $config['source_image']  = 'foto/gambar_konten/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);
                    
                    // agar tdk memenuhi file foto / menghapus file foto lama
                    $konten = $this->m_konten->detail_edit($id_konten);
                    if ($konten->gambar_konten != "") {
                        unlink('foto/gambar_konten/' . $konten->gambar_konten);
                    }
                    // end menghapus foto
                    
                    $data = array(
                        'id_konten'     =>$id_konten,
                        'judul_konten'     => $this->input->post('judul_konten'),
                        'id_penulis'        => $this->input->post('id_penulis'),
                        'sub_judul'     => $this->input->post('sub_judul'),
                        'isi_konten'     => $this->input->post('isi_konten'),
                        'jenis_konten'   => $this->input->post('jenis_konten'),
                        'gambar_konten' => $upload_data['uploads']['file_name'] 
                        );
                    $this->m_konten->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Di Perbarui');
                    redirect('konten');
                }

                // JIKA TIDAK UPLOAD FOTO
                // jika tidak mengupload foto, maka pada array, var gambar bs dihapus
                $upload_data = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2' ;
                    $config['source_image']  = 'foto/gambar_konten/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);
                    
                    $data = array(
                        'id_konten'     =>$id_konten,
                        'judul_konten'     => $this->input->post('judul_konten'),
                        'id_penulis'        => $this->input->post('id_penulis'),
                        'sub_judul'     => $this->input->post('sub_judul'),
                        'isi_konten'     => $this->input->post('isi_konten'),
                        'jenis_konten'   => $this->input->post('jenis_konten'),
                        );
                    $this->m_konten->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Di Perbarui');
                    redirect('konten');
        } 
        $data = array(
            'title2'    => 'Edit Konten konten',
            'penulis'   => $this->m_penulis->lists(),
            'konten'    => $this->m_konten->detail_edit($id_konten),
            'isi'       => 'admin/konten/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }


    // DELETE
    public function delete($id_konten)
    {
        //menghapus file foto lama saat kita delete file agar foto ikut terhapus jugax
         $konten = $this->m_konten->detail_edit($id_konten);
        if ($konten->gambar_konten != "") {
        unlink('foto/gambar_konten/' . $konten->gambar_konten);
        }

        $data = array('id_konten' => $id_konten);
        $this->m_konten->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus');
        redirect('konten');
    }        

    // detail semua
    public function detail($id_konten)
    {
        $data['detail_konten'] = $this->m_konten->getDetailById($id_konten);

        $data = array(
            'title2' => 'Detail Konten konten',
            'detail_konten' => $data['detail_konten'],
            'isi' => 'admin/konten/v_detail_konten'
        );

        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

}
