<?php
// mengambil data
class M_anggota extends CI_Model {
    public function lists() {
        $this->db->select('*');
        $this->db->from('anggota');
        $this->db->order_by('id_anggota', 'desc');
        return $this->db->get()->result(); 
    }

    public function add($data)
    {
        $this->db->insert('anggota',$data);
    }

    public function edit($data)
    {
        $this->db->where('id_anggota', $data['id_anggota']);
        $this->db->update('anggota', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_anggota', $data['id_anggota']);
        $this->db->delete('anggota', $data);
    }

    public function getDetailById($id_anggota)
    {
        return $this->db->get_where('anggota', array('id_anggota' => $id_anggota))->row();
    }

}