<?php
require 'db.php';

function getData($conn) {
    $result = $conn->query("SELECT * FROM qr_links ORDER BY id DESC");
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
