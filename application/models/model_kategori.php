<?php

class Model_kategori extends CI_Model{
    public function data_sepatu_pria(){
        return $this->db->get_where("tb_barang",array('kategori' => 'sepatu pria'));
    }

    public function data_sepatu_wanita(){
        return $this->db->get_where("tb_barang",array('kategori' => 'sepatu wanita'));
    }
}