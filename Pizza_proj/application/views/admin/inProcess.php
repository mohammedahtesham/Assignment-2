<div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <a href="<?php echo base_url(); ?>index.php/admin/" class="btn btn-success btn-default pull-right"><&nbsp;&nbsp;&nbsp; BACK</a>&nbsp;&nbsp;
        </div>
    </div><br/>
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                List of In Process Orders
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
                                <th class="text-center" colspan="3">Operations</th>
                                    
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($allOrder as $order){ ?>
                            <tr>
                                <td><?php echo $order['oi_id']; ?></td>
                                <td class="text-center"><?php echo strtoupper($order['pd_type']); ?></td>
                                <td class="text-center"><?php echo strtoupper($order['pt_crust_type']); ?></td>
                                
                                <td class="text-center"><?php echo $order['oi_quantity']; ?></td>
                                <td class="text-center"><a href="<?php echo base_url(); ?>index.php/admin/completedOrder/<?php echo $order['oi_id']; ?>" class="btn  btn-success">COMPLETED</a></td>
                                <td class="text-center"> <a href="<?php echo base_url(); ?>index.php/admin/editOrder/<?php echo $order['oi_id']; ?>" class="btn  btn-primary">EDIT</a></td>
                                <td class="text-center"><a href="<?php echo base_url(); ?>index.php/admin/cancelOrder/<?php echo $order['oi_id']; ?>"" class="btn  btn-danger">CANCEL</a></td>
                                
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>