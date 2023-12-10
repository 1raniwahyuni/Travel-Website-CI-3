<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url()?>template/back-end/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= base_url()?>template/back-end/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url()?>template/back-end/css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url()?>template/back-end/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
    
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                            <h3 class="panel-title text-center">Login Admin - Tourist View</h3>
                    </div>
                    <style> body{background-color: white; display: flex; justify-content: center; align-items: center; height: 100vh;} </style>

                    <div class="panel-body">
                        <?php echo form_open('login');
                            // jika salah pw / logout
                            if ($this->session->flashdata('pesan')) {
                                echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>';
                                echo $this->session->flashdata('pesan');
                                echo '</div>';
                            }
                        ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Your Username" name="username" type="username" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Your Password" name="password" type="password" required>
                                </div>
                                            

                                <div class="col-sm-12 text-center">
									<button type="submit" class="btn btn-success">Login</button>
									<a class="btn btn-primary" href="<?= base_url() ?>">Web Tourist View</a>
								</div>
                            </fieldset>
                        <? echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?= base_url()?>template/back-end/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?= base_url()?>template/back-end/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?= base_url()?>template/back-end/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?= base_url()?>template/back-end/js/startmin.js"></script>

    </body>
</html>
