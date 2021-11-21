const btnAdminLogin = document.querySelector('#btnAdminLogin');
const adminUserName = document.querySelector('#adminUserName');
const adminPassword = document.querySelector('#adminPassword');


btnAdminLogin.addEventListener('click', () => {
    console.log(adminUserName.value);
    window.location.href = "index.php?adminUser=" + adminUserName.value;
});