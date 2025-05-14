// rating.js

document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('ratingInput');
    const form = document.getElementById('ratingForm');
  
    stars.forEach((star, index) => {
      star.addEventListener('click', () => {
        const rating = star.getAttribute('data-value');
        highlightStars(rating);
        ratingInput.value = rating;
        form.submit();
      });
    });
  
    function highlightStars(rating) {
      for (let i = 0; i < stars.length; i++) {
        if ((i + 1) <= rating) {
          stars[i].classList.add('filled');
        } else {
          stars[i].classList.remove('filled');
        }
      }
    }
  });
  