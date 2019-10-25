<html>

<?php

$logged_in = $this->session->userdata("logged_in");

if ($logged_in != NULL) {
    redirect(base_url('Dashboard'));
}
?>
    <head>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">    
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/material-dashboard.css">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    </head>
    <body>
        <div class="row" style="margin-top:80px">
            <div class="col-md-4 col-md-offset-4">
                <div class="card">
                    <div class="card-header" style="background-color: #FD9C17">
                        <h2 style="text-align: center; font-weight: bold; color: #FFF">Denimwork CRM</h2>
                    </div>
                    <div class="card-body">
                        <div class="col-md-10 col-md-offset-1">
                        <?php if(isset($error_message)) { echo "<br/><p style='text-align: center; font-weight: bold;color: red;'>" . $error_message ."</small>";} ?>
                        <form action="<?php echo base_url() ?>UserAuth/user_login_process" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" id="username" placeholder="Nama pengguna" name="username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                            </div>
                            <button type="submit" class="btn btn-success">Masuk</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>