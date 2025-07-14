<?php
require 'db.php';

if (isset($_POST['id']) && isset($_POST['url']) && isset($_POST['title'])) {
    $id = (int)$_POST['id'];
    $title = trim($_POST['title']);
    $url = trim($_POST['url']);
    $qr_api = 'https://qrtag.net/api/qr.svg?url=' . urlencode($url);
    $qr_dir = 'assets/qr_codes/';
    if (!is_dir($qr_dir)) { mkdir($qr_dir, 0777, true); }
    $filename = $qr_dir . uniqid('qr_') . '.svg';
    $qr_content = @file_get_contents($qr_api);
    if ($qr_content !== false) {
        file_put_contents($filename, $qr_content);
        $qr = $filename;
    } else {
        $qr = $qr_api; // fallback to remote if failed
    }

    $stmt = $conn->prepare("UPDATE qr_links SET title = ?, url = ?, qr = ? WHERE id = ?");
    $stmt->bind_param("sssi", $title, $url, $qr, $id);
    $stmt->execute();
}

header('Location: index.php');
exit;
