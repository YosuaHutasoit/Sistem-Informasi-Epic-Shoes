<!-- Detail Invoice -->
<div class="container-fluid">
            <h4>Detail Pesanan <div class="btn btn-sm btn-primary mt-3 mb-3">No. Invoice: <?php 
            echo $invoice->id ?></div></h4>

            <table class="table table-bordered table-striped table-hover">

                <tr>
                    <th>ID SEPATU</th>
                    <th>NAMA PRODUK</th>
                    <th>JUMLAH PESANAN</th>
                    <th>HARGA SATUAN</th>
                    <th>SUB-TOTAL</th>
                </tr>
                
                <?php
                $total = 0; 
                foreach($pesanan as $psn) :
                    $subtotal = $psn->jumlah * $psn->harga; 
                    $total += $subtotal;
                    ?>

                    <tr>
                        <td><?php echo $psn->id_sepatu ?></td>
                        <td><?php echo $psn->nama_sepatu ?></td>
                        <td><?php echo $psn->jumlah ?></td>
                        <td>Rp. <?php echo number_format($psn->harga, 0,',','.') ?></td>
                        <td>Rp. <?php echo number_format($subtotal, 0,',','.') ?></td>
                    </tr>

                <?php endforeach; ?>

                <tr>
                    <td class="px-5 text-center" colspan="4"><strong>GRAND TOTAL</strong></td>
                    <td>Rp. <?php echo number_format($total, 0,',','.') ?></td>
                </tr>

            </table>

    <a href="<?php echo base_url('admin/invoice/index') ?>"><div class="btn btn-primary">Kembali</div></a>
</div>