<?php
// Footer Component
?>
    </main>

    <!-- Footer Bar -->
    <footer class="w-full py-8 px-4 md:px-16 mt-16">
        <div class="glass-panel rounded-2xl p-6 flex flex-col md:flex-row items-center justify-between gap-6 border border-white/10 shadow-lg">
            <div class="font-label-sm text-on-surface-variant uppercase tracking-widest text-xs">
                © <?php echo date('Y'); ?> <?php echo htmlspecialchars(SITE_NAME); ?>. All Rights Reserved. Powered by Lumina Glass.
            </div>
            
            <div class="flex items-center gap-6">
                <a href="index.php" class="text-on-surface-variant hover:text-primary transition-colors flex items-center gap-1 text-sm">
                    <span class="material-symbols-outlined text-base">public</span>
                    <span class="hidden sm:inline">Network</span>
                </a>
                <a href="product.php" class="text-on-surface-variant hover:text-primary transition-colors flex items-center gap-1 text-sm">
                    <span class="material-symbols-outlined text-base">layers</span>
                    <span class="hidden sm:inline">Specs</span>
                </a>
                <a href="updates.php" class="text-on-surface-variant hover:text-primary transition-colors flex items-center gap-1 text-sm">
                    <span class="material-symbols-outlined text-base">campaign</span>
                    <span class="hidden sm:inline">Changelog</span>
                </a>
            </div>
        </div>
    </footer>

    <!-- Interactive Scripts -->
    <script>
        function toggleThemeHint() {
            const canvas = document.getElementById('shader-canvas-lumina');
            if (canvas) {
                canvas.style.filter = canvas.style.filter ? '' : 'hue-rotate(90deg) brightness(1.2)';
            }
        }

        // Scroll animation observer
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in-up');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</body>
</html>
