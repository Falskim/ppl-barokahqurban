<div id="support" class="section wb">
    <div class="container">

        <div class="section-title text-center">
            <h3></h3>
            <p class="lead">Order Detail</p>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-12">
                <div class="card card-body printableArea">
                    <h3><b>INVOICE</b> <span class="pull-right">#<?= $order->order_id ?></span></h3>
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
                                    <h4 class="font-bold"><?= $order->name ?></h4>
                                    <p class="text-muted m-l-30"><?= $order->email ?>
                                        <br /> <?= $order->phone ?>
                                        <br /> <?= $order->address ?></p>
                                    <!-- <br/> Bhavnagar - 364002</p> -->
                                    <p class="m-t-30"><b>Invoice Date : </b> <i class="fa fa-calendar"></i><br>
                                        <?= $order->date ?></p>
                                    <!-- <p><b>Due Date :</b> <i class="fa fa-calendar"></i> 25th Jan 2018</p> -->
                                </address>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:50px;">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Description</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">Unit Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td><?= $order->category ?></td>
                                            <td class="text-right"><?= $order->quantity ?></td>
                                            <td class="text-right">Rp.<?= $order->price ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="container" style="padding-top:100px;">
                            <h4>Alamat Tujuan</h4>
                            <hr>
                            <p class="font-bold">
                                <p class="text-muted m-l-5"><?= $order->deliver_address ?></p>
                            </p>
                        </div>

                        <div class="container" style="margin-top:50px;">
                            <h4>Keterangan</h4>
                            <hr>
                            <p class="m-t-30"><i>
                                    <?php if (isset($order->description)) : ?>
                                        <?= $order->description ?>
                                    <?php else : ?>
                                        -- Tidak Ada --
                                    <?php endif ?>
                                </i><br>
                        </div>

                        <div class="container" style="margin-top:50px;">
                            <h4>Status</h4>
                            <?php if($order->status == 'pending'):?>
                                <a type="button" class="btn btn-block btn-warning text-white">Pending</a>
                            <?php elseif($order->status == 'deliver'):?>
                                <a type="button" class="btn btn-block btn-primary text-white">Sedang Diantar</a>
                            <?php elseif($order->status == 'cancelled'):?>
                                <a type="button" class="btn btn-block btn-danger text-white">Dibatalkan</a>
                            <?php elseif($order->status == 'success'):?>
                                <a type="button" class="btn btn-block btn-success text-white">Selesai</a>
                            <?php else:?>
                                <a type="button" class="btn btn-block btn-danger text-white">Error</a>
                            <?php endif;?>
                        </div>

                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                <!-- <p>Sub - Total amount: $13,848</p>
                                <p>vat (10%) : $138 </p> -->
                                <hr>
                                <h3><b>Total :</b>
                                    Rp. <?= $order->price * $order->quantity ?>
                                </h3>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                        </div>

                        <div class="tab">
                            <b>Silahkan Transfer Pembayaran Rekening Berikut</b>
                            <div class="container">
                                <div class="row text-center">
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="panel panel-default card-input">
                                            <div class="panel-heading">Bank</div>
                                            <div class="panel-body">
                                                <img src="<?= base_url('uploads/rek.png') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            Lalu mengirim bukti pembayaran ke
                            <b><a href="mailto:barokah@qurban.com">Email Barokah Qurban</a></b>
                            </p>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-12 margin-tb">
                                <div class="text-right">
                                    <a class="btn btn-primary" href="<?= site_url('history'); ?>"> Back</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>