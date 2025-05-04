function emailValidation (){
    const email = document.getElementById('email').value.trim();
    if (!email.includes('@') || !email.includes('.') || email.indexOf('@') > email.lastIndexOf('.')) {
        isValid = false;
        message += 'Please enter a valid email address.\n';
    }
}
function passwordValidation(){
    const password = document.getElementById('password').value;
    if (password.length < 6) {
        isValid = false;
        message += 'Password must be at least 6 characters long.';
    }
}
document.getElementById('login-btn').addEventListener("click",(event)=>{
    if (emailValidation() && passwordValidation()){
        event.preventDefault();
        alert("Login Succesfful");
        window.location.href = "dashboard.html";
    }
})