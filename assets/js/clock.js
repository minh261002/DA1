const targetTime = new Date("2023-11-20T20:18:00").getTime();
const x = setInterval(function () {
  const now = new Date().getTime();
  const timeRemaining = targetTime - now;

  if (timeRemaining <= 0) {
    clearInterval(x);
    const flashsaleItems = document.querySelectorAll(".flashsale-item");
    flashsaleItems.forEach((item) => {
      item.style.display = "none";
    });
    document.querySelector(".count_down").style.display = "none";
    document.querySelector(".flash-end").innerText = "Chương Trình Đã Kết Thúc";
  } else {
    const hours = Math.floor(timeRemaining / (1000 * 60 * 60));
    const minutes = Math.floor(
      (timeRemaining % (1000 * 60 * 60)) / (1000 * 60)
    );
    const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

    document.querySelector(".hours p").innerHTML = hours;
    document.querySelector(".minutes p").innerHTML = minutes;
    document.querySelector(".seconds p").innerHTML = seconds;
  }
}, 1000);
