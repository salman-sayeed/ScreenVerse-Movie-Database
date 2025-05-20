document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
  
    form.addEventListener('submit', function (e) {
      const name = document.getElementById('signup-name').value.trim();
      const email = document.getElementById('signup-email').value.trim();
      const password = document.getElementById('signup-password').value;
  
      let errors = [];
  
      if (name.length < 2) {
        errors.push("Full name must be at least 2 characters.");
      }
  
      const atIndex = email.indexOf('@');
      const dotIndex = email.lastIndexOf('.');
  
      if (
        atIndex <= 0 ||                             
        dotIndex <= atIndex + 1 ||                  
        dotIndex === email.length - 1               
      ) {
        errors.push("Please enter a valid email address.");
      }

      if (password.length < 6) {
        errors.push("Password must be at least 6 characters long.");
      }
  
      if (errors.length > 0) {
        e.preventDefault();
        alert(errors.join('\n'));
      }
    });
  });
  