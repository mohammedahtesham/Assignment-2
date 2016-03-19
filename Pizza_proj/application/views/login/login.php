<html>
    <head>
        <meta charset="utf-8">
        <title>Pizza Login</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
	<meta name="author" content="">
        
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
	
    </head>
    
    <body>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-8">
                <a href="<?php echo base_url(); ?>index.php/user" class="btn btn-block btn-primary pull-right">HOME PAGE</a>
            </div>
        </div>
        <div class="well span5 center login-box">
            <div class="login-header">
                <img src="<?php echo base_url(); ?>assets/img/back.jpg" height="12%">
                
                <h2 id="logo-name">EMPLOYEE LOGIN</h2>
            </div>
            <div class="gap"></div>
            <?php
            if($this->session->flashdata('error'))
            {?>
            <div class="alert alert-dismissable alert-danger">
                <button class="close" type="button" data-dismiss='alert'>&times;</button>
                <strong>Error!</strong><?php echo $this->session->flashdata('error');?>
            </div>
            <?php }?>
            <form class="form-horizontal" action="<?php echo site_url('login');?>" method="POST" >
                <fieldset>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        <input type="text" class="form-control input-sm" placeholder="USER NAME" name="username"/>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                        <input type="password" class="form-control input-sm" placeholder="PASSWORD" name="password"/>
                    </div>
                    <p class='pull-left'>
                        <a href="#" class="btn  btn-primary">
                            <i class="fa fa-key">&nbsp;Forgot Password</i></a>
                    </p>
                    <p class="pull-right">
                        <button type="submit" class="btn  btn-success" name="loginbtn" value="Login" >Login</button>
                    </p>
                </fieldset>
            
            
            </form>
            
        </div>
    </body>
</html>