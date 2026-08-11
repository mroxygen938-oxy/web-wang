<?php
/**
 * Wangling Cloud Data Store
 * Fresh Logs & ULP (Ultimate Log Packages) Data Provider
 */

if (!defined('SITE_NAME')) {
    define('SITE_NAME', 'Wangling Cloud');
}
if (!defined('SITE_TAGLINE')) {
    define('SITE_TAGLINE', 'Premium Marketplace for Fresh Logs & ULP Protocols');
}

// Features List for Home Page
function get_home_features() {
    return [
        [
            'id' => 'fresh_logs',
            'title' => 'Fresh Hourly Logs',
            'icon' => 'schedule',
            'color_class' => 'text-primary',
            'border_hover' => 'hover:shadow-[0_20px_40px_rgba(193,193,255,0.1)]',
            'overlay_bg' => 'bg-primary/20',
            'button_bg' => 'hover:bg-primary hover:text-on-primary',
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB0zK85u_P1jjA5eeJzYCw4cPo4zhHkFGTiMmuQk47u_UFIZLUqr_wST05j7WSXGyHMhSDgi1MQc2U7sX67i_5pa8d5Pe4nfmcvwl_hqNEndfrRYeUyLFKV6N3s0TTkbpNoq6xq_bCKlo80zsoUq6pDQ1Z0UcnDwl-n1G_m4zcC0s8CCUYibMfnYkiEwdaI0KQ1SzhuwbX4YrttXNcCJPCYHXo5JlCN6uRx3UohgQkI5AdyifYA4Hdo',
            'description' => 'Real-time telemetry and access logs extracted hourly. 100% verified fresh, unparsed, and direct from high-throughput nodes.',
            'badge' => 'Instant Restock'
        ],
        [
            'id' => 'ulp_protocol',
            'title' => 'ULP Packages',
            'icon' => 'all_inclusive',
            'color_class' => 'text-secondary',
            'border_hover' => 'hover:shadow-[0_20px_40px_rgba(221,184,255,0.1)]',
            'overlay_bg' => 'bg-secondary/20',
            'button_bg' => 'hover:bg-secondary hover:text-on-secondary',
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAVDFrUo3zNhgGJb2PPpoHZup_i75jQ9LRkKF1rHr0Xj5-JRRk6hOMQvxBi55nTY67Z6mGW-8ZKWfk-I87-5rpuxnbTWgifUyPokDh3ezxafgeipMdxupXZoKkKGIMpzo15ssuHolHLzeArTlLYH8v3rU92UMFmDnfRrmefVtqtETLZjKaHa6Vsz7X5P28oGy-55omWfqMMcFSSTVSnV3sLgwaGAhTNk3p1yhvETt0EMYgQ8rGTIZfR',
            'description' => 'Ultimate Log Packages with unlimited streaming protocols. Bulk bandwidth access, automated WebHook hooks, and raw CSV/JSON dumps.',
            'badge' => 'Unlimited Stream'
        ],
        [
            'id' => 'verification',
            'title' => 'Verified Integrity',
            'icon' => 'verified_user',
            'color_class' => 'text-tertiary',
            'border_hover' => 'hover:shadow-[0_20px_40px_rgba(255,182,145,0.1)]',
            'overlay_bg' => 'bg-tertiary/20',
            'button_bg' => 'hover:bg-tertiary hover:text-on-tertiary',
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAaGxEouBh7F5E-7aFp0AZFhSp8UnVjU1QEWx2yhiEjAKvJuYJCiZ1cZpBvjJOB_MXCcmBhmJL7MHicejwnrSh0oP56eESnTfolAo6uIV6SnLlI8AVI4n118kuoxcsy5_85ckjrR8YqzGnsVfgdOgFeYp5cTLMxhIPHIhyYNoUvmSDC83RGVc_qY_jUAGzELbjYHmIJMXOSueQMwPBMvtuUDBgt0UmMnEBT1DdIAmH4evxnEbFM-cep',
            'description' => 'Every batch is pre-checked for validity. Zero duplicate records with automated sanitization & instant download tokens.',
            'badge' => 'Auto-Validated'
        ]
    ];
}

// Daily Free Drop Files Provider
function get_free_drop_files() {
    return [
        [
            'id' => 'drop_aug10_logs',
            'filename' => 'Daily_Free_Fresh_Logs_Batch_Aug10.txt',
            'file_size' => '2.4 MB',
            'format' => 'TXT / Raw Logs',
            'date' => 'Today (Aug 10)',
            'records' => '500 Fresh Log Lines',
            'download_url' => 'data/free_drops/Daily_Free_Fresh_Logs_Batch_Aug10.txt',
            'badge' => 'FREE DROP TODAY',
            'badge_color' => 'bg-tertiary/20 text-tertiary border-tertiary/30'
        ],
        [
            'id' => 'drop_aug10_ulp',
            'filename' => 'ULP_Free_Trial_Stream_Keys_Aug10.json',
            'file_size' => '850 KB',
            'format' => 'JSON / ULP Keys',
            'date' => 'Today (Aug 10)',
            'records' => '100 ULP Socket Tokens',
            'download_url' => 'data/free_drops/ULP_Free_Trial_Stream_Keys_Aug10.json',
            'badge' => 'ULP FREE TRIAL',
            'badge_color' => 'bg-secondary/20 text-secondary border-secondary/30'
        ],
        [
            'id' => 'drop_aug09_telemetry',
            'filename' => 'Cloud_Telemetry_Audit_Free_Sample_Pack.csv',
            'file_size' => '4.1 MB',
            'format' => 'CSV / Telemetry',
            'date' => 'Yesterday',
            'records' => '1,000 Verified Lines',
            'download_url' => 'data/free_drops/Cloud_Telemetry_Audit_Free_Sample_Pack.csv',
            'badge' => 'FREE ARCHIVE',
            'badge_color' => 'bg-primary/20 text-primary border-primary/30'
        ]
    ];
}

// Catalog Products: 1st (Only Logs), 2nd (Only Logs), 3rd (Only ULP), 4th (Logs & ULP Both)
function get_log_products() {
    return [
        // Block 1: ONLY LOGS
        [
            'id' => 'block_1_logs_only',
            'title' => 'Block 1: Fresh System Access Logs (Logs Only)',
            'type' => 'Fresh Logs Only',
            'original_price' => '$50',
            'discount_price' => '$19 (62% OFF Today)',
            'monthly_price' => '$29 / Month',
            'three_month_price' => '$69 / 3 Months',
            'lifetime_price' => '$149 Lifetime Access',
            'stock' => '2,450 Logs Available',
            'freshness' => '< 15 mins old',
            'badge_color' => 'bg-primary/20 text-primary border-primary/30',
            'description' => 'Dedicated Fresh Logs Package. Harvested traffic and system audit logs with full IP, headers, and session tokens.',
            'sample_lines' => [
                'LOGS: 2026-08-10 00:24:12 [INFO] GET /api/v4/auth - 200 OK - IP: 198.51.100.42',
                'LOGS: 2026-08-10 00:24:15 [DEBUG] Auth Session Token Created - UID: wcloud_94821',
                'LOGS: 2026-08-10 00:24:18 [INFO] POST /telemetry/stream - 201 Created'
            ]
        ],

        // Block 2: ONLY LOGS
        [
            'id' => 'block_2_logs_only',
            'title' => 'Block 2: Fresh Cloud Telemetry & Audit Logs (Logs Only)',
            'type' => 'Fresh Logs Only',
            'original_price' => '$80',
            'discount_price' => '$29 (63% OFF Today)',
            'monthly_price' => '$45 / Month',
            'three_month_price' => '$99 / 3 Months',
            'lifetime_price' => '$199 Lifetime Access',
            'stock' => '1,120 Logs Available',
            'freshness' => '< 1 hour old',
            'badge_color' => 'bg-primary/20 text-primary border-primary/30',
            'description' => 'Dedicated Cloud Access Logs Package containing container state changes, ingress requests, and gateway events.',
            'sample_lines' => [
                'LOGS: 2026-08-10 00:18:02 [SYS] Node Cluster Scaling Event - Auto-Spun 4 Micro-Containers',
                'LOGS: 2026-08-10 00:19:44 [GATEWAY] Ingress Route Updated - TLS 1.3 Handshake Successful',
                'LOGS: 2026-08-10 00:21:05 [AUDIT] User Auth Validated - Token #99482'
            ]
        ],

        // Block 3: ONLY ULP
        [
            'id' => 'block_3_ulp_only',
            'title' => 'Block 3: ULP Enterprise Streaming Protocol (ULP Only)',
            'type' => 'ULP Packages Only',
            'original_price' => '$299',
            'discount_price' => '$99 (67% OFF Today)',
            'monthly_price' => '$149 / Month',
            'three_month_price' => '$299 / 3 Months',
            'lifetime_price' => '$599 Lifetime Access',
            'stock' => 'Unlimited ULP Stream',
            'freshness' => 'Live Socket Stream',
            'badge_color' => 'bg-secondary/20 text-secondary border-secondary/30',
            'description' => 'Dedicated Ultimate Log Protocol (ULP) tier providing continuous WebSocket log streams, bulk downloads, and API webhooks.',
            'sample_lines' => [
                'ULP: CONNECT wss://ulp.wangling.cloud/v1/stream?token=ulp_live_token_7739',
                'ULP: STREAM [ACK] Protocol Connected - 50,000 events/sec active pipeline',
                'ULP: DATA [BULK_EXPORT] Batch #8491 Ready - 100,000 unparsed lines'
            ]
        ],

        // Block 4 (Last one): BOTH LOGS & ULP
        [
            'id' => 'block_4_both_logs_and_ulp',
            'title' => 'Block 4: Fresh Logs + ULP Master Combo Pack (Both Logs & ULP)',
            'type' => 'Fresh Logs & ULP Both',
            'original_price' => '$350',
            'discount_price' => '$129 (63% OFF Today)',
            'monthly_price' => '$179 / Month',
            'three_month_price' => '$349 / 3 Months',
            'lifetime_price' => '$699 Lifetime Access',
            'stock' => 'Logs + ULP Combo Pack',
            'freshness' => 'Instant Restock + Live ULP',
            'badge_color' => 'bg-tertiary/20 text-tertiary border-tertiary/30',
            'description' => 'Ultimate Master Pack including BOTH hourly Fresh System Logs and Unlimited ULP Protocol Socket Streaming in one bundle.',
            'sample_lines' => [
                'LOGS: 2026-08-10 00:24:12 [INFO] GET /api/v4/auth - 200 OK (Fresh Log)',
                'ULP: CONNECT wss://ulp.wangling.cloud/v1/stream?token=ulp_master_combo (ULP Stream)',
                'BOTH: 50,000 Fresh Logs Download + Unlimited ULP Pipeline Active'
            ]
        ]
    ];
}

// News & Restock Updates Data
function get_changelog_updates() {
    return [
        [
            'id' => 1,
            'title': 'Fresh Logs & ULP Restock: 500,000 New Telemetry Records Added',
            'category' => 'Fresh Stock',
            'date' => 'Aug 10, 2026',
            'excerpt' => 'Huge batch drop! Over 500,000 freshly extracted system logs and ULP streams are now live in the catalog with 100% verification guarantee.',
            'content' => 'Our automated harvesting pipeline has completed validation on 500k fresh logs and ULP protocols.',
            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBZmfZdvztZghgZJYkUQr0iuMr_eF5vWs8RiusSBzu0DkEYRMu6FZIWGaVTCZd4gIiiU-hUcbI0UbxvBjFTxJb9tDlGr1rX0KVXA2Qv4G3yk3TeY1fhkKmlFAqkaaVo2Q3VADsavMMmX_clIfOVVCtauiD4fXmsVejYJPID0CPkRvuSKGySb4NmVOQnFoS9d8six-zWYtRTojcwuO8QASTBxBDokDrigLY00Yqe-4bwxlMScEAJYna_',
            'badge_color' => 'bg-primary/20 text-primary border-primary/30'
        ]
    ];
}
