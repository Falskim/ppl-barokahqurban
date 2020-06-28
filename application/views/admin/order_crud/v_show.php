<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row mb-3">
    <div class="col-lg-12 margin-tb">        
        <div class="text-right">
            <a class="btn btn-primary" href="<?= site_url('admin_order');?>"> Back</a>
        </div>
    </div>
</div>

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
                    </div>
                    <div class="pull-right text-right">
                        <address>
                            <h5>Yang Terhormat</h5>
                            <h4 class="font-bold"><?= $order->name ?></h4>
                            <p class="text-muted m-l-30"><?= $order->email ?>
                                <br/> <?= $order->phone ?>
                                <br/> <?= $order->address ?></p>
                                <!-- <br/> Bhavnagar - 364002</p> -->
                            <p class="m-t-30"><b>Invoice Date : </b> <i class="fa fa-calendar"></i><br>
                                <?= $order->date ?></p>
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

                <div class="container mt-3">
                    <h4>Alamat Tujuan</h4>
                    <hr>
                    <p class="font-bold">
                        <p class="text-muted m-l-5"><?= $order->deliver_address ?></p>
                    </p> 
                </div>
                
                <div class="container mt-1">
                    <h4>Keterangan</h4>
                    <hr>
                    <p class="m-t-30"><i>
                        <?php if(isset($order->description)): ?>
                            <?= $order->description ?>
                        <?php else: ?>
                            -- Tidak Ada --
                        <?php endif ?>
                    </i><br>       
                </div>

                <div class="container mt-3">
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

                    <?php if($order->status != 'success' && $order->status != 'cancelled'):?>
                        <form id="stateForm" method="POST" action="<?= site_url('admin_order/change_state/'.$order->order_id) ?>">
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
