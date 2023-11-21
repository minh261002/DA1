const product = document.querySelector(".c-product h3");
const user = document.querySelector(".c-user h3");
const bill = document.querySelector(".c-bill h3");

function counterUp(el, to) {
  let speed = 500;
  let from = 0;
  let step = to / speed;
  const counter = setInterval(function () {
    from += step;
    if (from > to) {
      clearInterval(counter);
      el.innerText = to;
    } else {
      el.innerText = Math.ceil(from);
    }
  }, 1);
}

counterUp(product, 3300);
counterUp(user, 9900);
counterUp(bill, 12000);
