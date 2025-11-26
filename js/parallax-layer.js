// Generate stars
const starsContainer = document.getElementById('stars');
const numStars = 100;

for (let i = 0; i < numStars; i++) {
  const star = document.createElement('div');
  star.className = 'star';
  star.style.left = Math.random() * 100 + '%';
  star.style.top = Math.random() * 100 + '%';
  star.style.animationDelay = Math.random() * 3 + 's';
  star.style.animationDuration = Math.random() * 3 + 2 + 's';
  starsContainer.appendChild(star);
}

// Parallax scrolling effect
const layers = document.querySelectorAll('.parallax-layer');
const heroContent = document.querySelector('.hero-content');

window.addEventListener('scroll', () => {
  const scrolled = window.pageYOffset;

  // Move hero content
  if (heroContent && scrolled < window.innerHeight) {
    heroContent.style.transform = `translate(-50%, calc(-50% + ${
      scrolled * 0.3
    }px))`;
    heroContent.style.opacity = 1 - scrolled / 800;
  }

  // Apply different speeds to each layer in hero section only
  if (scrolled < window.innerHeight) {
    layers.forEach((layer, index) => {
      const speed = (index + 1) * 0.2;
      layer.style.transform = `translateY(${scrolled * speed}px)`;
    });
  }
});

// Interactive hover effects for rectangles
const rectangles = document.querySelectorAll('.rect');

rectangles.forEach((rect) => {
  rect.addEventListener('mousemove', (e) => {
    const boundingRect = rect.getBoundingClientRect();
    const x = e.clientX - boundingRect.left;
    const y = e.clientY - boundingRect.top;

    const centerX = boundingRect.width / 2;
    const centerY = boundingRect.height / 2;

    const rotateX = (y - centerY) / 15;
    const rotateY = (centerX - x) / 15;

    rect.style.transform = `perspective(500px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.05)`;
  });

  rect.addEventListener('mouseleave', () => {
    rect.style.transform = '';
  });
});
