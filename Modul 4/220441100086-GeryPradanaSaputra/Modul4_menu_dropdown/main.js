const dropdown = document.querySelector(".dropDown");
const list = document.querySelector(".list");
const selector = document.querySelector(".selector");
const gambarnegara = document.querySelector(".gambarnegara");

dropdown.addEventListener("click",()=>{
    list.classList.toggle("show");
})

list.addEventListener("click",(e) =>{
    const img = e.target.querySelector("img");
    const text = e.target.querySelector(".text");

    gambarnegara.src = img.src;
    selector.innerHTML = text.innerHTML;
})