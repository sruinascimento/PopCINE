const input = document.querySelectorAll("input");
const divInput = document.querySelectorAll(".container-input");

input.forEach((elemento)=>{
    elemento.addEventListener("focus", ()=>{
        elemento.parentNode.classList.add("focus");
        elemento.parentNode.firstChild.nextSibling.classList.add("ico");

    });
    elemento.addEventListener("focusout",()=>{
        elemento.parentNode.classList.remove("focus");
        elemento.parentNode.firstChild.nextSibling.classList.remove("ico");
    });
})
