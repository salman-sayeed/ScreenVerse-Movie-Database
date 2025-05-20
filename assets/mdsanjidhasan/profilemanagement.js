document.getElementById('userForm').addEventListener('submit', function(e) {
    e.preventDefault();
  
    let email = document.getElementById('email').value.trim();
    let phone = document.getElementById('phone').value.trim();
    let newPass = document.getElementById('newPass').value;
    let confirmPass = document.getElementById('confirmPass').value;
  
    let valid = true;
  
    document.getElementById('emailError').textContent = '';
    document.getElementById('phoneError').textContent = '';
    document.getElementById('passError').textContent = '';
    document.getElementById('confirmError').textContent = '';
  
    let at = email.indexOf('@');
    let dot = email.lastIndexOf('.');
    if (email === '' || at < 1 || dot < at + 2 || dot + 2 >= email.length) {
      document.getElementById('emailError').textContent = 'Invalid email format.';
      valid = false;
    }
  
    let isDigits = true;
    for (let i = 0; i < phone.length; i++) {
      let ch = phone[i];
      if (ch < '0' || ch > '9') {
        isDigits = false;
        break;
      }
    }
    if (!isDigits || phone.length < 10 || phone.length > 15) {
      document.getElementById('phoneError').textContent = 'Phone must be 10–15 digits.';
      valid = false;
    }
  
    if (newPass.length < 8) {
      document.getElementById('passError').textContent = 'Password must be at least 8 characters.';
      valid = false;
    }
  
    if (confirmPass !== newPass) {
      document.getElementById('confirmError').textContent = 'Passwords do not match.';
      valid = false;
    }
  
    if (valid) {
      alert('Validation Successful!');
      this.reset();
    }
  });
  