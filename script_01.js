document.addEventListener('DOMContentLoaded', function() {
  const hero = document.querySelector('.hero');
  const prevBtn = document.querySelector('.prev-btn');
  const nextBtn = document.querySelector('.next-btn');
  const images = [
      'images/rosal-carousel_1.jpg',
      'images/rosal-carousel_2.jpg',
      'images/rosal-carousel_3.jpg',
      'images/rosal-clients-1',
      'images/rosal-clients-2'
  ];

  let currentIndex = 0;
  let isTransitioning = false;

  function updateHero() {
      if (isTransitioning) return;
      isTransitioning = true;
      
      hero.style.opacity = '0';
      
      setTimeout(() => {
          hero.style.backgroundImage = `linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(${images[currentIndex]})`;
          hero.style.opacity = '1';
          isTransitioning = false;
      }, 500);
  }

  function nextSlide() {
      currentIndex = (currentIndex + 1) % images.length;
      updateHero();
  }

  function prevSlide() {
      currentIndex = (currentIndex - 1 + images.length) % images.length;
      updateHero();
  }

  nextBtn.addEventListener('click', nextSlide);
  prevBtn.addEventListener('click', prevSlide);

  let slideInterval = setInterval(nextSlide, 5000);

  hero.addEventListener('mouseenter', () => clearInterval(slideInterval));
  hero.addEventListener('mouseleave', () => {
      slideInterval = setInterval(nextSlide, 5000);
  });

  updateHero();
});