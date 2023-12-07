const btnOpenSideBar = document.querySelector('.icon-menu');
const sideBar = document.querySelector('.side__bar');
const overlay = document.querySelector('#overlay');
const btnCloseSideBar = document.querySelector('.close-btn');

console.log(btnCloseSideBar);

btnOpenSideBar.addEventListener('click', function (e) {
    sideBar.classList.toggle("active");
    overlay.style.display = 'block';
    sideBar.style.animationName = "openNav";
})

btnCloseSideBar.addEventListener('click', function (e) {
    sideBar.style.animationName = "closeNav";

    setTimeout(function () {
        sideBar.classList.remove("active");
        overlay.style.display = 'none';
    }, 350)
})

overlay.addEventListener('click', function (e) {

    sideBar.style.animationName = "closeNav";

    setTimeout(function () {
        sideBar.classList.remove("active");
        overlay.style.display = 'none';
    }, 350)
})