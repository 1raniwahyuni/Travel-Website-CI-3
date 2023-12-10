<?php
class M_Konten extends CI_Model{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('konten');
        $this->db->join('penulis', 'penulis.id_penulis = konten.id_penulis', 'left');
        $this->db->order_by('id_konten','desc');
        return $this->db->get()->result();
    }

    // saat edit data UNTUK FUNCTION EDIT (UNTUK MENAMPILKAN VALUE SAAT TIAP ID DIPANGGIL SAAT DI KLIK EDIT ITU YG MUNCUL SESUAI)
    public function detail_edit($id_konten)
    {
        $this->db->select('*');
        $this->db->from('konten');
        $this->db->join('penulis', 'penulis.id_penulis = konten.id_penulis', 'left');
        $this->db->where('id_konten', $id_konten);
        return $this->db->get()->row();
    }
    
    public function add($data)
    {
        $this->db->insert('konten', $data);
    }

    // nah ini baru mengedit/memperbarui data
    public function edit($data)
    {
        $this->db->where('id_konten', $data['id_konten']);
        $this->db->update('konten', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_konten', $data['id_konten']);
        $this->db->delete('konten', $data);
    }

    // detail semua
    public function getDetailById($id_konten)
    {
        $this->db->join('penulis', 'penulis.id_penulis = konten.id_penulis', 'left');
        return $this->db->get_where('konten', array('id_konten' => $id_konten))->row();
    }

}
