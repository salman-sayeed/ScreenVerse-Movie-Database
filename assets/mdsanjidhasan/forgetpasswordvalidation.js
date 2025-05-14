document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
  
    form.addEventListener("submit", function (e) {
      const recoveryNumber = document.getElementById("recovery-number").value.trim();
      const newPassword = document.getElementById("new-password").value;
      const confirmPassword = document.getElementById("confirm-password").value;
  
      let errors = [];
  
      // Recovery Number check (must be digits and at least 6 characters)
      let allDigits = true;
      for (let i = 0; i < recoveryNumber.length; i++) {
        const ch = recoveryNumber.charAt(i);
        if (ch < '0' || ch > '9') {
          allDigits = false;
          break;
        }
      }
  
      if (!allDigits || recoveryNumber.length < 6) {
        errors.push("Recovery number must be at least 6 digits and only contain numbers.");
      }
  
      // New password check
      if (newPassword.length < 6) {
        errors.push("New password must be at least 6 characters long.");
      }
  
      // Confirm password check
      if (newPassword !== confirmPassword) {
        errors.push("Passwords do not match.");
      }
  
      if (errors.length > 0) {
        e.preventDefault();
        alert(errors.join("\n"));
      }
    });
  });
  