<div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <a href="<?php echo base_url(); ?>index.php/admin/" class="btn btn-success btn-default pull-right"><&nbsp;&nbsp;&nbsp; BACK</a>&nbsp;&nbsp;
        </div>
    </div><br/>
    <div class="row">
        <div class="panel panel-danger">
            <div class="panel-heading">
                List of Cancelled Orders
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
                                
                                <th class="text-center" >Total Cost</th>
                                    
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($cancelledOrder as $order){ ?>
                            <tr>
                                <td><?php echo $order['oi_id']; ?></td>
                                <td class="text-center"><?php echo strtoupper($order['pd_type']); ?></td>
                                <td class="text-center"><?php echo strtoupper($order['pt_crust_type']); ?></td>
                                <td class="text-center"><?php echo $order['oi_quantity']; ?></td>
                                <td class="text-center"><?php echo strtoupper($order['ci_name']); ?></td>
                                <td class="text-center"><?php echo $order['ci_phone_no']; ?></td>
                                <td class="text-center"><?php echo $order['oi_total_amount']; ?></td>
                                
                               
                               
                                
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>