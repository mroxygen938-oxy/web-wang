<?php
$current_page = 'product';
$page_title = 'Fresh Logs Catalog, ULP & Daily Free Drops - Wangling Cloud';
require_once __DIR__ . '/includes/header.php';

$products = get_log_products();
$free_drops = get_free_drop_files();
?>

<div class="flex flex-col w-full gap-12">

    <!-- Header Section -->
    <div class="relative w-full h-[320px] md:h-[380px] flex flex-col justify-end p-6 md:p-12 -mt-6 overflow-hidden rounded-3xl border border-white/10 shadow-2xl" 
         style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCU97sCbBgSmk6rdZoQI1tcnMOgsqTvL_lvsbQDnGQeFjkdDiE_lcL9Jq90O1b2uAlvvQ7jfSvnoECHJHdlhzm2_J3aYYCgsyzX0zc6Cu-vWdbiteEPe_n1Fys5V1U-YvWE2SdxXpu4p5DrWCNqmcYBBFr7HNfpyrZD0ylPY00OUnjrt2tM_xbP5lTjpE7CUzeQydCr2terrAxj89zC5Kf7ljypBP0j71i0whR8mEf4rntzWHkhvFk9'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-gradient-to-t from-background via-background/60 to-transparent z-0"></div>
        
        <div class="relative z-10 max-w-4xl space-y-3">
            <div class="inline-flex items-center gap-2 px-4 py-1 rounded-full glass-panel bg-primary-container/30 text-on-primary-container font-label-sm text-xs uppercase tracking-widest border border-primary/30">
                <span class="w-2 h-2 rounded-full bg-green-400 animate-ping"></span>
                Daily Free Drop Vault Active
            </div>
            <h1 class="font-display-lg text-3xl md:text-5xl font-bold text-on-surface drop-shadow-2xl">
                Logs Catalog, ULP & Daily Free Drops
            </h1>
            <p class="font-body-lg text-on-surface-variant max-w-2xl text-base md:text-lg">
                Download daily free log drop files below or purchase premium Fresh Logs & high-bandwidth ULP stream packages with instant API access keys.
            </p>
        </div>
    </div>

    <!-- 🎁 Daily Free Drop Files Vault Section -->
    <section id="free-drop-vault" class="w-full p-6 md:p-8 rounded-3xl glass-modal border border-tertiary/30 shadow-2xl space-y-6">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 pb-4 border-b border-white/10">
            <div>
                <span class="px-3 py-1 rounded-full bg-tertiary/20 text-tertiary text-xs font-semibold uppercase tracking-wider border border-tertiary/40 mb-2 inline-block">
                    🎁 Daily Free Drop Files Vault (100% Free)
                </span>
                <h2 class="font-display-lg text-2xl md:text-3xl font-bold text-on-surface">
                    Posted Free Drop Files for Download Today
                </h2>
            </div>
            <div class="text-xs text-on-surface-variant bg-surface-container-high px-4 py-2 rounded-xl border border-white/10 flex items-center gap-2 font-mono">
                <span class="material-symbols-outlined text-green-400 text-sm">update</span> Updated Today • 100% Free Direct Download
            </div>
        </div>

        <!-- Free Drop Files Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($free_drops as $drop): ?>
                <div class="glass-panel p-5 rounded-2xl border border-white/10 flex flex-col justify-between hover:border-tertiary/50 transition-all space-y-4">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-semibold border <?php echo $drop['badge_color']; ?>">
                                <?php echo htmlspecialchars($drop['badge']); ?>
                            </span>
                            <span class="text-[11px] text-on-surface-variant font-mono"><?php echo htmlspecialchars($drop['date']); ?></span>
                        </div>

                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-xl bg-tertiary/10 border border-tertiary/30 flex items-center justify-center text-tertiary shrink-0">
                                <span class="material-symbols-outlined">download_for_offline</span>
                            </div>
                            <div class="overflow-hidden">
                                <div class="font-bold text-sm text-on-surface truncate font-mono" title="<?php echo htmlspecialchars($drop['filename']); ?>">
                                    <?php echo htmlspecialchars($drop['filename']); ?>
                                </div>
                                <div class="text-xs text-on-surface-variant font-mono"><?php echo htmlspecialchars($drop['file_size']); ?> • <?php echo htmlspecialchars($drop['format']); ?></div>
                            </div>
                        </div>

                        <div class="text-xs text-primary bg-primary/10 px-3 py-1.5 rounded-xl border border-primary/20 font-mono">
                            Includes: <?php echo htmlspecialchars($drop['records']); ?>
                        </div>
                    </div>

                    <a href="<?php echo htmlspecialchars($drop['download_url']); ?>" download class="w-full py-2.5 text-center rounded-xl bg-gradient-to-r from-tertiary to-secondary text-surface-container-lowest font-label-sm font-bold uppercase tracking-wider shadow-md hover:shadow-tertiary/40 transition-all text-xs flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-sm">download</span>
                        Download Free File
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Catalog Grid & Interactive Terminal Viewer -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 pb-12">
        
        <!-- Left Sidebar / Category & Quick Order Navigation -->
        <aside class="lg:col-span-4 space-y-6">
            <div class="glass-panel p-6 rounded-2xl bg-surface-container-low/50 backdrop-blur-2xl sticky top-28 border border-white/10 space-y-6">
                <div>
                    <h3 class="font-headline-md text-lg font-semibold mb-2 text-primary">Filter Catalog</h3>
                    <div class="flex flex-col gap-2">
                        <button onclick="filterCatalog('all')" id="btn-all" class="px-4 py-2 rounded-xl text-left text-xs font-semibold uppercase tracking-wider bg-primary text-on-primary transition-all">
                            All Packages
                        </button>
                        <button onclick="filterCatalog('Fresh Logs Only')" id="btn-fresh" class="px-4 py-2 rounded-xl text-left text-xs font-semibold uppercase tracking-wider bg-surface-container-high text-on-surface-variant hover:text-on-surface hover:bg-white/10 transition-all">
                            Logs Only (Block 1 & 2)
                        </button>
                        <button onclick="filterCatalog('ULP Packages Only')" id="btn-ulp" class="px-4 py-2 rounded-xl text-left text-xs font-semibold uppercase tracking-wider bg-surface-container-high text-on-surface-variant hover:text-on-surface hover:bg-white/10 transition-all">
                            ULP Only (Block 3)
                        </button>
                        <button onclick="filterCatalog('Fresh Logs & ULP Both')" id="btn-both" class="px-4 py-2 rounded-xl text-left text-xs font-semibold uppercase tracking-wider bg-surface-container-high text-on-surface-variant hover:text-on-surface hover:bg-white/10 transition-all">
                            Logs & ULP Both (Block 4)
                        </button>
                    </div>
                </div>

                <div class="pt-4 border-t border-white/10 space-y-2">
                    <a href="index.php" class="block w-full py-2.5 text-center rounded-xl bg-surface-container-high hover:bg-primary hover:text-on-primary text-on-surface font-label-sm font-semibold uppercase tracking-wider transition-all text-xs border border-white/10">
                        🏠 Home Page
                    </a>
                    <a href="#free-drop-vault" class="block w-full py-2.5 text-center rounded-xl bg-gradient-to-r from-tertiary to-secondary text-surface-container-lowest font-label-sm font-semibold uppercase tracking-wider shadow-lg hover:shadow-tertiary/40 transition-all text-xs">
                        🎁 Get Free Drop Today
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Product Cards & Detailed Tier Pricing -->
        <main class="lg:col-span-8 space-y-8">
            
            <!-- Products Catalog List (4 Blocks) -->
            <div class="space-y-6">
                <?php foreach ($products as $prod): ?>
                    <div class="product-item glass-panel glass-panel-hover p-6 rounded-2xl border border-white/10 flex flex-col xl:flex-row justify-between gap-6" data-type="<?php echo htmlspecialchars($prod['type']); ?>">
                        <div class="flex-grow space-y-3">
                            <div class="flex items-center gap-3">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold border backdrop-blur-md <?php echo $prod['badge_color']; ?>">
                                    <?php echo htmlspecialchars($prod['type']); ?>
                                </span>
                                <span class="text-xs text-primary font-mono bg-primary/10 px-3 py-1 rounded-full border border-primary/20">
                                    Stock: <?php echo htmlspecialchars($prod['stock']); ?>
                                </span>
                            </div>

                            <h3 class="font-headline-md text-xl font-bold text-on-surface">
                                <?php echo htmlspecialchars($prod['title']); ?>
                            </h3>

                            <p class="text-sm text-on-surface-variant leading-relaxed">
                                <?php echo htmlspecialchars($prod['description']); ?>
                            </p>

                            <!-- Terminal Sample Log Lines Viewer -->
                            <div class="bg-surface-container-lowest p-4 rounded-xl border border-white/10 font-mono text-xs text-green-400/90 space-y-1">
                                <div class="text-[10px] font-sans text-primary/80 font-bold uppercase tracking-widest mb-1.5 flex items-center gap-1">
                                    <span class="material-symbols-outlined text-xs">terminal</span> VERIFIED SAMPLE LINES:
                                </div>
                                <?php foreach ($prod['sample_lines'] as $line): ?>
                                    <div class="truncate">$ <?php echo htmlspecialchars($line); ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Ordered Pricing Tier Panel: Discount -> Monthly -> 3 Months -> Lifetime -->
                        <div class="xl:w-64 shrink-0 flex flex-col justify-between p-5 rounded-2xl bg-surface-container-low/80 border border-white/10 text-center space-y-3">
                            <div>
                                <!-- 1. Discount Price -->
                                <div class="text-[11px] text-green-400 font-bold uppercase tracking-widest mb-0.5">🔥 Discount Price</div>
                                <div class="text-xs text-on-surface-variant/60 line-through">Was <?php echo htmlspecialchars($prod['original_price']); ?></div>
                                <div class="font-display-lg text-base font-extrabold text-green-400 mb-3 bg-green-500/10 py-1 rounded-lg border border-green-500/20">
                                    <?php echo htmlspecialchars($prod['discount_price']); ?>
                                </div>

                                <!-- 2. Monthly Price -->
                                <div class="text-[10px] text-on-surface-variant uppercase tracking-wider font-semibold">Monthly Price</div>
                                <div class="font-semibold text-xs text-primary mb-2"><?php echo htmlspecialchars($prod['monthly_price']); ?></div>

                                <!-- 3. 3 Months Price -->
                                <div class="text-[10px] text-on-surface-variant uppercase tracking-wider font-semibold">3 Months Price</div>
                                <div class="font-semibold text-xs text-secondary mb-2"><?php echo htmlspecialchars($prod['three_month_price']); ?></div>

                                <!-- 4. Lifetime Price -->
                                <div class="text-[10px] text-on-surface-variant uppercase tracking-wider font-semibold">Lifetime Price</div>
                                <div class="font-semibold text-xs text-tertiary mb-3"><?php echo htmlspecialchars($prod['lifetime_price']); ?></div>
                            </div>

                            <!-- Buttons Section: Home Page & Get Free Drop Today -->
                            <div class="space-y-2 pt-2 border-t border-white/10">
                                <a href="index.php" class="block w-full py-2 rounded-xl bg-surface-container-high hover:bg-primary hover:text-on-primary text-on-surface font-label-sm font-semibold uppercase tracking-wider transition-all text-[11px] border border-white/10">
                                    Home Page
                                </a>
                                <a href="#free-drop-vault" class="block w-full py-2 rounded-xl bg-gradient-to-r from-primary to-secondary text-surface-container-lowest font-label-sm font-semibold uppercase tracking-wider shadow-md hover:shadow-primary/40 transition-all text-[11px]">
                                    Get Free Drop Today
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Instant Order & Inquiry Form -->
            <div id="order" class="glass-modal p-8 rounded-2xl border border-primary/20 shadow-2xl">
                <h2 class="font-headline-md text-2xl font-bold text-on-surface mb-2 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">shopping_cart</span>
                    Instant Order & Log Access Request
                </h2>
                <p class="text-sm text-on-surface-variant mb-6">Complete your order details below to receive instant log download tokens or ULP API credentials via email.</p>

                <div id="form-alert" class="hidden p-4 rounded-xl mb-6 text-sm"></div>

                <form id="orderForm" class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-on-surface-variant mb-1">Full Name</label>
                            <input type="text" name="name" required class="w-full px-4 py-2.5 rounded-xl bg-surface-container-lowest/80 border border-white/10 text-on-surface focus:outline-none focus:border-primary transition-colors text-sm" placeholder="Alex Morgan">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-on-surface-variant mb-1">Delivery Email</label>
                            <input type="email" name="email" required class="w-full px-4 py-2.5 rounded-xl bg-surface-container-lowest/80 border border-white/10 text-on-surface focus:outline-none focus:border-primary transition-colors text-sm" placeholder="alex@example.com">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-on-surface-variant mb-1">Selected Product Package</label>
                        <input type="text" id="selectedPackageInput" name="subject" required class="w-full px-4 py-2.5 rounded-xl bg-surface-container-lowest/80 border border-white/10 text-on-surface focus:outline-none focus:border-primary transition-colors text-sm" value="Block 1: Fresh System Access Logs (Logs Only)">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-on-surface-variant mb-1">Order Notes / Format Preference (JSON/CSV/Raw)</label>
                        <textarea name="message" rows="3" required class="w-full px-4 py-2.5 rounded-xl bg-surface-container-lowest/80 border border-white/10 text-on-surface focus:outline-none focus:border-primary transition-colors text-sm" placeholder="Specify quantity needed, preferred format, or custom webhook configuration..."></textarea>
                    </div>
                    <button type="submit" id="submitBtn" class="w-full py-3.5 rounded-xl bg-primary text-on-primary font-label-sm font-semibold uppercase tracking-wider hover:bg-white transition-all shadow-lg text-sm">
                        Submit Order & Get Tokens (PHP API)
                    </button>
                </form>
            </div>

        </main>

    </div>

</div>

<script>
function filterCatalog(type) {
    const items = document.querySelectorAll('.product-item');
    items.forEach(item => {
        if (type === 'all' || item.dataset.type === type) {
            item.style.display = 'flex';
        } else {
            item.style.display = 'none';
        }
    });

    document.getElementById('btn-all').className = type === 'all' ? 'px-4 py-2 rounded-xl text-left text-xs font-semibold uppercase tracking-wider bg-primary text-on-primary transition-all' : 'px-4 py-2 rounded-xl text-left text-xs font-semibold uppercase tracking-wider bg-surface-container-high text-on-surface-variant hover:text-on-surface transition-all';
    document.getElementById('btn-fresh').className = type === 'Fresh Logs Only' ? 'px-4 py-2 rounded-xl text-left text-xs font-semibold uppercase tracking-wider bg-primary text-on-primary transition-all' : 'px-4 py-2 rounded-xl text-left text-xs font-semibold uppercase tracking-wider bg-surface-container-high text-on-surface-variant hover:text-on-surface transition-all';
    document.getElementById('btn-ulp').className = type === 'ULP Packages Only' ? 'px-4 py-2 rounded-xl text-left text-xs font-semibold uppercase tracking-wider bg-primary text-on-primary transition-all' : 'px-4 py-2 rounded-xl text-left text-xs font-semibold uppercase tracking-wider bg-surface-container-high text-on-surface-variant hover:text-on-surface transition-all';
    document.getElementById('btn-both').className = type === 'Fresh Logs & ULP Both' ? 'px-4 py-2 rounded-xl text-left text-xs font-semibold uppercase tracking-wider bg-primary text-on-primary transition-all' : 'px-4 py-2 rounded-xl text-left text-xs font-semibold uppercase tracking-wider bg-surface-container-high text-on-surface-variant hover:text-on-surface transition-all';
}

function selectPackage(title) {
    document.getElementById('selectedPackageInput').value = title;
    document.getElementById('order').scrollIntoView({ behavior: 'smooth' });
}

document.getElementById('orderForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const btn = document.getElementById('submitBtn');
    const alert = document.getElementById('form-alert');
    btn.disabled = true;
    btn.textContent = 'Processing Order...';

    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData.entries());

    try {
        const response = await fetch('api/submit_inquiry.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });
        const result = await response.json();

        alert.classList.remove('hidden', 'bg-red-500/20', 'text-red-200', 'bg-green-500/20', 'text-green-200');
        if (result.success) {
            alert.classList.add('bg-green-500/20', 'text-green-200', 'border', 'border-green-500/30');
            alert.textContent = result.message;
            e.target.reset();
        } else {
            alert.classList.add('bg-red-500/20', 'text-red-200', 'border', 'border-red-500/30');
            alert.textContent = result.message || 'An error occurred while ordering.';
        }
    } catch (err) {
        alert.classList.remove('hidden');
        alert.classList.add('bg-red-500/20', 'text-red-200', 'border', 'border-red-500/30');
        alert.textContent = 'Server connection error. Please try again.';
    } finally {
        btn.disabled = false;
        btn.textContent = 'Submit Order & Get Tokens (PHP API)';
    }
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
