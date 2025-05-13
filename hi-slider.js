document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        document.querySelectorAll('.hi-slider').forEach(function (slider) {
            var animationType = slider.getAttribute("data-animation");

            new Swiper(slider, {
                loop: true,
                autoplay: { delay: 3000 },
                slidesPerView: 1,
                spaceBetween: 10,
                effect: animationType,
                pagination: {
                    el: slider.querySelector(".swiper-pagination"),
                    clickable: true,
                },
                navigation: {
                    nextEl: slider.querySelector(".swiper-button-next"),
                    prevEl: slider.querySelector(".swiper-button-prev"),
                },
            });
        });
    }, 500);
});
