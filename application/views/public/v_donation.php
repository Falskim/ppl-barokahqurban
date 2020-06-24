<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/user/css/form-wizard.css'); ?>">

<style>
    /**
  Default Markup
**/

    body {
        background: #F0E5E1;
    }

    .container {
        /* max-width: 900px; */
        margin: 0 auto;
    }


    /**
  Component
**/

    label {
        width: 100%;
    }

    .card-input-element {
        display: none;
    }

    .card-input {
        margin: 10px;
        padding: 00px;
    }

    .card-input:hover {
        cursor: pointer;
    }

    .card-input:disabled {
        cursor: no-drop;
    }

    .card-input-element:checked+.card-input {
        box-shadow: 0 0 1px 1px #2ecc71;
    }

    /* Source https://codepen.io/stefanzweifel/pen/RNvGwz?__cf_chl_jschl_tk__=fbd71ae6febd89e816bbb01a232660f2e12a325b-1586018622-0-AUl_BwIXpPLgZxZi0uo7-RekTVKa7-hatKl4h9VjjQHSuOtEjeP5YHdy6DbJ4U5PZP-tEWj490fGmdEXYygdToo4UR0-gBRnehrfLVqCYzOVuYm-noetU0IZ52jX71PjcT1k0ElFLfIRoFjPx64TuHWx4OyMzoQmwn2RXXVNPErbfQnvZcfI9zCm6Lx4siB0-7iUuN7pzeJPn-2-Em9CI03tB60pN1B5tHernWnCClwNN850X9gPPQ3NaIFvwyGCkNQIggaBEWYQ7ou20HXQCGpDcOokzr0FTLlOxbvLXJrlWC5Q9LgEUpcNeDc63JWck3w1GCoAXezpUyDkjsPh_Uq2rl9m1-rfsMFN1fYzFwiO */
</style>
<div class="container">
    <h3><br><br><br></h3>
    <div class="row">
        <div class="col-md-12 wow slideInLeft ">
            <div class="contact_form">
                <h3><i class="fa fa-envelope-o grd1 global-radius"></i> DONASI HEWAN</h3>

                <h1 class="text-center">Buat Donasi</h1>
                <form id="regForm" method="post" action="<?= site_url('donates/store') ?>">
                    <div class="tab">
                        <b>Silahkan Pilih Hewan Qurban</b>
                        <hr>
                        <?php foreach ($livestocks as $key => $livestock) { ?>
                            <?php if ($key + 1 % 3 == 0) : ?>
                                <div class="row">
                                <?php endif; ?>
                                <div class="col-md-4 col-lg-4 col-sm-4">
                                    <label class="text-center">
                                        <input type="radio" name="livestock_id" class="card-input-element" value="<?= $livestock->id ?>" <?php if (!$livestock->available) : ?> disabled <?php endif; ?> />
                                        <div class="panel panel-default card-input">
                                            <div class="panel-heading"><?= $livestock->category ?></div>
                                            <div class="panel-body">
                                                <img src="<?= base_url('uploads/livestocks/' . $livestock->image) ?>" width="150pt">
                                                <hr>
                                                <?php if ($livestock->available) : ?>
                                                    Tersedia
                                                <?php else : ?>
                                                    Tidak Tersedia
                                                <?php endif; ?>
                                            </div>
                                            <div class="panel-heading">Rp. <?= $livestock->price ?></div>
                                        </div>
                                    </label>
                                </div>
                                <?php if ($key + 1 % 3 == 0) : ?>
                                </div>
                            <?php endif; ?>
                        <?php } ?>
                        <br><br>
                        <hr>
                        <b>Silahkan Masukan Jumlah</b>
                        <hr>
                        <p><input name="quantity" class="full" placeholder="Quantity"></p>
                    </div>

                    <div class="tab">
                        <b>Contact Info:</b>
                        <hr>
                        <p>Atas Nama</p>
                        <p><input value="<?= $user->name ?>" disabled></p>
                        <p>Penerima Donasi</p>
                        <p><input type="textbox" class="full" name="recipient" placeholder=""></p>
                        <p>No Telephon Donatur</p>
                        <p><input value="<?= $user->phone ?>" disabled></p>
                        <p>Alamat Tujuan</p>
                        <p><input type="textbox" class="full" name="deliver_address" placeholder=""></p>
                        <hr>
                        <label for="by_seller"> Amanatkan ke penjual ?
                            <input type="checkbox" id="by_seller" name="by_seller">
                        </label>
                    </div>

                    <div class="tab">
                        <b>Keterangan</b>
                        <p><textarea class="form-control" name="description" rows="6" placeholder="Isi Disini..."></textarea>
                        </p>
                    </div>

                    <!-- <div class="tab">Login Info:
                        <p><input placeholder="Username..." oninput="this.className = ''"></p>
                        <p><input placeholder="Password..." oninput="this.className = ''"></p>
                    </div> -->

                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        </div>
                    </div>

                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <!-- <span class="step"></span> -->
                    </div>
                </form>

            </div>
        </div>
        <div class="col-md-6 col-sm-12">

        </div>
    </div><!-- end row -->
</div><!-- end container -->


<script src="<?= base_url('assets/user/js/form-wizard.js'); ?>"></script>