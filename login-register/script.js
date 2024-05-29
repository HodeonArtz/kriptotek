// 1.
const btnCambiar = [...document.querySelectorAll(".btn-span")];
const formLogin = document.querySelector(".form-login");
const formRegister = document.querySelector(".form-register");
// 1. Cambia el login a register y register a login si queremos loguearnos en vez de registrarnos (o viceversa)

btnCambiar.forEach((btn) => {
  btn.addEventListener("click", () => {
    formLogin.classList.toggle("esconder-form");
    formRegister.classList.toggle("esconder-form");
  });
});
