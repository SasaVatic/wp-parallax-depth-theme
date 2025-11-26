// Mouse follower
const mouseFollower = document.getElementById('mouseFollower');
let mouseX = 0,
  mouseY = 0;
let followerX = 0,
  followerY = 0;

document.addEventListener('mousemove', (e) => {
  mouseX = e.clientX;
  mouseY = e.clientY;
});

// Smooth animation for mouse follower
function animateFollower() {
  followerX += (mouseX - followerX) * 0.1;
  followerY += (mouseY - followerY) * 0.1;

  mouseFollower.style.left = followerX + 'px';
  mouseFollower.style.top = followerY + 'px';

  requestAnimationFrame(animateFollower);
}
animateFollower();
