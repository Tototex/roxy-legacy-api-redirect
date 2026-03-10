<?php
// Simple redirect for legacy NFC URLs
// newportroxy.com/?sub=123 → newportroxy.com/member-check/?sub=123

if (!isset($_GET['sub'])) {
    return;
}

// Only run on the root path "/"
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($path !== '/' && $path !== '') {
    return;
}

$sub = intval($_GET['sub']);
if ($sub <= 0) {
    return;
}

header("Location: /member-check/?sub=" . $sub, true, 302);
exit;
