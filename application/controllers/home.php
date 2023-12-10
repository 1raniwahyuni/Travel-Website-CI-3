<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
		$this->load->model('m_penulis');
	}

	public function index()
	{
		$data = array(
					'title' => 'Tourist View',
					'konten'	=>$this->m_home->latest_konten(),
					'coming_soon'	=>$this->m_home->latest_coming_soon(),
					'penulis'=>$this->m_penulis->lists(),
					'isi'	=> 'v_home'
				);
		$this->load->view('layout/v_wrapperhome',$data,FALSE);
		
	}

	// NUSANTARA
	public function konten_nusantara()
	{
		$this->load->model('m_home');
		$this->load->library('pagination');
		$config['base_url'] = base_url('home/konten_nusantara');
		$config['total_rows'] = count($this->m_home->total_konten_nusantara());
		$config['per_page'] = 9;
		$config['uri_segmen']= 3;
		//start dan limit
			$limit= $config['per_page'];
			$start= ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
		//--------------------
		$config['first_link']		= 'First';
		$config['last_link']		= 'Last';
		$config['next_link']		= 'Next';
		$config['prev_link']		= 'Prev';
		$config['full_tag_open']	= '<div class="pagination_container d-flex flex-row align-items-center justify-content-start text-center"><ul class="pagination_list">';
		$config['num_tag_open']		= '<li>';
		$config['num_tag_close']	= '</li>';
		$config['cur_tag_open']		= '<li class="active"><a>';
		$config['cur_tag_close']	= '</a></li>';
		$config['next_tag_open']	= '<li>';
		$config['next_tag_close']	= '</li>';
		$config['prev_tag_open']	= '<li>';
		$config['prev_tag_close']	= '</li>';
		$config['firts_tag_open']	= '<li>';
		$config['firts_tag_close']	= '</li>';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close']	= '</li>';
		$config['full_tag_close']	= '</ul></div>';
		//------------------------
		$this->pagination->initialize($config);

		$data = array(
			'paginasi'		=> $this->pagination->create_links(),
			'konten_nusantara' 		=> $this->m_home->konten_nusantara($limit,$start),
			'title' 		=> 'Konten Wisata Nusantara',
			'isi'			=> 'v_konten_nusantara'
		);
		$this->load->view('layout/v_wrapper',$data,FALSE);
	}

	public function detail_konten_nusantara($id_konten)
	{
		$data = array(
			'title' 	=> 'Detail Konten',
			'konten_nusantara' 	=> $this->m_home->detail_konten_nusantara($id_konten),
			'penulis'=>$this->m_penulis->lists(),
			'isi'		=> 'v_detail_konten_nusantara'
		);
		$this->load->view('layout/v_wrapper',$data,FALSE);
	}

	// MANCANEGARA
	public function konten_mancanegara()
	{
		$this->load->model('m_home');
		$this->load->library('pagination');
		$config['base_url'] = base_url('home/konten_mancanegara');
		$config['total_rows'] = count($this->m_home->total_konten_mancanegara());
		$config['per_page'] = 9;
		$config['uri_segmen']= 3;
		//start dan limit
			$limit= $config['per_page'];
			$start= ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
		//--------------------
		$config['first_link']		= 'First';
		$config['last_link']		= 'Last';
		$config['next_link']		= 'Next';
		$config['prev_link']		= 'Prev';
		$config['full_tag_open']	= '<div class="pagination_container d-flex flex-row align-items-center justify-content-start text-center"><ul class="pagination_list">';
		$config['num_tag_open']		= '<li>';
		$config['num_tag_close']	= '</li>';
		$config['cur_tag_open']		= '<li class="active"><a>';
		$config['cur_tag_close']	= '</a></li>';
		$config['next_tag_open']	= '<li>';
		$config['next_tag_close']	= '</li>';
		$config['prev_tag_open']	= '<li>';
		$config['prev_tag_close']	= '</li>';
		$config['firts_tag_open']	= '<li>';
		$config['firts_tag_close']	= '</li>';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close']	= '</li>';
		$config['full_tag_close']	= '</ul></div>';
		//------------------------
		$this->pagination->initialize($config);

		$data = array(
			'paginasi'		=> $this->pagination->create_links(),
			'konten_mancanegara' 		=> $this->m_home->konten_mancanegara($limit,$start),
			'title' 		=> 'Konten Wisata Mancanegara',
			'isi'			=> 'v_konten_mancanegara'
		);
		$this->load->view('layout/v_wrapper',$data,FALSE);
	}

	public function detail_konten_mancanegara($id_konten)
	{
		$data = array(
			'title' 	=> 'Detail Konten',
			'konten_mancanegara' 	=> $this->m_home->detail_konten_mancanegara($id_konten),
			'isi'		=> 'v_detail_konten_mancanegara'
		);
		$this->load->view('layout/v_wrapper',$data,FALSE);
	}
	// hanya untuk home
	public function detail_konten($id_konten)
	{
		$data = array(
			'title' 	=> 'Detail Konten',
			'konten' 	=> $this->m_home->detail_konten($id_konten),
			'penulis'=>$this->m_penulis->lists(),
			'isi'		=> 'v_detail_konten'
		);
		$this->load->view('layout/v_wrapper',$data,FALSE);
	}

	public function coming_soon()
	{
		$this->load->model('m_home');
		$data['coming_soon'] = $this->m_home->coming_soon(); 
		$data['title'] = 'Coming Soon Event';
		$data['isi'] = 'v_coming_soon';
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function artikel()
	{
		$this->load->model('m_home');
		$this->load->library('pagination');
		$config['base_url'] = base_url('home/artikel');
		$config['total_rows'] = count($this->m_home->total_artikel());
		$config['per_page'] = 9;
		$config['uri_segmen']= 3;
		//start dan limit
			$limit= $config['per_page'];
			$start= ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
		//--------------------
		$config['first_link']		= 'First';
		$config['last_link']		= 'Last';
		$config['next_link']		= 'Next';
		$config['prev_link']		= 'Prev';
		$config['full_tag_open']	= '<div class="pagination_container d-flex flex-row align-items-center justify-content-start text-center"><ul class="pagination_list">';
		$config['num_tag_open']		= '<li>';
		$config['num_tag_close']	= '</li>';
		$config['cur_tag_open']		= '<li class="active"><a>';
		$config['cur_tag_close']	= '</a></li>';
		$config['next_tag_open']	= '<li>';
		$config['next_tag_close']	= '</li>';
		$config['prev_tag_open']	= '<li>';
		$config['prev_tag_close']	= '</li>';
		$config['firts_tag_open']	= '<li>';
		$config['firts_tag_close']	= '</li>';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close']	= '</li>';
		$config['full_tag_close']	= '</ul></div>';
		//------------------------
		$this->pagination->initialize($config);

		$data = array(
			'paginasi'		=> $this->pagination->create_links(),
			'artikel' 		=> $this->m_home->artikel($limit,$start),
			'title' 		=> 'Artikel',
			'isi'			=> 'v_artikel'
		);
		$this->load->view('layout/v_wrapper',$data,FALSE);
	}

	public function detail_artikel($id_artikel)
	{
		$data = array(
			'title' 	=> 'Detail Artikel',
			'artikel' 	=> $this->m_home->detail_artikel($id_artikel),
			'isi'		=> 'v_detail_artikel'
		);
		$this->load->view('layout/v_wrapper',$data,FALSE);
	}

	public function merchandise()
	{
		$this->load->model('m_home');
		$this->load->library('pagination');
		$config['base_url'] = base_url('home/merchandise');
		$config['total_rows'] = count($this->m_home->total_merchandise());
		$config['per_page'] = 9;
		$config['uri_segmen']= 3;
		//start dan limit
			$limit= $config['per_page'];
			$start= ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
		//--------------------
		$config['first_link']		= 'First';
		$config['last_link']		= 'Last';
		$config['next_link']		= 'Next';
		$config['prev_link']		= 'Prev';
		$config['full_tag_open']	= '<div class="pagination_container d-flex flex-row align-items-center justify-content-start text-center"><ul class="pagination_list">';
		$config['num_tag_open']		= '<li>';
		$config['num_tag_close']	= '</li>';
		$config['cur_tag_open']		= '<li class="active"><a>';
		$config['cur_tag_close']	= '</a></li>';
		$config['next_tag_open']	= '<li>';
		$config['next_tag_close']	= '</li>';
		$config['prev_tag_open']	= '<li>';
		$config['prev_tag_close']	= '</li>';
		$config['firts_tag_open']	= '<li>';
		$config['firts_tag_close']	= '</li>';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close']	= '</li>';
		$config['full_tag_close']	= '</ul></div>';
		//------------------------
		$this->pagination->initialize($config);

		$data = array(
			'paginasi'		=> $this->pagination->create_links(),
			'merchandise' 	=> $this->m_home->merchandise($limit,$start),
			'title' 		=> 'Merchandise Item',
			'isi'			=> 'v_merchandise'
		);
		$this->load->view('layout/v_wrapper',$data,FALSE);
	}

	public function detail_merchandise($id_merchandise)
	{
		$data = array(
			'title' 	=> 'Detail Merchandise',
			'merchandise' 	=> $this->m_home->detail_merchandise($id_merchandise),
			'isi'		=> 'v_detail_merchandise'
		);
		$this->load->view('layout/v_wrapper',$data,FALSE);
	}

	public function paket()
	{
		$this->load->model('m_home');
		$this->load->library('pagination');
		$config['base_url'] = base_url('home/paket');
		$config['total_rows'] = count($this->m_home->total_paket());
		$config['per_page'] = 9;
		$config['uri_segmen']= 3;
		//start dan limit
			$limit= $config['per_page'];
			$start= ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
		//--------------------
		$config['first_link']		= 'First';
		$config['last_link']		= 'Last';
		$config['next_link']		= 'Next';
		$config['prev_link']		= 'Prev';
		$config['full_tag_open']	= '<div class="pagination_container d-flex flex-row align-items-center justify-content-start text-center"><ul class="pagination_list">';
		$config['num_tag_open']		= '<li>';
		$config['num_tag_close']	= '</li>';
		$config['cur_tag_open']		= '<li class="active"><a>';
		$config['cur_tag_close']	= '</a></li>';
		$config['next_tag_open']	= '<li>';
		$config['next_tag_close']	= '</li>';
		$config['prev_tag_open']	= '<li>';
		$config['prev_tag_close']	= '</li>';
		$config['firts_tag_open']	= '<li>';
		$config['firts_tag_close']	= '</li>';
		$config['last_tag_open']	= '<li>';
		$config['last_tag_close']	= '</li>';
		$config['full_tag_close']	= '</ul></div>';
		//------------------------
		$this->pagination->initialize($config);

		$data = array(
			'paginasi'		=> $this->pagination->create_links(),
			'paket' 		=> $this->m_home->paket($limit,$start),
			'title' 		=> 'Paket Wisata',
			'isi'			=> 'v_paket'
		);
		$this->load->view('layout/v_wrapper',$data,FALSE);
	}

	public function detail_paket($id_paket)
	{
		$data = array(
			'title' 	=> 'Detail Paket Wisata',
			'paket' 	=> $this->m_home->detail_paket($id_paket),
			'isi'		=> 'v_detail_paket'
		);
		$this->load->view('layout/v_wrapper',$data,FALSE);
	}

	public function gallery()
	{
		$data = array(
			'title' 	=> 'Gallery Foto',
			'gallery' 	=> $this->m_home->gallery(),
			'isi'		=> 'v_gallery'
		);
		$this->load->view('layout/v_wrapper',$data,FALSE);
	}

	public function detail_gallery($id_gallery)
	{
		$data = array(
			'title' 	=> 'Detail Gallery Foto',
			'gallery' 	=> $this->m_home->detail_gallery($id_gallery),
			'nama_gallery'=>$this->m_home->nama_galery($id_gallery),
			'isi'		=> 'v_detail_gallery'
		);
		$this->load->view('layout/v_wrapper',$data,FALSE);
	}

}	