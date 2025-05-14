document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
  
    form.addEventListener("submit", function (e) {
      const current = document.getElementById("current-password").value.trim();
      const newPass = document.getElementById("new-password").value;
      const confirm = document.getElementById("confirm-password").value;
  
      let errors = [];
  
      // Current password must not be empty
      if (current.length === 0) {
        errors.push("Current password cannot be empty.");
      }
  
      // New password length check
      if (newPass.length < 6) {
        errors.push("New password must be at least 6 characters long.");
      }
  
      // Confirm password match check
      if (newPass !== confirm) {
        errors.push("Confirm password does not match the new password.");
      }
  
      // Show errors if any
      if (errors.length > 0) {
        e.preventDefault();
        alert(errors.join("\n"));
      }
    });
  });
  