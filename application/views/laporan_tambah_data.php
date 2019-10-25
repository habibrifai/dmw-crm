<!doctype html>
<html lang="en">

<?php

$logged_in = $this->session->userdata("logged_in");

if ($logged_in == NULL) {
    redirect(base_url('UserAuth'));
} else {

}
?>

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Material Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url() ?>assets/lite/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url() ?>assets/lite/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url() ?>assets/lite/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="<?php echo base_url() ?>assets/lite/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="" class="simple-text">
                Denimworks
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="<?php echo base_url('Dashboard'); ?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url('Pelanggan'); ?>">
                            <i class="material-icons">person</i>
                            <p>Pelanggan</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('UlangTahun'); ?>">
                            <i class="material-icons">calendar_today</i>
                            <p>Ulang Tahun</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Transaksi'); ?>">
                            <i class="material-icons">attach_money</i>
                            <p>Transaksi</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title">Laporan</h4>
                                    <!-- <p class="category">Complete your profile</p> -->
                                </div>
                                <div class="card-content">
                                    <!-- <form action="<?php echo base_url('Transaksi/save_tambah_data'); ?>" method="POST"> -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nama Pelanggan</label>
                                                    <input name="id_order" type="text" class="form-control" value="<?php echo $nama_pelanggan->name; ?>" disabled="">
                                              </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Id Order</label>
                                                    <input name="id_order" type="text" class="form-control" value="<?php echo $idorder; ?>" disabled="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nama Produk</label>
                                                    <input name="nama_produk" type="text" class="form-control" disabled="" value="<?php echo $product_name; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Jumlah</label>
                                                    <input name="jumlah" type="text" class="form-control" disabled="" value="<?php echo $quantity; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Tanggal Ambil</label>
                                                    <input name="tgl_ambil" type="text" class="form-control" disabled="" value="<?php echo $pickup_date; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Total Harga</label>
                                                    <input name="harga" type="text" class="form-control" disabled="" value="<?php echo $cost; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Diskon</label>
                                                    <input name="harga" type="text" class="form-control" disabled="" value="<?php echo $diskon; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <a href="#pablo">
                                        <img class="img" src="<?php echo base_url() ?>assets/lite/img/tim_80x80.png" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h6 class="category text-gray"></h6>
                                    <h4 class="card-title"></h4>
                                    <p class="card-content">
                                        
                                    </p>
                                    <a href="" class="btn btn-primary btn-round" data-background-color="orange"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url() ?>assets/lite/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/lite/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/lite/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="<?php echo base_url() ?>assets/lite/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="<?php echo base_url() ?>assets/lite/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="<?php echo base_url() ?>assets/lite/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url() ?>assets/lite/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url() ?>assets/lite/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url() ?>assets/lite/js/demo.js"></script>

</html>