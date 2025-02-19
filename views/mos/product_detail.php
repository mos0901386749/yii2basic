<?php
// ดึงค่า ID จาก URL
$id = $_GET['id'] ?? 0;

// สร้างตัวอย่างข้อมูลสินค้า (ในระบบจริงควรใช้ฐานข้อมูล)
$products = [
    1 => ['name' => 'VGA GIGABYTE RADEON RX 7600XT', 'price' => '12,980.-', 'image' => 'url_to_image'],
    2 => ['name' => 'VGA GIGABYTE RADEON RX 7700XT', 'price' => '16,560.-', 'image' => 'url_to_image'],
];

// ตรวจสอบว่ามีสินค้าหรือไม่
$product = $products[$id] ?? null;

if (!$product) {
    echo "ไม่พบสินค้า";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $product['name']; ?></title>
</head>
<body>
    <h1><?php echo $product['name']; ?></h1>
    <p>ราคา: <?php echo $product['price']; ?></p>
    <img src="<?php echo $product['image']; ?>" alt="Product Image">
</body>
</html>
