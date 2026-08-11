<?php
$current_page = 'updates';
$page_title = 'Restock Alerts & Protocol News - Wangling Cloud';
require_once __DIR__ . '/includes/header.php';

$updates = get_changelog_updates();

// PHP search & category filter handling
$selected_category = $_GET['category'] ?? 'All';
$search_query = trim($_GET['q'] ?? '');

$filtered_updates = array_filter($updates, function($item) use ($selected_category, $search_query) {
    $category_match = ($selected_category === 'All' || strtolower($item['category']) === strtolower($selected_category));
    $search_match = empty($search_query) || 
                     (stripos($item['title'], $search_query) !== false || stripos($item['excerpt'], $search_query) !== false);
    return $category_match && $search_match;
});
?>

<div class="flex flex-col w-full">

    <!-- Header Banner -->
    <div class="relative w-full min-h-[220px] flex flex-col justify-center mb-12 overflow-hidden rounded-2xl glass-panel border border-white/10 p-8 text-center">
        <div class="absolute -top-32 -right-32 w-96 h-96 bg-primary opacity-20 blur-[100px] rounded-full animate-pulse pointer-events-none"></div>
        <div class="relative z-10 max-w-2xl mx-auto">
            <h1 class="font-display-lg text-3xl md:text-4xl font-bold text-on-surface mb-2">Restock & Protocol News</h1>
            <p class="font-body-lg text-on-surface-variant text-sm md:text-base">
                Stay updated on fresh log batch drops, ULP streaming protocol updates, and system deduplication enhancements.
            </p>
        </div>
    </div>

    <!-- Filter & Search Control Bar -->
    <div class="glass-panel p-4 rounded-xl mb-8 flex flex-col md:flex-row items-center justify-between gap-4 border border-white/10">
        <!-- Category Filter Tags -->
        <div class="flex items-center gap-2 overflow-x-auto w-full md:w-auto">
            <?php 
            $categories = ['All', 'Fresh Stock', 'Protocol Update', 'System Improvement'];
            foreach ($categories as $cat): 
                $active = (strtolower($selected_category) === strtolower($cat));
            ?>
                <a href="updates.php?category=<?php echo urlencode($cat); ?><?php echo !empty($search_query) ? '&q=' . urlencode($search_query) : ''; ?>" 
                   class="px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all whitespace-nowrap <?php echo $active ? 'bg-primary text-on-primary shadow-md' : 'bg-surface-container-high text-on-surface-variant hover:text-on-surface hover:bg-white/10'; ?>">
                    <?php echo htmlspecialchars($cat); ?>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- PHP Search Form -->
        <form method="GET" action="updates.php" class="relative w-full md:w-72">
            <?php if ($selected_category !== 'All'): ?>
                <input type="hidden" name="category" value="<?php echo htmlspecialchars($selected_category); ?>">
            <?php endif; ?>
            <input type="text" name="q" value="<?php echo htmlspecialchars($search_query); ?>" 
                   placeholder="Search restocks or news..." 
                   class="w-full pl-10 pr-4 py-2 rounded-full bg-surface-container-lowest/80 border border-white/10 text-on-surface text-xs focus:outline-none focus:border-primary transition-colors">
            <span class="material-symbols-outlined absolute left-3 top-2.5 text-on-surface-variant text-base">search</span>
        </form>
    </div>

    <!-- Updates List Container -->
    <div class="flex flex-col gap-8 max-w-5xl mx-auto w-full pb-16">
        
        <?php if (empty($filtered_updates)): ?>
            <div class="glass-panel p-12 rounded-2xl text-center border border-white/10">
                <span class="material-symbols-outlined text-4xl text-on-surface-variant mb-2">find_in_page</span>
                <h3 class="text-lg font-semibold text-on-surface mb-1">No News Articles Found</h3>
                <p class="text-sm text-on-surface-variant mb-4">No results matching your query "<?php echo htmlspecialchars($search_query); ?>".</p>
                <a href="updates.php" class="px-6 py-2 rounded-full bg-primary text-on-primary text-xs font-semibold uppercase tracking-wider">Reset Filters</a>
            </div>
        <?php else: ?>
            <?php 
            $index = 0;
            foreach ($filtered_updates as $post): 
                $is_even = ($index % 2 === 0);
                $index++;
            ?>
                <article class="update-card group relative glass-panel rounded-2xl overflow-hidden transition-all duration-500 hover:-translate-y-2 flex flex-col <?php echo $is_even ? 'md:flex-row' : 'md:flex-row-reverse'; ?> shadow-lg border border-white/10 hover:border-primary/30">
                    <div class="w-full md:w-2/5 shrink-0 relative overflow-hidden h-56 md:h-auto">
                        <img alt="<?php echo htmlspecialchars($post['title']); ?>" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" 
                             src="<?php echo htmlspecialchars($post['image']); ?>">
                        <div class="absolute inset-0 bg-surface-container-highest/20 z-10"></div>
                    </div>

                    <div class="p-6 md:p-8 flex flex-col justify-center flex-grow relative z-20">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-semibold border backdrop-blur-md <?php echo $post['badge_color']; ?>">
                                <?php echo htmlspecialchars($post['category']); ?>
                            </span>
                            <span class="font-body-md text-on-surface-variant/70 tracking-widest uppercase text-xs">
                                <?php echo htmlspecialchars($post['date']); ?>
                            </span>
                        </div>

                        <h2 class="font-headline-md text-xl md:text-2xl font-semibold text-on-surface mb-3 group-hover:text-primary transition-colors">
                            <?php echo htmlspecialchars($post['title']); ?>
                        </h2>

                        <p class="font-body-md text-on-surface-variant text-sm line-clamp-3 mb-6 leading-relaxed">
                            <?php echo htmlspecialchars($post['excerpt']); ?>
                        </p>

                        <button onclick="openModal(<?php echo htmlspecialchars(json_encode($post)); ?>)" class="mt-auto inline-flex items-center text-primary font-label-sm text-xs uppercase tracking-wider group-hover:gap-3 transition-all duration-300 font-semibold">
                            Read Full Details <span class="material-symbols-outlined ml-1 text-base">arrow_forward</span>
                        </button>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>

</div>

<!-- Interactive Modal for Update Details -->
<div id="updateModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-background/80 backdrop-blur-md hidden">
    <div class="glass-modal max-w-2xl w-full rounded-2xl p-6 md:p-8 border border-white/20 relative shadow-2xl animate-fade-in-up">
        <button onclick="closeModal()" class="absolute top-4 right-4 p-2 rounded-full hover:bg-white/10 text-on-surface-variant hover:text-on-surface transition-colors">
            <span class="material-symbols-outlined">close</span>
        </button>

        <span id="modalCategory" class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-semibold border mb-4"></span>
        <span id="modalDate" class="ml-3 text-xs uppercase tracking-widest text-on-surface-variant"></span>

        <h2 id="modalTitle" class="font-headline-md text-2xl font-bold text-on-surface mb-4"></h2>
        
        <img id="modalImage" class="w-full h-48 object-cover rounded-xl mb-4 border border-white/10" src="" alt="">
        
        <div id="modalContent" class="text-sm text-on-surface-variant leading-relaxed mb-6 space-y-2"></div>

        <div class="flex justify-end">
            <button onclick="closeModal()" class="px-6 py-2 rounded-full bg-surface-container-high hover:bg-primary text-on-surface hover:text-on-primary text-xs font-semibold uppercase tracking-wider transition-all">
                Close
            </button>
        </div>
    </div>
</div>

<script>
function openModal(post) {
    document.getElementById('modalTitle').textContent = post.title;
    document.getElementById('modalDate').textContent = post.date;
    document.getElementById('modalCategory').textContent = post.category;
    document.getElementById('modalCategory').className = 'inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-semibold border ' + post.badge_color;
    document.getElementById('modalImage').src = post.image;
    document.getElementById('modalContent').textContent = post.content || post.excerpt;
    document.getElementById('updateModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('updateModal').classList.add('hidden');
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
