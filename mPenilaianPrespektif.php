<?php
include "Header-Dash.php";
?>
<div class="pcoded-content">
    <br>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <?php if (isset($_GET["success"])) { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            Proses Simpan Data Penilaian <strong>Berhasil</strong>!
                        </div>
                    <?php } ?>
                    <?php if (isset($_GET["update"])) { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            Proses Ubah Data Penilaian <strong>Berhasil</strong>!
                        </div>
                    <?php } ?>
                    <?php if (isset($_GET["failed"])) { ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            Proses Simpan Data Penilaian <strong>Gagal</strong>!
                        </div>
                    <?php } ?>
                    <?php if (isset($_GET["hapus"])) { ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            Proses Hapus Data Penilaian <strong>Berhasil</strong>!
                        </div>
                    <?php } ?>
                    <?php if (isset($_GET["hapusfailed"])) { ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            Proses Hapus Data Penilaian <strong>Gagal</strong>!
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-blue">
                                <a href="mBuatPenilaian.php?minggu=m1" class="waves-effect waves-dark">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-30">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Buat Penilaian Toko</h6>
                                                <h3 class="m-b-0 f-w-700 text-white">
                                                    Minggu Ke-1
                                                </h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-home text-c-blue f-18"></i>
                                            </div>
                                        </div>
                                        <p class="m-b-0 text-white">
                                            <?php
                                            $default = date_default_timezone_set('Asia/Jakarta');
                                            echo date('F Y');
                                            ?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-danger">
                                <a href="mBuatPenilaian.php?minggu=m2" class="waves-effect waves-dark">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-30">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Buat Penilaian Toko</h6>
                                                <h3 class="m-b-0 f-w-700 text-white">
                                                    Minggu Ke-2
                                                </h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-home text-c-red f-18"></i>
                                            </div>
                                        </div>
                                        <p class="m-b-0 text-white">
                                            <?php
                                            $default = date_default_timezone_set('Asia/Jakarta');
                                            echo date('F Y');
                                            ?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-green">
                                <a href="mBuatPenilaian.php?minggu=m3" class="waves-effect waves-dark">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-30">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Buat Penilaian Toko</h6>
                                                <h3 class="m-b-0 f-w-700 text-white">
                                                    Minggu Ke-3
                                                </h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-home text-c-green f-18"></i>
                                            </div>
                                        </div>
                                        <p class="m-b-0 text-white">
                                            <?php
                                            $default = date_default_timezone_set('Asia/Jakarta');
                                            echo date('F Y');
                                            ?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-yellow">
                                <a href="mBuatPenilaian.php?minggu=m4" class="waves-effect waves-dark">
                                    <div class="card-body">
                                        <div class="row align-items-center m-b-30">
                                            <div class="col">
                                                <h6 class="m-b-5 text-white">Buat Penilaian Toko</h6>
                                                <h3 class="m-b-0 f-w-700 text-white">
                                                    Minggu Ke-4
                                                </h3>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-home text-c-yellow f-18"></i>
                                            </div>
                                        </div>
                                        <p class="m-b-0 text-white">
                                            <?php
                                            $default = date_default_timezone_set('Asia/Jakarta');
                                            echo date('F Y');
                                            ?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>
</div>

<div id="styleSelector">
</div>

</div>
</div>
</div>
</div>

<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 2500); // Change image every 2 seconds
    }
</script>

<?php
include "Footer.php";
?>