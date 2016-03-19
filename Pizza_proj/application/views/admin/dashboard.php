<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo base_url(); ?>index.php/admin/addOrder" class="btn btn-primary btn-default"> ADD ORDER</a>
            
             <a href="<?php echo base_url(); ?>index.php/admin/complete" class="btn btn-success btn-default "> COMPLETED  ORDER <span class="badge"><?php echo $complete; ?></span></a>
             <a href="<?php echo base_url(); ?>index.php/admin/inProcess" class="btn btn-info btn-default "> IN PROCESS <span class="badge"><?php echo $inprocess; ?></span></a>
             <a href="<?php echo base_url(); ?>index.php/admin/cancelled" class="btn btn-danger btn-default "> CANCELED  ORDER <span class="badge"><?php echo $cancelled; ?></span></a>
             <a href="<?php echo base_url(); ?>index.php/admin/" class="btn btn-warning btn-default pull-right"> REFRESH</a>&nbsp;&nbsp;
        </div>
        
    </div>
    <br/>
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                ACTIVE ORDERS
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped  table-hover">
                        <thead>
                            <tr>
                                <th>Order No</th>
                                <th>Order Type</th>
                                <th>Quantity</th>
                                <th>Customer Name</th>
                                <th>Customer Phone</th>
                                <th>Customer E- Mail</th>
                                <th>Order Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allInProcess as $process) { ?>
                            <tr>
                                <td><?php echo $process['oi_id']; ?></td>
                                <td><?php echo strtoupper($process['pd_type']); ?></td>
                                <td><?php echo $process['oi_quantity']; ?></td>
                                 <td><?php echo strtoupper($process['ci_name']); ?></td>
                                  <td><?php echo strtoupper($process['ci_phone_no']); ?></td>
                                   <td><?php echo strtoupper($process['ci_email_address']); ?></td>
                                <td><label class="label label-info">IN - PROCESS</label>
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
            COMPLETED ORDER
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                    <table class="table table-striped  table-hover">
                        <thead>
                            
                            <tr>
                                <th>Order No</th>
                                <th>Order Type</th>
                                <th>Quantity</th>
                                <th>Customer Name</th>
                                <th>Customer Phone</th>
                                <th>Customer E- Mail</th>
                                <th>Order Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allComplete as $complete) { ?>
                            <tr>
                                <td><?php echo $complete['oi_id']; ?></td>
                                <td><?php echo strtoupper($complete['pd_type']); ?></td>
                                <td><?php echo $complete['oi_quantity']; ?></td>
                                 <td><?php echo strtoupper($complete['ci_name']); ?></td>
                                  <td><?php echo strtoupper($complete['ci_phone_no']); ?></td>
                                   <td><?php echo strtoupper($complete['ci_email_address']); ?></td>
                                <td><label class="label label-success">COMPLETE</label>
                            </tr>
                              <?php } ?>
                        </tbody>
                    </table>
                </div>
        </div>
        </div>
        
    </div>
    

</div>