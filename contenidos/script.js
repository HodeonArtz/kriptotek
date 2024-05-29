// Coge la altura de los h2 de la seccion de .tablas
const titulos = document.querySelectorAll(".tablas .titulo");
const tablas = document.querySelectorAll(".tablas > *");
const flechas = document.querySelectorAll(".despliegue");

for (const titulo of titulos) {
  // console.log(titulo.offsetHeight);
}

setTimeout(() => {
  tablas.forEach((tabla, i) => {
    window.addEventListener("resize", function () {
      // tabla.style.setProperty("--table-height", `${tabla.offsetHeight}px`);
      const estilosTitulo = window.getComputedStyle(titulos[i]);
      tabla.style.setProperty(
        "--h2-height",
        `${
          +estilosTitulo.height.slice(0, -2) +
          +estilosTitulo.paddingTop.slice(0, -2) * 2
        }px`
      );
    });
  });
  for (const [i, tabla] of Object.entries(tablas)) {
    const estilosTitulo = window.getComputedStyle(titulos[i]);

    tabla.style.setProperty("--table-height", `${tabla.offsetHeight}px`);
    tabla.style.setProperty(
      "--h2-height",
      `${
        +estilosTitulo.height.slice(0, -2) +
        +estilosTitulo.paddingTop.slice(0, -2) * 2
      }px`
    );
    tabla.classList.add("cerrado");
    flechas[i].classList.remove("girar");
    titulos[i].addEventListener("click", () => {
      tabla.style.setProperty(
        "--h2-height",
        `${
          +estilosTitulo.height.slice(0, -2) +
          +estilosTitulo.paddingTop.slice(0, -2) * 2
        }px`
      );
      tabla.classList.toggle("cerrado");
      flechas[i].classList.toggle("girar");
      for (const tabla2 of tablas) {
        if (tabla2 != tabla) tabla2.classList.add("cerrado");
      }
      for (const flecha of flechas) {
        if (flecha != flechas[i]) flecha.classList.remove("girar");
      }
    });
  }
}, 500);

// Animación de flecha cuando el raton pasa por encima
const flechasDer = document.querySelectorAll(".tablas .fa-arrow-right");
const botones = document.querySelectorAll(".boton");
for (const [i, flecha] of Object.entries(flechasDer)) {
  botones[i].addEventListener("mouseover", () => {
    flecha.classList.add("flecha-hover-der");
  });
  botones[i].addEventListener("mouseout", () => {
    flecha.classList.remove("flecha-hover-der");
  });
}
const btnAnterior = document.querySelector(".anterior");
const flechaAnterior = document.querySelector(".anterior i");
if (btnAnterior && flechaAnterior) {
  btnAnterior.addEventListener("mouseover", () => {
    flechaAnterior.classList.add("flecha-hover-izq");
  });
  btnAnterior.addEventListener("mouseout", () => {
    flechaAnterior.classList.remove("flecha-hover-izq");
  });
}
const btnSiguiente = document.querySelector(".siguiente");
const flechaSiguiente = document.querySelector(".siguiente i");
if (btnSiguiente && flechaSiguiente) {
  btnSiguiente.addEventListener("mouseover", () => {
    flechaSiguiente.classList.add("flecha-hover-der");
  });
  btnSiguiente.addEventListener("mouseout", () => {
    flechaSiguiente.classList.remove("flecha-hover-der");
  });
}
// Animación tablas
const filas = document.querySelectorAll("tr, h1, .flechas-navegar > *, nav a");
for (const [i, fila] of Object.entries(filas)) {
  setTimeout(function () {
    fila.classList.add("show");
  }, 30 * i);
}
console.log();
//Efecto antes de entrar al enlace
const enlaces = document.querySelectorAll("a");

for (const enlace of enlaces) {
  const valor = enlace.getAttribute("href");
  enlace.setAttribute("data-href", valor);
  enlace.removeAttribute("href");
  enlace.addEventListener("click", () => {
    for (const [i, fila] of Object.entries(filas)) {
      setTimeout(function () {
        fila.classList.add("hidden");
      }, 30 * i);
      setTimeout(() => {
        location.replace(enlace.dataset.href);
      }, 30 * (filas.length + 1));
    }
  });
}

// Ordenar tabla
const theads = [...document.querySelectorAll("th")];
/* console.log(theads); */
const rows = [...document.querySelectorAll("tbody tr:not(.alta)")];
const tbody = document.querySelector("tbody");

let rowsActivo = [...document.querySelectorAll("tbody tr:not(.alta)")];

//////////////////

const selCol = document.querySelector("#select-columna"),
  selCat = document.querySelector("#select-categoria"),
  selColOpt = document.querySelector(".select-opt");
const cols = [];
/* console.log(selCol); */

theads.forEach((thead, key) => {
  const opt = document.createElement("option");
  const cells = rows.map((row) => row.children[key]);
  const thText = thead.textContent;
  //
  cols.push({
    [thText]: Array.from(new Set(cells.map((cell) => cell.textContent))),
  });
  //
  opt.setAttribute("value", thText);
  opt.textContent = thText;
  selCol.appendChild(opt);
  //
});
selCol?.addEventListener("change", (e) => {
  const valor = e.target.value;
  const mostrarCatgs = () => cols.find((col) => Object?.keys(col)[0] === valor);
  const colCatgs = mostrarCatgs()
    ? Object.values(mostrarCatgs()).flat()
    : ["Seleccionar categoría"];

  selCat.innerHTML = mostrarCatgs()
    ? '<option value="nothing">Seleccionar categoría</option>'
    : "";
  colCatgs.forEach((catg) => {
    const opt = document.createElement("option");
    opt.setAttribute("value", catg);
    opt.textContent = catg;
    selCat.appendChild(opt);
  });
  // console.log(colCatgs);
  rows.forEach((tr) => tbody.appendChild(tr));
  quitarFlechas(true);
  selColOpt.textContent =
    valor === "nothing" ? "Seleccionar columna" : "Restablecer filtro";
  rowsActivo = [...document.querySelectorAll("tbody tr:not(.alta)")];
});
selCat?.addEventListener("change", (e) => {
  const valor = e.target.value;
  const rowsFiltrados = rows.filter((row) =>
    [...row.children].find((td) => td.textContent === valor)
  );
  tbody.innerHTML = "";
  valor !== "nothing"
    ? rowsFiltrados.forEach((row) => tbody.appendChild(row))
    : rows.forEach((tr) => tbody.appendChild(tr));
  // console.log(valor);
  rowsActivo = [...document.querySelectorAll("tbody tr:not(.alta)")];
});
// console.log(cols);
/////////////////////////////

////
const colIsNumber = (colN) =>
  rows
    .map((row) => Number(row.children[colN].textContent))
    .every((data) => data >= 0 ?? data <= 0);
// console.log(colIsNumber(0));

let estado = 0;
const estados = new Array(theads.length).fill(0);
// console.log(estados);

theads.forEach((th) => {
  const flechita = document.createElement("i");
  flechita.className = "fa-solid fa-caret-";
  th.appendChild(flechita);
});
const flechasOrdenar = [...document.querySelectorAll("th i")];
const quitarFlechas = (quitarEstados) => {
  quitarEstados ? estados.fill(0) : "";
  flechasOrdenar.forEach((flecha) => (flecha.className = "fa-solid fa-caret-"));
};
// console.log(flechasOrdenar);
theads.forEach((th, key) => {
  th.addEventListener("click", () => {
    quitarFlechas();
    for (let i = 0; i < estados.length; i++) {
      if (estados[i] !== estados[key]) estados[i] = 0;
    }
    estados[key] === 2 ? (estados[key] = 0) : (estados[key] += 1);
    estados[key] === 0
      ? rowsActivo.forEach((tr) => tbody.appendChild(tr))
      : colIsNumber(key)
      ? rowsActivo
          .slice()
          .sort((a, b) =>
            estados[key] === 1
              ? a.children[key].textContent - b.children[key].textContent
              : b.children[key].textContent - a.children[key].textContent
          )
          .forEach((tr) => tbody.appendChild(tr))
      : rowsActivo
          .slice()
          .sort((a, b) => {
            if (a.children[key].textContent < b.children[key].textContent)
              return estados[key] === 1 ? -1 : 1;
            else if (a.children[key].textContent > b.children[key].textContent)
              return estados[key] === 1 ? 1 : -1;
            else return 0;
          })
          .forEach((tr) => tbody.appendChild(tr));
    flechasOrdenar[key].className = `fa-solid fa-caret-${
      estados[key] === 0 ? "" : estados[key] === 1 ? "up" : "down"
    }`;
    /* console.log(rows);
    console.log(estado); */
    // console.log(estados);
  });
});
