<?php
require 'db.php';

if (isset($_POST['url'])) {
    $url = trim($_POST['url']);
    $qr = 'https://www.qrtag.net/api/qr?url=' . urlencode($url);

    $stmt = $conn->prepare("INSERT INTO qr_links (url, qr) VALUES (?, ?)");
    $stmt->bind_param("ss", $url, $qr);
    $stmt->execute();
}

header('Location: index.php');
exit;
