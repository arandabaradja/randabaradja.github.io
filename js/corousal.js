const carouselContainer = document.querySelector('.carousel-container');
        let currentIndex = 0;

        function nextSlide() {
            currentIndex = (currentIndex + 1) % 3; // Jumlah slide (3) harus disesuaikan
            updateCarousel();
        }

        function updateCarousel() {
            const translateValue = currentIndex * -100;
            carouselContainer.style.transform = `translateX(${translateValue}%)`;
        }

        setInterval(nextSlide, 5000); // Mengganti slide setiap 5 detik