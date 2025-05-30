function emailValidation() {
    const email = document.getElementById('email').value.trim();
    if (!email.includes('@') || !email.includes('.') || email.indexOf('@') > email.lastIndexOf('.')) {
        return 'Please enter a valid email address.\n';
    }
    return '';
}

function passwordValidation() {
    const password = document.getElementById('password').value;
    if (password.length < 6) {
        return 'Password must be at least 6 characters long.\n';
    }
    return '';
}

document.getElementById('login-btn').addEventListener("click", function (event) {
    event.preventDefault();

    let errorMessage = emailValidation() + passwordValidation();
    if (errorMessage !== '') {
        alert(errorMessage);
        return;
    }

    // Prepare data
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
    const remember = document.querySelector('input[name="remember"]').checked;

    // AJAX Request
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../../controller/mdsanjidhasan/login validation.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (xhr.status === 200) {
            if (xhr.responseText === 'success') {
                alert("Login Successful!");
                window.location.href = "../../view/mdsanjidhasan/dashboard.php";
            } else {
                alert("Login failed: " + xhr.responseText);
            }
        } else {
            alert("Server error. Please try again.");
        }
    };

    const data = `username=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}&remember=${remember}`;
    xhr.send(data);
});
