<?php
$current_page = 'home';
$page_title = 'Wangling Cloud - Fresh Logs & ULP Marketplace';
require_once __DIR__ . '/includes/header.php';

$features = get_home_features();
$products = get_log_products();
?>

<div class="flex flex-col w-full font-body-md text-on-surface">

    <!-- Hero Banner Section -->
    <section class="relative w-full h-[540px] md:h-[600px] mb-16 flex items-center justify-center rounded-3xl overflow-hidden glass-panel shadow-2xl border border-white/10">
        <div class="absolute inset-0 z-0">
            <img alt="Cloud server telemetry logs" 
                 class="w-full h-full object-cover opacity-70 mix-blend-screen" 
                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuDNyCIASNBrdBvx0bX6EsTofLljxHizTEqUe2QAPYDQA8_fv2FJlqejcfyqHAvQq5YiYbyDNqNfFyd-CmQDzbzpmzU24LRAiKAAli3vWsedGtjnoOkXPU5IXsyiiZrplsZ5vmRSkrIjxL_Y8HWcvKv0SiBOnXpl5YDhH8rFY50IM5ejqANlIH4caEPrTHpVvSJUiG7EPIX54FQBg5AOjST8wdWF2QepDID17y1rQmhmtmy84DSzqgEF">
            <div class="absolute inset-0 bg-gradient-to-t from-background via-background/50 to-transparent"></div>
        </div>

        <div class="relative z-10 p-6 md:p-12 glass-nav rounded-2xl max-w-3xl mx-4 text-center border border-white/10 shadow-[inset_0_1px_1px_rgba(255,255,255,0.15)] fade-in-up">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary/20 text-primary font-label-sm text-xs uppercase tracking-widest mb-4 border border-primary/30">
                <span class="w-2 h-2 rounded-full bg-green-400 animate-ping"></span>
                Fresh Batch Restocked Today
            </div>
            <h1 class="font-display-lg text-3xl md:text-5xl font-bold mb-4 text-gradient-primary">
                Fresh Logs & ULP Marketplace
            </h1>
            <p class="font-body-lg text-on-surface-variant max-w-xl mx-auto text-base md:text-lg mb-6 leading-relaxed">
                Access 100% verified hourly fresh system logs, cloud access streams, and Unlimited Log Packages (ULP) with instant API delivery.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="product.php" class="px-6 py-3 rounded-full bg-gradient-to-r from-primary to-secondary text-surface-container-lowest font-label-sm font-semibold uppercase tracking-wider shadow-lg hover:shadow-primary/40 transition-all hover:scale-105">
                    Browse Fresh Catalog
                </a>
                <a href="#free-drop" class="px-6 py-3 rounded-full glass-panel hover:bg-surface-container-high text-on-surface font-label-sm font-semibold uppercase tracking-wider transition-all border border-white/10">
                    🎁 Get Free Drop Today
                </a>
            </div>
        </div>
    </section>

    <!-- Free Drop Today Special Offer Banner -->
    <section id="free-drop" class="relative w-full p-8 md:p-12 mb-16 rounded-3xl glass-modal border border-tertiary/30 shadow-2xl overflow-hidden">
        <div class="absolute -right-20 -top-20 w-80 h-80 bg-tertiary/20 blur-[100px] rounded-full pointer-events-none"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="max-w-xl space-y-3">
                <span class="px-3 py-1 rounded-full bg-tertiary/20 text-tertiary text-xs font-semibold uppercase tracking-wider border border-tertiary/40">
                    🎁 Daily Free Drop Claim
                </span>
                <h2 class="font-display-lg text-2xl md:text-4xl font-bold text-on-surface">
                    Claim Today's Free Fresh Logs & ULP Batch
                </h2>
                <p class="text-on-surface-variant text-sm md:text-base leading-relaxed">
                    Get 500 fresh unparsed telemetry access logs + ULP socket access for FREE today. No credit card required — instant download link delivered directly to your email.
                </p>
            </div>

            <div class="w-full md:w-auto flex flex-col sm:flex-row items-center gap-4">
                <a href="product.php#order" class="w-full sm:w-auto px-8 py-4 text-center rounded-2xl bg-gradient-to-r from-tertiary to-secondary text-surface-container-lowest font-label-sm font-bold uppercase tracking-wider shadow-xl hover:shadow-tertiary/50 transition-all text-sm">
                    Get Free Drop Today
                </a>
                <a href="index.php" class="w-full sm:w-auto px-6 py-4 text-center rounded-2xl glass-panel hover:bg-white/10 text-on-surface font-label-sm font-semibold uppercase tracking-wider transition-all text-sm border border-white/10">
                    Home Page
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Products Section with Logs & ULP Terminal Preview + Pricing Grid -->
    <section class="pb-16 w-full">
        <div class="flex flex-col md:flex-row items-center justify-between mb-10 gap-4">
            <div>
                <h2 class="font-display-lg text-2xl md:text-3xl font-bold text-on-surface mb-1">Featured Fresh Logs & ULP Packages</h2>
                <p class="text-on-surface-variant text-sm">Includes verified Fresh Logs & ULP live streams in every package.</p>
            </div>
            <a href="product.php" class="px-5 py-2 rounded-full glass-panel hover:bg-primary hover:text-on-primary text-xs font-semibold uppercase tracking-wider transition-all border border-white/10">
                View Full Catalog →
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
            <?php foreach ($products as $prod): ?>
                <div class="glass-panel glass-panel-hover rounded-2xl p-6 flex flex-col justify-between border border-white/10 relative overflow-hidden group">
                    <div>
                        <!-- Header & Badges -->
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold border backdrop-blur-md <?php echo $prod['badge_color']; ?>">
                                <?php echo htmlspecialchars($prod['type']); ?>
                            </span>
                            <span class="text-xs text-primary font-mono bg-primary/10 px-3 py-1 rounded-full border border-primary/20">
                                <?php echo htmlspecialchars($prod['freshness']); ?>
                            </span>
                        </div>

                        <!-- Title & Description -->
                        <h3 class="font-headline-md text-xl font-bold text-on-surface mb-2 group-hover:text-primary transition-colors">
                            <?php echo htmlspecialchars($prod['title']); ?>
                        </h3>

                        <p class="text-sm text-on-surface-variant mb-4 leading-relaxed">
                            <?php echo htmlspecialchars($prod['description']); ?>
                        </p>

                        <!-- Verified Sample Lines Terminal (Logs + ULP) -->
                        <div class="bg-surface-container-lowest/90 p-4 rounded-xl border border-white/10 font-mono text-xs text-green-400/90 mb-6 space-y-1 overflow-x-auto">
                            <div class="text-[10px] font-sans text-primary/80 font-bold uppercase tracking-widest mb-1.5 flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">terminal</span> VERIFIED SAMPLE LINES (LOGS & ULP):
                            </div>
                            <?php foreach ($prod['sample_lines'] as $line): ?>
                                <div class="truncate text-green-300/90 font-mono">$ <?php echo htmlspecialchars($line); ?></div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Pricing Breakdown Grid: Discount -> Monthly -> 3 Months -> Lifetime -->
                        <div class="grid grid-cols-2 gap-3 p-4 rounded-xl bg-surface-container-low/90 border border-white/10 text-center mb-6">
                            <div class="p-2.5 rounded-lg bg-green-500/10 border border-green-500/20 col-span-2">
                                <div class="text-[10px] text-green-400 font-bold uppercase tracking-wider">🔥 Discount Price</div>
                                <div class="text-xs text-on-surface-variant/60 line-through">Was <?php echo htmlspecialchars($prod['original_price']); ?></div>
                                <div class="font-extrabold text-sm text-green-400"><?php echo htmlspecialchars($prod['discount_price']); ?></div>
                            </div>
                            <div class="p-2 rounded-lg bg-white/5 border border-white/5">
                                <div class="text-[10px] text-on-surface-variant uppercase font-semibold">Monthly Price</div>
                                <div class="font-bold text-xs text-primary"><?php echo htmlspecialchars($prod['monthly_price']); ?></div>
                            </div>
                            <div class="p-2 rounded-lg bg-white/5 border border-white/5">
                                <div class="text-[10px] text-on-surface-variant uppercase font-semibold">3 Months Price</div>
                                <div class="font-bold text-xs text-secondary"><?php echo htmlspecialchars($prod['three_month_price']); ?></div>
                            </div>
                            <div class="p-2 rounded-lg bg-white/5 border border-white/5 col-span-2">
                                <div class="text-[10px] text-on-surface-variant uppercase font-semibold">Lifetime Price</div>
                                <div class="font-bold text-xs text-tertiary"><?php echo htmlspecialchars($prod['lifetime_price']); ?></div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons: Home Page & Get Free Drop Today -->
                    <div class="grid grid-cols-2 gap-3 pt-4 border-t border-white/10 mt-auto">
                        <a href="index.php" class="py-2.5 text-center rounded-xl bg-surface-container-high hover:bg-primary hover:text-on-primary text-on-surface font-label-sm font-semibold uppercase tracking-wider transition-all text-xs border border-white/10">
                            Home Page
                        </a>
                        <a href="index.php#free-drop" class="py-2.5 text-center rounded-xl bg-gradient-to-r from-primary to-secondary text-surface-container-lowest font-label-sm font-semibold uppercase tracking-wider shadow-md hover:shadow-primary/40 transition-all text-xs">
                            Get Free Drop Today
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
