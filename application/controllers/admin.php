<?php
class Admin extends CI_Controller{
    public function index()
    {
        $data = array(
            'title'     => 'Tourist View',
            'title2'    => 'Dashboard Admin',
            'isi'       => 'admin/v_home'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }
}