<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Homepage - Epic Shoes</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/favicon/favicon_epc.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container ">
            <a class="navbar-brand" href="<?php echo base_url('welcome') ?>">
                <img src="<?php echo base_url() ?>assets/logo/logo_epic.png" alt="" width="180" height="60" class="d-inline-block align-text-top">
            </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="fs-3 nav-item"><a class="nav-link active" aria-current="page" href="<?php echo base_url('welcome') ?>">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="fs-3 nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><p class="fs-3 dropdown-item">Category</p></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="fs-3 dropdown-item" href="<?php echo base_url('kategori/sepatu_pria') ?>">Men</a></li>
                                <li><a class="fs-3 dropdown-item" href="<?php echo base_url('kategori/sepatu_wanita') ?>">Women</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex me-3 mb-2">
                        <button class="btn btn-outline-light position-relative" type="submit">
                            <a class="bi-cart-fill me-1" href="<?php echo base_url('dashboard/detail_keranjang') ?>"></a>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light ">
                                <?php $keranjang = $this->cart->total_items() ?>
                                <?php echo anchor('dashboard/detail_keranjang', $keranjang)  ?>
                            </span>
                        </button>
                    </form>
                    <form class="d-flex mb-2">
                        <div class="dropdown">
                            <button class="btn btn-outline-light dropdown-toggle" type="submit" data-bs-toggle="dropdown" aria-expanded="true">   
                            <i class="bi bi-person-fill"></i>                         
                            </button>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item">
                                    <span>
                                    <?php if ($this->session->userdata('username')) { ?>
                                        Selamat Datang <?php echo $this->session->userdata('username') ?>
                                    </span>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li class="dropdown-item">
                                <span><i class="bi bi-box-arrow-right me-2"></i><?php echo anchor('auth/logout', 'Logout') ?></span>
                                    <?php } else { ?> <span><?php echo anchor('auth/login', 'Login'); ?></span>
                                    <?php } ?>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </form>

                </div>
            </div>
        </nav>
        
        <!-- Keranjang Barang -->
        <div class="container-fluid px-5">
            <h2 class="mt-4 mb-5 text-center">Keranjang Belanja</h2>
            
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>NO</th>
                    <th>Nama Sepatu</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Sub-total</th>
                </tr>

                <?php $no=1; 
                foreach ($this->cart->contents() as $items) : ?>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $items['name'] ?></td>
                    <td><?php echo $items['qty'] ?></td>
                    <td align="right">Rp. <?php echo number_format($items['price'], 0,',','.') ?></td>
                    <td align="right">Rp. <?php echo number_format($items['subtotal'], 0,',','.') ?></td>
                </tr>

                <?php endforeach; ?>

                <tr>
                    <td colspan="4"></td>
                    <td align="right">Rp. <?php echo number_format($this->cart->total(), 0,',','.') ?></td>
                </tr>

            </table>

            <div align="right">
                <a href="<?php echo base_url('dashboard/hapus_keranjang') ?>">
                <div class="btn btn-danger">Hapus Keranjang</div></a>
                
                <a href="<?php echo base_url('welcome') ?>">
                <div class="btn btn-primary">Lanjutkan Belanja</div></a>

                <a href="<?php echo base_url('dashboard/pembayaran') ?>">
                <div class="btn btn-success">Pembayaran</div></a>
            </div>
        </div>

        
        <!-- Footer-->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
    </body>
</html>