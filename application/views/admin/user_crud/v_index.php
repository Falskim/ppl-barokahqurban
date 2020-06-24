<link href="<?= base_url('assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') ?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/extra-libs/multicheck/multicheck.css') ?>">
    
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Admins</h5>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <!-- <th scope="col">Action</th> -->
                </tr>
                </thead>
                <tbody>
                <?php foreach ($admins as $key=>$admin) { ?> 
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $admin->name; ?></td>
                        <td><?= $admin->email; ?></td>
                        <!-- <td>
                        <form method="DELETE" action="<?= site_url('admin_user/delete/'.$admin->id);?>">
                            <a class="btn btn-info" href="<?= site_url('admin_user/show/'.$admin->id) ?>"> show</a>
                            <a class="btn btn-primary" href="<?= site_url('admin_user/edit/'.$admin->id) ?>"> Edit</a>
                            Disabled for a while
                            <button type="submit" class="btn btn-danger"> Delete</button>
                        </form>
                        </td> -->
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Users List</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <!-- TABLE BODY -->
                        <tbody>
                        <?php foreach ($users as $key=>$user) { ?> 
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $user->name; ?></td>
                                <td><?= $user->email; ?></td>
                                <td><?= $user->phone; ?></td>
                                <td>
                                <form method="DELETE" action="<?= site_url('admin_user/delete/'.$user->id);?>">
                                    <a class="btn btn-info" href="<?= site_url('admin_user/show/'.$user->id) ?>"> show</a>
                                    <a class="btn btn-primary" href="<?= site_url('admin_user/edit/'.$user->id) ?>"> Edit</a>
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
                                <th>Name</th>
                                <th>Role</th>
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