<?php 

class Data_barang extends CI_Controller{
    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
    {
        $nama_sepatu    =$this->input->post('nama_sepatu');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar =''){}else{
            $config ['upload_path'] = './uploads';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                echo "Gambar Produk Gagal di Upload !";
                }else{
                    $gambar=$this->upload->data('file_name');
                }
            }

            $data = array(
                'nama_sepatu'   => $nama_sepatu,
                'keterangan'    => $keterangan,
                'kategori'      => $kategori,
                'harga'         => $harga,
                'stok'          => $stok,
                'gambar'        => $gambar
            );

        $this->model_barang->tambah_barang($data, 'tb_barang');
        $this->session->set_flashdata('tambah_barang', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_barang/index');
    }

    public function edit($id)
    {
        $where = array('id_sepatu'=>$id);
        $data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update(){
        $id = $this->input->post('id_sepatu');
        $nama_sepatu = $this->input->post('nama_sepatu');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');

        $data = array(
            'nama_sepatu' => $nama_sepatu,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'harga' => $harga,
            'stok' => $stok
        );

        $where = array(
            'id_sepatu' => $id
        );

        $this->model_barang->update_data($where, $data, 'tb_barang');
        redirect('admin/data_barang/index');
    }

    public function hapus($id){
        $where = array('id_sepatu' => $id);
        $this->model_barang->hapus_data($where, 'tb_barang');
        $this->session->set_flashdata('hapus', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_barang/index');
    }
}
