document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(e) {
        let isValid = true;
        const errors = {};
        
        const fullname = document.getElementById('fullname').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        const confirm_password = document.getElementById('confirm_password').value.trim();
        
        document.querySelectorAll('.error-message').forEach(el => el.remove());
        
        if (!fullname) {
            isValid = false;
            displayError('fullname', 'Full name is required');
        }
        
        if (!email) {
            isValid = false;
            displayError('email', 'Email is required');
        } else if (!email.includes('@') || !email.includes('.')) {
            isValid = false;
            displayError('email', 'Please enter a valid email');
        }
        
        if (!password) {
            isValid = false;
            displayError('password', 'Password is required');
        } else if (password.length < 6) {
            isValid = false;
            displayError('password', 'Password must be at least 6 characters');
        }
        
        if (password !== confirm_password) {
            isValid = false;
            displayError('confirm_password', 'Passwords do not match');
        }
        
        if (!isValid) {
            e.preventDefault();
        }
    });
    
    function displayError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const errorElement = document.createElement('div');
        errorElement.className = 'error-message';
        errorElement.style.color = 'red';
        errorElement.style.fontSize = '0.8rem';
        errorElement.style.marginTop = '5px';
        errorElement.textContent = message;
        
        field.parentNode.appendChild(errorElement);
    }
});