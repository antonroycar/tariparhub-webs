<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Taripar Hub</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.dashboard.css" rel="stylesheet">
    <link href="css/styles.map.css" rel="stylesheet">

    <style>
        /* Header Styles */
        .custom-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f5f5f5;
            /* Ganti dengan warna latar yang diinginkan */
            padding-left: 40px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            margin-right: 40px;
        }

        .title {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 30px;
            color: #000000;
            text-align: center;
            align-items: center;
        }

        .logout-text {
            font-family: Arial, sans-serif;
            /* Jenis font Arial */
            font-size: 20px;
            /* Ukuran font */
            padding-right: 40px;

        }

        /* CSS untuk Informasi Box */
        .info-box {
            background-color: #f5f5f5;
            /* Warna latar belakang abu-abu putih */
            padding: 10px 10px 10px 40px;
            border-radius: 5px;
            margin-bottom:20px;
            max-width: 100%;
            /* Lebar kotak informasi */
            /* box-shadow: 0 0 10px #000; */
            /* Efek bayangan */
            font-family: Arial, sans-serif;
            border-color: #000000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* Jenis font Arial */
        }

        .info-box p {
            margin: 5px;
        }

        .info-logout{
            text-align: right;
            margin: 40px;
        }

        /* CSS untuk Gambar */
        .info-image {
            margin-top: 20px;
            /* Jarak atas dari info box */
            width: 100%;
            /* Lebar gambar sesuai dengan lebar header */
            max-width: 100%;
            /* Lebar gambar tidak melebihi lebar parent (info-box) */
            display: block;
            /* Membuat gambar menjadi elemen block agar berada di bawah info box */
            border: 1px solid #ddd;
            /* Contoh: menambahkan border */
            border-radius: 5px;
            /* Sudut yang lebih lembut */
        }

        .dashboard {
            margin: 30px;
        }

        /* Style for the modal */
        .myModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background-color: rgba(0, 0, 0, 0.7); */
            z-index: 1000;
        }

        /* Style for the content within the modal */
        .modal-content iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Style for the overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            /* Warna latar belakang gelap dengan opacity */
            z-index: 1;
            /* Mengatur z-index di atas modal */
        }

        /* Style for the content within the modal */
        .modal-content {
            width: 60%;
            height: 70%;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: auto;
            /* Ini akan menambahkan gulir jika kontennya lebih besar dari modal */
            position: relative;
            /* Menyertakan posisi relatif untuk mengontrol posisi tombol close */
        }

        /* Style for the close button */
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 30px;
            color: #000000;
            cursor: pointer;

            font-family: Arial, sans-serif;
        }

    </style>

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Header -->
    <div class="custom-header">
        <div class="title">
            <h2>Taripar Hub</h2>
        </div>
        <div class="logo-container">
            <img src="img/taripar.png" alt="Taripar Logo" style="height:100px">
            <img src="img/del.png" alt="Del Logo" class="logo" style="height: 75px">
        </div>
        <!-- <div class="logout-text">Logout</div> -->
    </div>
    <!-- Header End -->

    <!-- <div class="dashboard">
        <p>Dashboard</p>
    </div> -->

<!-- Informasi Log Out -->
<div class="info-logout">
        <a href="logout.php">Log Out</a>
    </div>

    <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s" style="background-color: #f5f5f5;">

                    <div class="tab-pane fade show">
                        <div class="container" style="height: 100%; position: relative;">

                            <div class="row g-4">
                                <!-- Baris Pertama -->
                                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                                        <div> 
                                        <p><strong>Lokasi:</strong> Desa Hutajulu</p>
                                        <p><strong>Luas:</strong> 10 Ha; <strong>mdpl:</strong> 1400 m</p>
                                        <p><strong>Koordinat:</strong> 2,14362, 98,657265</p>    
                                        </div>
                                </div>

                                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">

                                        <div>
                                        <p><strong>Informasi Peta:</strong></p>
                                        <p><img src="img/sensor.png" width="24"> Sensor</p>
                                        <p><img src="img/land.png" width="24">  Lahan</p>    
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                                                <div>
                                                    <p><strong>Informasi Sensor:</strong></p>
                                                    <p><strong>Aktif : </strong> 1,2,3,4,5,6,7,8,9</p>
                                                    <p><strong>Non Aktif : </strong>-</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

    
    <!-- Gambar -->
    <!-- <img src="img/peta.png" alt="Gambar Anda" class="info-image"> -->

    <!-- Peta -->

    <!-- <div class="background">
        <img src="Lahan.jpeg" alt="Background Image">
    </div> -->


    <!-- style="background-image: url('img/peta.png');" -->
    <div class="mapdiv"
        style="background-image: url('img/Lahan__Luas.jpg'); background-repeat:no-repeat;background-size:contain;width:100%">

        <svg version="1.2" viewbox="-25 -90 830 1050" xmlns="http://www.w3.org/2000/svg">


            <a xlink:title="Kacang Merah
Luas 0.89 Ha
Penanaman 11 September 2023" target="_blank">
                <path
                    d="M386.94889,88.81583L394.15017,84.97515L410.47308,80.17429L445.9994,74.41327L451.52039,72.97301L457.7615,85.21519L459.20175,89.77601
				L453.92081,93.85673L447.6797,95.05695L440.71846,98.65759L438.31804,101.5381L435.19748,102.25823L434.71739,111.85994L438.79812,112.34003
				L445.51932,116.90084L432.07692,123.382L426.07586,129.14302L420.55487,136.58435L420.79492,140.90512L429.91654,135.38414L446.71953,126.02247
				L452.00047,129.86315L437.11782,142.58542L461.1221,181.47235L467.12316,181.95244L471.68398,186.03317L476.00474,188.91368L
				476.96492,195.87492L481.04564,192.99441L486.08654,191.79419L487.5268,197.79526L492.32765,218.43894L489.44714,227.56057L476.96492,232.60147
				L462.08227,236.68219L443.11889,240.04279L437.11782,219.15907L430.39662,203.0762L428.71633,195.87492L419.35466,187.71346L
				409.27286,175.23124L401.11141,161.78884L394.39021,135.62418L390.06945,107.05909L386.94889,88.81583z"
                    id="LKA2448" name="Mahanuvara" style="fill: red;">
                </path>
            </a>

            <svg version="1.2" viewbox="-400 -90 830 1050" xmlns="http://www.w3.org/2000/svg">
            <a xlink:title="Sensor 1 oke oke" target="_blank">
            <path d="M14.83 1.83001L16.24 3.24001C15.6854 3.8 15.0249 4.24401 14.2969 4.54617C13.569 4.84834 12.7882 5.00261 12 5.00001C11.2118 5.00261 10.4311 4.84834 9.70311 4.54617C8.97517 4.24401 8.31464 3.8 7.76001 3.24001L9.18001 1.82001C9.92671 2.57118 10.9409 2.99554 12 3.00001C12.5255 3.00042 13.0458 2.89731 13.5314 2.69655C14.017 2.4958 14.4583 2.20134 14.83 1.83001Z" />
<path d="M17.65 4.65001L19.07 6.07001C17.1951 7.9455 14.6519 8.99944 12 9.00001C9.34804 8.99944 6.80492 7.9455 4.92999 6.07001L6.34999 4.65001C7.0895 5.39597 7.96967 5.98778 8.93951 6.39117C9.90936 6.79455 10.9496 7.0015 12 7.00001C13.0504 7.0015 14.0906 6.79455 15.0605 6.39117C16.0303 5.98778 16.9105 5.39597 17.65 4.65001Z" />
<path fill-rule="evenodd" clip-rule="evenodd" d="M18 11H14C14 11.5304 13.7893 12.0391 13.4142 12.4142C13.0391 12.7893 12.5304 13 12 13C11.4696 13 10.9609 12.7893 10.5858 12.4142C10.2107 12.0391 10 11.5304 10 11H6C5.46957 11 4.96086 11.2107 4.58579 11.5858C4.21071 11.9609 4 12.4696 4 13V22H20V13C20 12.4696 19.7893 11.9609 19.4142 11.5858C19.0391 11.2107 18.5304 11 18 11ZM6 18V15H18V18H6Z" />
<path d="M13 11C13 11.5523 12.5523 12 12 12C11.4477 12 11 11.5523 11 11C11 10.4477 11.4477 10 12 10C12.5523 10 13 10.4477 13 11Z" style="width:20px; height:20px;"/>
            </a>
            </svg>

            <a xlink:title="Kentang
Luas 0.55 Ha
Penanaman 11-12 September 2023" target="_blank">
                Kentang
                <path
                    d="M364.14483,274.12887L374.70671,272.68861
				L396.5506,274.12887L408.31269,277.72951L414.07372,280.12994L421.75509,283.49054L432.79705,280.61003L438.07799,277.48947L
				446.47949,278.2096L456.80133,279.8899L464.24265,288.2914L470.24372,297.41302L472.4041,304.85435L470.00368,309.6552L461.36214,313.73593
				L448.15979,321.17726L436.87778,329.57876L426.79598,335.57983L418.15445,340.62072L408.07265,344.70145L395.83047,349.98239
				L364.14483,274.12887z"
                    id="LKA2449" name="Mātale" style="fill: yellow;">
                </path>
            </a>


            <svg version="1.2" viewbox="-400 -290 830 1050" xmlns="http://www.w3.org/2000/svg">
            <a xlink:title="Sensor 8" target="_blank">
            <path d="M14.83 1.83001L16.24 3.24001C15.6854 3.8 15.0249 4.24401 14.2969 4.54617C13.569 4.84834 12.7882 5.00261 12 5.00001C11.2118 5.00261 10.4311 4.84834 9.70311 4.54617C8.97517 4.24401 8.31464 3.8 7.76001 3.24001L9.18001 1.82001C9.92671 2.57118 10.9409 2.99554 12 3.00001C12.5255 3.00042 13.0458 2.89731 13.5314 2.69655C14.017 2.4958 14.4583 2.20134 14.83 1.83001Z" />
<path d="M17.65 4.65001L19.07 6.07001C17.1951 7.9455 14.6519 8.99944 12 9.00001C9.34804 8.99944 6.80492 7.9455 4.92999 6.07001L6.34999 4.65001C7.0895 5.39597 7.96967 5.98778 8.93951 6.39117C9.90936 6.79455 10.9496 7.0015 12 7.00001C13.0504 7.0015 14.0906 6.79455 15.0605 6.39117C16.0303 5.98778 16.9105 5.39597 17.65 4.65001Z" />
<path fill-rule="evenodd" clip-rule="evenodd" d="M18 11H14C14 11.5304 13.7893 12.0391 13.4142 12.4142C13.0391 12.7893 12.5304 13 12 13C11.4696 13 10.9609 12.7893 10.5858 12.4142C10.2107 12.0391 10 11.5304 10 11H6C5.46957 11 4.96086 11.2107 4.58579 11.5858C4.21071 11.9609 4 12.4696 4 13V22H20V13C20 12.4696 19.7893 11.9609 19.4142 11.5858C19.0391 11.2107 18.5304 11 18 11ZM6 18V15H18V18H6Z" />
<path d="M13 11C13 11.5523 12.5523 12 12 12C11.4477 12 11 11.5523 11 11C11 10.4477 11.4477 10 12 10C12.5523 10 13 10.4477 13 11Z" style="width:20px; height:20px;"/>
            </a>
            </svg>

            <a xlink:title="Kentang
Luas 0.72 Ha
Penanaman 11 September 2023" target="_blank">
                Kentang
                <path
                    d="M314.69603,157.70812L314.69603,156.74794
				L330.2988,146.4261L345.18145,141.14516L354.54312,140.42503L361.50436,137.30448L373.98658,132.50362L386.4688,128.66294L390.54953,152.18713
				L396.07051,173.55094L397.99086,178.11175L409.99299,189.87385L420.07479,195.39483L429.19641,210.75757L425.83581,213.87813
				L408.07265,217.47877L390.78957,218.91903L370.38594,223.95993L348.54205,229.72095L347.58188,225.40018L344.94141,213.87813
				L339.18039,205.71667L329.33863,188.43359L318.05662,170.67043L313.9759,162.50897L314.69603,157.70812z"
                    id="LKA2449" name="Mātale" style="fill: yellow;">
                </path>
            </a>
            <svg version="1.2" viewbox="-345 -170 830 1050" xmlns="http://www.w3.org/2000/svg">
            <a xlink:title="Sensor 4" target="_blank">
            <path d="M14.83 1.83001L16.24 3.24001C15.6854 3.8 15.0249 4.24401 14.2969 4.54617C13.569 4.84834 12.7882 5.00261 12 5.00001C11.2118 5.00261 10.4311 4.84834 9.70311 4.54617C8.97517 4.24401 8.31464 3.8 7.76001 3.24001L9.18001 1.82001C9.92671 2.57118 10.9409 2.99554 12 3.00001C12.5255 3.00042 13.0458 2.89731 13.5314 2.69655C14.017 2.4958 14.4583 2.20134 14.83 1.83001Z" />
<path d="M17.65 4.65001L19.07 6.07001C17.1951 7.9455 14.6519 8.99944 12 9.00001C9.34804 8.99944 6.80492 7.9455 4.92999 6.07001L6.34999 4.65001C7.0895 5.39597 7.96967 5.98778 8.93951 6.39117C9.90936 6.79455 10.9496 7.0015 12 7.00001C13.0504 7.0015 14.0906 6.79455 15.0605 6.39117C16.0303 5.98778 16.9105 5.39597 17.65 4.65001Z" />
<path fill-rule="evenodd" clip-rule="evenodd" d="M18 11H14C14 11.5304 13.7893 12.0391 13.4142 12.4142C13.0391 12.7893 12.5304 13 12 13C11.4696 13 10.9609 12.7893 10.5858 12.4142C10.2107 12.0391 10 11.5304 10 11H6C5.46957 11 4.96086 11.2107 4.58579 11.5858C4.21071 11.9609 4 12.4696 4 13V22H20V13C20 12.4696 19.7893 11.9609 19.4142 11.5858C19.0391 11.2107 18.5304 11 18 11ZM6 18V15H18V18H6Z" />
<path d="M13 11C13 11.5523 12.5523 12 12 12C11.4477 12 11 11.5523 11 11C11 10.4477 11.4477 10 12 10C12.5523 10 13 10.4477 13 11Z" style="width:20px; height:20px;"/>
            </a>
            </svg>

            <a xlink:title="Kentang
Luas 0.27 Ha
Penanaman 12-13 September 2023" target="_blank">
                Kubis
                <path
                    d="M399.67115,358.14385L399.19107,356.94363
            L413.59363,350.70252L423.19534,346.86184L446.23945,337.50017L469.04351,376.62714L420.79492,398.23099L399.67115,358.14385
            z"
                    id="LKA2449" name="Mātale" style="fill: yellow;">
                </path>
            </a>

            <a xlink:title="Kentang
Luas 0.46 Ha
Penanaman 12-13 September 2023" target="_blank">
                Kentang
                <path
                    d="M422.9553,401.83164L470.96385,377.82736
            L482.00581,379.50766L494.24799,411.91343L500.00902,419.11472L508.41051,435.67767L515.85184,444.7993L507.93043,452.00058L
            503.60966,450.80037L486.56663,432.79716L475.28462,429.91664L474.56449,433.75733L458.00154,450.56032L454.16086,467.8434L444.79919,447.43977
            L434.23731,451.28045L430.87671,434.23741L425.11568,419.11472L426.55594,414.5539L422.9553,401.83164z"
                    id="LKA2449" name="Mātale" style="fill: yellow;">
                </path>
            </a>


            <svg version="1.2" viewbox="-440 -400 830 1050" xmlns="http://www.w3.org/2000/svg">
            <a xlink:title="Sensor 9" target="_blank">
            <path d="M14.83 1.83001L16.24 3.24001C15.6854 3.8 15.0249 4.24401 14.2969 4.54617C13.569 4.84834 12.7882 5.00261 12 5.00001C11.2118 5.00261 10.4311 4.84834 9.70311 4.54617C8.97517 4.24401 8.31464 3.8 7.76001 3.24001L9.18001 1.82001C9.92671 2.57118 10.9409 2.99554 12 3.00001C12.5255 3.00042 13.0458 2.89731 13.5314 2.69655C14.017 2.4958 14.4583 2.20134 14.83 1.83001Z" />
<path d="M17.65 4.65001L19.07 6.07001C17.1951 7.9455 14.6519 8.99944 12 9.00001C9.34804 8.99944 6.80492 7.9455 4.92999 6.07001L6.34999 4.65001C7.0895 5.39597 7.96967 5.98778 8.93951 6.39117C9.90936 6.79455 10.9496 7.0015 12 7.00001C13.0504 7.0015 14.0906 6.79455 15.0605 6.39117C16.0303 5.98778 16.9105 5.39597 17.65 4.65001Z" />
<path fill-rule="evenodd" clip-rule="evenodd" d="M18 11H14C14 11.5304 13.7893 12.0391 13.4142 12.4142C13.0391 12.7893 12.5304 13 12 13C11.4696 13 10.9609 12.7893 10.5858 12.4142C10.2107 12.0391 10 11.5304 10 11H6C5.46957 11 4.96086 11.2107 4.58579 11.5858C4.21071 11.9609 4 12.4696 4 13V22H20V13C20 12.4696 19.7893 11.9609 19.4142 11.5858C19.0391 11.2107 18.5304 11 18 11ZM6 18V15H18V18H6Z" />
<path d="M13 11C13 11.5523 12.5523 12 12 12C11.4477 12 11 11.5523 11 11C11 10.4477 11.4477 10 12 10C12.5523 10 13 10.4477 13 11Z" style="width:20px; height:20px;"/>
            </a>
            </svg>

            <a xlink:title="Kacang Merah
Luas 0.1 Ha
Penanaman 31 Agustus - 1 September 2023" target="_blank">
                Kacang Merah
                <path
                    d="M418.15445,443.59908L406.63239,457.52156L374.70671,442.39887L399.9112,414.31386L416.47415,441.67874L418.15445,443.59908z"
                    id="LKA2449" name="Mātale" style="fill: red;">
                </path>
            </a>

            <a xlink:title="Kubis
Luas 0.36 Ha
Penanaman 30 Agustus 2023" target="_blank">
                Kubis
                <path
                    d="M344.22128,432.31707L343.26111,431.83699L343.7412,428.47639L333.17932,422.71536L331.9791,416.2342L338.94034,378.54749L391.5097,376.86719
            L393.67009,382.14813L397.51077,409.99309L369.18573,441.19865L344.22128,432.31707z"
                    id="LKA2449" name="Mātale" style="fill: green;">
                </path>
            </a>

            <a xlink:title="Kubis
Luas 0.11 Ha
Penanaman 31 Agustus - 1 September 2023" target="_blank">
                Kubis
                <path
                    d="M342.30094,435.43763L368.22556,446.4796L361.50436,475.52477L328.85855,465.92306L342.30094,435.43763z"
                    id="LKA2449" name="Mātale" style="fill: green;">
                </path>
            </a>

            <a xlink:title="Kacang  Merah
Luas 0.37 Ha
Penanaman 31 Agustus - 1 September 2023" target="_blank">
                Kacang Merah
                <path
                    d="M370.1459,452.00058L402.79171,464.00272L398.71098,476.48495L397.27073,503.1297L402.79171,526.41385L349.98231,542.25667L328.13842,538.65603
            L348.30201,530.49457L357.42363,502.16952L366.30521,469.76375L370.1459,452.00058z"
                    id="LKA2449" name="Mātale" style="fill: red;">
                </path>
            </a>

            <a xlink:title="Kacang  Merah
Luas 0.3 Ha
Penanaman 31 Agustus - 1 September 2023" target="_blank">
                Kacang Merah
                <path
                    d="M327.65833,470.00379L359.10393,478.16524L342.0609,527.61406L308.45492,533.61513L290.21167,524.25346L284.69068,517.29222L
            295.97269,511.29115L310.37526,493.52798L317.81658,480.80572L327.65833,470.00379z"
                    id="LKA2449" name="Mātale" style="fill: red;">
                </path>
            </a>

            <a xlink:title="Kubis
Luas 0.08 Ha
Penanaman 30 Agustus - 31 Agustus 2023" target="_blank">
                Kubis
                <path
                    d="M322.37739,427.27617L335.57974,432.55711L323.09752,463.28259L310.85534,461.12221L322.37739,427.27617z"
                    id="LKA2449" name="Mātale" style="fill: green;">
                </path>
            </a>

            <a xlink:title="Kacang Merah
Luas 0.26 Ha
Penanaman 31 Agustus - 1 September 2023" target="_blank">
                Kubis
                <path
                    d="M254.4453,517.77231L257.08577,506.73034L261.64658,503.36974L262.36671,500.48922L258.52603,481.76589L264.28705,477.20507L
            279.1697,475.52477L280.85,460.64212L279.88983,451.04041L284.2106,445.27938L290.9318,442.87895L309.17504,442.87895L305.5744,452.72071
            L301.01359,455.60122L299.57333,460.64212L324.05769,470.00379L312.77568,483.20614L301.73372,480.32563L290.45171,476.96503
            L288.77141,481.2858L300.77355,482.9661L303.41402,487.04683L300.05342,493.52798L289.2515,500.72927L277.4894,508.65068L274.1288,520.17273
            L254.4453,517.77231z"
                    id="LKA2449" name="Mātale" style="fill: red;">
                </path>
            </a>

            <a xlink:title="Kubis
Luas 0.43 Ha
Penanaman 31 Agustus 2023" target="_blank">
                Kubis
                <path
                    d="M275.56906,441.19865L273.16863,438.55818L257.8059,427.51622L253.24509,423.19545L254.4453,381.66804L267.64765,373.98667L277.00932,371.82629
            L323.57761,375.90701L321.41722,385.74877L319.97697,402.31172L310.37526,435.43763L308.21487,435.67767L307.2547,437.11793L
            294.77248,429.19652L292.61209,436.15776L275.56906,441.19865z"
                    id="LKA2449" name="Mātale" style="fill: green;">
                </path>
            </a>


            <svg version="1.2" viewbox="-260 -400 830 1050" xmlns="http://www.w3.org/2000/svg">
            <a xlink:title="Sensor 6" target="_blank">
            <path d="M14.83 1.83001L16.24 3.24001C15.6854 3.8 15.0249 4.24401 14.2969 4.54617C13.569 4.84834 12.7882 5.00261 12 5.00001C11.2118 5.00261 10.4311 4.84834 9.70311 4.54617C8.97517 4.24401 8.31464 3.8 7.76001 3.24001L9.18001 1.82001C9.92671 2.57118 10.9409 2.99554 12 3.00001C12.5255 3.00042 13.0458 2.89731 13.5314 2.69655C14.017 2.4958 14.4583 2.20134 14.83 1.83001Z" />
<path d="M17.65 4.65001L19.07 6.07001C17.1951 7.9455 14.6519 8.99944 12 9.00001C9.34804 8.99944 6.80492 7.9455 4.92999 6.07001L6.34999 4.65001C7.0895 5.39597 7.96967 5.98778 8.93951 6.39117C9.90936 6.79455 10.9496 7.0015 12 7.00001C13.0504 7.0015 14.0906 6.79455 15.0605 6.39117C16.0303 5.98778 16.9105 5.39597 17.65 4.65001Z" />
<path fill-rule="evenodd" clip-rule="evenodd" d="M18 11H14C14 11.5304 13.7893 12.0391 13.4142 12.4142C13.0391 12.7893 12.5304 13 12 13C11.4696 13 10.9609 12.7893 10.5858 12.4142C10.2107 12.0391 10 11.5304 10 11H6C5.46957 11 4.96086 11.2107 4.58579 11.5858C4.21071 11.9609 4 12.4696 4 13V22H20V13C20 12.4696 19.7893 11.9609 19.4142 11.5858C19.0391 11.2107 18.5304 11 18 11ZM6 18V15H18V18H6Z" />
<path d="M13 11C13 11.5523 12.5523 12 12 12C11.4477 12 11 11.5523 11 11C11 10.4477 11.4477 10 12 10C12.5523 10 13 10.4477 13 11Z" style="width:20px; height:20px;"/>
            </a>
            </svg>

            <a xlink:title="Kubis
Luas 0.58 Ha
Penanaman 4 September 2023" target="_blank">
                Kubis
                <path
                    d="M252.28492,383.82843L251.56479,428.47639L250.60462,468.80358L240.76286,482.00593L231.4012,492.80786L216.51855,488.96717L
            196.35496,488.24704L188.19351,475.28473L183.87274,462.08238L192.03419,446.4796L210.75752,430.15669L211.95774,421.51515L208.35709,410.71322
            L210.75752,398.23099L232.12133,382.14813L254.4453,381.66804L252.28492,383.82843z"
                    id="LKA2449" name="Mātale" style="fill: green;">
                </path>
            </a>

            <a xlink:title="Kubis
Luas 0.10 Ha
Penanaman 4 September 2023" target="_blank">
                Kubis
                <path
                    d="M289.73158,349.74235L298.37312,360.30423L307.97483,367.50552L319.49688,368.46569L322.61744,372.78646L299.57333,370.38603
            L279.64979,368.70573L269.56799,370.86612L252.28492,381.66804L242.20312,368.22565L289.73158,349.74235z"
                    id="LKA2449" name="Mātale" style="fill: green;">
                </path>
            </a>

            <a xlink:title="Kubis
Luas 0.22 Ha
Penanaman 4 September 2023" target="_blank">
                Kubis
                <path
                    d="M324.53778,368.94577L325.49795,362.46462L331.25898,357.66376L342.78103,347.10188L347.58188,341.34085L348.06197,335.33978
            L356.46346,327.41837L370.86603,318.53679L385.26859,348.06205L374.22662,353.10295L380.70778,372.54642L328.85855,374.22672
            L324.53778,368.94577z"
                    id="LKA2449" name="Mātale" style="fill: green;">
                </path>
            </a>

            <a xlink:title="Kubis
Luas 0.36 Ha
Penanaman 30-31 Agustus 2023" target="_blank">
                Kubis
                <path
                    d="M295.97269,347.82201L309.41509,339.18047L313.9759,334.61965L318.29667,330.29888L319.25684,323.57769L319.49688,315.17619L
            318.53671,306.77469L317.81658,301.25371L320.45705,290.45178L320.21701,284.45071L324.29774,275.80917L328.85855,270.04814L
            345.4215,265.24729L369.42577,315.41623L360.0641,318.77683L347.58188,327.65841L341.58081,337.02008L335.57974,346.38175L326.69816,354.30316
            L320.93714,360.78432L313.73586,363.18475L304.61423,359.10402L295.97269,347.82201z"
                    id="LKA2449" name="Mātale" style="fill: green;">
                </path>
            </a>


            <svg version="1.2" viewbox="-350 -390 830 1050" xmlns="http://www.w3.org/2000/svg">
            <a xlink:title="Sensor 7" target="_blank">
            <path d="M14.83 1.83001L16.24 3.24001C15.6854 3.8 15.0249 4.24401 14.2969 4.54617C13.569 4.84834 12.7882 5.00261 12 5.00001C11.2118 5.00261 10.4311 4.84834 9.70311 4.54617C8.97517 4.24401 8.31464 3.8 7.76001 3.24001L9.18001 1.82001C9.92671 2.57118 10.9409 2.99554 12 3.00001C12.5255 3.00042 13.0458 2.89731 13.5314 2.69655C14.017 2.4958 14.4583 2.20134 14.83 1.83001Z" />
<path d="M17.65 4.65001L19.07 6.07001C17.1951 7.9455 14.6519 8.99944 12 9.00001C9.34804 8.99944 6.80492 7.9455 4.92999 6.07001L6.34999 4.65001C7.0895 5.39597 7.96967 5.98778 8.93951 6.39117C9.90936 6.79455 10.9496 7.0015 12 7.00001C13.0504 7.0015 14.0906 6.79455 15.0605 6.39117C16.0303 5.98778 16.9105 5.39597 17.65 4.65001Z" />
<path fill-rule="evenodd" clip-rule="evenodd" d="M18 11H14C14 11.5304 13.7893 12.0391 13.4142 12.4142C13.0391 12.7893 12.5304 13 12 13C11.4696 13 10.9609 12.7893 10.5858 12.4142C10.2107 12.0391 10 11.5304 10 11H6C5.46957 11 4.96086 11.2107 4.58579 11.5858C4.21071 11.9609 4 12.4696 4 13V22H20V13C20 12.4696 19.7893 11.9609 19.4142 11.5858C19.0391 11.2107 18.5304 11 18 11ZM6 18V15H18V18H6Z" />
<path d="M13 11C13 11.5523 12.5523 12 12 12C11.4477 12 11 11.5523 11 11C11 10.4477 11.4477 10 12 10C12.5523 10 13 10.4477 13 11Z" style="width:20px; height:20px;"/>
            </a>
            </svg>

            <a xlink:title="Kentang
Luas 0.15 Ha
Penanaman 13 September 2023" target="_blank">
                Kubis
                <path
                    d="M337.98017,242.44322L320.93714,245.08369
            L320.45705,234.52181L314.93607,216.99869L309.17504,205.23659L301.49368,191.79419L296.21274,180.0321L288.53137,160.10854L
            296.45278,161.06871L306.05449,172.83081L309.89517,171.6306L326.69816,201.15586L331.9791,217.47877L333.89945,228.04065L337.98017,242.44322
            z"
                    id="LKA2449" name="Mātale" style="fill: yellow;">
                </path>
            </a>

            <a xlink:title="Kubis
Luas 0.98 Ha
Penanaman 4 September 2023" target="_blank">
                Kubis
                <path
                    d="M288.53137,160.10854L290.69175,170.67043L294.05235,179.07192L298.85321,189.39376L308.21487,208.59719L305.09432,212.91796
            L312.05556,228.04065L316.61637,242.92331L315.17611,256.3657L317.3365,265.00724L318.53671,274.36891L313.73586,284.21067L313.9759,294.29247
            L311.33543,306.2946L313.9759,323.0976L305.81445,336.78004L290.69175,344.94149L287.81124,341.10081L282.05021,344.94149L281.81017,348.78218
            L243.88342,361.02436L234.52175,366.54535L241.96308,354.30316L249.4044,346.86184L253.48513,331.01901L250.36457,319.737L253.96521,308.21495
            L257.32581,297.41302L252.52496,282.53037L254.4453,266.92759L293.81231,260.92652L295.49261,253.0051L292.61209,248.68433L275.8091,254.6854
            L256.1256,260.92652L256.36564,248.92438L260.68641,232.36142L261.64658,217.95886L262.12667,208.83723L271.48833,195.39483L
            274.36885,191.79419L276.04915,181.47235L279.40974,170.19034L280.12987,169.71026L288.53137,160.10854z"
                    id="LKA2449" name="Mātale" style="fill: green;">
                </path>
            </a>

            <svg version="1.2" viewbox="-280 -270 830 1050" xmlns="http://www.w3.org/2000/svg">
            <a xlink:title="Sensor 5" target="_blank">
            <path d="M14.83 1.83001L16.24 3.24001C15.6854 3.8 15.0249 4.24401 14.2969 4.54617C13.569 4.84834 12.7882 5.00261 12 5.00001C11.2118 5.00261 10.4311 4.84834 9.70311 4.54617C8.97517 4.24401 8.31464 3.8 7.76001 3.24001L9.18001 1.82001C9.92671 2.57118 10.9409 2.99554 12 3.00001C12.5255 3.00042 13.0458 2.89731 13.5314 2.69655C14.017 2.4958 14.4583 2.20134 14.83 1.83001Z" />
<path d="M17.65 4.65001L19.07 6.07001C17.1951 7.9455 14.6519 8.99944 12 9.00001C9.34804 8.99944 6.80492 7.9455 4.92999 6.07001L6.34999 4.65001C7.0895 5.39597 7.96967 5.98778 8.93951 6.39117C9.90936 6.79455 10.9496 7.0015 12 7.00001C13.0504 7.0015 14.0906 6.79455 15.0605 6.39117C16.0303 5.98778 16.9105 5.39597 17.65 4.65001Z" />
<path fill-rule="evenodd" clip-rule="evenodd" d="M18 11H14C14 11.5304 13.7893 12.0391 13.4142 12.4142C13.0391 12.7893 12.5304 13 12 13C11.4696 13 10.9609 12.7893 10.5858 12.4142C10.2107 12.0391 10 11.5304 10 11H6C5.46957 11 4.96086 11.2107 4.58579 11.5858C4.21071 11.9609 4 12.4696 4 13V22H20V13C20 12.4696 19.7893 11.9609 19.4142 11.5858C19.0391 11.2107 18.5304 11 18 11ZM6 18V15H18V18H6Z" />
<path d="M13 11C13 11.5523 12.5523 12 12 12C11.4477 12 11 11.5523 11 11C11 10.4477 11.4477 10 12 10C12.5523 10 13 10.4477 13 11Z" style="width:20px; height:20px;"/>
            </a>
            </svg>

            <a xlink:title="Kacang Merah
Luas 0.92 Ha
Penanaman 1 September 2023" target="_blank">
                Kubis
                <path
                    d="M609.70855,221.07941L589.785,222.99976L566.02077,212.91796L552.33833,211.23766L543.45675,208.59719L526.8938,161.78884L552.57838,149.30662
            L541.29637,114.74046L534.33513,101.29806L531.9347,97.93746L544.41692,88.81583L536.25547,81.13446L513.69145,96.97729L499.28889,77.05374
            L559.53962,52.08929L569.38137,80.41434L577.30278,108.73939L582.82376,128.66294L596.26616,169.47021L611.1488,218.43894L609.70855,221.07941
            z"
                    id="LKA2449" name="Mātale" style="fill:red;">
                </path>
            </a>

            <svg version="1.2" viewbox="-560 -150 830 1050" xmlns="http://www.w3.org/2000/svg">
            <a xlink:title="Sensor 2" target="_blank">
            <path d="M14.83 1.83001L16.24 3.24001C15.6854 3.8 15.0249 4.24401 14.2969 4.54617C13.569 4.84834 12.7882 5.00261 12 5.00001C11.2118 5.00261 10.4311 4.84834 9.70311 4.54617C8.97517 4.24401 8.31464 3.8 7.76001 3.24001L9.18001 1.82001C9.92671 2.57118 10.9409 2.99554 12 3.00001C12.5255 3.00042 13.0458 2.89731 13.5314 2.69655C14.017 2.4958 14.4583 2.20134 14.83 1.83001Z" />
<path d="M17.65 4.65001L19.07 6.07001C17.1951 7.9455 14.6519 8.99944 12 9.00001C9.34804 8.99944 6.80492 7.9455 4.92999 6.07001L6.34999 4.65001C7.0895 5.39597 7.96967 5.98778 8.93951 6.39117C9.90936 6.79455 10.9496 7.0015 12 7.00001C13.0504 7.0015 14.0906 6.79455 15.0605 6.39117C16.0303 5.98778 16.9105 5.39597 17.65 4.65001Z" />
<path fill-rule="evenodd" clip-rule="evenodd" d="M18 11H14C14 11.5304 13.7893 12.0391 13.4142 12.4142C13.0391 12.7893 12.5304 13 12 13C11.4696 13 10.9609 12.7893 10.5858 12.4142C10.2107 12.0391 10 11.5304 10 11H6C5.46957 11 4.96086 11.2107 4.58579 11.5858C4.21071 11.9609 4 12.4696 4 13V22H20V13C20 12.4696 19.7893 11.9609 19.4142 11.5858C19.0391 11.2107 18.5304 11 18 11ZM6 18V15H18V18H6Z" />
<path d="M13 11C13 11.5523 12.5523 12 12 12C11.4477 12 11 11.5523 11 11C11 10.4477 11.4477 10 12 10C12.5523 10 13 10.4477 13 11Z" style="width:20px; height:20px;"/>
            </a>
            </svg>

            <a xlink:title="Kacang Merah
        Luas 1.71 Ha
        Penanaman 1 September 2023" target="_blank">
                Kubis
                <path
                    d="M562.18009,49.9289L568.66124,45.84817L584.50406,44.888L631.55244,37.68672L635.63316,39.36702L627.23167,55.68993L617.14987,64.81155
            L621.71069,76.81369L649.55564,73.69314L658.67727,92.41648L657.7171,105.37879L669.71923,136.82439L667.55885,149.7867L671.63957,167.78991
            L678.60081,182.43252L681.24128,193.47449L686.28218,202.83616L676.20039,212.43787L673.55992,223.47984L682.68154,229.00083
            L676.20039,241.96314L676.20039,253.48519L657.7171,259.48626L654.11645,253.48519L614.02932,259.00617L599.14667,257.32587L
            589.54496,253.96528L615.22953,241.24301L623.87107,236.20211L627.23167,231.16121L620.75051,224.9201L615.22953,221.5595L605.86786,190.35394
            L599.8668,171.15051L584.50406,121.46165L582.10363,111.6199L572.02184,80.17429L562.18009,49.9289z"
                    id="LKA2449" name="Mātale" style="fill:red;">
                </path>
            </a>

            <svg version="1.2" viewbox="-610 -100 830 1050" xmlns="http://www.w3.org/2000/svg">
            <a xlink:title="Sensor 3" target="_blank">
            <path d="M14.83 1.83001L16.24 3.24001C15.6854 3.8 15.0249 4.24401 14.2969 4.54617C13.569 4.84834 12.7882 5.00261 12 5.00001C11.2118 5.00261 10.4311 4.84834 9.70311 4.54617C8.97517 4.24401 8.31464 3.8 7.76001 3.24001L9.18001 1.82001C9.92671 2.57118 10.9409 2.99554 12 3.00001C12.5255 3.00042 13.0458 2.89731 13.5314 2.69655C14.017 2.4958 14.4583 2.20134 14.83 1.83001Z" />
<path d="M17.65 4.65001L19.07 6.07001C17.1951 7.9455 14.6519 8.99944 12 9.00001C9.34804 8.99944 6.80492 7.9455 4.92999 6.07001L6.34999 4.65001C7.0895 5.39597 7.96967 5.98778 8.93951 6.39117C9.90936 6.79455 10.9496 7.0015 12 7.00001C13.0504 7.0015 14.0906 6.79455 15.0605 6.39117C16.0303 5.98778 16.9105 5.39597 17.65 4.65001Z" />
<path fill-rule="evenodd" clip-rule="evenodd" d="M18 11H14C14 11.5304 13.7893 12.0391 13.4142 12.4142C13.0391 12.7893 12.5304 13 12 13C11.4696 13 10.9609 12.7893 10.5858 12.4142C10.2107 12.0391 10 11.5304 10 11H6C5.46957 11 4.96086 11.2107 4.58579 11.5858C4.21071 11.9609 4 12.4696 4 13V22H20V13C20 12.4696 19.7893 11.9609 19.4142 11.5858C19.0391 11.2107 18.5304 11 18 11ZM6 18V15H18V18H6Z" />
<path d="M13 11C13 11.5523 12.5523 12 12 12C11.4477 12 11 11.5523 11 11C11 10.4477 11.4477 10 12 10C12.5523 10 13 10.4477 13 11Z" style="width:20px; height:20px;"/>
            </a>
            </svg>

            <a xlink:title="Kentang
Luas 0.04 Ha
Penanaman 1 September 2023" target="_blank">
                Kubis
                <path
                    d="M320.93714,245.08369L337.98017,242.44322L343.26111,261.64665L326.45812,266.68754L324.29774,265.00724L322.37739,258.28605
            L321.17718,247.48412L320.93714,245.08369z"
                    id="LKA2449" name="Mātale">
                </path>
            </a>

            <a xlink:title="Demplot
Luas 0.04 Ha
Penanaman 13 September 2023" target="_blank">
                Kubis
                <path
                    d="M320.93714,245.08369L337.98017,242.44322L343.26111,261.64665L326.45812,266.68754L324.29774,265.00724L322.37739,258.28605
            L321.17718,247.48412L320.93714,245.08369z"
                    id="LKA2449" name="Mātale" style="fill:pink;">
                </path>
            </a>

            <a xlink:title="Kentang
Luas 0.04 Ha
Penanaman 1 September 2023" target="_blank">
                Kubis
                <path
                    d="M418.15445,443.59908L416.47415,441.67874
            L399.9112,414.31386L409.99299,403.03185L421.03496,440.23848L418.15445,443.59908z"
                    id="LKA2449" name="Mātale" style="fill:yellow;">
                </path>
            </a>
            <circle cx="302.6" cy="1147.4" id="0">
            </circle>
            <circle cx="616.8" cy="745.3" id="1">
            </circle>
            <circle cx="149.2" cy="439.8" id="2">
            </circle>
        </svg>
    </div>

    <!-- Akhir Peta -->

    <!-- Expertise Start -->
    <div class="container-xxl py-6 pb-5" id="skill">
        <div class="container" style="display: flex; justify-content: center; align-items: center;">


            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">

                <div class="nav nav-pills rounded border border-2 border-primary mb-5">
                    <button class="nav-link w-33 py-3 fs-5 active" data-bs-toggle="pill" href="#tab-1"
                        style="width: 33.33%;">Sensor Information</button>
                    <button class="nav-link w-33 py-3 fs-5" data-bs-toggle="pill" href="#tab-2"
                        style="width: 33.33%;">Photo</button>
                    <button class="nav-link w-33 py-3 fs-5" data-bs-toggle="pill" href="#tab-3"
                        style="width: 33.33%;">Drone</button>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">

                        <!-- Service Start -->
                        <!-- <div class="container-fluid my-5 py-6" id="service"> -->
                        <div class="container">
                            <!-- <div class="row g-5 mb-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="col-lg-12">
                                        <h3 class="parameter" style="font-family: Arial;">Nitrogen, Phosphorus,
                                            Kalium,
                                            pH, Temperature, Electrical Conductivity, Humidity</h3>
                                    </div>
                                </div> -->

                            <div class="row g-4">
                                <!-- Baris Pertama -->
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div style="text-align: center;">
                                    <h4>Nitrogen</h4>
                                    <button class="btn open-modal" data-target="chartNitrogen/charts1.php">
                                        <iframe id="chartFrame" src="chartNitrogen/charts1.php" style="border: none; width: 600px; height: 500px;"></iframe>
                                    </button>
                                    <div id="overlay" class="overlay">
                                        <div id="myModal" class="modal">
                                            <div class="modal-content">
                                                <span class="close">&times;</span>
                                                <iframe id="modal-iframe" src=""></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                                <!-- Kolom Kedua -->
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div style=" text-align: center;">
                                    <h4>Phosphorus</h4>
                                    <button class="btn open-modal" data-target="chartPhosphorus/charts1.php">
                                        <iframe id="chartFrame2" src="chartPhosphorus/charts1.php" style="border: none; width: 600px; height: 500px;"></iframe>
                                    </button>
                                    <div id="myModal2" class="modal">
                                        <div class="modal-content">
                                            <span class="close">&times;</span>
                                            <iframe id="modal-iframe2" src=""></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>


                                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div style=" text-align: center;">
                                    <h4>Kalium</h4>
                                    <button class="btn open-modal" data-target="chartKalium/charts1.php">
                                        <iframe id="chartFrame2" src="chartKalium/charts1.php" style="border: none; width: 600px; height: 500px;"></iframe>
                                    </button>
                                    <div id="myModal2" class="modal">
                                        <div class="modal-content">
                                            <span class="close">&times;</span>
                                            <iframe id="modal-iframe2" src=""></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>


                                <!-- Baris Kedua -->
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div style=" text-align: center;">
                                    <h4>Electrical Conductivity</h4>
                                    <button class="btn open-modal" data-target="chartElectricalConductivity/charts1.php">
                                        <iframe id="chartFrame2" src="chartElectricalConductivity/charts1.php" style="border: none; width: 600px; height: 500px;"></iframe>
                                    </button>
                                    <div id="myModal2" class="modal">
                                        <div class="modal-content">
                                            <span class="close">&times;</span>
                                            <iframe id="modal-iframe2" src=""></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div style=" text-align: center;">
                                    <h4>Humidity</h4>
                                    <button class="btn open-modal" data-target="chartHumidity/charts1.php">
                                        <iframe id="chartFrame2" src="chartHumidity/charts1.php" style="border: none; width: 600px; height: 500px;"></iframe>
                                    </button>
                                    <div id="myModal2" class="modal">
                                        <div class="modal-content">
                                            <span class="close">&times;</span>
                                            <iframe id="modal-iframe2" src=""></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div style=" text-align: center;">
                                    <h4>pH</h4>
                                    <button class="btn open-modal" data-target="chartPh/charts1.php">
                                        <iframe id="chartFrame2" src="chartPh/charts1.php" style="border: none; width: 600px; height: 500px;"></iframe>
                                    </button>
                                    <div id="myModal2" class="modal">
                                        <div class="modal-content">
                                            <span class="close">&times;</span>
                                            <iframe id="modal-iframe2" src=""></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                                <!-- Baris Ketiga -->
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div style=" text-align: center;">
                                    <h4>Temperature</h4>
                                    <button class="btn open-modal" data-target="chartTemperature/charts1.php">
                                        <iframe id="chartFrame2" src="chartTemperature/charts1.php" style="border: none; width: 600px; height: 500px;"></iframe>
                                    </button>
                                    <div id="myModal2" class="modal">
                                        <div class="modal-content">
                                            <span class="close">&times;</span>
                                            <iframe id="modal-iframe2" src=""></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <!-- </div> -->
                        </div>
                        <!-- Service End -->

                    </div>

                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="container">
                            <div class="row g-4">

                                <h5>14 September 2023</h5>
                                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item position-relative">
                                        <a href="Tanaman/14September2023/Kentang1.jpg" data-lightbox="portfolio">
                                            <img class="img-fluid rounded" src="Tanaman/14September2023/Kentang1.jpg" alt="kentan">
                                            <div class="team-text bg-white rounded-end p-4">
                                                <div>
                                                    <h5>Kentang</h5>
                                                    <span>14 September 2023</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item position-relative">
                                        <a href="Tanaman/14September2023/Kentang2.jpg" data-lightbox="portfolio">
                                            <img class="img-fluid rounded" src="Tanaman/14September2023/Kentang2.jpg" alt="">
                                            <div class="team-text bg-white rounded-end p-4">
                                                <div>
                                                    <h5>Kentang</h5>
                                                    <span>14 September 2023</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item position-relative">
                                        <a href="Tanaman/14September2023/Kentang3.jpg" data-lightbox="portfolio">
                                            <img class="img-fluid rounded" src="Tanaman/14September2023/Kentang3.jpg" alt="">
                                            <div class="team-text bg-white rounded-end p-4">
                                                <div>
                                                    <h5>Kentang</h5>
                                                    <span>14 September 2023</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item position-relative">
                                        <a href="Tanaman/14September2023/Kentang4.jpg" data-lightbox="portfolio">
                                            <img class="img-fluid rounded" src="Tanaman/14September2023/Kentang4.jpg" alt="">
                                            <div class="team-text bg-white rounded-end p-4">
                                                <div>
                                                    <h5>Kentang</h5>
                                                    <span>14 September 2023</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <h5>11 September 2023</h5>
                                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item position-relative">
                                        <a href="Tanaman/11September2023/Kentang.jpg" data-lightbox="portfolio">
                                            <img class="img-fluid rounded" src="Tanaman/11September2023/Kentang.jpg" alt="">
                                            <div class="team-text bg-white rounded-end p-4">
                                                <div>
                                                    <h5>Kentang</h5>
                                                    <span>11 September 2023</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item position-relative">
                                        <a href="Tanaman/11September2023/Kubis1.jpg" data-lightbox="portfolio">
                                            <img class="img-fluid rounded" src="Tanaman/11September2023/Kubis1.jpg" alt="">
                                            <div class="team-text bg-white rounded-end p-4">
                                                <div>
                                                    <h5>Kubis</h5>
                                                    <span>11 September 2023</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item position-relative">
                                        <a href="Tanaman/11September2023/Kubis2.jpg" data-lightbox="portfolio">
                                            <img class="img-fluid rounded" src="Tanaman/11September2023/Kubis2.jpg" alt="">
                                            <div class="team-text bg-white rounded-end p-4">
                                                <div>
                                                    <h5>Kubis</h5>
                                                    <span>11 September 2023</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <h5>29 Agustus 2023</h5>
                                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item position-relative">
                                        <a href="Tanaman/29Agustus2023/KacangMerah1.jpg" data-lightbox="portfolio">
                                            <img class="img-fluid rounded" src="Tanaman/29Agustus2023/KacangMerah1.jpg" alt="">
                                            <div class="team-text bg-white rounded-end p-4">
                                                <div>
                                                    <h5>Kacang Merah</h5>
                                                    <span>29 Agustus 2023</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item position-relative">
                                        <a href="Tanaman/29Agustus2023/KacangMerah2.jpg" data-lightbox="portfolio">
                                            <img class="img-fluid rounded" src="Tanaman/29Agustus2023/KacangMerah2.jpg" alt="">
                                            <div class="team-text bg-white rounded-end p-4">
                                                <div>
                                                    <h5>Kacang Merah</h5>
                                                    <span>29 Agustus 2023</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item position-relative">
                                        <a href="Tanaman/29Agustus2023/KacangMerah3.jpg" data-lightbox="portfolio">
                                            <img class="img-fluid rounded" src="Tanaman/29Agustus2023/KacangMerah3.jpg" alt="">
                                            <div class="team-text bg-white rounded-end p-4">
                                                <div>
                                                    <h5>Kacang Merah</h5>
                                                    <span>29 Agustus 2023</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <h5>22 Agustus 2023</h5>
                                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item position-relative">
                                        <a href="Tanaman/22Agustus2023/Kubis1.jpg" data-lightbox="portfolio">
                                            <img class="img-fluid rounded" src="Tanaman/22Agustus2023/Kubis1.jpg" alt="">
                                            <div class="team-text bg-white rounded-end p-4">
                                                <div>
                                                    <h5>Kubis</h5>
                                                    <span>22 Agustus 2023</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item position-relative">
                                        <a href="Tanaman/22Agustus2023/Kubis6.jpg" data-lightbox="portfolio">
                                            <img class="img-fluid rounded" src="Tanaman/22Agustus2023/Kubis6.jpg" alt="">
                                            <div class="team-text bg-white rounded-end p-4">
                                                <div>
                                                    <h5>Kubis</h5>
                                                    <span>22 Agustus 2023</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item position-relative">
                                        <a href="Tanaman/22Agustus2023/Kubis5.jpg" data-lightbox="portfolio">
                                            <img class="img-fluid rounded" src="Tanaman/22Agustus2023/Kubis5.jpg" alt="">
                                            <div class="team-text bg-white rounded-end p-4">
                                                <div>
                                                    <h5>Kubis</h5>
                                                    <span>22 Agustus 2023</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab-3" class="tab-pane fade show p-0">
                        <div class="container">
                            <div class="row g-4">
                                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item position-relative">
                                        <img class="img-fluid rounded" src="img/lahanku.jpg" alt="">
                                        <div class="team-text bg-white rounded-end p-4">
                                            <div>
                                                <span>21 September 2023</span>
                                            </div>
                                            <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1"
                                                href="img/Lahan__Luas.jpg" data-lightbox="portfolio">
                                                <i
                                                    class="fa fa-eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="team-item position-relative">
                                        <img class="img-fluid rounded" src="img/drone.jpg" alt="">
                                        <div class="team-text bg-white rounded-end p-4">
                                            <div>
                                                <span>21 September 2023</span>
                                            </div>
                                            <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1"
                                                href="img/drone.jpg" data-lightbox="portfolio">
                                                <i
                                                    class="fa fa-eye"></i></a>
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
    <!-- Expertise End -->

    <!-- Footer -->

    <!-- End Footer -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/typed/typed.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.dashboard.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var openModalButtons = document.querySelectorAll('.open-modal');
            var modal = document.getElementById('myModal');
            var overlay = document.getElementById('overlay'); // Tambahkan ini
            var modalIframe = document.getElementById('modal-iframe');
            var closeModalButton = modal.querySelector('.close');

            openModalButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var target = this.getAttribute('data-target');
                    modalIframe.src = target;
                    modal.style.display = 'block';
                    overlay.style.display = 'block'; // Tampilkan overlay saat modal muncul
                });
            });

            closeModalButton.addEventListener('click', function() {
                modal.style.display = 'none';
                modalIframe.src = '';
                overlay.style.display = 'none'; // Sembunyikan overlay saat menutup modal
            });

            //Juga, Anda bisa menutup modal dan overlay ketika pengguna mengklik di luar modal
            // window.addEventListener('click', function(event) {
            //     if (event.target == overlay) {
            //         modal.style.display = 'none';
            //         modalIframe.src = '';
            //         overlay.style.display = 'none';
            //     }
            // });

            window.addEventListener('click', function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                    modalIframe.src = ''; // Clear the iframe source
                    overlay.style.display = 'none';
                }
            });

        });
    </script>
</body>

</html>
