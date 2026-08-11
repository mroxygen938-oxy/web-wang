<?php
require_once __DIR__ . '/../data/store.php';

if (!isset($current_page)) {
    $current_page = 'home';
}
if (!isset($page_title)) {
    $page_title = 'Wangling Cloud - Fresh Logs & ULP Marketplace';
}
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="description" content="Wangling Cloud is the premier marketplace for fresh system logs, telemetry access logs, and ULP (Ultimate Log Packages) with instant delivery.">
    
    <!-- Google Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

    <!-- Tailwind CSS Engine & Custom Config -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "background": "#060e20",
                        "surface": "#060e20",
                        "surface-dim": "#060e20",
                        "surface-bright": "#31394d",
                        "surface-container-lowest": "#040914",
                        "surface-container-low": "#131b2e",
                        "surface-container": "#171f33",
                        "surface-container-high": "#222a3d",
                        "surface-container-highest": "#2d3449",
                        "on-surface": "#dae2fd",
                        "on-surface-variant": "#c7c4d8",
                        "outline": "#908fa1",
                        "outline-variant": "#464556",
                        "primary": "#c1c1ff",
                        "on-primary": "#1500a8",
                        "primary-container": "#5d5cff",
                        "on-primary-container": "#fdf9ff",
                        "secondary": "#ddb8ff",
                        "on-secondary": "#490081",
                        "secondary-container": "#62259b",
                        "on-secondary-container": "#d1a1ff",
                        "tertiary": "#ffb691",
                        "on-tertiary": "#552000",
                        "tertiary-container": "#bf5200",
                        "on-tertiary-container": "#fff9f7",
                    },
                    fontFamily: {
                        "display-lg": ["Sora", "sans-serif"],
                        "headline-md": ["Sora", "sans-serif"],
                        "body-lg": ["Inter", "sans-serif"],
                        "body-md": ["Inter", "sans-serif"],
                        "label-sm": ["Inter", "sans-serif"],
                        "mono": ["JetBrains Mono", "monospace"],
                    }
                }
            }
        };
    </script>
    
    <!-- Custom Glass Styles & Hardcore Dynamic JS Engine -->
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/glass-effects.js" defer></script>
</head>
<body class="bg-background text-on-surface min-h-screen overflow-x-hidden">

    <!-- WebGL Background Shader Canvas -->
    <?php include __DIR__ . '/bg_shader.php'; ?>

    <!-- Sticky Ultra Glass Navigation Bar -->
    <header class="fixed top-0 w-full z-50 glass-nav" style="background: rgba(11, 19, 38, 0.45); backdrop-filter: blur(35px);">
        <div class="h-20 w-full px-4 md:px-16 flex items-center justify-between">
            
            <!-- Logo & Brand Name -->
            <a href="index.php" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-full bg-primary/10 border border-primary/40 flex items-center justify-center group-hover:scale-110 transition-all shadow-[0_0_15px_rgba(193,193,255,0.3)]">
                    <span class="material-symbols-outlined text-primary">terminal</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-display-lg text-lg md:text-xl font-extrabold tracking-tight text-gradient-primary leading-none">
                        <?php echo htmlspecialchars(SITE_NAME); ?>
                    </span>
                    <span class="text-[10px] text-primary tracking-widest uppercase font-semibold mt-0.5">Fresh Logs & ULP</span>
                </div>
            </a>

            <!-- Navigation Links -->
            <nav class="hidden md:flex items-center gap-8">
                <a href="index.php" class="transition-all font-medium text-body-md <?php echo ($current_page === 'home') ? 'text-primary font-bold border-b-2 border-primary pb-1 shadow-[0_4px_12px_rgba(193,193,255,0.4)]' : 'text-on-surface-variant hover:text-on-surface'; ?>">
                    Store Front
                </a>
                <a href="product.php" class="transition-all font-medium text-body-md <?php echo ($current_page === 'product') ? 'text-primary font-bold border-b-2 border-primary pb-1 shadow-[0_4px_12px_rgba(193,193,255,0.4)]' : 'text-on-surface-variant hover:text-on-surface'; ?>">
                    Logs Catalog & ULP
                </a>
                <a href="updates.php" class="transition-all font-medium text-body-md <?php echo ($current_page === 'updates') ? 'text-primary font-bold border-b-2 border-primary pb-1 shadow-[0_4px_12px_rgba(193,193,255,0.4)]' : 'text-on-surface-variant hover:text-on-surface'; ?>">
                    Restock & News
                </a>
            </nav>

            <!-- Actions & User Profile Controls -->
            <div class="flex items-center gap-4">
                <button onclick="toggleThemeHint()" title="Toggle Visual Glass Glow" class="p-2 rounded-full hover:bg-white/10 transition-all flex items-center justify-center text-on-surface border border-white/10">
                    <span class="material-symbols-outlined text-primary">light_mode</span>
                </button>
                
                <a href="product.php#free-drop-vault" class="hidden sm:flex items-center gap-2 px-5 py-2.5 rounded-full bg-gradient-to-r from-tertiary to-secondary text-surface-container-lowest transition-all text-xs font-bold uppercase tracking-wider shadow-lg hover:shadow-tertiary/50 hover:scale-105">
                    <span>🎁 Get Free Drop</span>
                </a>

                <div class="w-9 h-9 rounded-full bg-primary flex items-center justify-center text-on-primary shadow-lg cursor-pointer hover:scale-110 transition-transform border border-white/20" title="Account Dashboard">
                    <span class="material-symbols-outlined text-[18px]">person</span>
                </div>
            </div>

        </div>
    </header>

    <!-- Main Container -->
    <main class="w-full pt-24 px-4 md:px-16 min-h-[calc(100vh-80px)]">
