//crear columna borrar

document
  .querySelector("thead tr")
  .appendChild(document.createElement("th")).textContent = "Borrar";
[...document.querySelectorAll("tbody tr")]?.forEach((row) => {
  row !== document.querySelector(".alta")
    ? row.insertAdjacentHTML(
        "beforeend",
        `
        <td class="borrar">
    <button>
      <i class="fa-regular fa-circle-xmark"></i>
    </button>
    </td>
    `
      )
    : row === document.querySelector(".alta")
    ? row.insertAdjacentHTML(
        "beforeend",
        `
                  <td class="añadir">
                    <button type="submit" form="altaForm">
                      <i class="fa-solid fa-plus"></i>
                    </button>
                  </td>
      `
      )
    : 0;
});

// borrrar
const btnsBorrar = [...document.querySelectorAll(".borrar")],
  cellsPriKeys = [...document.querySelectorAll(".p-key")];

const inputBorrar = document.querySelector(".delete-value");

const formBaja = document.querySelector(".form-baja"),
  overlayOscuroBaja = document.querySelector(".form-baja .overlay"),
  btnNoBorrar = document.querySelector(".no-borrar");

btnsBorrar?.forEach((btn, i) => {
  btn?.addEventListener("click", () => {
    inputBorrar.value = cellsPriKeys[i].textContent
      .replace(/[\n\r]+|[\s]{2,}/g, " ")
      .trim();
    formBaja?.classList.remove("esconder-mensaje");
  });
});

const esconderMensaje = () => formBaja?.classList.add("esconder-mensaje");

overlayOscuroBaja?.addEventListener("click", esconderMensaje);

// console.log(btnsBorrar);
// console.log(cellsPriKeys);

// Poner la hora en el input
const inputDate = document.querySelector(`.fechahoraReal`);
if (inputDate)
  setInterval(
    () => (inputDate.value = new Date().toISOString().slice(0, 16)),
    1000
  );
// console.log(new Date());
