/**
 * Wangling Cloud - Glassmorphism Design Engine (Static & Stable)
 * Features:
 * 1. Mouse Spotlight Light Tracker (No movement/tilt)
 * 2. Floating Ambient Particle Orbs Canvas
 * 3. Stable Glassmorphism Styling
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Mouse Spotlight Tracking on Glass Panes (Light tracking only, NO tilt/movement)
  const glassPanes = document.querySelectorAll('.glass-panel, .glass-modal, .glass-nav');
  
  document.addEventListener('mousemove', (e) => {
    glassPanes.forEach(pane => {
      const rect = pane.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      pane.style.setProperty('--mouse-x', `${x}px`);
      pane.style.setProperty('--mouse-y', `${y}px`);
    });
  });

  // 2. Ambient Floating Particle Canvas
  initParticleOrbs();
});

function initParticleOrbs() {
  const canvas = document.createElement('canvas');
  canvas.id = 'particle-orbs-canvas';
  canvas.style.cssText = 'position:fixed;top:0;left:0;width:100%;height:100%;z-index:-1;pointer-events:none;opacity:0.65;';
  document.body.appendChild(canvas);

  const ctx = canvas.getContext('2d');
  let width = canvas.width = window.innerWidth;
  let height = canvas.height = window.innerHeight;

  window.addEventListener('resize', () => {
    width = canvas.width = window.innerWidth;
    height = canvas.height = window.innerHeight;
  });

  const particles = [];
  const particleCount = Math.min(Math.floor(width / 35), 45);
  const colors = ['#c1c1ff', '#ddb8ff', '#ffb691', '#00f2fe', '#4facfe'];

  for (let i = 0; i < particleCount; i++) {
    particles.push({
      x: Math.random() * width,
      y: Math.random() * height,
      radius: Math.random() * 2.5 + 1,
      color: colors[Math.floor(Math.random() * colors.length)],
      vx: (Math.random() - 0.5) * 0.3,
      vy: (Math.random() - 0.5) * 0.3,
      alpha: Math.random() * 0.5 + 0.2,
      pulse: Math.random() * 0.02
    });
  }

  function animate() {
    ctx.clearRect(0, 0, width, height);

    particles.forEach(p => {
      p.x += p.vx;
      p.y += p.vy;

      if (p.x < 0) p.x = width;
      if (p.x > width) p.x = 0;
      if (p.y < 0) p.y = height;
      if (p.y > height) p.y = 0;

      p.alpha += Math.sin(Date.now() * 0.002) * p.pulse;
      const clampedAlpha = Math.max(0.1, Math.min(0.8, p.alpha));

      ctx.beginPath();
      ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
      ctx.fillStyle = p.color;
      ctx.globalAlpha = clampedAlpha;
      ctx.shadowBlur = 12;
      ctx.shadowColor = p.color;
      ctx.fill();
    });

    requestAnimationFrame(animate);
  }

  animate();
}
