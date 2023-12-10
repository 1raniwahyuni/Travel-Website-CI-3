<?php
class M_merchandise extends CI_Model{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('merchandise');
        $this->db->order_by('id_merchandise','desc');
        return $this->db->get()->result();
    }

   // saat edit data UNTUK FUNCTION EDIT (UNTUK MENAMPILKAN VALUE SAAT TIAP ID DIPANGGIL SAAT DI KLIK EDIT ITU YG MUNCUL SESUAI)
   public function detail_edit($id_merchandise)
   {
       $this->db->select('*');
       $this->db->from('merchandise');
       $this->db->where('id_merchandise', $id_merchandise);
       return $this->db->get()->row();
   }
   
   public function add($data)
   {
       $this->db->insert('merchandise', $data);
   }

   // nah ini baru mengedit/memperbarui data
   public function edit($data)
   {
       $this->db->where('id_merchandise', $data['id_merchandise']);
       $this->db->update('merchandise', $data);
   }

   public function delete($data)
   {
       $this->db->where('id_merchandise', $data['id_merchandise']);
       $this->db->delete('merchandise', $data);
   }

   // detail semua
   public function getDetailById($id_merchandise)
   {
       return $this->db->get_where('merchandise', array('id_merchandise' => $id_merchandise))->row();
   }

}
