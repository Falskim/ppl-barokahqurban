<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row mb-3">
    <div class="col-lg-12 margin-tb">
        <div class="text-right">
            <a class="btn btn-primary" href="<?= site_url('admin_donate'); ?>"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-body printableArea">
            <h3><b>INVOICE</b> <span class="pull-right">#<?= $donate->donate_id ?></span></h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left">
                        <address>
                            <h3> &nbsp;<b class="text-danger">Baroqah Qurban</b></h3>
                        </address>
                    </div>
                    <div class="pull-right text-right">
                        <address>
                            <h5>Yang Terhormat</h5>
                            <h4 class="font-bold"><?= $donate->name ?></h4>
                            <p class="text-muted m-l-30"><?= $donate->email ?>
                                <br /> <?= $donate->phone ?>
                                <br /> <?= $donate->address ?></p>
                            <!-- <br/> Bhavnagar - 364002</p> -->
                            <p class="m-t-30"><b>Invoice Date : </b> <i class="fa fa-calendar"></i><br>
                                <?= $donate->date ?></p>
                            <!-- <p><b>Due Date :</b> <i class="fa fa-calendar"></i> 25th Jan 2018</p> -->
                        </address>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive m-t-40" style="clear: both;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Description</th>
                                    <th class="text-right">Quantity</th>
                                    <th class="text-right">Recipient</th>
                                    <th class="text-right">Unit Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td><?= $donate->category ?></td>
                                    <td class="text-right"><?= $donate->quantity ?></td>
                                    <td class="text-right"><?= $donate->recipient ?></td>
                                    <td class="text-right">Rp.<?= $donate->price ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="container mt-3">
                    <h4>Alamat Tujuan</h4>
                    <hr>
                    <p class="font-bold">
                        <?php if ($donate->handled_by_seller) : ?>
                            <button type="button" class="btn btn-warning btn-lg">Diserahkan Ke Penjual</button>
                        <?php else : ?>
                            <p class="text-muted m-l-5"><?= $donate->deliver_address ?></p>
                        <?php endif ?>
                    </p>
                </div>

                <div class="container mt-1">
                    <h4>Keterangan</h4>
                    <hr>
                    <p class="m-t-30"><i>
                            <?php if (isset($donate->description)) : ?>
                                <?= $donate->description ?>
                            <?php else : ?>
                                -- Tidak Ada --
                            <?php endif ?>
                        </i><br>
                </div>

                <div class="container mt-3">
                    <h4>Status</h4>
                    <?php if ($donate->status == 'pending') : ?>
                        <a type="button" class="btn btn-block btn-warning text-white">Pending</a>
                    <?php elseif ($donate->status == 'deliver') : ?>
                        <a type="button" class="btn btn-block btn-primary text-white">Sedang Diantar</a>
                    <?php elseif ($donate->status == 'cancelled') : ?>
                        <a type="button" class="btn btn-block btn-danger text-white">Dibatalkan</a>
                    <?php elseif ($donate->status == 'success') : ?>
                        <a type="button" class="btn btn-block btn-success text-white">Selesai</a>
                    <?php else : ?>
                        <a type="button" class="btn btn-block btn-danger text-white">Error</a>
                    <?php endif; ?>
                </div>

                <div class="col-md-12">
                    <div class="pull-right m-t-30 text-right">
                        <!-- <p>Sub - Total amount: $13,848</p>
                        <p>vat (10%) : $138 </p> -->
                        <hr>
                        <h3><b>Total :</b>
                            Rp. <?= $donate->price * $donate->quantity ?>
                        </h3>
                    </div>
                    <div class="clearfix"></div>
                    <hr>

                    <?php if($donate->status != 'success' && $donate->status != 'cancelled'):?>
                        <form id="stateForm" method="POST" action="<?= site_url('admin_donate/change_state/'.$donate->donate_id) ?>">
                            <div class="text-right text-white">
                                <a class="btn btn-primary" onclick="changeState('deliver')"> Tandai Sedang Diantar </a>
                                <a class="btn btn-success" onclick="changeState('success')"> Tandai Selesai </a>
                                <a class="btn btn-danger" onclick="changeState('cancelled')"> Tandai Dibatalkan </a>
                                <input type="text" id="stateInput" name="state" style="display: none;"></input>
                            </div>
                        </form>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function changeState(state) {
        document.querySelector("#stateInput").value = state;
        document.querySelector("#stateForm").submit();
    }
</script>