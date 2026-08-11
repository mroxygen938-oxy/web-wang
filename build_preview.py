#!/usr/bin/env python3
"""
Wangling Cloud Static Preview Generator
Renders PHP templates into HTML preview files for instant browser loading.
"""

import os

free_drops = [
    {
        'id': 'drop_aug10_logs',
        'filename': 'Daily_Free_Fresh_Logs_Batch_Aug10.txt',
        'file_size': '2.4 MB',
        'format': 'TXT / Raw Logs',
        'date': 'Today (Aug 10)',
        'records': '500 Fresh Log Lines',
        'download_url': 'data/free_drops/Daily_Free_Fresh_Logs_Batch_Aug10.txt',
        'badge': 'FREE DROP TODAY',
        'badge_color': 'bg-tertiary/20 text-tertiary border-tertiary/30'
    },
    {
        'id': 'drop_aug10_ulp',
        'filename': 'ULP_Free_Trial_Stream_Keys_Aug10.json',
        'file_size': '850 KB',
        'format': 'JSON / ULP Keys',
        'date': 'Today (Aug 10)',
        'records': '100 ULP Socket Tokens',
        'download_url': 'data/free_drops/ULP_Free_Trial_Stream_Keys_Aug10.json',
        'badge': 'ULP FREE TRIAL',
        'badge_color': 'bg-secondary/20 text-secondary border-secondary/30'
    },
    {
        'id': 'drop_aug09_telemetry',
        'filename': 'Cloud_Telemetry_Audit_Free_Sample_Pack.csv',
        'file_size': '4.1 MB',
        'format': 'CSV / Telemetry',
        'date': 'Yesterday',
        'records': '1,000 Verified Lines',
        'download_url': 'data/free_drops/Cloud_Telemetry_Audit_Free_Sample_Pack.csv',
        'badge': 'FREE ARCHIVE',
        'badge_color': 'bg-primary/20 text-primary border-primary/30'
    }
]

log_products = [
    {
        'id': 'block_1_logs_only',
        'title': 'Block 1: Fresh System Access Logs (Logs Only)',
        'type': 'Fresh Logs Only',
        'original_price': '$50',
        'discount_price': '$19 (62% OFF Today)',
        'monthly_price': '$29 / Month',
        'three_month_price': '$69 / 3 Months',
        'lifetime_price': '$149 Lifetime Access',
        'stock': '2,450 Logs Available',
        'freshness': '< 15 mins old',
        'badge_color': 'bg-primary/20 text-primary border-primary/30',
        'description': 'Dedicated Fresh Logs Package. Harvested traffic and system audit logs with full IP, headers, and session tokens.',
        'sample_lines': [
            'LOGS: 2026-08-10 00:24:12 [INFO] GET /api/v4/auth - 200 OK - IP: 198.51.100.42',
            'LOGS: 2026-08-10 00:24:15 [DEBUG] Auth Session Token Created - UID: wcloud_94821',
            'LOGS: 2026-08-10 00:24:18 [INFO] POST /telemetry/stream - 201 Created'
        ]
    },
    {
        'id': 'block_2_logs_only',
        'title': 'Block 2: Fresh Cloud Telemetry & Audit Logs (Logs Only)',
        'type': 'Fresh Logs Only',
        'original_price': '$80',
        'discount_price': '$29 (63% OFF Today)',
        'monthly_price': '$45 / Month',
        'three_month_price': '$99 / 3 Months',
        'lifetime_price': '$199 Lifetime Access',
        'stock': '1,120 Logs Available',
        'freshness': '< 1 hour old',
        'badge_color': 'bg-primary/20 text-primary border-primary/30',
        'description': 'Dedicated Cloud Access Logs Package containing container state changes, ingress requests, and gateway events.',
        'sample_lines': [
            'LOGS: 2026-08-10 00:18:02 [SYS] Node Cluster Scaling Event - Auto-Spun 4 Micro-Containers',
            'LOGS: 2026-08-10 00:19:44 [GATEWAY] Ingress Route Updated - TLS 1.3 Handshake Successful',
            'LOGS: 2026-08-10 00:21:05 [AUDIT] User Auth Validated - Token #99482'
        ]
    },
    {
        'id': 'block_3_ulp_only',
        'title': 'Block 3: ULP Enterprise Streaming Protocol (ULP Only)',
        'type': 'ULP Packages Only',
        'original_price': '$299',
        'discount_price': '$99 (67% OFF Today)',
        'monthly_price': '$149 / Month',
        'three_month_price': '$299 / 3 Months',
        'lifetime_price': '$599 Lifetime Access',
        'stock': 'Unlimited ULP Stream',
        'freshness': 'Live Socket Stream',
        'badge_color': 'bg-secondary/20 text-secondary border-secondary/30',
        'description': 'Dedicated Ultimate Log Protocol (ULP) tier providing continuous WebSocket log streams, bulk downloads, and API webhooks.',
        'sample_lines': [
            'ULP: CONNECT wss://ulp.wangling.cloud/v1/stream?token=ulp_live_token_7739',
            'ULP: STREAM [ACK] Protocol Connected - 50,000 events/sec active pipeline',
            'ULP: DATA [BULK_EXPORT] Batch #8491 Ready - 100,000 unparsed lines'
        ]
    },
    {
        'id': 'block_4_both_logs_and_ulp',
        'title': 'Block 4: Fresh Logs + ULP Master Combo Pack (Both Logs & ULP)',
        'type': 'Fresh Logs & ULP Both',
        'original_price': '$350',
        'discount_price': '$129 (63% OFF Today)',
        'monthly_price': '$179 / Month',
        'three_month_price': '$349 / 3 Months',
        'lifetime_price': '$699 Lifetime Access',
        'stock': 'Logs + ULP Combo Pack',
        'freshness': 'Instant Restock + Live ULP',
        'badge_color': 'bg-tertiary/20 text-tertiary border-tertiary/30',
        'description': 'Ultimate Master Pack including BOTH hourly Fresh System Logs and Unlimited ULP Protocol Socket Streaming in one bundle.',
        'sample_lines': [
            'LOGS: 2026-08-10 00:24:12 [INFO] GET /api/v4/auth - 200 OK (Fresh Log)',
            'ULP: CONNECT wss://ulp.wangling.cloud/v1/stream?token=ulp_master_combo (ULP Stream)',
            'BOTH: 50,000 Fresh Logs Download + Unlimited ULP Pipeline Active'
        ]
    }
]

changelog_updates = [
    {
        'id': 1,
        'title': 'Fresh Logs & ULP Restock: 500,000 New Telemetry Records Added',
        'category': 'Fresh Stock',
        'date': 'Aug 10, 2026',
        'excerpt': 'Huge batch drop! Over 500,000 freshly extracted system logs and ULP streams are now live in the catalog with 100% verification guarantee.',
        'image': 'https://lh3.googleusercontent.com/aida-public/AB6AXuBZmfZdvztZghgZJYkUQr0iuMr_eF5vWs8RiusSBzu0DkEYRMu6FZIWGaVTCZd4gIiiU-hUcbI0UbxvBjFTxJb9tDlGr1rX0KVXA2Qv4G3yk3TeY1fhkKmlFAqkaaVo2Q3VADsavMMmX_clIfOVVCtauiD4fXmsVejYJPID0CPkRvuSKGySb4NmVOQnFoS9d8six-zWYtRTojcwuO8QASTBxBDokDrigLY00Yqe-4bwxlMScEAJYna_',
        'badge_color': 'bg-primary/20 text-primary border-primary/30'
    }
]

def render_header(current_page, title):
    with open('/home/oxygen/Music/OXY/webwang/includes/bg_shader.php', 'r') as f:
        bg_shader = f.read()
    
    home_active = 'text-primary font-bold border-b-2 border-primary pb-1 shadow-[0_4px_12px_rgba(255,0,160,0.4)]' if current_page == 'home' else 'text-on-surface-variant hover:text-on-surface'
    product_active = 'text-primary font-bold border-b-2 border-primary pb-1 shadow-[0_4px_12px_rgba(255,0,160,0.4)]' if current_page == 'product' else 'text-on-surface-variant hover:text-on-surface'
    updates_active = 'text-primary font-bold border-b-2 border-primary pb-1 shadow-[0_4px_12px_rgba(255,0,160,0.4)]' if current_page == 'updates' else 'text-on-surface-variant hover:text-on-surface'

    return f"""<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{title}</title>
    <meta name="description" content="Wangling Cloud is the premier marketplace for fresh system logs, telemetry access logs, and ULP (Ultimate Log Packages) with instant delivery.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {{
            darkMode: "class",
            theme: {{
                extend: {{
                    colors: {{
                        "background": "#050214",
                        "surface": "#050214",
                        "surface-dim": "#050214",
                        "surface-bright": "#31394d",
                        "surface-container-lowest": "#03010b",
                        "surface-container-low": "#0d0524",
                        "surface-container": "#120830",
                        "surface-container-high": "#1c0d42",
                        "surface-container-highest": "#261254",
                        "on-surface": "#dae2fd",
                        "on-surface-variant": "#c7c4d8",
                        "outline": "#908fa1",
                        "outline-variant": "#464556",
                        "primary": "#ff00a0",
                        "on-primary": "#ffffff",
                        "primary-container": "#e0115f",
                        "on-primary-container": "#fdf9ff",
                        "secondary": "#ddb8ff",
                        "on-secondary": "#490081",
                        "secondary-container": "#62259b",
                        "on-secondary-container": "#d1a1ff",
                        "tertiary": "#ffb691",
                        "on-tertiary": "#552000",
                        "tertiary-container": "#bf5200",
                        "on-tertiary-container": "#fff9f7",
                    }},
                    fontFamily: {{
                        "display-lg": ["Sora", "sans-serif"],
                        "headline-md": ["Sora", "sans-serif"],
                        "body-lg": ["Inter", "sans-serif"],
                        "body-md": ["Inter", "sans-serif"],
                        "label-sm": ["Inter", "sans-serif"],
                        "mono": ["JetBrains Mono", "monospace"],
                    }}
                }}
            }}
        }};
    </script>
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/glass-effects.js" defer></script>
</head>
<body class="bg-background text-on-surface min-h-screen overflow-x-hidden">
    {bg_shader}
    <header class="fixed top-0 w-full z-50 glass-nav" style="background: rgba(12, 5, 32, 0.65); backdrop-filter: blur(35px);">
        <div class="h-20 w-full px-4 md:px-16 flex items-center justify-between">
            <a href="index.html" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-full bg-primary/20 border border-primary/40 flex items-center justify-center group-hover:scale-105 transition-all shadow-[0_0_15px_rgba(255,0,160,0.4)]">
                    <span class="material-symbols-outlined text-primary">terminal</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-display-lg text-lg md:text-xl font-extrabold tracking-tight text-gradient-primary leading-none">Wangling Cloud</span>
                    <span class="text-[10px] text-primary tracking-widest uppercase font-semibold mt-0.5">Fresh Logs & ULP</span>
                </div>
            </a>
            <nav class="hidden md:flex items-center gap-8">
                <a href="index.html" class="transition-all font-medium text-body-md {home_active}">Store Front</a>
                <a href="product.html" class="transition-all font-medium text-body-md {product_active}">Logs Catalog & ULP</a>
                <a href="updates.html" class="transition-all font-medium text-body-md {updates_active}">Restock & News</a>
            </nav>
            <div class="flex items-center gap-4">
                <button onclick="toggleThemeHint()" title="Toggle Visual Glass Glow" class="p-2 rounded-full hover:bg-white/10 transition-all flex items-center justify-center text-on-surface border border-white/10">
                    <span class="material-symbols-outlined text-primary">light_mode</span>
                </button>
                <a href="product.html#free-drop-vault" class="hidden sm:flex items-center gap-2 px-5 py-2.5 rounded-full bg-gradient-to-r from-tertiary to-primary text-white transition-all text-xs font-bold uppercase tracking-wider shadow-lg hover:shadow-primary/50">
                    <span>🎁 Get Free Drop</span>
                </a>
                <div class="w-9 h-9 rounded-full bg-primary flex items-center justify-center text-white shadow-lg cursor-pointer hover:scale-105 transition-transform border border-white/20" title="Account Dashboard">
                    <span class="material-symbols-outlined text-[18px]">person</span>
                </div>
            </div>
        </div>
    </header>
    <main class="w-full pt-24 px-4 md:px-16 min-h-[calc(100vh-80px)]">
"""

def render_footer():
    return f"""
    </main>
    <footer class="w-full py-8 px-4 md:px-16 mt-16">
        <div class="glass-panel rounded-2xl p-6 flex flex-col md:flex-row items-center justify-between gap-6 border border-white/10 shadow-lg">
            <div class="font-label-sm text-on-surface-variant uppercase tracking-widest text-xs">
                © 2026 Wangling Cloud. All Rights Reserved. Dynamic Magenta Ribbon Waves Engine.
            </div>
            <div class="flex items-center gap-6">
                <a href="index.html" class="text-on-surface-variant hover:text-primary transition-colors flex items-center gap-1 text-sm">
                    <span class="material-symbols-outlined text-base">storefront</span>
                    <span class="hidden sm:inline">Store</span>
                </a>
                <a href="product.html#free-drop-vault" class="text-on-surface-variant hover:text-tertiary transition-colors flex items-center gap-1 text-sm">
                    <span class="material-symbols-outlined text-base">card_giftcard</span>
                    <span class="hidden sm:inline">Free Drop Vault</span>
                </a>
            </div>
        </div>
    </footer>
    <script>
        function toggleThemeHint() {{
            const canvas = document.getElementById('ribbon-wave-canvas');
            if (canvas) {{
                canvas.style.filter = canvas.style.filter ? '' : 'hue-rotate(90deg) brightness(1.3)';
            }}
        }}
    </script>
</body>
</html>
"""

# 1. Render index.html
home_content = render_header('home', 'Wangling Cloud - Fresh Logs & ULP Marketplace') + """
<div class="flex flex-col w-full font-body-md text-on-surface">
    <section class="relative w-full h-[540px] md:h-[600px] mb-16 flex items-center justify-center rounded-3xl overflow-hidden glass-panel shadow-2xl border border-white/15">
        <div class="absolute inset-0 z-0">
            <img alt="Cloud server telemetry logs" class="w-full h-full object-cover opacity-75 mix-blend-screen" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDNyCIASNBrdBvx0bX6EsTofLljxHizTEqUe2QAPYDQA8_fv2FJlqejcfyqHAvQq5YiYbyDNqNfFyd-CmQDzbzpmzU24LRAiKAAli3vWsedGtjnoOkXPU5IXsyiiZrplsZ5vmRSkrIjxL_Y8HWcvKv0SiBOnXpl5YDhH8rFY50IM5ejqANlIH4caEPrTHpVvSJUiG7EPIX54FQBg5AOjST8wdWF2QepDID17y1rQmhmtmy84DSzqgEF">
            <div class="absolute inset-0 bg-gradient-to-t from-background via-background/40 to-transparent"></div>
        </div>
        <div class="relative z-10 p-6 md:p-12 glass-modal rounded-2xl max-w-3xl mx-4 text-center border border-white/20 shadow-[inset_0_1px_2px_rgba(255,255,255,0.3)] fade-in-up">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary/20 text-primary font-label-sm text-xs uppercase tracking-widest mb-4 border border-primary/40 shadow-[0_0_15px_rgba(255,0,160,0.4)]">
                <span class="w-2.5 h-2.5 rounded-full bg-green-400 animate-ping"></span>
                Fresh Batch Restocked Today
            </div>
            <h1 class="font-display-lg text-3xl md:text-5xl font-extrabold mb-4 text-gradient-primary">
                Fresh Logs & ULP Marketplace
            </h1>
            <p class="font-body-lg text-on-surface-variant max-w-xl mx-auto text-base md:text-lg mb-6 leading-relaxed">
                Access 100% verified hourly fresh system logs, cloud access streams, and Unlimited Log Packages (ULP) with instant API delivery.
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="product.html" class="px-7 py-3.5 rounded-full bg-gradient-to-r from-primary to-secondary text-white font-label-sm font-bold uppercase tracking-wider shadow-xl hover:shadow-primary/50 transition-all">
                    Browse Fresh Catalog
                </a>
                <a href="product.html#free-drop-vault" class="px-7 py-3.5 rounded-full glass-panel hover:bg-white/10 text-on-surface font-label-sm font-bold uppercase tracking-wider transition-all border border-white/20">
                    🎁 Get Free Drop Today
                </a>
            </div>
        </div>
    </section>

    <section id="free-drop" class="relative w-full p-8 md:p-12 mb-16 rounded-3xl glass-modal border border-tertiary/40 shadow-2xl overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="max-w-xl space-y-3">
                <span class="px-3 py-1 rounded-full bg-tertiary/20 text-tertiary text-xs font-bold uppercase tracking-wider border border-tertiary/40 shadow-[0_0_15px_rgba(255,182,145,0.3)]">
                    🎁 Daily Free Drop Claim
                </span>
                <h2 class="font-display-lg text-2xl md:text-4xl font-extrabold text-on-surface">
                    Claim Today's Free Fresh Logs & ULP Batch
                </h2>
                <p class="text-on-surface-variant text-sm md:text-base leading-relaxed">
                    Get 500 fresh unparsed telemetry access logs + ULP socket access for FREE today. Direct download links posted in the Free Drop Vault!
                </p>
            </div>
            <div class="w-full md:w-auto flex flex-col sm:flex-row items-center gap-4">
                <a href="product.html#free-drop-vault" class="w-full sm:w-auto px-8 py-4 text-center rounded-2xl bg-gradient-to-r from-tertiary to-primary text-white font-label-sm font-extrabold uppercase tracking-wider shadow-xl hover:shadow-tertiary/60 transition-all text-sm">
                    Open Free Drop Vault
                </a>
                <a href="index.html" class="w-full sm:w-auto px-6 py-4 text-center rounded-2xl glass-panel hover:bg-white/10 text-on-surface font-label-sm font-semibold uppercase tracking-wider transition-all text-sm border border-white/15">
                    Home Page
                </a>
            </div>
        </div>
    </section>

    <section class="pb-16 w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
"""

for prod in log_products:
    home_content += f"""
            <div class="glass-panel glass-panel-hover rounded-2xl p-6 flex flex-col justify-between border border-white/15 relative overflow-hidden group">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold border backdrop-blur-md {prod['badge_color']}">{prod['type']}</span>
                        <span class="text-xs text-primary font-mono bg-primary/10 px-3 py-1 rounded-full border border-primary/20">{prod['freshness']}</span>
                    </div>
                    <h3 class="font-headline-md text-xl font-bold text-on-surface mb-2 group-hover:text-primary transition-colors">{prod['title']}</h3>
                    <p class="text-sm text-on-surface-variant mb-4 leading-relaxed">{prod['description']}</p>
                    
                    <div class="bg-surface-container-lowest/90 p-4 rounded-xl border border-white/15 font-mono text-xs text-green-400/90 mb-6 space-y-1 overflow-x-auto shadow-inner">
                        <div class="text-[10px] font-sans text-primary/80 font-bold uppercase tracking-widest mb-1.5 flex items-center gap-1">
                            <span class="material-symbols-outlined text-xs">terminal</span> VERIFIED SAMPLE LINES:
                        </div>
"""
    for line in prod['sample_lines']:
        home_content += f'<div class="truncate text-green-300/90 font-mono">$ {line}</div>'
    home_content += f"""
                    </div>

                    <div class="grid grid-cols-2 gap-3 p-4 rounded-xl bg-surface-container-low/90 border border-white/15 text-center mb-6">
                        <div class="p-2.5 rounded-lg bg-green-500/10 border border-green-500/30 col-span-2 shadow-[0_0_15px_rgba(74,222,128,0.15)]">
                            <div class="text-[10px] text-green-400 font-bold uppercase tracking-wider">🔥 Discount Price</div>
                            <div class="text-xs text-on-surface-variant/60 line-through">Was {prod['original_price']}</div>
                            <div class="font-extrabold text-sm text-green-400">{prod['discount_price']}</div>
                        </div>
                        <div class="p-2 rounded-lg bg-white/5 border border-white/10">
                            <div class="text-[10px] text-on-surface-variant uppercase font-semibold">Monthly Price</div>
                            <div class="font-bold text-xs text-primary">{prod['monthly_price']}</div>
                        </div>
                        <div class="p-2 rounded-lg bg-white/5 border border-white/10">
                            <div class="text-[10px] text-on-surface-variant uppercase font-semibold">3 Months Price</div>
                            <div class="font-bold text-xs text-secondary">{prod['three_month_price']}</div>
                        </div>
                        <div class="p-2 rounded-lg bg-white/5 border border-white/10 col-span-2">
                            <div class="text-[10px] text-on-surface-variant uppercase font-semibold">Lifetime Price</div>
                            <div class="font-bold text-xs text-tertiary">{prod['lifetime_price']}</div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3 pt-4 border-t border-white/15 mt-auto">
                    <a href="index.html" class="py-2.5 text-center rounded-xl bg-surface-container-high hover:bg-primary hover:text-white text-on-surface font-label-sm font-bold uppercase tracking-wider transition-all text-xs border border-white/15 shadow-sm">
                        Home Page
                    </a>
                    <a href="product.html#free-drop-vault" class="py-2.5 text-center rounded-xl bg-gradient-to-r from-primary to-secondary text-white font-label-sm font-bold uppercase tracking-wider shadow-md hover:shadow-primary/50 transition-all text-xs">
                        Get Free Drop Today
                    </a>
                </div>
            </div>
"""

home_content += """
        </div>
    </section>
</div>
""" + render_footer()

with open('/home/oxygen/Music/OXY/webwang/index.html', 'w') as f:
    f.write(home_content)

# 2. Render product.html
product_content = render_header('product', 'Fresh Logs Catalog, ULP & Daily Free Drops - Wangling Cloud') + """
<div class="flex flex-col w-full gap-12">
    <div class="relative w-full h-[320px] md:h-[380px] flex flex-col justify-end p-6 md:p-12 -mt-6 overflow-hidden rounded-3xl border border-white/15 shadow-2xl" 
         style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCU97sCbBgSmk6rdZoQI1tcnMOgsqTvL_lvsbQDnGQeFjkdDiE_lcL9Jq90O1b2uAlvvQ7jfSvnoECHJHdlhzm2_J3aYYCgsyzX0zc6Cu-vWdbiteEPe_n1Fys5V1U-YvWE2SdxXpu4p5DrWCNqmcYBBFr7HNfpyrZD0ylPY00OUnjrt2tM_xbP5lTjpE7CUzeQydCr2terrAxj89zC5Kf7ljypBP0j71i0whR8mEf4rntzWHkhvFk9'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-gradient-to-t from-background via-background/60 to-transparent z-0"></div>
        <div class="relative z-10 max-w-4xl space-y-3">
            <div class="inline-flex items-center gap-2 px-4 py-1 rounded-full glass-panel bg-primary-container/30 text-on-primary-container font-label-sm text-xs uppercase tracking-widest border border-primary/40 shadow-[0_0_15px_rgba(255,0,160,0.4)]">
                <span class="w-2.5 h-2.5 rounded-full bg-green-400 animate-ping"></span>
                Daily Free Drop Vault Active
            </div>
            <h1 class="font-display-lg text-3xl md:text-5xl font-extrabold text-on-surface drop-shadow-2xl">
                Logs Catalog, ULP & Daily Free Drops
            </h1>
            <p class="font-body-lg text-on-surface-variant max-w-2xl text-base md:text-lg">
                Download daily free log drop files below or purchase premium Fresh Logs & high-bandwidth ULP stream packages with instant API access keys.
            </p>
        </div>
    </div>

    <!-- 🎁 Daily Free Drop Files Vault Section -->
    <section id="free-drop-vault" class="w-full p-6 md:p-8 rounded-3xl glass-modal border border-tertiary/40 shadow-2xl space-y-6">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 pb-4 border-b border-white/15">
            <div>
                <span class="px-3 py-1 rounded-full bg-tertiary/20 text-tertiary text-xs font-bold uppercase tracking-wider border border-tertiary/40 mb-2 inline-block shadow-[0_0_15px_rgba(255,182,145,0.3)]">
                    🎁 Daily Free Drop Files Vault (100% Free)
                </span>
                <h2 class="font-display-lg text-2xl md:text-3xl font-extrabold text-on-surface">
                    Posted Free Drop Files for Download Today
                </h2>
            </div>
            <div class="text-xs text-on-surface-variant bg-surface-container-high px-4 py-2 rounded-xl border border-white/15 flex items-center gap-2 font-mono">
                <span class="material-symbols-outlined text-green-400 text-sm">update</span> Updated Today • 100% Free Direct Download
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
"""

for drop in free_drops:
    product_content += f"""
            <div class="glass-panel p-5 rounded-2xl border border-white/15 flex flex-col justify-between hover:border-tertiary/50 transition-all space-y-4">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-semibold border {drop['badge_color']}">{drop['badge']}</span>
                        <span class="text-[11px] text-on-surface-variant font-mono">{drop['date']}</span>
                    </div>

                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-xl bg-tertiary/10 border border-tertiary/30 flex items-center justify-center text-tertiary shrink-0 shadow-[0_0_12px_rgba(255,182,145,0.3)]">
                            <span class="material-symbols-outlined">download_for_offline</span>
                        </div>
                        <div class="overflow-hidden">
                            <div class="font-bold text-sm text-on-surface truncate font-mono">{drop['filename']}</div>
                            <div class="text-xs text-on-surface-variant font-mono">{drop['file_size']} • {drop['format']}</div>
                        </div>
                    </div>

                    <div class="text-xs text-primary bg-primary/10 px-3 py-1.5 rounded-xl border border-primary/20 font-mono">
                        Includes: {drop['records']}
                    </div>
                </div>

                <a href="{drop['download_url']}" download class="w-full py-2.5 text-center rounded-xl bg-gradient-to-r from-tertiary to-primary text-white font-label-sm font-bold uppercase tracking-wider shadow-md hover:shadow-tertiary/50 transition-all text-xs flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-sm">download</span>
                    Download Free File
                </a>
            </div>
"""

product_content += """
        </div>
    </section>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 pb-12">
        <aside class="lg:col-span-4 space-y-6">
            <div class="glass-panel p-6 rounded-2xl bg-surface-container-low/50 backdrop-blur-2xl sticky top-28 border border-white/15 space-y-6">
                <div>
                    <h3 class="font-headline-md text-lg font-bold mb-2 text-primary">Filter Catalog</h3>
                    <div class="flex flex-col gap-2">
                        <button onclick="filterCatalog('all')" id="btn-all" class="px-4 py-2 rounded-xl text-left text-xs font-bold uppercase tracking-wider bg-primary text-white transition-all shadow-md">All Packages</button>
                        <button onclick="filterCatalog('Fresh Logs Only')" id="btn-fresh" class="px-4 py-2 rounded-xl text-left text-xs font-bold uppercase tracking-wider bg-surface-container-high text-on-surface-variant hover:text-on-surface transition-all">Logs Only (Block 1 & 2)</button>
                        <button onclick="filterCatalog('ULP Packages Only')" id="btn-ulp" class="px-4 py-2 rounded-xl text-left text-xs font-bold uppercase tracking-wider bg-surface-container-high text-on-surface-variant hover:text-on-surface transition-all">ULP Only (Block 3)</button>
                        <button onclick="filterCatalog('Fresh Logs & ULP Both')" id="btn-both" class="px-4 py-2 rounded-xl text-left text-xs font-bold uppercase tracking-wider bg-surface-container-high text-on-surface-variant hover:text-on-surface transition-all">Logs & ULP Both (Block 4)</button>
                    </div>
                </div>
                <div class="pt-4 border-t border-white/15 space-y-2">
                    <a href="index.html" class="block w-full py-2.5 text-center rounded-xl bg-surface-container-high hover:bg-primary hover:text-white text-on-surface font-label-sm font-bold uppercase tracking-wider transition-all text-xs border border-white/15">
                        🏠 Home Page
                    </a>
                    <a href="#free-drop-vault" class="block w-full py-2.5 text-center rounded-xl bg-gradient-to-r from-tertiary to-primary text-white font-label-sm font-bold uppercase tracking-wider shadow-lg hover:shadow-tertiary/50 transition-all text-xs">
                        🎁 Get Free Drop Today
                    </a>
                </div>
            </div>
        </aside>

        <main class="lg:col-span-8 space-y-8">
            <div class="space-y-6">
"""

for prod in log_products:
    product_content += f"""
                <div class="product-item glass-panel glass-panel-hover p-6 rounded-2xl border border-white/15 flex flex-col xl:flex-row justify-between gap-6" data-type="{prod['type']}">
                    <div class="flex-grow space-y-3">
                        <div class="flex items-center gap-3">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold border backdrop-blur-md {prod['badge_color']}">{prod['type']}</span>
                            <span class="text-xs text-primary font-mono bg-primary/10 px-3 py-1 rounded-full border border-primary/20">Stock: {prod['stock']}</span>
                        </div>
                        <h3 class="font-headline-md text-xl font-bold text-on-surface">{prod['title']}</h3>
                        <p class="text-sm text-on-surface-variant leading-relaxed">{prod['description']}</p>

                        <div class="bg-surface-container-lowest p-4 rounded-xl border border-white/15 font-mono text-xs text-green-400/90 space-y-1 shadow-inner">
                            <div class="text-[10px] font-sans text-primary/80 font-bold uppercase tracking-widest mb-1.5 flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">terminal</span> VERIFIED SAMPLE LINES:
                            </div>
"""
    for line in prod['sample_lines']:
        product_content += f'<div class="truncate">$ {line}</div>'
    product_content += f"""
                        </div>
                    </div>

                    <div class="xl:w-64 shrink-0 flex flex-col justify-between p-5 rounded-2xl bg-surface-container-low/80 border border-white/15 text-center space-y-3">
                        <div>
                            <div class="text-[11px] text-green-400 font-bold uppercase tracking-widest mb-0.5">🔥 Discount Price</div>
                            <div class="text-xs text-on-surface-variant/60 line-through">Was {prod['original_price']}</div>
                            <div class="font-display-lg text-base font-extrabold text-green-400 mb-3 bg-green-500/10 py-1 rounded-lg border border-green-500/20 shadow-[0_0_15px_rgba(74,222,128,0.15)]">
                                {prod['discount_price']}
                            </div>
                            <div class="text-[10px] text-on-surface-variant uppercase tracking-wider font-semibold">Monthly Price</div>
                            <div class="font-bold text-xs text-primary mb-2">{prod['monthly_price']}</div>
                            <div class="text-[10px] text-on-surface-variant uppercase tracking-wider font-semibold">3 Months Price</div>
                            <div class="font-bold text-xs text-secondary mb-2">{prod['three_month_price']}</div>
                            <div class="text-[10px] text-on-surface-variant uppercase tracking-wider font-semibold">Lifetime Price</div>
                            <div class="font-bold text-xs text-tertiary mb-3">{prod['lifetime_price']}</div>
                        </div>

                        <div class="space-y-2 pt-2 border-t border-white/15">
                            <a href="index.html" class="block w-full py-2 rounded-xl bg-surface-container-high hover:bg-primary hover:text-white text-on-surface font-label-sm font-bold uppercase tracking-wider transition-all text-[11px] border border-white/15 shadow-sm">
                                Home Page
                            </a>
                            <a href="#free-drop-vault" class="block w-full py-2 rounded-xl bg-gradient-to-r from-primary to-secondary text-white font-label-sm font-bold uppercase tracking-wider shadow-md hover:shadow-primary/50 transition-all text-[11px]">
                                Get Free Drop Today
                            </a>
                        </div>
                    </div>
                </div>
"""

product_content += """
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
}
</script>
""" + render_footer()

with open('/home/oxygen/Music/OXY/webwang/product.html', 'w') as f:
    f.write(product_content)

print("[OK] Generated Glowing Magenta Ribbon Wave preview files")
