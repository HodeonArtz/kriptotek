"use strict";
// Ajuste para el espacio de la barra de navegación
const nav = document.querySelector("nav");
const secciones = document.querySelectorAll(".seccion");
const fondo = document.querySelector(".fondo");
/* console.log(nav.offsetHeight, primeraSeccion); */
fondo
  ? fondo.style.setProperty("--nav-height", `${nav.offsetHeight}px`)
  : console.warn("no hay fondo");
for (const seccion of secciones) {
  seccion.style.setProperty("--nav-height", `${nav.offsetHeight}px`);
}

// Ajuste para el scroll con la barra de navegación
const scroll = document.querySelector("html");
scroll.style.setProperty(
  "--nav-height",
  `${
    nav.offsetHeight +
    Number(
      getComputedStyle(nav)
        .getPropertyValue("border-bottom-width")
        .replace(/px/gi, "")
    )
  }px`
);

// Coje el año actual y lo añade al copyright

const year = new Date().getFullYear();
const copy = document.querySelector(".copy");

copy
  ? (copy.textContent += ` ${new Date().getFullYear()}`)
  : console.warn("no hay copy");

// Coje los enlaces de la barra de navegación y los pone en el footer
const enlacesNav = document.querySelector("nav .enlaces");
const enlacesFot = document.querySelector("footer .enlaces");

enlacesFot
  ? (enlacesFot.innerHTML = enlacesNav.innerHTML)
  : console.warn("no hay footer.enlaces");

// Boton back-to-top para volver arriba

const backToTop = document.querySelector(".back-to-top");
if (backToTop && secciones[1]) {
  backToTop.addEventListener("click", () => {
    window.scrollY >=
    secciones[1].offsetTop - secciones[1].offsetHeight / 4 - nav.offsetHeight
      ? window.scrollTo(0, 0)
      : 0;
  });
  window.addEventListener("scroll", () => {
    if (
      window.scrollY >=
      secciones[1].offsetTop - secciones[1].offsetHeight / 4 - nav.offsetHeight
    ) {
      backToTop.classList.remove("back-hidden");
    } else {
      backToTop.classList.add("back-hidden");
    }
    if (window.scrollY >= secciones[0].offsetHeight / 2 - nav.offsetHeight) {
      nav.setAttribute("id", "nav-op");
    } else {
      nav.removeAttribute("id", "nav-op");
    }
  });
} else {
  console.warn("no hay botón para volver arriba");
}

// Ajustar la altura del .listado-tablas

const footer = document.querySelector("footer");
const praSeccion = document.querySelector(".seccion:nth-child(1)");
praSeccion?.style.setProperty(
  "--nav-height-2",
  `${
    nav.offsetHeight +
    Number(window.getComputedStyle(nav).paddingBlock.replace(/px/gi, "")) * 2 +
    Number(
      window.getComputedStyle(nav).borderWidth.split(" ")[2].replace(/px/gi, "")
    )
  }px`
);
praSeccion?.style.setProperty("--height-wo-fot", `${footer.offsetHeight}px`);

// mostrar la página después de que se cargue;
window.addEventListener(
  "load",
  () => (document.querySelector("body").style.opacity = 1)
);
