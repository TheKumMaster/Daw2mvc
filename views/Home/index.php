<div class="container-fluid px-3 px-lg-4 my-4">
    <div id="heroVideoCarousel" class="carousel slide hero-carousel rounded-4 overflow-hidden shadow-lg" data-bs-interval="false">

        <div class="carousel-inner h-100">

            <div class="carousel-item active h-100">
                <video class="hero-video" autoplay muted playsinline>
                    <source src="<?= url ?>assets/video/video1.mp4" type="video/mp4">
                </video>
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <h1 class="display-4 fw-bold text-uppercase text-white lh-1 mb-3">
                        LA NOCHE EMPIEZA<br>AQUÍ
                    </h1>
                    <p class="text-white-50 fs-6 mb-4">
                        Descubre el sabor legendario de Yeahgermeister. Haz de esta noche un recuerdo.
                    </p>
                    <a href="<?= url ?>?controller=producto&action=index" class="btn btn-light rounded-3 px-4 py-3 fw-bold text-uppercase hero-btn">
                        Ver la Carta
                    </a>
                </div>
            </div>

            <div class="carousel-item h-100">
                <video class="hero-video" muted playsinline>
                    <source src="<?= url ?>assets/video/video2.mp4" type="video/mp4">
                </video>
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <h1 class="display-4 fw-bold text-uppercase text-white lh-1 mb-3">
                        BURGERS SIN<br>LÍMITES
                    </h1>
                    <p class="text-white-50 fs-6 mb-4">
                        Carne a la parrilla, queso fundido y nuestra salsa secreta.
                    </p>
                    <a href="<?= url ?>?controller=producto&action=index" class="btn btn-light rounded-3 px-4 py-3 fw-bold text-uppercase hero-btn">
                        Pedir Ahora
                    </a>
                </div>
            </div>

        </div>

        <div class="hero-controls d-flex align-items-center gap-3">
            <button class="hero-arrow" type="button" data-bs-target="#heroVideoCarousel" data-bs-slide="prev" aria-label="Anterior">
                &#8592;
            </button>

            <div class="carousel-indicators position-static m-0 gap-2">
                <button type="button" data-bs-target="#heroVideoCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
                <button type="button" data-bs-target="#heroVideoCarousel" data-bs-slide-to="1"></button>
            </div>

            <button class="hero-arrow" type="button" data-bs-target="#heroVideoCarousel" data-bs-slide="next" aria-label="Siguiente">
                &#8594;
            </button>
        </div>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const carouselEl = document.getElementById("heroVideoCarousel");
    const carousel = new bootstrap.Carousel(carouselEl, {
        interval: false,
        wrap: true
    });

    const videos = carouselEl.querySelectorAll("video");

    videos.forEach(video => {
        video.addEventListener("ended", () => {
            carousel.next();
        });
    });

    carouselEl.addEventListener("slid.bs.carousel", () => {
        videos.forEach(video => {
            video.pause();
            video.currentTime = 0;
        });

        const activeVideo = carouselEl.querySelector(".carousel-item.active video");
        if (activeVideo) {
            activeVideo.play();
        }
    });
});
</script>