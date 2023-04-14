<div class="container-fluid">
    <?= $this->session->flashdata('tambah_barang'); ?>
    <?= $this->session->flashdata('hapus'); ?>
    <button class="btn btn-primary mt-2 mb-4" data-toggle="modal" data-target="#tambah_barang"><i class ="fas fa-plus fa-sm"></i> Tambah Barang</button>
    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>NAMA SEPATU</th>
            <th>KETERANGAN</th>
            <th>KATEGORI</th>
            <th>HARGA</th>
            <th>STOK</th>
            <th class="text-center" colspan="2">AKSI</th>
        </tr>

        <?php
        $no = 1;
        foreach($barang as $brg) : ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $brg->nama_sepatu ?></td>
            <td><?php echo $brg->keterangan ?></td>
            <td><?php echo $brg->kategori ?></td>
            <td><?php echo $brg->harga ?></td>
            <td><?php echo $brg->stok ?></td>
            <td><?php echo anchor('admin/data_barang/edit/' .$brg->id_sepatu, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
            <td><?php echo anchor('admin/data_barang/hapus/' .$brg->id_sepatu, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
        </tr>

        <?php endforeach; ?>

    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="diaolog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">FORM INPUT PRODUK</h1>
        <button type="button" class="btn-secondary close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_barang/tambah_aksi' ?>" 
        method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label>Nama Sepatu</label>
            <input type="text" name="nama_sepatu" class="form-control">
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select class="form-control" name="kategori">
              <option>Sepatu Pria</option>
              <option>Sepatu Wanita</option>
            </select>
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control">
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="text" name="stok" class="form-control">
        </div>

        <div class="form-group">
            <label>Gambar Produk</label><br>
            <input type="file" name="gambar" class="form-control">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>