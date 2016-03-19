







<body>

    <div class="container" style="margin-top: 100px">
        <div class="row">
        <div class="col-lg-12 ">
            <a href="<?php echo base_url(); ?>index.php/admin/" class="btn btn-success btn-default pull-right"><&nbsp;&nbsp;&nbsp; BACK</a>&nbsp;&nbsp;
        </div>
    </div><br/>
        <form name="orderList" id="orderList" action="" method="POST" enctype="multipart/form-data" >
<div class="row">
 <?php  foreach($allDetails as $detail){ ?>
    <div class="col-lg-3">
    <div class="thumbnail">
      <img src="<?php echo base_url(); ?>assets/img/p1.png" >
      <div class="caption">
          <h3 class="text-center"><?php echo strtoupper($detail['pd_type']);?></h3>
          <h4 class="text-center"><p><?php echo "$ ".number_format($detail['pd_price'],2); ?></p></h4>
          <center><input type="checkbox" id="ch<?php echo $detail['pd_id'] ?>" name=id="ch<?php echo $detail['pd_id'] ?>"  data-toggle="toggle"></center>
      </div>
    </div>
  </div>  
 <?php  } ?>
</div>
        <div class="row">
            <div class="col-lg-4">
                <label>TOPPINGS</label>
                <select class="form-control" name="topping" id="topping" multiple="multiple" size="10" width="50%">
                  <?php foreach($allTopping as $topping) { ?>
                    <option value="<?php echo $topping['tt_id']?>"><?php echo strtoupper($topping['tt_type'])?></option>
                    
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <label>CRUST TYPE</label>
                    <select class="form-control" name="curst_type" id="crust_type">
                        <option value="0">----NONE---</option>
                        <?php foreach ($allCrust as $crust) { ?>
                        <option value="<?php echo $crust['pt_id']; ?>"><?php echo strtoupper($crust['pt_crust_type']); ?></option>
                        <?php } ?>
                    </select>
                </div><br/><br/>
                <div class="row">
                    <div class="col-lg-2">
                        <label class="text-center"<h4>QUANTITY</h4></label>
                    </div>
                    
                    <div class="col-lg-2 col-lg-offset-2">
                 
                        <button class="btn btn-default btn-primary" name="mins" id="mins" ><b>-</b></button>
                    </div>
                   <div class="col-lg-4">
                      
                       <input type="text" name="quantity" id="quantity" class="form-control text-center" style="width: 100%; font-size: 15px;font-weight: bold" value="1" readonly/>
                   </div>
                   <div class="col-lg-2">
                        
                       <button type="button" class="btn btn-default  btn-primary" name="add" id="add"><b>+</b></button>
                   </div>
                </div>
            </div>
            <div class="col-lg-4">
                <br/><br/><br/>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <button class="btn btn-default btn-warning btn-block" type="reset">RESET</button>
                    </div>
                </div>
                <br/><br/>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <button type="submit" class="btn btn-default btn-primary btn-block" name="order" id="order">ORDER</button>
                    </div>
                </div>
               
            </div>
            
       
            
              
    
</div>
            </form>
</div>
    <!-- Modal Start here-->
<div class="modal fade bs-example-modal-sm" id="myPleaseWait" tabindex="-1"
    role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <span class="glyphicon glyphicon-time">
                    </span>Processing Order...
                 </h4>
            </div>
            <div class="modal-body">
                <div class="progress">
                    <div class="progress-bar progress-bar-info
                    progress-bar-striped active"
                    style="width: 100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal ends Here -->
<!--script src="http://localhost:8081/pizza_proj/assets/js/jquery.min.js"></script-->
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrap-switch.js"></script>

    
<script>
   $(document).ready(function(argument){
       
     
      $('[type="checkbox"]').bootstrapSwitch({
    
    onText: 'Checked',
    offText: 'Unchecked',
    onColor:'success',
    offColor:'danger',
    
    size: 'large'
});
//$("#ch1").bootstrapSwitch('setState',true)
var x = $("#ch1").bootstrapSwitch('state');

//$("#ch1").bootstrapSwitch('toggleState');

var x = $("#ch1").bootstrapSwitch('state');
$('#ch1').on('switchChange.bootstrapSwitch', function (event, state) {
    if(state==true){
        $("#ch2").bootstrapSwitch('state',false);
        $("#ch3").bootstrapSwitch('state',false);
        $("#ch4").bootstrapSwitch('state',false);
    }
    
});
$('#ch2').on('switchChange.bootstrapSwitch', function (event, state) {
    if(state==true){
        $("#ch1").bootstrapSwitch('state',false);
        $("#ch3").bootstrapSwitch('state',false);
        $("#ch4").bootstrapSwitch('state',false);
    }
    
});
$('#ch3').on('switchChange.bootstrapSwitch', function (event, state) {
    if(state==true){
        $("#ch1").bootstrapSwitch('state',false);
        $("#ch2").bootstrapSwitch('state',false);
        $("#ch4").bootstrapSwitch('state',false);
    }
    
});
$('#ch4').on('switchChange.bootstrapSwitch', function (event, state) {
    if(state==true){
        $("#ch1").bootstrapSwitch('state',false);
        $("#ch2").bootstrapSwitch('state',false);
        $("#ch3").bootstrapSwitch('state',false);
    }
    
});



   $("#add").click(function(){
    var value = $("#quantity").val();
    if(value>0){
        value++;
        $("#quantity").val(value)
    }
   });     
   $("#mins").click(function(){
    var value = $("#quantity").val();
    if(value>0){
    value--;
    $("#quantity").val(value)
    }
   });          
    $("#order").click(function(e){
        e.preventDefault();
        
        var topping=[]
        topping= $("#topping").val();
        var value = $("#quantity").val();
        var crustType       =   $("#crust_type").val();
        if(!$("#ch1").bootstrapSwitch('state')&& !$("#ch2").bootstrapSwitch('state') && !$("#ch3").bootstrapSwitch('state') && !$("#ch4").bootstrapSwitch('state')){
            alert("Please Select the Piza Size");
        }
       else{
            if(topping==null || crustType==0){
                alert("Please select the topping & Crust type");
            }
            else{
                var data=[];
                var p1,p2,p3,p4;
                p1=p2=p3=p4=0;
                if($("#ch1").bootstrapSwitch('state')){
                    p1=1;
                }
                if($("#ch2").bootstrapSwitch('state')){
                    p2=2;
                }
                if($("#ch3").bootstrapSwitch('state')){
                    p3=3;
                }
                if($("#ch4").bootstrapSwitch('state')){
                    p4=4;
                }
               
                var top =topping.join(",");
               
                data = {"P1":p1,"P2":p2,"P3":p3,"P4":p4,"crust":crustType,"top":top,"quantity":value};
                  $('#myPleaseWait').modal('show');
                  
               $.ajax({
                   
                    url:"<?php echo base_url(); ?>index.php/admin/process" ,
                    data:data,
                    type:"POST",
                    success:function(response){
                          $('#myPleaseWait').modal('hide');  
                          
                             window.location = "<?php echo base_url(); ?>index.php/admin/processing";
   
                    },
                    error:function(response){
                        alert(response);
                    }
               });
            }
        }
    })    
        
        
    })
</script>
<style>
   
</style>
</body>
</html>