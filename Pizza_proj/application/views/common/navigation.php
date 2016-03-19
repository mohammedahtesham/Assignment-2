<?php  if($this->session->userdata('is_logged_in')){ ?>
<div class="row">
    <div class="col-lg-12">
        <a href="<?php echo base_url(); ?>index.php/login/logout" class="btn btn-default btn-danger  pull-right">LOGOUT</a>
    </div>
</div>

<?php  }  ?>
