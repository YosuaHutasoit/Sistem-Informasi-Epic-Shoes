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
                        <li class="fs-3 nav-item"><a class="nav-link" aria-current="page" href="<?php echo base_url('welcome') ?>">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="fs-3 nav-link active dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
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

        <!-- Header-->
        <div class="container-expand">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="<?php echo base_url() ?>assets/img/banner5.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="<?php echo base_url() ?>assets/img/banner6.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        
        <!-- Section-->
        <div class="container-fluid">

            <div class="row text-center mt-4 justify-content-center">

            <?php foreach ($sepatu_wanita as $brg) : ?>
                <div class="card mb-5 ms-5" style="width: 30rem;">
                    <img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" class="card-img-top" width="454" height="350" alt="...">
                    <div class="card-body">
                        <h5 class="card-title mb-3"><?php echo $brg->nama_sepatu ?></h5>
                        <h6 class="card-title"><?php echo $brg->kategori ?></h6><br>
                        <h5 class="card-text mb-3">Rp. <?php echo number_format($brg->harga, 0,',','.') ?></h5><br>
                        <?php echo anchor('dashboard/tambah_ke_keranjang/'.$brg->id_sepatu,'<div class="btn btn-success"><i class="bi bi-plus-circle me-2"></i> Add to Cart</div>') ?>
                        <?php echo anchor('dashboard/detail/'.$brg->id_sepatu,'<div class="btn btn-primary"><i class="bi bi-info-circle me-2"></i>Detail</div>') ?>
                    </div>
                </div> 
            <?php endforeach; ?>

            </div>
        </div>

        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Epic Shoes 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
    </body>
</html>
