const navbar = document.getElementById('navbar');
const navbarToggler = document.getElementById('navbarToggler');
let timerId;
let lastScrollY = 0;
window.addEventListener('scroll', (e) => {
    clearTimeout(timerId);

    // スクロール後、しばらくして処理を行う
    timerId = setTimeout(() => {
        if(window.scrollY < 90 || lastScrollY > window.scrollY) {
            navbar.classList.remove('transparent');
        } else {
            navbar.classList.add('transparent');
            navbarToggler.classList.remove('show');
        }
        lastScrollY = window.scrollY;
    }, 10);
});