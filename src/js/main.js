let linkComeTop = document.querySelector(".come-to-top");

window.addEventListener("scroll", () => {
    if(window.scrollY > 200) {
        linkComeTop.classList.add("visible");
    } else {
        linkComeTop.classList.remove("visible");
    }
});

linkComeTop.addEventListener("click", function(e) {
    e.preventDefault();

    window.scrollTo({top: 0, behavior: "smooth"});
});

let profileImg = document.querySelector(".profile-img figure");
let menu = document.querySelector(".menu");

profileImg.addEventListener("click", () => {
    if(menu.classList.contains("visible")) {
        menu.classList.remove("visible");
    } else {
        menu.classList.add("visible");
    }
});