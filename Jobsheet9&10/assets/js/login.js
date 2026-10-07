const formLogin = document.querySelector(".js-form-login");
const btnLogin = document.querySelector(".js-btn-login");

formLogin.addEventListener("submit", (e) =>{
    e.preventDefault();
    window.location.href = "index.html"; 

});