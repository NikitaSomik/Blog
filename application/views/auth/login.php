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
    <title>Login</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php
            if ($this->session->has_userdata('success')){ ?>
                <div class="alert alert-success"><?php echo $this->session->success ;?></div>
            <?php }
            elseif ($this->session->has_userdata('error')){ ?>
                <div class="alert alert-danger"><?php echo $this->session->error ;?></div>
            <?php }

            ?>
            <div class="panel panel-default">

                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="">

                        <div class="form-group fg1">
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
                                <input id="password" type="password" class="form-control password" name="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary login" name="login">
                                    Login
                                </button>
<!--                                <a href="--><?php //echo base_url();?><!--" class="btn btn-default">-->
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
<!--            --><?php //echo validation_errors(); ?>
<!--            --><?php //echo form_open('form'); ?>
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
<!--                <button type="submit" class="btn btn-primary" name="login">Login</button>-->
<!--            </div>-->
<!--            </form>-->
<!--        </div>-->
    </div>
</div>
<!-- Optional JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="assets/js/auth.js"></script>
</body>
</html>