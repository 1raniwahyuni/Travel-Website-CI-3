<?php 
class Paket extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_paket');
    }

    public function index()
    {
        $data = array(
            'title2'    => 'Paket Wisata - Tourist View',
            'paket'    => $this->m_paket->lists(),
            'isi'       => 'admin/paket/v_paket'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required');
        $this->form_validation->set_rules('ket_paket', 'Keterangan Paket', 'required');
        $this->form_validation->set_rules('harga_paket', 'Harga Paket', 'required');
        
      
        if ($this->form_validation->run() == TRUE)
        {
            $config['upload_path']      = 'foto/gambar_paket/';
            $config['allowed_types']    = 'gif|jpg|jpeg|png';
            $config['max_size']         = '2000';
            $this->upload->initialize($config);
            // jika tidak melakukan upload akan muncul error display/ pesan eror ada di add
            if (!$this->upload->do_upload('gambar_paket'))
            {
                    $data = array(
                        'title2'    => 'Tambah Data Paket Wisata',
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'admin/paket/v_add'
                        );
                        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
            }
            // jika upload berhasil maka akan menyimpan
            else
            {
                $upload_data             = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image']  = 'foto/gambar_paket/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'nama_paket' => $this->input->post('nama_paket'),
                    'ket_paket'   => $this->input->post('ket_paket'),
                    'harga_paket'   => $this->input->post('harga_paket'),
                    'gambar_paket' => $upload_data['uploads']['file_name']   
                );

                $this->m_paket->add($data);
                $this->session->set_flashdata('pesan','Data Berhasil Ditambahkan');
                redirect('paket');

            }
        } 
        $data = array(
            'title2'    => 'Tambah Data Paket Wisata - Tourist View',
            'isi'       => 'admin/paket/v_add'
            );
            $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }
    // EDIT EDIT
    public function edit($id_paket)
    {
        $this->form_validation->set_rules('nama_paket', 'Nama paket', 'required');
        $this->form_validation->set_rules('ket_paket', 'Keterangan paket', 'required');
        $this->form_validation->set_rules('harga_paket', 'Harga paket', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = 'foto/gambar_paket/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2000';
            $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar_paket'))
                {
                    $data = array(
                        'title2'   => 'Edit Data Paket',
                        'error'     => $this->upload->display_errors(),
                        'paket' => $this->m_paket->detail_edit($id_paket),
                        'isi'       => 'admin/paket/v_edit'
                    );
                    $this->load->view('admin/layout/v_wrapper',$data,FALSE);
                }
                else 
                {
                    $upload_data = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2' ;
                    $config['source_image']  = 'foto/gambar_paket/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);
                    
                    // agar tdk memenuhi file foto / menghapus file foto lama
                    $paket = $this->m_paket->detail_edit($id_paket);
                    if ($paket->gambar_paket != "") {
                        unlink('foto/gambar_paket/' . $paket->gambar_paket);
                    }
                    // end menghapus foto
                    
                    $data = array(
                        'id_paket'     =>$id_paket,
                        'nama_paket' => $this->input->post('nama_paket'),
                        'ket_paket'   => $this->input->post('ket_paket'),
                        'harga_paket'   => $this->input->post('harga_paket'),
                        'gambar_paket' => $upload_data['uploads']['file_name']   
                        );
                    $this->m_paket->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Di Perbarui');
                    redirect('paket');
                }

                // JIKA TIDAK UPLOAD FOTO
                // jika tidak mengupload foto, maka pada array, var gambar bs dihapus
                $upload_data = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2' ;
                    $config['source_image']  = 'foto/gambar_paket/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);
                    
                    $data = array(
                        'id_paket'     =>$id_paket,
                        'nama_paket' => $this->input->post('nama_paket'),
                        'ket_paket'   => $this->input->post('ket_paket'),
                        'harga_paket'   => $this->input->post('harga_paket'),
                        );
                    $this->m_paket->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Di Perbarui');
                    redirect('paket');
        } 
        $data = array(
            'title2' => 'Edit Konten Paket Wisata',
            'paket' => $this->m_paket->detail_edit($id_paket),
            'isi' => 'admin/paket/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }


    // DELETE
    public function delete($id_paket)
    {
        //menghapus file foto lama saat kita delete file agar foto ikut terhapus jugax
         $paket = $this->m_paket->detail_edit($id_paket);
        if ($paket->gambar_paket != "") {
        unlink('foto/gambar_paket/' . $paket->gambar_paket);
        }

        $data = array('id_paket' => $id_paket);
        $this->m_paket->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus');
        redirect('paket');
    }        

    // detail semua
    public function detail($id_paket)
    {
        $data['detail_paket'] = $this->m_paket->getDetailById($id_paket);

        $data = array(
            'title2' => 'Detail Paket Wisata',
            'detail_paket' => $data['detail_paket'],
            'isi' => 'admin/paket/v_detail_paket'
        );

        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

}
