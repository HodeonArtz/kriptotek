"use strict";
const texto = document.querySelector(".efecto");
let totalWidth = 0;

for (const [i, caracter] of Object.entries(texto.textContent)) {
  setTimeout(() => {
    const createSpan = document.createElement("span");
    const createSpan2 = document.createElement("span");
    texto.appendChild(createSpan).appendChild(createSpan2);
    const span = texto.lastElementChild;
    span.lastElementChild.textContent = caracter;
    totalWidth += span.getBoundingClientRect().width;
    texto.style.setProperty("--change-width", `${totalWidth}px`);
  }, 100 * i);
}
texto.firstChild.textContent = "";

/////////////////////////////////////////////////

const imagesElements = document.querySelectorAll(".images > * > *");
for (const [i, element] of Object.entries(imagesElements)) {
  setTimeout(() => {
    element.classList.add("fade-in");
  }, 150 * i);
}

/////////////////////////////////////////////////

const circulo = document.querySelector(".mouse-circulo");
window.addEventListener("mousemove", (e) => {
  circulo.style.setProperty(
    "--pos-m-x",
    `${e.clientX - circulo.offsetWidth / 2}px`
  );
  circulo.style.setProperty(
    "--pos-m-y",
    `${e.clientY - circulo.offsetHeight / 2}px`
  );
});
