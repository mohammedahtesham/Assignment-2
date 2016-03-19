<style>
    
    body{
        
        background:url("<?php echo base_url(); ?>assets/img/back.jpg") no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
    }
    </style>
    
    <div class="row">
        <div class="col-lg-4">
            <a href="<?php echo base_url(); ?>index.php/user/order" class="btn btn-block btn-primary">ORDER PIZZA</a>
        </div>
            <div class="col-lg-4 col-lg-offset-4">    
            <a href="<?php echo base_url(); ?>index.php/login" class="btn btn-block btn-primary pull-right">EMPLOYEE LOGIN</a>
        </div>
    </div>
    
    
    <?php echo $this->session->userdata('flag'); ?>
    <?php if($this->session->userdata('flag')==1){ ?>
    
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content alert alert-success">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Success !!!</h4>
      </div>
      <div class="modal-body">
        <p>Your order has been successfully been placed.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <?php $this->session->unset_userdata('flag');} ?>
    <script>
        
        $(function(){
         
           $("#myModal").modal('show');
           
           
           
           
        });
        
        
        
        </script>