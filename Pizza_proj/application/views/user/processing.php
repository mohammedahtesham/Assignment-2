<div class="container" style="margin-top: 100px">
    
    <?php if($this->session->userdata('Error')!=""){ ?>
    
    <div class="col-lg-12">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->userdata('Error');  ?></div>
        
    </div>
    
    
    
    <br/>
   <?php $this->session->unset_userdata('Error'); }  ?>
    
    <form action="<?php echo base_url(); ?>index.php/user/processOrder" method="post" name="processOrder" id="processOrder">
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    COSTING
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>Base Amount</td>
                                <td class="text-right"><?php echo "$.".number_format($order,2) ;?>
                                    <input type="hidden" name="baseAmt" id="baseAmt"  value="<?php echo $order;?>" /></td>
                                
                            </tr>
                            <tr>
                                <td>Tax Amount(<label id="taxper"></label>)</td>
                                <td class="text-right">
                                    <div id="tax">0.00</div>
                                    <input type="hidden" name="taxamount" id="taxamount"  /></td>
                            </tr>
                            <tr>
                                <td><b>Total Amount</b></td>
                                <td class="text-right"><b><div id="totalAmt">0.00</div></b>
                                <input type="hidden" name="total" id="total"  />
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-2">
                    <label>State</label>
                    <select class="form-control" name="state" id="state">
                        <option value="0">---- NONE ----</option>
                        <?php foreach($stateAll as $state){ ?>
                        <option value="<?php echo $state['sm_id'] ?>"><?php echo strtoupper($state['sm_name']); ?></option>
                        
                        <?php } ?>
                    </select>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-2">
                    <label>Customer Name</label>
                    <input type="text" name="customer" id="customer" class="form-control" placeholder="CUSTOMER NAME"/>
                </div>
            </div><br/>
             <div class="row">
                <div class="col-lg-6 col-lg-offset-2">
                    <label>Phone Number *</label>
                    <input type="number" name="phone" id="phone" class="form-control" placeholder="001-1234-123-123"/>
                </div>
            </div><br/>
             <div class="row">
                <div class="col-lg-6 col-lg-offset-2">
                    <label>Pin Code *</label>
                    <input type="number" name="pin" id="pin" class="form-control" placeholder="000000"/>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-2">
                    <label>E-mail *</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="xyz@xyz.com"/>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-2">
                    <label>Address *</label>
                    <textarea class="form-control" rows="10" cols="50" name="address" id="address"></textarea>
                    
                </div>
            </div>
        </div>
    </div><br/><br/>
    <div class="row">
        <div class="col-lg-2 col-lg-offset-4">
            <button type="submit" name="order_process" id="order_process" class="btn btn-default btn-primary">Process Order</button>
        </div>
        <div class="col-lg-4 ">
            <a href="<?php echo base_url() ?>/index.php/user"  name="cancel" id="cancel" class="btn btn-default btn-danger">Cancel Order</a>
        </div>
    </div>
    
    </form>  
</div>

<script>
    $(function(){
       $("#state").change(function(){
         if($(this).val()!=0){
            var data={"state":$(this).val()};  
            var baseAmt =   $("#baseAmt").val();
            var total   =   0;
            var taxAmt  =   0;
            $.ajax({
               url:"<?php echo base_url(); ?>index.php/user/ajaxState" ,
               data:data,
               type:'POST',
               success:function(response){
                   taxAmt       =   ((baseAmt*response)/100);
                   //alert(taxAmt);
                   total        =   (parseFloat(baseAmt)+parseFloat(taxAmt)); 
                   $("#totalAmt").html("$."+total.toFixed(2));
                   $("#total").val(total.toFixed(2));
                   $("#taxper").html(response+" %");
                   $("#taxamount").val(taxAmt.toFixed(2));
                   $("#tax").html("$."+taxAmt.toFixed(2));
               },
               error:function(response){
                   alert(response);
               }
            });
         }
       });
       $(form).submit(function(e){
         e.preventDefault();
       })
    });
    </script>