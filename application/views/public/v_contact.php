<ul class='slideshow'>
    <li>
        <span>Summer</span>
    </li>
    <li>
        <span>Fall</span>
    </li>
    <li>
        <span>Winter</span>
    </li>
    <li>
        <span>Spring</span>
    </li>
</ul>

<style>
    h4 {
        color: white
    }
</style>

<div class="parallax first-section">
    <div class="container">
        <div class="big-tagline clearfix wow slideInLeft hidden-xs hidden-sm">
            <h2>BAROKAH QURBAN</h2>
            <h4>Hubungi Kami Seputar Pemesanan dan Donasi</h4>
        </div>
    </div>
</div>

<div id="support" class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact_form">
                    <div id="message"></div>
                    <form id="contactform" class="row" action="contact.php" name="contactform" method="post">
                        <fieldset class="row-fluid">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="Isi Disini..."></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <button type="submit" value="SEND" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Kirim Tanggapan</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div><!-- end col -->
            <div class="col-md-6">
                <div class="right-box-contact">
                    <h4>Nomor Telepon</h4>
                    <div class="support-info">
                        <div class="info-title">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            +62 0000 1111

                        </div>
                    </div>
                </div>
                <div class="right-box-contact">
                    <h4>Alamat</h4>
                    <div class="support-info">
                        <div class="info-title">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            JL.Kemenangan no.88
                            <span>PO Box 14022 Corona</span>
                        </div>
                    </div>
                </div>
                <div class="right-box-contact">
                    <h4>Contact Pribadi</h4>
                    <div class="support-info">
                        <div class="info-title">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            barokahqurban@gmail.com

                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->
<div id="map"></div>

<div id="end-info" class="section eb">
    <div class="container">
        <div class="col-md-12 col-sm-12">
            <div class="big-tagline clearfix wow slideInLeft hidden-xs hidden-sm">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <p>Copyright© 2020</p>
                        <p>All Rights Reserved</p>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <p></p>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <p>Made by Kelompok 3</p>
                        <p>Proyek Perangkat Lunak - C</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<!-- MAP & CONTACT -->
<script src="<?= base_url('assets/user/js/map.js'); ?>"></script>