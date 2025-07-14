<?php
// Load functions and fetch data, with optional search
require 'functions.php';
$search = isset($_GET['search']) ? trim($_GET['search']) : null;
$data = getData($conn, $search);
?>

<!DOCTYPE html>
<html>
<head>
    <title>QR Code Generator</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .qr-img { width: 160px; height: 160px; }
        .edit-btn { background: none; border: none; cursor: pointer; margin-left: 8px; font-size: 1.1em; vertical-align: middle; display: flex; align-items: center; gap: 4px; }
        .edit-form { display: none; margin-top: 8px; }
        .show-edit .edit-form { display: block; }
        .show-edit .display-row { display: none; }
        .qr-header-row { display: flex; align-items: center; justify-content: space-between; width: 100%; margin-bottom: 8px; }
        .qr-title-row { display: flex; align-items: center; gap: 8px; }
    </style>
</head>
<body>

<!-- QR Code Generation Form -->
<h2>Generate QR Code</h2>
<form action="save.php" method="POST">
    <!-- Title input -->
    <input type="text" name="title" placeholder="Enter Name/Title" required>
    <!-- URL input -->
    <input type="text" name="url" placeholder="Enter URL" required>
    <button type="submit">Generate</button>
</form>

<!-- Search Form -->
<form method="GET" style="margin-bottom: 32px;">
    <input type="text" name="search" placeholder="Search by title..." value="<?= htmlspecialchars($search ?? '') ?>">
    <button type="submit">Search</button>
</form>

<hr>

<!-- Saved QR Codes Section -->
<h3>Saved QR Codes</h3>
<?php if (count($data) > 0): ?>
    <ul>
        <?php foreach ($data as $item): ?>
            <li id="qr-item-<?= $item['id'] ?>" style="position:relative;">
                <!-- Header row: favicon, name, edit button -->
                <div class="qr-header-row">
                    <div class="qr-title-row">
                        <strong>Name:</strong>
                        <!-- Favicon for visual identification -->
                        <img src="https://www.google.com/s2/favicons?domain=<?= urlencode(parse_url($item['url'], PHP_URL_HOST)) ?>&sz=32" alt="icon" style="vertical-align:middle;border-radius:4px;box-shadow:0 1px 3px rgba(60,60,100,0.10);">
                        <?= htmlspecialchars($item['title']) ?>
                    </div>
                    <!-- Edit button in upper right -->
                    <button class="edit-btn" title="Edit" onclick="showEditForm(<?= $item['id'] ?>); return false;">
                        <span>✏️</span> <span style="font-size:0.98em;color:#111;">Edit</span>
                    </button>
                </div>
                <!-- Display QR code image -->
                <div class="display-row">
                    <img src="<?= htmlspecialchars($item['qr']) ?>" alt="QR" class="qr-img"><br>
                </div>
                <!-- Edit form, shown only when editing -->
                <form action="update.php" method="POST" class="edit-form">
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                    <input type="text" name="title" value="<?= htmlspecialchars($item['title']) ?>" required placeholder="Edit Name/Title">
                    <input type="text" name="url" value="<?= htmlspecialchars($item['url']) ?>" required placeholder="Edit URL">
                    <button type="submit">Update</button>
                    <button type="button" onclick="hideEditForm(<?= $item['id'] ?>)">Cancel</button>
                </form>
                <!-- Delete button -->
                <form action="delete.php" method="POST" style="display:inline; margin-top: 8px;">
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

<!-- JavaScript for toggling edit mode -->
<script>
// Show the edit form for a specific QR code entry
function showEditForm(id) {
    document.getElementById('qr-item-' + id).classList.add('show-edit');
}
// Hide the edit form for a specific QR code entry
function hideEditForm(id) {
    document.getElementById('qr-item-' + id).classList.remove('show-edit');
}
</script>

</body>
</html>
