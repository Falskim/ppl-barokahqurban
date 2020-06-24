<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show User</h2>
        </div>
        <div class="text-right">
            <a class="btn btn-primary" href="<?= site_url('admin_user');?>"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="container text-center">
            <img src="<?= base_url('uploads/users/'.$user->photo) ?>" alt="<?= base_url('uploads/users/'.$user->photo) ?>">
            <p><i>#<?= $user->id; ?></i></p>
        </div>
        <hr>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name :</strong>
            <br>
            <?= $user->name; ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email :</strong>
            <br>
            <?= $user->email; ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone:</strong>
            <br>
            <?= $user->phone; ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Address:</strong>
            <br>
            <?= $user->address; ?>
        </div>
    </div>
</div>