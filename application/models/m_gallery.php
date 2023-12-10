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
        $this->db->order_by('gallery.id_gallery', 'desc');
        return $this->db->get()->result();
    }

    // untuk menampilkan foto dibawah hr
    public function lists_foto($id_gallery)
    {
        $this->db->select('*');
        $this->db->from('foto');
        $this->db->where('id_gallery', $id_gallery);
        $this->db->order_by('id_foto', 'desc');
        return $this->db->get()->result();
    }


    // add untuk ke database
    public function add($data)
    {
        $this->db->insert('gallery',$data);
    }

    // tambah foto ke galery
    public function add_foto($data)
    {
        $this->db->insert('foto',$data);
    }

    public function edit($data)
    {
        $this->db->where('id_gallery', $data['id_gallery']);
        $this->db->update('gallery',$data);
    }

    // memanggil data berdasarkan id
    public function detail_edit($id_gallery)
    {
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where('id_gallery', $id_gallery);
        return $this->db->get()->row();
    }


    // detail untuk foto
    public function detail_foto($id_foto)
    {
        $this->db->select('*');
        $this->db->from('foto');
        $this->db->where('id_foto', $id_foto);
        return $this->db->get()->row();
    }

    public function delete($data)
    {
        $this->db->where('id_gallery', $data['id_gallery']);
        $this->db->delete('gallery',$data);
    }

    public function delete_foto($data)
    {
        $this->db->where('id_foto', $data['id_foto']);
        $this->db->delete('foto',$data);
    }

}