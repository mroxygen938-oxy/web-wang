<!-- Dynamic Glowing Magenta Ribbon Waves Background Canvas (Matches User Reference Image) -->
<div class="bg-animation-container">
  <canvas id="ribbon-wave-canvas" style="position:fixed;top:0;left:0;width:100%;height:100%;z-index:-2;pointer-events:none;background:radial-gradient(ellipse at 80% 20%, #200a45 0%, #0d0628 60%, #050214 100%);"></canvas>
  <script>
  (function() {
    const canvas = document.getElementById('ribbon-wave-canvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');

    let width = canvas.width = window.innerWidth;
    let height = canvas.height = window.innerHeight;

    window.addEventListener('resize', () => {
      width = canvas.width = window.innerWidth;
      height = canvas.height = window.innerHeight;
    });

    let mouseX = width * 0.7;
    let mouseY = height * 0.4;
    let targetMouseX = width * 0.7;
    let targetMouseY = height * 0.4;

    window.addEventListener('mousemove', (e) => {
      targetMouseX = e.clientX;
      targetMouseY = e.clientY;
    });

    let time = 0;

    // Define 3 main glowing ribbon bundles (top right loop, main center swirl, bottom wave)
    function drawRibbonBundle(linesCount, baseAlpha, timeOffset, mouseImpact) {
      for (let i = 0; i < linesCount; i++) {
        const offset = i * 6.5;
        ctx.beginPath();

        const strokeAlpha = (baseAlpha * (1 - i / linesCount)).toFixed(3);
        
        // Color gradient along ribbon lines: Hot Pink #ff00a0 to Electric Violet #8b5cf6
        const strokeColor = i % 2 === 0 ? `rgba(255, 0, 160, ${strokeAlpha})` : `rgba(217, 70, 239, ${strokeAlpha})`;
        ctx.strokeStyle = strokeColor;
        ctx.lineWidth = 1.8;
        ctx.shadowBlur = 10;
        ctx.shadowColor = 'rgba(255, 0, 160, 0.5)';

        // Control points influenced by time and smooth mouse coordinates
        const p1x = width * 0.15 + Math.sin(time * 0.5 + i * 0.05) * 40;
        const p1y = height * 0.85 + Math.cos(time * 0.4 + i * 0.05) * 30;

        const p2x = width * 0.45 + (mouseX - width / 2) * 0.25 * mouseImpact + Math.cos(time * 0.6 + i * 0.04) * 60;
        const p2y = height * 0.25 + (mouseY - height / 2) * 0.25 * mouseImpact + Math.sin(time * 0.5 + i * 0.04) * 80;

        const p3x = width * 0.85 + (mouseX - width / 2) * 0.15 * mouseImpact + Math.sin(time * 0.4 + i * 0.03) * 70;
        const p3y = height * 0.65 + (mouseY - height / 2) * 0.15 * mouseImpact + Math.cos(time * 0.7 + i * 0.03) * 90;

        const p4x = width * 1.05 + offset;
        const p4y = height * 0.15 + offset * 0.8;

        ctx.moveTo(p1x + offset * 0.5, p1y - offset * 0.3);
        ctx.bezierCurveTo(
          p2x + offset * 0.8, p2y - offset * 0.5,
          p3x - offset * 0.6, p3y + offset * 0.7,
          p4x, p4y
        );

        ctx.stroke();
      }
    }

    function drawSecondaryWave(linesCount, baseAlpha) {
      for (let i = 0; i < linesCount; i++) {
        const offset = i * 5;
        ctx.beginPath();
        const strokeAlpha = (baseAlpha * (1 - i / linesCount)).toFixed(3);
        ctx.strokeStyle = `rgba(236, 72, 153, ${strokeAlpha})`;
        ctx.lineWidth = 1.4;

        const startX = -50;
        const startY = height * 0.95 + offset * 0.3;

        const cp1x = width * 0.35 + Math.sin(time * 0.4 + i * 0.05) * 50;
        const cp1y = height * 0.75 + (mouseY - height / 2) * 0.1;

        const cp2x = width * 0.75 + Math.cos(time * 0.5 + i * 0.05) * 50;
        const cp2y = height * 0.9 + (mouseX - width / 2) * 0.1;

        const endX = width + 50;
        const endY = height * 0.85 + offset * 0.5;

        ctx.moveTo(startX, startY);
        ctx.bezierCurveTo(cp1x, cp1y, cp2x, cp2y, endX, endY);
        ctx.stroke();
      }
    }

    function render() {
      // Clear with radial gradient matching screenshot
      const bgGrad = ctx.createRadialGradient(width * 0.75, height * 0.35, 100, width * 0.5, height * 0.5, width * 0.9);
      bgGrad.addColorStop(0, '#260a54');
      bgGrad.addColorStop(0.5, '#0f062e');
      bgGrad.addColorStop(1, '#050214');
      
      ctx.fillStyle = bgGrad;
      ctx.fillRect(0, 0, width, height);

      // Smooth mouse interpolation
      mouseX += (targetMouseX - mouseX) * 0.04;
      mouseY += (targetMouseY - mouseY) * 0.04;

      time += 0.015;

      // Draw dynamic layered glowing ribbons (Matching reference image)
      drawRibbonBundle(32, 0.7, 0, 1.0);
      drawSecondaryWave(20, 0.5);

      requestAnimationFrame(render);
    }

    render();
  })();
  </script>
</div>
