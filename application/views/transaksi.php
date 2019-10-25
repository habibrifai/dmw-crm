<!doctype html>
<html lang="en">

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
                <a href="http://www.creative-tim.com" class="simple-text">
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
                    <li>
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
                    <li class="active">
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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Data Transaksi</h4>
                                    
                                    <!-- <p class="category">Here is a subtitle for this table</p> -->
                                    <a href="<?php echo base_url('Transaksi/tambah_data/'); ?>"><button style="background: #FFF; color: #9c27b0;" class="btn btn-primary">Tambah Data</button></a>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Id Order</th>
                                            <th>Nama Produk</th>
                                            <th>Tanggal Order</th>
                                            <th>Tanggal Ambil</th>
                                            <th>Harga Total</th>
                                            <th>Status</th>
                                            <th>Ganti Status</th>
                                        </thead>
                                        <tbody>

                                            <?php 
                                            
                                            foreach ($data_transaksi as $transaksi) { ?>

                                            <tr>
                                                <td><?php echo $transaksi['idorder']; ?></td>
                                                <td><?php echo $transaksi['product_name']; ?></td>
                                                <td><?php echo $transaksi['order_date']; ?></td>
                                                <td><?php echo $transaksi['pickup_date']; ?></td>
                                                <td><?php echo $transaksi['cost']; ?></td>
                                                <td><?php echo $transaksi['status']; ?></td>
                                                <td>
                                                    
                                                    <?php if ($transaksi['status'] == 'dalam antrian') { ?>
                                                        <a href="<?php echo base_url('Transaksi/ubah_status_kerjakan/').$transaksi['idorder']; ?>"><button class="btn btn-sm btn-primary">Mulai Kerjakan</button></a>
                                                    <?php } elseif($transaksi['status'] == 'dalam pengerjaan') { ?>
                                                        <a href="<?php echo base_url('Transaksi/ubah_status_selesai/').$transaksi['idorder']; ?>"><button class="btn btn-sm btn-primary">Selesai</button></a>
                                                    <?php } elseif ($transaksi['status'] == 'selesai') { ?>
                                                        <!-- <a href=""><button class="btn btn-sm btn-success">Selesai</button></a> -->
                                                    <?php } ?>

                                                </td>
                                            </tr>

                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
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
<script src="../assets/js/material.min.js" type="text/javascript"></script>
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