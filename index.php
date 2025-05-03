<?php
$conn = new mysqli("localhost", "root", "", "flower_shop");
$result = $conn->query("SELECT * FROM flowers");
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>متجر الزهور</title>
  <link rel="stylesheet" href="style.css">
  <script src="js/script.js"></script>
</head>
<body>
  <div class="container">
    <h1>الزهور المتوفرة</h1>
    <a href="upload.php">+ إضافة زهرة جديدة</a>
    <?php while($row = $result->fetch_assoc()): ?>
      <div class="flower-card">
        <img src="uploads/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
        <div>
          <h2><?= htmlspecialchars($row['name']) ?></h2>
          <p><?= nl2br(htmlspecialchars($row['description'])) ?></p>
          <strong><?= $row['price'] ?> ريال</strong><br><br>
          <form method="POST" action="delete.php" onsubmit="return confirmDelete('<?= htmlspecialchars($row['name']) ?>');">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="image" value="<?= $row['image'] ?>">
            <button type="submit" class="delete-btn">حذف</button>
          </form>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</body>
</html>