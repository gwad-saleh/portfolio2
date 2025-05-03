<?php
$conn = new mysqli("localhost", "root", "", "flower_shop");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['description'];
    $image = $_FILES['image']['name'];

    $target = "uploads/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $stmt = $conn->prepare("INSERT INTO flowers (name, price, image, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdss", $name, $price, $image, $desc);
    $stmt->execute();
    echo "<script>alert('تمت الإضافة!'); window.location.href='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>إضافة زهرة</title>
  <link rel="stylesheet" href="style.css">
  
  
</head>
<body >

  <div class="container">
  <h1 dir="rtl">متجر لبيع الازهار</h1>
    <h1>إضافة زهرة جديدة</h1>
    <form method="POST" enctype="multipart/form-data">
      <input type="text" name="name" placeholder="اسم الزهرة" required>
      <input type="number" step="0.01" name="price" placeholder="السعر" required>
      <textarea name="description" placeholder="الوصف" required></textarea>
      <input type="file" name="image" accept="image/*" required>
      <button type="submit">إضافة</button>
    </form>
  </div>
</body>
</html>