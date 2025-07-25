import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";
import "swiper/css";
import "swiper/css/pagination";

const sliders = document.querySelectorAll(".main-slider");

if (sliders.length) {
	sliders.forEach((slider) => {
		const btnNext = slider.parentNode.querySelector(".swiper-button-next");
		const btnPrev = slider.parentNode.querySelector(".swiper-button-prev");
		const pagination = slider.parentNode.querySelector(".swiper-pagination");

		new Swiper(slider, {
			modules: [Navigation, Pagination],
			slidesPerView: slider.classList.contains("--js--auto-fill") ? "auto" : 1,
			spaceBetween: 20,
			centeredSlidesBounds: true,

			breakpoints: {
				680: {
					slidesPerView: slider.classList.contains("--js--auto-fill")
						? "auto"
						: 2,
				},
				1024: {
					slidesPerView: slider.classList.contains("--js--auto-fill")
						? "auto"
						: 3,
				},
			},

			navigation: {
				nextEl: btnNext ? btnNext : null,
				prevEl: btnPrev ? btnPrev : null,
			},

			pagination: {
				el: pagination ? pagination : null,
				dynamicBullets: pagination && pagination.dataset.dynamic ? true : false,
				clickable: true,
			},
		});
	});
}
