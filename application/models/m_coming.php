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
}