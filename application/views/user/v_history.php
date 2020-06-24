<div id="support" class="section wb">
    <div class="container">
        <div class="section-title text-center">
            <h3></h3>
            <p class="lead">Order History</p>
        </div><!-- end title -->

        <div class="row">
            <table id="dataTable" class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order_key => $order) { ?>

                        <tr>
                            <th scope="row"><?= $order_key + 1 ?></th>
                            <td><?= $order->category ?></td>
                            <td><?= $order->quantity ?></td>
                            <td><?= $order->date ?></td>
                            <td><a href="<?= site_url('history/detail_order/' . $order->order_id) ?>"> Detail </a></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->