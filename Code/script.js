document.addEventListener("DOMContentLoaded", function () {
    const navbarElements = document.getElementsByClassName("navigation");

    if (navbarElements.length > 0) {
        const navbar = navbarElements[0];

        window.addEventListener("scroll", function () {
            if (window.scrollY > 0) {
                navbar.style.backgroundColor = "#ffffff";
                navbar.style.borderBottom = "solid 2px #cccccc";
                navbar.style.boxShadow = "rgba(0, 0, 0, 0.5)";
            } else {
                navbar.style.backgroundColor = "transparent";
                navbar.style.borderBottom = "none";
            }
        });
    }
});

function myFunction(x) {
    x
        .classList
        .toggle('change');
}

document
    .querySelectorAll(".menuLink")
    .forEach(function (link) {
        link.addEventListener("click", function (event) {
            event.preventDefault();

            var targetId = link.getAttribute("data-target");
            var targetDiv = document.getElementById(targetId);
            var bodyRect = document
                .body
                .getBoundingClientRect();
            var targetRect = targetDiv.getBoundingClientRect();
            var offset = targetRect.top - bodyRect.top;

            var scrollDirection = offset < window.innerHeight / 2
                ? "start"
                : "end";

            window.scrollTo({
                top: scrollDirection === "start"
                    ? 0
                    : offset,
                behavior: "smooth"
            });
        });
    });

function submitFunction() {
    openPopUp();
    return false;
}
const popUp = document.getElementById('pop-up');
const form = document.getElementById('registrationForm');
const text = document.getElementById("text");
function openPopUp() {

    popUp.style.display = 'block';
    form.style.display = 'none';
    text.style.display = 'none';
}
function closePopUp() {
    popUp.style.display = 'none';
    form.style.display = 'block';
    text.style.display = 'block';
    form.reset();
}
