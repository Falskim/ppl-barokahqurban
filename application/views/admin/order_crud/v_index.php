<link href="<?= base_url('assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') ?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/extra-libs/multicheck/multicheck.css') ?>">

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Order</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <!-- <th>Order ID</th> -->
                                <th>User</th>
                                <th>Livestock</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <!-- TABLE BODY -->
                        <tbody>
                        <?php foreach ($orders as $key=>$order) { ?> 
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <!-- <td><?= $order->order_id; ?></td> -->
                                <td><?= $order->name; ?></td>
                                <td><?= $order->category; ?></td>
                                <td><?= $order->quantity; ?></td>
                                <td><?= date("Y-m-d",strtotime($order->date)); ?></td>
                                <td class="text-white">
                                    <?php if($order->status == 'pending'):?>
                                        <a type="button" class="btn btn-block btn-warning">Pending</a>
                                    <?php elseif($order->status == 'deliver'):?>
                                        <a type="button" class="btn btn-block btn-primary">Sedang Diantar</a>
                                    <?php elseif($order->status == 'cancelled'):?>
                                        <a type="button" class="btn btn-block btn-danger">Dibatalkan</a>
                                    <?php elseif($order->status == 'success'):?>
                                        <a type="button" class="btn btn-block btn-success">Selesai</a>
                                    <?php else:?>
                                        <a type="button" class="btn btn-block btn-danger">Error</a>
                                    <?php endif;?>
                                </td>
                                <td class="text-center">
                                <form method="DELETE" action="<?= site_url('admin_order/delete/'.$order->order_id);?>">
                                    <a class="btn btn-info" href="<?= site_url('admin_order/show/'.$order->order_id) ?>"> Check</a>
                                    <button type="submit" class="btn btn-danger"> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <!-- END TABLE BODY -->
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->


<script src="<?= base_url('assets/admin/libs/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/extra-libs/multicheck/datatable-checkbox-init.js') ?>"></script>
<script src="<?= base_url('assets/admin/extra-libs/multicheck/jquery.multicheck.js') ?>"></script>
<script src="<?= base_url('assets/admin/extra-libs/DataTables/datatables.min.js') ?>"></script>
<script>
    /****************************************
    *       Basic Table                   *
    ****************************************/
    $('#zero_config').DataTable();
</script>