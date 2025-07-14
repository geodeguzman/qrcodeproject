<?php
require 'db.php';

function getData($conn, $search = null) {
    if ($search) {
        $stmt = $conn->prepare("SELECT * FROM qr_links WHERE title LIKE ? ORDER BY id DESC");
        $like = "%$search%";
        $stmt->bind_param("s", $like);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $result = $conn->query("SELECT * FROM qr_links ORDER BY id DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
