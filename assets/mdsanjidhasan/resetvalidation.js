document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
  
    form.addEventListener("submit", function (e) {
      const current = document.getElementById("current-password").value.trim();
      const newPass = document.getElementById("new-password").value;
      const confirm = document.getElementById("confirm-password").value;
  
      let errors = [];
  
      if (current.length === 0) {
        errors.push("Current password cannot be empty.");
      }
  
      if (newPass.length < 6) {
        errors.push("New password must be at least 6 characters long.");
      }
  
      if (newPass !== confirm) {
        errors.push("Confirm password does not match the new password.");
      }
  
      if (errors.length > 0) {
        e.preventDefault();
        alert(errors.join("\n"));
      }
    });
  });
  