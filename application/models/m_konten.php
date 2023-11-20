<?php
class M_konten extends CI_Model {

    public function lists() {
        $this->db->select('*');
        $this->db->from('konten');
        $this->db->join('penulis', 'penulis.id_penulis = konten.id_penulis', 'left' );
        $this->db->order_by('id_konten', 'desc');
        return $this->db->get()->result(); 
    }

    public function add($data)
    {
        $this->db->insert('konten',$data);
    }

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

    public function getDetailById($id_konten)
    {
        return $this->db->get_where('konten', array('id_konten' => $id_konten))->row();
    }

}
