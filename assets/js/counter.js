const product = document.querySelector(".c-product");
const category = document.querySelector(".c-category");
const user = document.querySelector(".c-user");
const bill = document.querySelector(".c-bill");

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
counterUp(category, 1000);
counterUp(user, 9900);
counterUp(bill, 12000);
