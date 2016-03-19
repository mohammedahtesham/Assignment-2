<div class="container">
    <div class="row">
        <div class="col-lg-12 pull-right">
            <a href="<?php echo base_url(); ?>index.php/admin/" class="btn btn-success btn-default pull-right"><&nbsp;&nbsp;&nbsp; BACK</a>&nbsp;&nbsp;
        </div>
    </div><br/>
    <div class="row">
        <div class="panel panel-success">
            <div class="panel-heading">
                List of Completed Orders
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Order No</th>
                                <th class="text-center">Ordered Prizza</th>
                                <th class="text-center">Ordered Crust</th>
                                <th class="text-center">Quantity</th>
                                 <th class="text-center">Customer Name</th>
                                 <th class="text-center">Customer Phone No</th>
                                
                                <th class="text-center" >Operations</th>
                                    
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($completedOrder as $order){ ?>
                            <tr>
                                <td><?php echo $order['oi_id']; ?></td>
                                <td class="text-center"><?php echo strtoupper($order['pd_type']); ?></td>
                                <td class="text-center"><?php echo strtoupper($order['pt_crust_type']); ?></td>
                                <td class="text-center"><?php echo $order['oi_quantity']; ?></td>
                                <td class="text-center"><?php echo strtoupper($order['ci_name']); ?></td>
                                <td class="text-center"><?php echo $order['ci_phone_no']; ?></td>
                                
                                
                                <td class="text-center"> <a href="<?php echo base_url(); ?>index.php/admin/editOrder/<?php echo $order['oi_id']; ?>" class="btn  btn-primary">EDIT</a></td>
                               
                                
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>