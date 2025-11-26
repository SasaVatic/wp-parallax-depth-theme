// 3D Carousel Controls
const carousel = document.getElementById('carousel');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const indicatorsContainer = document.getElementById('indicators');
const featureCards = document.querySelectorAll('.feature-card-3d');

let currentRotation = 0;
let currentIndex = 0;

// Create indicators
featureCards.forEach((_, index) => {
  const indicator = document.createElement('div');
  indicator.className = 'indicator';
  if (index === 0) indicator.classList.add('active');
  indicator.addEventListener('click', () => goToSlide(index));
  indicatorsContainer.appendChild(indicator);
});

const indicators = document.querySelectorAll('.indicator');

// Update view - always use 3D rotation
function updateView() {
  carousel.style.transform = `rotateY(${currentRotation}deg)`;
  updateIndicators();
}

// Update indicators
function updateIndicators() {
  indicators.forEach((indicator, index) => {
    indicator.classList.toggle('active', index === currentIndex);
  });
}

// Go to specific slide
function goToSlide(index) {
  currentIndex = index;
  currentRotation = -index * 60;
  updateView();
}

// Previous button
prevBtn.addEventListener('click', () => {
  currentIndex = (currentIndex - 1 + featureCards.length) % featureCards.length;
  currentRotation += 60;
  updateView();
});

// Next button
nextBtn.addEventListener('click', () => {
  currentIndex = (currentIndex + 1) % featureCards.length;
  currentRotation -= 60;
  updateView();
});

// Touch support for mobile
let touchStartX = 0;
let touchEndX = 0;

carousel.addEventListener('touchstart', (e) => {
  touchStartX = e.changedTouches[0].screenX;
});

carousel.addEventListener('touchend', (e) => {
  touchEndX = e.changedTouches[0].screenX;
  handleSwipe();
});

function handleSwipe() {
  if (touchEndX < touchStartX - 50) {
    // Swipe left - next
    nextBtn.click();
  }
  if (touchEndX > touchStartX + 50) {
    // Swipe right - previous
    prevBtn.click();
  }
}
