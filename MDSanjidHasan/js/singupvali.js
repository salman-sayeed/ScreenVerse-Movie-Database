document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
  
    form.addEventListener('submit', function (e) {
      const name = document.getElementById('signup-name').value.trim();
      const email = document.getElementById('signup-email').value.trim();
      const password = document.getElementById('signup-password').value;
  
      let errors = [];
  
      // Name validation
      if (name.length < 2) {
        errors.push("Full name must be at least 2 characters.");
      }
  
      // Email validation without regex
      const atIndex = email.indexOf('@');
      const dotIndex = email.lastIndexOf('.');
  
      if (
        atIndex <= 0 ||                             // no @ or at beginning
        dotIndex <= atIndex + 1 ||                  // . must come after @
        dotIndex === email.length - 1               // . cannot be last
      ) {
        errors.push("Please enter a valid email address.");
      }
  
      // Password validation
      if (password.length < 6) {
        errors.push("Password must be at least 6 characters long.");
      }
  
      // If there are any errors, prevent form submission
      if (errors.length > 0) {
        e.preventDefault();
        alert(errors.join('\n'));
      }
    });
  });
  