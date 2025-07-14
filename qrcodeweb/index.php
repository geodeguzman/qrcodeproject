<?php
require 'functions.php';
$data = getData($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>QR Code Generator</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<h2>Generate QR Code</h2>
<form action="save.php" method="POST">
    <input type="text" name="url" placeholder="Enter URL" required>
    <button type="submit">Generate</button>
</form>

<hr>

<h3>Saved QR Codes</h3>
<?php if (count($data) > 0): ?>
    <ul>
        <?php foreach ($data as $item): ?>
            <li>
                <p><strong>Link:</strong> <?= htmlspecialchars($item['url']) ?></p>
                <img src="<?= $item['qr'] ?>" alt="QR" width="100"><br>

                <form action="update.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <input type="text" name="url" value="<?= htmlspecialchars($item['url']) ?>" required>
                    <button type="submit">Update</button>
                </form>

                <form action="delete.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </li>
            <hr>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No saved QR codes.</p>
<?php endif; ?>

</body>
</html>
