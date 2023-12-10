<?php 
class Merchandise extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_merchandise');
    }

    public function index()
    {
        $data = array(
            'title2'    => 'Merchandise - Tourist View',
            'merchandise'    => $this->m_merchandise->lists(),
            'isi'       => 'admin/merchandise/v_merchandise'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_merchandise', 'Nama Merchandise', 'required');
        $this->form_validation->set_rules('ket_merchandise', 'Keterangan Merchandise', 'required');
        $this->form_validation->set_rules('harga_merchandise', 'Harga Merchandise', 'required');
        $this->form_validation->set_rules('stok', 'Stok Merchandise', 'required');
        
      
        if ($this->form_validation->run() == TRUE)
        {
            $config['upload_path']      = 'foto/gambar_merchandise/';
            $config['allowed_types']    = 'gif|jpg|jpeg|png';
            $config['max_size']         = '2000';
            $this->upload->initialize($config);
            // jika tidak melakukan upload akan muncul error display/ pesan eror ada di add
            if (!$this->upload->do_upload('gambar_merchandise'))
            {
                    $data = array(
                        'title2'    => 'Tambah Data Merchandise',
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'admin/merchandise/v_add'
                        );
                        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
            }
            // jika upload berhasil maka akan menyimpan
            else
            {
                $upload_data             = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image']  = 'foto/gambar_merchandise/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'nama_merchandise'      => $this->input->post('nama_merchandise'),
                    'ket_merchandise'       => $this->input->post('ket_merchandise'),
                    'harga_merchandise'     => $this->input->post('harga_merchandise'),
                    'stok'                  => $this->input->post('stok'),
                    'gambar_merchandise'    => $upload_data['uploads']['file_name']   
                );

                $this->m_merchandise->add($data);
                $this->session->set_flashdata('pesan','Data Berhasil Ditambahkan');
                redirect('merchandise');

            }
        } 
        $data = array(
            'title2'    => 'Tambah Data Merchandise - Tourist View',
            'isi'       => 'admin/merchandise/v_add'
            );
            $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }
    // EDIT EDIT
    public function edit($id_merchandise)
    {
        $this->form_validation->set_rules('nama_merchandise', 'Nama Merchandise', 'required');
        $this->form_validation->set_rules('ket_merchandise', 'Keterangan Merchandise', 'required');
        $this->form_validation->set_rules('harga_merchandise', 'Harga Merchandise', 'required');
        $this->form_validation->set_rules('stok', 'Stok Merchandise', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = 'foto/gambar_merchandise/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2000';
            $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar_merchandise'))
                {
                    $data = array(
                        'title2'   => 'Edit Data Merchandise',
                        'error'     => $this->upload->display_errors(),
                        'merchandise' => $this->m_merchandise->detail_edit($id_merchandise),
                        'isi'       => 'admin/merchandise/v_edit'
                    );
                    $this->load->view('admin/layout/v_wrapper',$data,FALSE);
                }
                else 
                {
                    $upload_data = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2' ;
                    $config['source_image']  = 'foto/gambar_merchandise/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);
                    
                    // agar tdk memenuhi file foto / menghapus file foto lama
                    $merchandise = $this->m_merchandise->detail_edit($id_merchandise);
                    if ($merchandise->gambar_merchandise != "") {
                        unlink('foto/gambar_merchandise/' . $merchandise->gambar_merchandise);
                    }
                    // end menghapus foto
                    
                    $data = array(
                        'id_merchandise'     =>$id_merchandise,
                        'nama_merchandise' => $this->input->post('nama_merchandise'),
                        'ket_merchandise'   => $this->input->post('ket_merchandise'),
                        'harga_merchandise'   => $this->input->post('harga_merchandise'),
                        'stok'                  => $this->input->post('stok'),
                        'gambar_merchandise' => $upload_data['uploads']['file_name']   
                        );
                    $this->m_merchandise->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Di Perbarui');
                    redirect('merchandise');
                }

                // JIKA TIDAK UPLOAD FOTO
                // jika tidak mengupload foto, maka pada array, var gambar bs dihapus
                $upload_data = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2' ;
                    $config['source_image']  = 'foto/gambar_merchandise/'.$upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);
                    
                    $data = array(
                        'id_merchandise'     =>$id_merchandise,
                        'nama_merchandise' => $this->input->post('nama_merchandise'),
                        'ket_merchandise'   => $this->input->post('ket_merchandise'),
                        'harga_merchandise'   => $this->input->post('harga_merchandise'),
                        'stok'                  => $this->input->post('stok'),
                        );
                    $this->m_merchandise->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Berhasil Di Perbarui');
                    redirect('merchandise');
        } 
        $data = array(
            'title2' => 'Edit Konten merchandise',
            'merchandise' => $this->m_merchandise->detail_edit($id_merchandise),
            'isi' => 'admin/merchandise/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }


    // DELETE
    public function delete($id_merchandise)
    {
        //menghapus file foto lama saat kita delete file agar foto ikut terhapus jugax
         $merchandise = $this->m_merchandise->detail_edit($id_merchandise);
        if ($merchandise->gambar_merchandise != "") {
        unlink('foto/gambar_merchandise/' . $merchandise->gambar_merchandise);
        }

        $data = array('id_merchandise' => $id_merchandise);
        $this->m_merchandise->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus');
        redirect('merchandise');
    }        

    // detail semua
    public function detail($id_merchandise)
    {
        $data['detail_merchandise'] = $this->m_merchandise->getDetailById($id_merchandise);

        $data = array(
            'title2' => 'Detail Produk Merchandise',
            'detail_merchandise' => $data['detail_merchandise'],
            'isi' => 'admin/merchandise/v_detail_merchandise'
        );

        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

}
