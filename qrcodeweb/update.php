<?php
require 'db.php';

if (isset($_POST['id']) && isset($_POST['url'])) {
    $id = (int)$_POST['id'];
    $url = trim($_POST['url']);
    $qr = 'https://www.qrtag.net/api/qr?url=' . urlencode($url);

    $stmt = $conn->prepare("UPDATE qr_links SET url = ?, qr = ? WHERE id = ?");
    $stmt->bind_param("ssi", $url, $qr, $id);
    $stmt->execute();
}

header('Location: index.php');
exit;
