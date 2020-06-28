<link href="<?= base_url('assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') ?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/extra-libs/multicheck/multicheck.css') ?>">

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Donation</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <!-- <th>Donate ID</th> -->
                                <th>User</th>
                                <th>Livestock</th>
                                <th>Recipient</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>Handled By Seller</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <!-- TABLE BODY -->
                        <tbody>
                            <?php foreach ($donations as $key => $donate) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <!-- <td><?= $donate->donate_id; ?></td> -->
                                    <td><?= $donate->name; ?></td>
                                    <td><?= $donate->category; ?></td>
                                    <td><?= $donate->recipient; ?></td>
                                    <td><?= $donate->quantity; ?></td>
                                    <td><?= date("Y-m-d", strtotime($donate->date)); ?></td>
                                    <td class="text-white">
                                        <?php if ($donate->handled_by_seller) : ?>
                                            <a type="button" class="btn btn-success">Ya</a>
                                        <?php else : ?>
                                            <a type="button" class="btn btn-info">Tidak</a>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-white">
                                        <?php if($donate->status == 'pending'):?>
                                            <a type="button" class="btn btn-block btn-warning">Pending</a>
                                        <?php elseif($donate->status == 'deliver'):?>
                                            <a type="button" class="btn btn-block btn-primary">Sedang Diantar</a>
                                        <?php elseif($donate->status == 'cancelled'):?>
                                            <a type="button" class="btn btn-block btn-danger">Dibatalkan</a>
                                        <?php elseif($donate->status == 'success'):?>
                                            <a type="button" class="btn btn-block btn-success">Selesai</a>
                                        <?php else:?>
                                            <a type="button" class="btn btn-block btn-danger">Error</a>
                                        <?php endif;?>
                                    </td>
                                    <td class="text-center">
                                        <form method="DELETE" action="<?= site_url('admin_donate/delete/' . $donate->donate_id); ?>">
                                            <a class="btn btn-info" href="<?= site_url('admin_donate/show/' . $donate->donate_id) ?>"> Check</a>
                                            <button type="submit" class="btn btn-danger"> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <!-- END TABLE BODY -->

                        <tfoot>
                            <tr>
                                <th>#</th>
                                <!-- <th>Donate ID</th> -->
                                <th>User</th>
                                <th>Livestock</th>
                                <th>Recipient</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>Handled By Seller</th>
                                <th>Finished</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
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