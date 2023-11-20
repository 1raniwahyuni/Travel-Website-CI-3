<?php
class M_Coming extends CI_Model{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('coming_soon');
        $this->db->order_by('id_coming','desc');
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('coming_soon', $data);
    }

    // saat edit data ya bukan detail saat di klik(UNTUK MENAMPILKAN VALUE SAAT TIAP DI KLIK EDIT ITU YG MUNCUL SESUAI)
    public function detail_edit($id_coming)
    {
        $this->db->select('*');
        $this->db->from('coming_soon');
        $this->db->where('id_coming', $id_coming);
        return $this->db->get()->row();
    }
    // nah ini baru mengedit/memperbarui data
    public function edit($data)
    {
        $this->db->where('id_coming', $data['id_coming']);
        $this->db->update('coming_soon', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_coming', $data['id_coming']);
        $this->db->delete('coming_soon', $data);
    }

    // detail semua
    public function getDetailById($id_coming)
    {
        return $this->db->get_where('coming_soon', array('id_coming' => $id_coming))->row();
    }

}