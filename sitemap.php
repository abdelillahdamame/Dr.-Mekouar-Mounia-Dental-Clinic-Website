<?php
header("Content-Type: application/xml; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset 
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" 
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 
      http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

// Define all URLs with their metadata
$pages = [
    ['loc' => 'https://drmekouarmounia.com/', 'lastmod' => '2025-01-22T23:18:10+00:00', 'priority' => '1.00'],
    ['loc' => 'https://drmekouarmounia.com/contact.html', 'lastmod' => '2025-01-22T23:18:10+00:00', 'priority' => '0.80'],
    ['loc' => 'https://drmekouarmounia.com/index.html', 'lastmod' => '2025-01-22T23:18:10+00:00', 'priority' => '0.80'],
    ['loc' => 'https://drmekouarmounia.com/rendez-vous.html', 'lastmod' => '2025-01-22T23:18:10+00:00', 'priority' => '0.80'],
    ['loc' => 'https://drmekouarmounia.com/a-propos.html', 'lastmod' => '2025-01-22T23:18:10+00:00', 'priority' => '0.80'],
    ['loc' => 'https://drmekouarmounia.com/blog-single.html', 'lastmod' => '2025-01-22T23:18:10+00:00', 'priority' => '0.80'],
    ['loc' => 'https://drmekouarmounia.com/404.html', 'lastmod' => '2025-01-22T23:18:10+00:00', 'priority' => '0.64'],
];

// Generate the XML content
foreach ($pages as $page) {
    echo '<url>';
    echo '<loc>' . htmlspecialchars($page['loc']) . '</loc>';
    echo '<lastmod>' . $page['lastmod'] . '</lastmod>';
    echo '<priority>' . $page['priority'] . '</priority>';
    echo '</url>';
}

echo '</urlset>';
?>