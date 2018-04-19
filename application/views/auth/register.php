<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Register</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
<?php echo validation_errors('<div class="alert alert-danger">', '</div>');
?>
<!--            <div class="alert alert-danger print-error-msg" style="display:none"></div>-->
<!--            <div class="alert alert-success print-error-msg" style="display:none"></div>-->
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="register">

                        <div class="form-group fg1">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input  id="name" type="text" class="form-control name" name="name" value=""  required>
                                <span class="help-block">
                                    <strong></strong>
                                </span>

                            </div>
                        </div>

                        <div class="form-group fg2">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control email" name="email" value="" required>

                                <span class="help-block">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group fg3">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control password" name="password" value="" required>


                                <span class="help-block">
                                        <strong></strong>
                                    </span>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" name="register" id="register">
                                    Register
                                </button>
                                <a href="<?php echo base_url();?>" class="btn btn-default">
                                    Back
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<!--        <div class="col-md-4 offset-md-4">-->
<!--            --><?php //echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
<!--            --><?php ////echo form_open(''); ?>
<!--            <form action="register" method="POST">-->
<!--            <div class="form-group">-->
<!--                <label for="name">Username</label>-->
<!--                <input type="text" class="form-control" name="name" value="">-->
<!--            </div>-->
<!---->
<!--            <div class="form-group">-->
<!--                <label for="email">Email</label>-->
<!--                <input type="email" class="form-control" name="email" value="">-->
<!--            </div>-->
<!---->
<!--            <div class="form-group">-->
<!--                <label for="password">Password</label>-->
<!--                <input type="password" class="form-control" name="password">-->
<!--            </div>-->
<!---->
<!--            <div>-->
<!--                <button type="submit" class="btn btn-primary" name="register">Register</button>-->
<!--            </div>-->
<!--            </form>-->
<!--        </div>-->
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/script.js">
</script>
</body>
</html>