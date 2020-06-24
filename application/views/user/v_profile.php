<div id="support" class="section wb">
    <div class="container">
        <div class="section-title text-center">
            <h3></h3>
            <p class="lead">Your Profile</p>
        </div><!-- end title -->

        <div class="row">
            <div class="container text-center">
                <img src="<?= base_url('uploads/users/'.$user->photo) ?>" alt="<?= base_url('uploads/users/'.$user->photo) ?>">
            </div>

            <div class="right-box-contact">
                <h4>Name</h4>
                <div class="support-info">
                    <?= $user->name ?>
                </div>
            </div>

            <div class="right-box-contact">
                <h4>Email</h4>
                <div class="support-info">
                    <?= $user->email ?>
                </div>
            </div>

            <div class="right-box-contact">
                <h4>Phone</h4>
                <div class="support-info">
                    <?= $user->phone ?>
                </div>
            </div>

            <div class="right-box-contact">
                <h4>Address</h4>
                <div class="support-info">
                    <div class="info-title">
                        <?= $user->address ?>
                    </div>
                </div>
            </div>

            <a class="btn btn-info" href="<?= site_url('profile/edit') ?>"> Edit Profile </a>

        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->