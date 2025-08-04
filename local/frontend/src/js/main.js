// import "@pug/sections/ui/ui-switcher";

import "@pug/components/_ui/sliders/top-banner/script.js";
import "@pug/components/_ui/sliders/infinity-row-slider/script.js";
import "@pug/components/_ui/accordeon/accordeon.js";
import "@pug/components/_ui/sliders/main-slider/script.js";
import "./modules/table-wrapper";

const wrap = document.querySelector(".star-wrapper");
const value =
  parseFloat(wrap.dataset.value) >= 0 ? parseFloat(wrap.dataset.value) : 5;
const stars = wrap.querySelectorAll("svg");
const fullStarsCount = Math.floor(value);
const partialStarRatio = value - fullStarsCount;
const maxWidth = 100;

if (stars.length) {
  const setClipRect = (item, value) => {
    item.setAttribute("width", value);
  };
  stars.forEach((star, index) => {
    const clipRect = star.querySelector("clipPath rect");
    if (index < fullStarsCount) {
      setClipRect(clipRect, maxWidth);
    } else if (index === fullStarsCount && partialStarRatio > 0) {
      setClipRect(clipRect, partialStarRatio * maxWidth);
    } else {
      setClipRect(clipRect, 0);
    }
  });
}

// const wrap = document.querySelector(".star-wrapper");
// const value = wrap.dataset.value;
// const stars = wrap.querySelectorAll("svg");
// let current = 0;
// stars.forEach((star, index) => {
//   // console.log(star, index + 1, Math.floor(value));

//   if (Math.floor(value) >= index + 1) {
//     star.querySelector("clipPath rect").setAttribute("width", 100);
//     current++;
//   }

//   if (value - current !== 0 && index === current) {
//     star
//       .querySelector("clipPath rect")
//       .setAttribute("width", (value - current) * 100);
//   }
// });
