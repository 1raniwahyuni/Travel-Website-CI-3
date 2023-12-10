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
            $config['upload_path'] = 'foto/sampul_gallery/';
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
                    $config['source_image']  = 'foto/sampul_gallery/'.$upload_data['uploads']['file_name'];
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

            // EDIT
        public function edit($id_gallery)
        {
            $this->form_validation->set_rules('nama_gallery', 'Nama Gallery', 'required');
        
                
            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = 'foto/sampul_gallery/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000';
                $this->upload->initialize($config);
                    if (!$this->upload->do_upload('sampul_gallery'))
                    {
                        $data = array(
                            'title2'   => 'Edit Gallery',
                            'error'     => $this->upload->display_errors(),
                            'gallery'   => $this->m_gallery->detail_edit($id_gallery),
                            'isi'       => 'admin/gallery/v_edit'
                        );
                        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
                    }
                    else 
                    {
                        // unlink
                        $gallery = $this->m_gallery->detail_edit($id_gallery);
                            if ($gallery->sampul_gallery != "") {
                                unlink('foto/sampul_gallery/' . $gallery->sampul_gallery);
                            }
                        // jika sampul diubah 
                        $upload_data = array('uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2' ;
                        $config['source_image']  = 'foto/sampul_gallery/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);
        
                        $data = array(
                            'id_gallery'        =>$id_gallery,
                            'nama_gallery'      => $this->input->post('nama_gallery'),
                            'sampul_gallery'    => $upload_data['uploads']['file_name']  
                        );
                        $this->m_gallery->edit($data);
                        $this->session->set_flashdata('pesan', 'Data Gallery Berhasil Di Perbarui');
                        redirect('gallery');
                    }
                    // jika hanya edit nama nya aja
                        $data = array(
                            'id_gallery'        =>$id_gallery,
                            'nama_gallery'      => $this->input->post('nama_gallery'),
                        );
                        $this->m_gallery->edit($data);
                        $this->session->set_flashdata('pesan', 'Data Gallery Berhasil Di Perbarui');
                        redirect('gallery');
                }
                    $data = array(
                        'title2'    => 'Edit Gallery - Tourist View',
                        'gallery'   => $this->m_gallery->detail_edit($id_gallery),
                        'isi'       => 'admin/gallery/v_edit'
                    );
                    $this->load->view('admin/layout/v_wrapper',$data,FALSE);
                }
                // DELETE
        public function delete($id_gallery)
        {
            $gallery = $this->m_gallery->detail_edit($id_gallery);
            if ($gallery->sampul_gallery != "") {
                unlink('foto/sampul_gallery/' . $gallery->sampul_gallery);
            }

            $data = array('id_gallery' => $id_gallery);
            $this->m_gallery->delete($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus');
            redirect('gallery');
        }        

        public function add_foto($id_gallery)
        {
            $this->form_validation->set_rules('ket_foto', 'Keterangan Foto', 'required');
        
                
            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = 'foto/foto_gallery/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000';
                $this->upload->initialize($config);
                    if (!$this->upload->do_upload('foto_gallery'))
                    {
                        $gallery = $this->m_gallery->detail_edit($id_gallery);
                        $data = array(
                            'title2'    => 'Tambah Foto Gallery : '.$gallery->nama_gallery,
                            'error'     => $this->upload->display_errors(),
                            'gallery'   => $gallery,
                            'foto'      => $this->m_gallery->lists_foto($id_gallery),
                            'isi'       => 'admin/gallery/v_add_foto'
                        );
                        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
                    }
                    else 
                    {
                        $upload_data = array('uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2' ;
                        $config['source_image']  = 'foto/foto_gallery/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);
        
                        $data = array(
                            'id_gallery'        =>$id_gallery,
                            'ket_foto'      => $this->input->post('ket_foto'),
                            'foto_gallery'    => $upload_data['uploads']['file_name']  
                        );
                        $this->m_gallery->add_foto($data);
                        $this->session->set_flashdata('pesan', 'Foto Berhasil Di Tambahkan');
                        redirect('gallery/add_foto/'.$id_gallery);
                    }
                    
                }
                    $gallery = $this->m_gallery->detail_edit($id_gallery);
                    $data = array(
                        'title2'    => 'Tambah Foto Gallery : '.$gallery->nama_gallery,
                        'gallery'   => $gallery,
                        'foto'      => $this->m_gallery->lists_foto($id_gallery),
                        'isi'       => 'admin/gallery/v_add_foto'
                    );
                    $this->load->view('admin/layout/v_wrapper',$data,FALSE);
        }

        public function delete_foto($id_gallery, $id_foto)
        {
            $foto = $this->m_gallery->detail_foto($id_foto);
            if ($foto->foto_gallery != "") {
                unlink('foto/foto_gallery/' . $foto->foto_gallery);
            }

            $data = array('id_foto' => $id_foto);
            $this->m_gallery->delete_foto($data);
            $this->session->set_flashdata('pesan', 'Foto Berhasil Di Hapus');
            redirect('gallery/add_foto/'.$id_gallery);
        }    
    }