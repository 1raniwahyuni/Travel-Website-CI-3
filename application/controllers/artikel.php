<?php 
class Artikel extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_artikel');
        $this->load->model('m_user');

    }

    public function index()
    {
        $data = array(
            'title2'    => 'Artikel - Tourist View',
            'artikel'    => $this->m_artikel->lists(),
            'isi'       => 'admin/artikel/v_artikel'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'required');
        $this->form_validation->set_rules('id_user', 'Diposting Oleh', 'required');
        $this->form_validation->set_rules('isi_artikel', 'Isi Artikel', 'required');
      
        if ($this->form_validation->run() == TRUE)
        {
            $config['upload_path']      = 'foto/gambar_artikel/';
            $config['allowed_types']    = 'gif|jpg|jpeg|png';
            $config['max_size']         = '2000';
            $this->upload->initialize($config);
            // jika tidak melakukan upload akan muncul error display/ pesan eror ada di add
            if (!$this->upload->do_upload('gambar_artikel'))
            {
                    $data = array(
                        'title2'    => 'Tambah Data Artikel - Tourist View',
                        'user'      => $this->m_user->get_user_dropdown(),
                        'error' => $this->upload->display_errors(),
                        'isi'       => 'admin/artikel/v_add'
                        );
                        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
            }
            // jika upload berhasil maka akan menyimpan
            else
            {
                $upload_data             = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image']  = 'foto/gambar_artikel/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'judul_artikel' => $this->input->post('judul_artikel'),
                    'isi_artikel'   => $this->input->post('isi_artikel'),
                    'id_user'       => $this->input->post('id_user'),
                    'gambar_artikel' => $upload_data['uploads']['file_name']   
                );

                $this->m_artikel->add($data);
                $this->session->set_flashdata('pesan','Data Berhasil Ditambahkan');
                redirect('artikel');

            }
        } 
        $data = array(
            'title2'    => 'Tambah Data Artikel - Tourist View',
            'user'      => $this->m_user->get_user_dropdown(),
            'isi'       => 'admin/artikel/v_add'
            );
            $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }
    // EDIT EDIT
    public function edit($id_artikel)
    {
        $this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'required');
        $this->form_validation->set_rules('id_user', 'Diposting Oleh', 'required');
        $this->form_validation->set_rules('isi_artikel', 'Isi Artikel', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = 'foto/gambar_artikel/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2000';
            $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar_artikel'))
                {
                    $data = array(
                        'title2'   => 'Edit Artikel',
                        'error'     => $this->upload->display_errors(),
                        'artikel' => $this->m_artikel->detail_edit($id_artikel),
                        'user' =>  $this->m_user->get_user_dropdown(),
                        'isi'       => 'admin/artikel/v_edit'
                    );
                    $this->load->view('admin/layout/v_wrapper',$data,FALSE);
                }
                else 
                {
                    $upload_data = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2' ;
                    $config['source_image']  = 'foto/gambar_artikel/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);
                    
                    // agar tdk memenuhi file foto / menghapus file foto lama
                    $artikel = $this->m_artikel->detail_edit($id_artikel);
                    if ($artikel->gambar_artikel != "") {
                        unlink('foto/gambar_artikel/' . $artikel->gambar_artikel);
                    }
                    // end menghapus foto
                    
                    $data = array(
                        'id_artikel'     =>$id_artikel,
                        'judul_artikel'  => $this->input->post('judul_artikel'),
                        'isi_artikel'  => $this->input->post('isi_artikel'),
                        'id_user'       => $this->input->post('id_user'),
                        'gambar_artikel' => $upload_data['uploads']['file_name']  
                        );
                    $this->m_artikel->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Di Perbarui');
                    redirect('artikel');
                }

                // JIKA TIDAK UPLOAD FOTO
                // jika tidak mengupload foto, maka pada array, var gambar bs dihapus
                $upload_data = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2' ;
                    $config['source_image']  = 'foto/gambar_artikel/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);
                    
                    $data = array(
                        'id_artikel'     =>$id_artikel,
                        'judul_artikel'  => $this->input->post('judul_artikel'),
                        'isi_artikel'  => $this->input->post('isi_artikel'),
                        'id_user'       => $this->input->post('id_user'), 
                        );
                    $this->m_artikel->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Di Perbarui');
                    redirect('artikel');
        } 
        $data = array(
            'title2' => 'Edit Konten Artikel',
            'user' =>  $this->m_user->get_user_dropdown(),
            'artikel' => $this->m_artikel->detail_edit($id_artikel),
            'isi' => 'admin/artikel/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }


    // DELETE
    public function delete($id_artikel)
    {
        //menghapus file foto lama saat kita delete file agar foto ikut terhapus jugax
         $artikel = $this->m_artikel->detail_edit($id_artikel);
        if ($artikel->gambar_artikel != "") {
        unlink('foto/gambar_artikel/' . $artikel->gambar_artikel);
        }

        $data = array('id_artikel' => $id_artikel);
        $this->m_artikel->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus');
        redirect('artikel');
    }        

    // detail semua
    public function detail($id_artikel)
    {
        $data['detail_artikel'] = $this->m_artikel->getDetailById($id_artikel);

        $data = array(
            'title2' => 'Detail Konten Artikel',
            'detail_artikel' => $data['detail_artikel'],
            'isi' => 'admin/artikel/v_detail_artikel'
        );

        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

}
