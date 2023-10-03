<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pin Point Gambar</title>
    <style>
        /* Gaya pin point */
        .pin-point {
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: red;
            border-radius: 50%;
            cursor: pointer;
        }
        
        /* Gaya tooltip */
        .tooltip {
            position: absolute;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px;
            border-radius: 5px;
            display: none;
        }

        /* Gaya gambar */
        .image-container {
            position: absolute;
            top: 70px; /* Adjust the top position to match the header height */
            left: 0;
            right: 0; /* Mengatur right ke 0 agar gambar memenuhi lebar layar */
            bottom: 0; /* Mengatur bottom ke 0 agar gambar memenuhi tinggi layar */
            z-index: 1;
            overflow: hidden; /* Menambahkan overflow: hidden agar gambar tidak melewati batas container */
        }

        .image {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Menambahkan properti object-fit: cover; */
        }

         /* Gaya header */
         .header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.7);
            z-index: 2; /* Membuat header di atas gambar */
        }

         /* Gaya logo */
         .logo {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        /* Gaya tulisan "Dashboard" */
        .dashboard-text {
            font-size: 24px;
        }
         /* Gaya container logo */
         .logo-container {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
<div class="header">
    <!-- Tulisan "Dashboard" -->
    <div class="dashboard-text">Dashboard</div>
    <div class="logo-container">
        <!-- Logo Del -->
        <img src="del.jpg" alt="Del Logo" class="logo">
        <!-- Logo Taripar -->
        <img src="taripar.png" alt="Taripar Logo" class="logo">
    </div>
</div>
<div id="image-container">
    <img src="Lahan.jpeg" alt="Gambar" class="image">
    <!-- Tambahkan pin point di bawah ini menggunakan PHP -->
    <?php
    // Anda dapat mengganti koordinat dan teks tooltip sesuai kebutuhan Anda
    $pinpoints = [
       
    ];

    foreach ($pinpoints as $point) {
        echo '<div class="pin-point" style="left:' . $point["x"] . 'px; top:' . $point["y"] . 'px;"></div>';
        echo '<div class="tooltip" style="left:' . ($point["x"] + 25) . 'px; top:' . ($point["y"] - 15) . 'px;">' . $point["text"] . '</div>';
    }
    ?>
</div>

<script>
    // Menampilkan dan menyembunyikan tooltip saat mengarahkan cursor mouse
    const pinpoints = document.querySelectorAll('.pin-point');
    const tooltips = document.querySelectorAll('.tooltip');

    pinpoints.forEach((pinpoint, index) => {
        pinpoint.addEventListener('mouseover', () => {
            tooltips[index].style.display = 'block';
        

    // Menampilkan gambar di bawah pin point
    const image = document.querySelector('.image');
            image.style.opacity = 1;
        });

        pinpoint.addEventListener('mouseout', () => {
            tooltips[index].style.display = 'none';

        // Menyembunyikan gambar di bawah pin point
        const image = document.querySelector('.image');
            image.style.opacity = 0;
        });
    });
</script>
</body>
</html>
