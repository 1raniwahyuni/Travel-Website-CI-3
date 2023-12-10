<?php
class M_user extends CI_Model {
    
    public function get_user_dropdown()
    {
        $this->db->select('id_user, username');
        $this->db->from('user');
        $this->db->order_by('id_user');
        return $this->db->get()->result();
    }
    
}
?>