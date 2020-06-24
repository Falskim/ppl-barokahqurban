<div id="support" class="section wb">
    <div class="container">
        <h3></h3>
        <h3></h3>
        <div class="section-title">
            <a class="btn btn-primary" href="<?= site_url('profile');?>"> Back</a>
            <div class="text-center">
                <p class="lead">Edit Profile</p>
            </div>
        </div>

        <!-- <form method="post" action="<?= site_url('profile/update');?>"> -->
        <!-- <form method="post" action="<?= site_url('profile/upload_photo');?>"> -->
        <?php echo form_open_multipart('profile/update');?>
            <?php
                if ($this->session->flashdata('errors')){
                    echo '<div class="alert alert-danger">';
                    echo $this->session->flashdata('errors');
                    echo "</div>";
                }
            ?>

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Photo</strong>                
                        <input type="file" name="userfile" size="20" />
                    </div>
                </div>
                
            
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" value="<?= $user->name; ?>">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <textarea name="email" class="form-control"><?= $user->email; ?></textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Phone:</strong>
                        <textarea name="phone" class="form-control"><?= $user->phone; ?></textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Address:</strong>
                        <textarea name="address" class="form-control"><?= $user->address; ?></textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary" value="upload">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>