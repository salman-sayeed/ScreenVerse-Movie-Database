const ball = document.querySelector(".toggle-ball");
const items = document.querySelectorAll(".content-container,.navbar-container,.sidebar,.content-container-box,.footer-container,.footer-color,.toggle");

ball.addEventListener("click", () =>{
    items.forEach(item=>{
        item.classList.toggle("active");
    });

    ball.classList.toggle("active");
})

function showSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'flex'
}

function hideSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'none'
}


