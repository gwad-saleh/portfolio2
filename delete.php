<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli("localhost", "root", "", "flower_shop");
    $id = $_POST['id'];
    $image = $_POST['image'];

    $stmt = $conn->prepare("DELETE FROM flowers WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $imagePath = "uploads/" . basename($image);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    echo "<script>alert('تم الحذف بنجاح'); window.location.href='index.php';</script>";
}
?>