<?php

require_once('./connect/connect.php');

$getQuery = "SELECT * FROM products";
$runQuery = mysqli_query($connection, $getQuery);
$count = mysqli_num_rows($runQuery);

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
    <div class="admin">
        <div>
            <div class="upper_block"><h3>Products Table</h3><a href="add_product.php">add product</a></div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if ($count > 0) {

                        while ($row = mysqli_fetch_assoc($runQuery)) {

                    ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['qty'] ?></td>
                                <td><?php echo $row['price'] ?></td>
                                <td><?php echo $row['category'] ?></td>
                                <td><img src="./assets/image/<?php echo $row['image'] ?>" alt=""></td>
                                <td>
                                    <div>
                                        <a href="delete.php"><i class="fa fa-trash"></i></a>
                                        <a href="edit.php"><i class="fa fa-edit"></i></a>
                                        <a href="add_variable_product.php?id=<?php echo $row['id']?>"><i class="fa fa-plus"></i></a>
                                    </div>
                                </td>
                            </tr>
                    <?php

                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="./../assets/all.min.js"></script>
</body>

</html>