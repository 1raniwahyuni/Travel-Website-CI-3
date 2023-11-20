<?php
// mengambil data
class M_penulis extends CI_Model {
    public function lists() {
        $this->db->select('*');
        $this->db->from('penulis');
        $this->db->order_by('id_penulis', 'desc');
        return $this->db->get()->result(); 
    }

    public function add($data)
    {
        $this->db->insert('penulis',$data);
    }

    public function edit($data)
    {
        $this->db->where('id_penulis', $data['id_penulis']);
        $this->db->update('penulis', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_penulis', $data['id_penulis']);
        $this->db->delete('penulis', $data);
    }

    public function getDetailById($id_penulis)
    {
        return $this->db->get_where('penulis', array('id_penulis' => $id_penulis))->row();
    }

}