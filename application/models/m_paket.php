<?php
class M_Paket extends CI_Model{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('paket');
        $this->db->join('kategori', 'kategori.id_kategori = paket.id_kategori', 'left');
        $this->db->order_by('id_paket','desc');
        return $this->db->get()->result();
    }

   // saat edit data UNTUK FUNCTION EDIT (UNTUK MENAMPILKAN VALUE SAAT TIAP ID DIPANGGIL SAAT DI KLIK EDIT ITU YG MUNCUL SESUAI)
   public function detail_edit($id_paket)
   {
       $this->db->select('*');
       $this->db->from('paket');
       $this->db->join('kategori', 'kategori.id_kategori = paket.id_kategori', 'left');
       $this->db->where('id_paket', $id_paket);
       return $this->db->get()->row();
   }
   
   public function add($data)
   {
       $this->db->insert('paket', $data);
   }

   // nah ini baru mengedit/memperbarui data
   public function edit($data)
   {
       $this->db->where('id_paket', $data['id_paket']);
       $this->db->update('paket', $data);
   }

   public function delete($data)
   {
       $this->db->where('id_paket', $data['id_paket']);
       $this->db->delete('paket', $data);
   }

   // detail semua
   public function getDetailById($id_paket)
   {
    $this->db->join('kategori', 'kategori.id_kategori = paket.id_kategori', 'left');
    return $this->db->get_where('paket', array('id_paket' => $id_paket))->row();
   }

}
