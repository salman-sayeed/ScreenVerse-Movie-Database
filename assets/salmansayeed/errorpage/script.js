const ball = document.querySelector(".toggle-ball");
const items = document.querySelectorAll(".content-container,.navbar-container,.content-container-box,.contact-box,.toggle");

ball.addEventListener("click", () =>{
    items.forEach(item=>{
        item.classList.toggle("active");
    });

    ball.classList.toggle("active");
})




