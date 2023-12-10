<?php
class M_Home extends CI_Model{

	//memunculkan konten deg paging untuk nusantara
	public function Konten_nusantara($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('konten');
		$this->db->join('penulis', 'penulis.id_penulis = konten.id_penulis', 'left');
		$this->db->where('jenis_konten', 'nusantara');
		$this->db->order_by('id_konten', 'desc');
		$this->db->limit($limit,$start);
		return $this->db->get()->result();		
	}

	public function total_konten_nusantara()
	{
		$this->db->select('*');
		$this->db->from('konten');
		$this->db->join('penulis', 'penulis.id_penulis = konten.id_penulis', 'left');
		$this->db->where('jenis_konten', 'nusantara');
		$this->db->order_by('id_konten', 'desc');
		return $this->db->get()->result();
	}

	public function detail_konten_nusantara($id_konten)
	{
		$this->db->select('*');
		$this->db->from('konten');
		$this->db->join('penulis', 'penulis.id_penulis = konten.id_penulis', 'left');
		$this->db->where('jenis_konten', 'nusantara');
		$this->db->where('id_konten', $id_konten);		
		return $this->db->get()->row();		
	}

	//memunculkan konten deg paging untuk Mancanegara
	public function Konten_mancanegara($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('konten');
		$this->db->join('penulis', 'penulis.id_penulis = konten.id_penulis', 'left');
		$this->db->where('jenis_konten', 'mancanegara');
		$this->db->order_by('id_konten', 'desc');
		$this->db->limit($limit,$start);
		return $this->db->get()->result();		
	}

	public function total_konten_mancanegara()
	{
		$this->db->select('*');
		$this->db->from('konten');
		$this->db->join('penulis', 'penulis.id_penulis = konten.id_penulis', 'left');
		$this->db->where('jenis_konten', 'mancanegara');
		$this->db->order_by('id_konten', 'desc');
		return $this->db->get()->result();
	}

	public function detail_konten_mancanegara($id_konten)
	{
		$this->db->select('*');
		$this->db->from('konten');
		$this->db->join('penulis', 'penulis.id_penulis = konten.id_penulis', 'left');
		$this->db->where('jenis_konten', 'mancanegara');
		$this->db->where('id_konten', $id_konten);		
		return $this->db->get()->row();		
	}
	// untuk bagian home itu dipish yaa
	public function latest_konten()
	{
		$this->db->select('*');
		$this->db->from('konten');
		$this->db->join('penulis', 'penulis.id_penulis = konten.id_penulis', 'left');
		$this->db->order_by('id_konten', 'desc');
		$this->db->limit(3);
		return $this->db->get()->result();	
	}

	public function detail_konten($id_konten)
	{
		$this->db->select('*');
		$this->db->from('konten');
		$this->db->join('penulis', 'penulis.id_penulis = konten.id_penulis', 'left');
		$this->db->where('id_konten', $id_konten);		
		return $this->db->get()->row();		
	}
	////////////////////
	public function coming_soon()
	{
		$this->db->select('*');
		$this->db->from('coming_soon');
		$this->db->join('penulis', 'penulis.id_penulis = coming_soon.id_penulis', 'left');
		$this->db->order_by('id_coming','desc');
		return $this->db->get()->result();		
	}

	public function latest_coming_soon()
	{
		$this->db->select('*');
		$this->db->from('coming_soon');
		$this->db->join('penulis', 'penulis.id_penulis = coming_soon.id_penulis', 'left');
		$this->db->order_by('id_coming', 'desc');
		$this->db->limit(3);
		return $this->db->get()->result();	
	}
	
	public function artikel($limit,$start)
	{
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->join('user', 'user.id_user = artikel.id_user', 'left');
        $this->db->order_by('id_artikel','desc');
		$this->db->limit($limit,$start);
        return $this->db->get()->result();
	}
	
	public function total_artikel()
	{
		$this->db->select('*');
		$this->db->from('artikel');
		$this->db->join('user', 'user.id_user = artikel.id_user', 'left');
		$this->db->order_by('id_artikel', 'desc');
		return $this->db->get()->result();
	}

	public function detail_artikel($id_artikel)
	{
		$this->db->select('*');
        $this->db->from('artikel');
        $this->db->join('user', 'user.id_user = artikel.id_user', 'left');
		$this->db->where('id_artikel', $id_artikel);	
		return $this->db->get()->row();		
	}

	public function merchandise($limit,$start)
	{
        $this->db->select('*');
        $this->db->from('merchandise');
        $this->db->order_by('id_merchandise','desc');
		$this->db->limit($limit,$start);
        return $this->db->get()->result();
	}
	
	public function total_merchandise()
	{
		$this->db->select('*');
		$this->db->from('merchandise');
		$this->db->order_by('id_merchandise', 'desc');
		return $this->db->get()->result();
	}

	public function detail_merchandise($id_merchandise)
	{
		$this->db->select('*');
		$this->db->from('merchandise');
		$this->db->where('id_merchandise', $id_merchandise);
		return $this->db->get()->row();		
	}

	public function paket($limit,$start)
	{
        $this->db->select('*');
        $this->db->from('paket');
        $this->db->order_by('id_paket','desc');
		$this->db->limit($limit,$start);
        return $this->db->get()->result();
	}
	
	public function total_paket()
	{
		$this->db->select('*');
		$this->db->from('paket');
		$this->db->order_by('id_paket', 'desc');
		return $this->db->get()->result();
	}

	public function detail_paket($id_paket)
	{
		$this->db->select('*');
		$this->db->from('paket');
		$this->db->where('id_paket', $id_paket);
		return $this->db->get()->row();		
	}

	public function gallery()
	{
		$this->db->select('gallery.*,count(foto.id_gallery) as jml_foto');
		$this->db->from('gallery');
		$this->db->join('foto', 'foto.id_gallery = gallery.id_gallery', 'left');
		$this->db->group_by('gallery.id_gallery');
		$this->db->order_by('gallery.id_gallery', 'desc');
		return $this->db->get()->result();		
	}

	public function detail_gallery($id_gallery)
	{
		$this->db->select('*');
		$this->db->from('foto');
		$this->db->where('id_gallery', $id_gallery);		
		$this->db->order_by('id_foto', 'desc');
		return $this->db->get()->result();		
	}

	public function nama_galery($id_gallery)
	{
		$this->db->select('*');
		$this->db->from('gallery');
		$this->db->where('id_gallery', $id_gallery);
		return $this->db->get()->row();
	}
}


/* End of file M_home.php */
