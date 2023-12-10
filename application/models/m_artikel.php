<?php
class M_artikel extends CI_Model{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->join('user', 'user.id_user = artikel.id_user', 'left');
        $this->db->order_by('id_artikel','desc');
        return $this->db->get()->result();
    }

   // saat edit data UNTUK FUNCTION EDIT (UNTUK MENAMPILKAN VALUE SAAT TIAP ID DIPANGGIL SAAT DI KLIK EDIT ITU YG MUNCUL SESUAI)
   public function detail_edit($id_artikel)
   {
       $this->db->select('*');
       $this->db->from('artikel');
       $this->db->join('user', 'user.id_user = artikel.id_user', 'left');
       $this->db->where('id_artikel', $id_artikel);
       return $this->db->get()->row();
   }
   
   public function add($data)
   {
       $this->db->insert('artikel', $data);
   }

   // nah ini baru mengedit/memperbarui data
   public function edit($data)
   {
       $this->db->where('id_artikel', $data['id_artikel']);
       $this->db->update('artikel', $data);
   }

   public function delete($data)
   {
       $this->db->where('id_artikel', $data['id_artikel']);
       $this->db->delete('artikel', $data);
   }

   // detail semua
   public function getDetailById($id_artikel)
   {
        $this->db->join('user', 'user.id_user = artikel.id_user', 'left');
       return $this->db->get_where('artikel', array('id_artikel' => $id_artikel))->row();
   }

}
