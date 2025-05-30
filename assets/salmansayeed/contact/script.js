//------------------------------ reset button ------------------------------
document.getElementById('reset-btn').addEventListener('click', () => { 
    
    document.getElementById('fname').value = "";
    document.getElementById('lname').value = "";
    document.getElementById('email').value = "";
    document.getElementById('phone').value = "";
    document.getElementById('msg').value = "";

    
    document.getElementById('fname-error').innerHTML = "";
    document.getElementById('lname-error').innerHTML = "";
    document.getElementById('email-error').innerHTML = "";
    document.getElementById('phone-error').innerHTML = "";
    document.getElementById('msg-error').innerHTML = "";

    document.querySelectorAll('.error-msg').forEach(el => el.classList.remove('show'));
});

//------------------------------ submit button ------------------------------

document.getElementById('contact-form').addEventListener('submit', function (e) {
    const result = validateForm();

    if (!result) {
        e.preventDefault();
    }
    else{
        alert("Your message has been successfully submitted. Thank you for contacting us!");
    }
});


//------------------------------ field validations ------------------------------
const validateForm = () => {
    let isValid = true;

    if (!fnameVal()) isValid = false;
    if (!lnameVal()) isValid = false;
    if (!emailVal()) isValid = false;
    if (!phoneVal()) isValid = false;
    if (!msgVal()) isValid = false;

    return isValid;
};

let fnameVal = () => {
    const fname = document.getElementById("fname").value.trim();
    const fnameError = document.getElementById("fname-error");
    if (fname === "") {
        fnameError.innerHTML = "First Name Can't Be Empty!";
        fnameError.classList.add("show"); 
        return false;
    } else {
        fnameError.innerHTML = "";
        fnameError.classList.remove("show");
        return true;
    }
};

let lnameVal = () => {
    const lname = document.getElementById("lname").value.trim();
    const lnameError = document.getElementById("lname-error");
    if (lname === "") {
        lnameError.innerHTML = "Last Name Can't Be Empty!";
        lnameError.classList.add("show");
        return false;
    } else {
        lnameError.innerHTML = "";
        lnameError.classList.remove("show");
        return true;
    }
};

let emailVal = () => {
    const email = document.getElementById("email").value.trim();
    const emailError = document.getElementById("email-error");

    if (email === "") {
        emailError.innerHTML = "Please enter a valid email!";
        emailError.classList.add("show");
        return false;
    }

    const atIndex = email.indexOf("@");
    const dotIndex = email.lastIndexOf(".");

    if (atIndex <= 0 || atIndex === email.length - 1) {
        emailError.innerHTML = "Please enter a valid email!";
        emailError.classList.add("show");
        return false;
    }

    if (dotIndex <= atIndex + 1 || dotIndex === email.length - 1) {
        emailError.innerHTML = "Please enter a valid email!";
        emailError.classList.add("show");
        return false;
    }

    emailError.innerHTML = "";
    emailError.classList.remove("show");
    return true;
};

let phoneVal = () => {
    const phone = document.getElementById("phone").value.trim();
    const phoneError = document.getElementById("phone-error");

    if (phone.length !== 11 || isNaN(phone)) {
        phoneError.innerHTML = "Please enter a valid 11-digit phone number!";
        phoneError.classList.add("show");
        return false;
    } else {
        phoneError.innerHTML = "";
        phoneError.classList.remove("show");
        return true;
    }
};

let msgVal = () => {
    const msg = document.getElementById("msg").value.trim();
    const msgError = document.getElementById("msg-error");

    if (msg === "") {
        msgError.innerHTML = "Message cannot be empty!";
        msgError.classList.add("show");
        return false;
    } else {
        msgError.innerHTML = "";
        msgError.classList.remove("show");
        return true;
    }
};

document.getElementById('fname').addEventListener('input', fnameVal);
document.getElementById('fname').addEventListener('focus', fnameVal);

document.getElementById('lname').addEventListener('input', lnameVal);
document.getElementById('lname').addEventListener('focus', lnameVal);

document.getElementById('email').addEventListener('input', emailVal);
document.getElementById('email').addEventListener('focus', emailVal);

document.getElementById('phone').addEventListener('input', phoneVal);
document.getElementById('phone').addEventListener('focus', phoneVal);

document.getElementById('msg').addEventListener('input', msgVal);
document.getElementById('msg').addEventListener('focus', msgVal);

document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) 
    .then(result => {
        
        document.getElementById('form-status-msg').textContent = "Submitted successfully!";
        document.getElementById('form-status-msg').style.color = "green";

        
        form.reset();
    })
    .catch(error => {
        document.getElementById('form-status-msg').textContent = "Something went wrong. Please try again.";
        document.getElementById('form-status-msg').style.color = "red";
        console.error('Error:', error);
    });
});



