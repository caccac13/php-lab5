<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    echo '<div class="main"><div class="list">';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="item">
                <div class="card">
                    <img src="img/' . $row["image"] . '" class="card-img-top" alt="' . $row["name"] . '">
                    <div class="card-body">
                        <h5 class="name">' . $row["name"] . '</h5>
                        <p class="price">' . number_format($row["price"], 0, ',', '.') . ' VND</p>
                        <p class="discount">Giảm: ' . $row["discount"] . '%</p>
                        <p class="rating">' . str_repeat('★', $row["rating"]) . str_repeat('☆', 5 - $row["rating"]) . '</p>
                    </div>
                </div>
            </div>
            ';
        }
    } else {
        echo '<p class="text-center">Không có sản phẩm nào.</p>';
    }
    echo '<div class="clear"></div></div></div>';
    ?>
</body>



</html>