<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel</title>
    <style>
        .carousel-container {
            display: flex;
            overflow: hidden;
        }

        .carousel-item {
            flex: 1;
            min-width: 100%;
            transition: transform 0.5s ease;
        }

        button {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="carousel-container">
        <div class="carousel-item">
            <img src="1.jpeg" alt="Image 1">
        </div>
        <div class="carousel-item">
            <img src="2.jpeg" alt="Image 2">
        </div>
        <!-- Tambahkan lebih banyak item carousel di sini -->

        <button id="prevButton">Previous</button>
        <button id="nextButton">Next</button>
    </div>

    <script>
        const carousel = document.querySelector('.carousel-container');
        const items = document.querySelectorAll('.carousel-item');
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');
        let currentIndex = 0;

        // Fungsi untuk menampilkan item yang sesuai
        function showItem(index) {
            items.forEach((item, i) => {
                item.style.transform = `translateX(${(i - index) * 100}%)`;
            });
        }

        // Tampilkan item pertama saat halaman dimuat
        showItem(currentIndex);

        // Tombol "Previous"
        prevButton.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            showItem(currentIndex);
        });

        // Tombol "Next"
        nextButton.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % items.length;
            showItem(currentIndex);
        });
    </script>
</body>
</html>
