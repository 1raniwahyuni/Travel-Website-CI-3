<?php

class M_Gallery extends CI_Model{

    public function lists()
    {
        // menampilkan jumlah foto berdasarkan id
        $this->db->select('gallery.*,count(foto.id_gallery) as jml_foto');
        $this->db->from('gallery');
        $this->db->join('foto', 'foto.id_gallery = gallery.id_gallery', 'left');
        // grup, krn kalo tidak dia akan menjumlahkan semua data yg adda (?)
        $this->db->group_by('gallery.id_gallery');
        $this->db->order_by('id_gallery', 'desc');
        return $this->db->get()->result();
    }

    // add untuk ke database
    public function add($data)
    {
        $this->db->insert('gallery',$data);
    }
}