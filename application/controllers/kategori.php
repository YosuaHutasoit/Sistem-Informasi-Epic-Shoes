<?php

class Kategori extends CI_Controller{
    public function sepatu_pria(){
        $data['sepatu_pria'] = $this->model_kategori->data_sepatu_pria()->result();
        $this->load->view('sepatu_pria',$data);
    }

    public function sepatu_wanita(){
        $data['sepatu_wanita'] = $this->model_kategori->data_sepatu_wanita()->result();
        $this->load->view('sepatu_wanita',$data);
    }
}