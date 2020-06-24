<div id="support" class="section wb">
    <div class="container">
        <div class="section-title text-center">
            <h3></h3>
            <p class="lead">Donation History</p>
        </div><!-- end title -->

        <div class="row">
            <table id="dataTable" class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Recipient</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donates as $donate_key => $donate) { ?>

                        <tr>
                            <th scope="row"><?= $donate_key + 1 ?></th>
                            <td><?= $donate->category ?></td>
                            <td><?= $donate->recipient ?></td>
                            <td><?= $donate->quantity ?></td>
                            <td><?= $donate->date ?></td>
                            <td><a href="<?= site_url('history2/detail_donate/' . $donate->donate_id) ?>"> Detail </a></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->