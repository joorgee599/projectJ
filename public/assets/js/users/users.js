const password = document.querySelector("#password");
const passwordTwo = document.querySelector("#password_two");

formUser.addEventListener("submit", (e) => {
    e.preventDefault();
    if (password.value !== passwordTwo.value) {
        alert("Las contraseñas no coinciden, por favor verifique.");
        return false;
    }
    document.querySelector("#formUser").submit();
});
