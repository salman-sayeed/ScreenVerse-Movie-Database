const validateForm = () => {
    let isValid = true;

    if (!linkVal()) isValid = false;
    if (!msgVal()) isValid = false;

    return isValid;
};

let linkVal = () => {
    const tLink = document.getElementById("textboxlink").value.trim();
    const lError = document.getElementById("link-error");

    if (tLink === "") {
        lError.innerHTML = "Please enter the section link!";
        return false;
    } else {
        lError.innerHTML = "";
        return true;
    }
};

let msgVal = () => {
    const tmsg = document.getElementById("textboxmsg").value.trim();
    const mError = document.getElementById("msg-error");

    if (tmsg === "") {
        mError.innerHTML = "Please enter your trivia!";
        return false;
    } else {
        mError.innerHTML = "";
        return true;
    }
};

document.getElementById('textboxlink').addEventListener('input', linkVal);
document.getElementById('textboxlink').addEventListener('focus', linkVal);

document.getElementById('textboxmsg').addEventListener('input', msgVal);
document.getElementById('textboxmsg').addEventListener('focus', msgVal);

document.getElementById('trivia-form').addEventListener('submit', function (e) {
    e.preventDefault();

    if (!validateForm()) return;

    const form = e.target;
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('trivia-msg').textContent = "Your trivia has been submitted.";
        form.reset();
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('trivia-msg').textContent = "Something went wrong. Please try again.";
    });
});
