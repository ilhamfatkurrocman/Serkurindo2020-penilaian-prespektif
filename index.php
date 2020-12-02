<?php
include "Header-Dash.php";
?>
<div class="pcoded-content">
    <br>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-blue">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">JUMLAH TOKO</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">
                                                <?php
                                                $tampilkan5 = "select count(*) as hitungToko FROM DAFTAR_TOKO";
                                                $str = mysqli_query($con, $tampilkan5);
                                                while ($data = mysqli_fetch_array($str)) {
                                                    echo $data['hitungToko'];
                                                }
                                                ?> Toko
                                            </h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users text-c-blue f-18 analytic-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-yellow">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">JUMLAH BARANG</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">
                                                <?php
                                                $tampilkan6 = "select count(*) as hitungBarang FROM BARANG";
                                                $str1 = mysqli_query($con, $tampilkan6);
                                                while ($data1 = mysqli_fetch_array($str1)) {
                                                    echo $data1['hitungBarang'];
                                                }
                                                // ?> Item
                                            </h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users text-c-yellow f-18"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-blue">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Corporation</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">
                                                <?php
                                                // $tampilkan5 = "select count(*) as hitungAnggota FROM PENGURUS";
                                                // $str = mysqli_query($con, $tampilkan5);
                                                // while ($data = mysqli_fetch_array($str)) {
                                                //     echo $data['hitungAnggota'];
                                                // }
                                                ?> Orang
                                            </h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users text-c-blue f-18 analytic-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-red">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Multimedia</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">
                                                <?php
                                                // $tampilkan5 = "select count(*) as hitungAnggota FROM PENGURUS";
                                                // $str = mysqli_query($con, $tampilkan5);
                                                // while ($data = mysqli_fetch_array($str)) {
                                                //     echo $data['hitungAnggota'];
                                                // }
                                                ?> Orang
                                            </h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users text-c-red f-18"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                      
                       

                        <!--<div class="slideshow-container">-->


                        <!--    <div class="mySlides fade">-->
                        <!--        <div class="numbertext">1 / 3</div>-->
                        <!--            <img src="admindek/files/assets/images/logo.png" style="width:100%">-->
                        <!--         <div class="text">Caption Text</div> -->
                        <!--    </div>-->

                        <!--    <div class="mySlides fade">-->
                        <!--        <div class="numbertext">2 / 3</div>-->
                        <!--      <img src="admindek/files/assets/images/logo.png" style="width:100%">-->
                        <!--         <div class="text">Caption Two</div> -->
                        <!--    </div>-->

                        <!--    <div class="mySlides fade">-->
                        <!--        <div class="numbertext">3 / 3</div>-->
                        <!--       <img src="admindek/files/assets/images/logo.png" style="width:100%">-->
                        <!--         <div class="text">Caption Three</div> -->
                        <!--    </div>-->
                        <!--</div>-->
                        <br>
                        <br>
                        <!--<div style="text-align:center">-->
                        <!--    <span class="dot"></span>-->
                        <!--    <span class="dot"></span>-->
                        <!--    <span class="dot"></span>-->
                        <!--</div>-->

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