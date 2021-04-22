// CAROUSSEL
let btn = document.querySelectorAll(".navigation button");
let carousel = document.querySelector(".carousel_images");
for(let i=1;i<10;i++){
    let img = document.createElement("img");
    img.setAttribute("src",`./images/${i}.png`);
    carousel.appendChild(img);
}
let taille = document.querySelectorAll(".carousel_images img").length;
let translateX = 0;
let cpt=1;

btn.forEach(button  => {
    button.addEventListener("click", event => {
        if(event.target.id === "next"){
            if(cpt !== taille){
                translateX -= 500;
                cpt++;
            }
        }
        else{
            if(cpt !== 1){
                translateX += 500;
                cpt--;
            }
        }
        carousel.style.transform = `translateX(${translateX}px)`;
    })
})
setInterval(()=>{
    if(cpt !== taille){
        translateX -= 500;
        cpt++;
    }
    else{
        translateX = 0;
        cpt = 1;
    }
    carousel.style.transform = `translateX(${translateX}px)`;
},3000);

let scroller = document.querySelector(".scroll");
let apropos = document.querySelector("main #apropos");
let blocs = document.querySelectorAll("main #service .services .bloc");
window.addEventListener("scroll",function(e){
    console.log(e);
    if(window.scrollY > 500){
        scroller.style.visibility = "visible";
        apropos.style.opacity = 1;
    }
    else
        scroller.style.visibility = "hidden";
    if(window.scrollY > 1100){
        blocs.forEach(element => {
            element.style.opacity = 1;
        });
    }
});
scroller.addEventListener("click",(e)=>{
    window.scrollTo(0,0);
})

// Alert accusé de reception

let ferme = document.querySelectorAll("footer #alerte #close");

ferme.forEach(element => {
    element.addEventListener("click",function(){
        let alerte = document.querySelector("footer #alerte");
        alerte.style.display = "none";
    });
});