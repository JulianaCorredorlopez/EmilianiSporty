const container = document.getElementsById('container');
const registrerBtn = document.getElementsById('register');
const loginBtn = document.getElementsById('login');

registrerBtn.addEventListener('click',() =>{
    container.classList.add("active");
});
loginBtn.addEventListener('click',() =>{
    container.classList.remove("active");
});
