<?php

require_once('./connect/connect.php');

$main = $_REQUEST['id'];

if (isset($_REQUEST['submit'])) {
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];
    $price = $_REQUEST['price'];
    $category = $_REQUEST['category'];
    $qty = $_REQUEST['qty'];
    $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];

    $insertQuery = "INSERT INTO variable_product (main,name,description,price,category,image,status,qty) VALUES('$main','$name','$description','$price','$category','$image_name',1,'$qty')";
    $runQuery = mysqli_query($connection, $insertQuery);

    if ($runQuery) {
        $loc = 'assets/image/';
        move_uploaded_file($image_tmp_name, $loc . $image_name);
        header('location:index.php?success=product successfully added');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time() ?>">
    <!-- bootstrap -->
    <link rel="stylesheet" href="./../assets/all.min.css">
</head>

<body>
    <div class="add_product">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="name"><span>* </span>Product Name</label>
            <input type="text" name="name">
            <label for="price"><span>* </span>Product Price</label>
            <input type="text" name="price">
            <label for="description"><span>* </span>Product Description</label>
            <textarea name="description" id="description" rows="2"></textarea>
            <label for="category"><span>* </span>Product Category</label>
            <select name="category" id="category">
                <option value="Shoe">Shoe</option>
                <option value="Fashion">Fashion</option>
                <option value="Dress">Dress</option>
            </select>
            <label for="image"><span>* </span>Product Image</label>
            <input type="file" name="image" id="">
            <label for="qty"><span>* </span>Product Quantity</label>
            <input type="number" name="qty" id="" value="0">
            <button type="submit" name="submit">submit</button>
        </form>
    </div>
</body>

</html>