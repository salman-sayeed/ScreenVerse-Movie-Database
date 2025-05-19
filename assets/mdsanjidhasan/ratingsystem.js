document.addEventListener('DOMContentLoaded', function () {
  const stars = document.querySelectorAll('.star');
  const ratingInput = document.getElementById('ratingInput');
  const form = document.getElementById('ratingForm');

  if (!stars.length || !ratingInput || !form) return;

  stars.forEach(star => {
    star.addEventListener('click', () => {
      const rating = parseInt(star.getAttribute('data-value'));
      if (!isNaN(rating)) {
        highlightStars(rating);
        ratingInput.value = rating;
        form.submit();
      }
    });
  });

  function highlightStars(rating) {
    stars.forEach((s, i) => {
      s.classList.toggle('filled', i < rating);
    });
  }
});
