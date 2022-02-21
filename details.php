<?php

require_once('./admin/connect/connect.php');

$id = $_REQUEST['id'];

$query = "SELECT * FROM products WHERE id=$id";
$runQuery = mysqli_query($connection, $query);
$count = mysqli_num_rows($runQuery);

$variable_product_query = "SELECT * FROM variable_product WHERE main=$id";
$run_variable_product_query = mysqli_query($connection, $variable_product_query);
$v_count = mysqli_num_rows($run_variable_product_query);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time() ?>">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- bootstrap -->
    <link rel="stylesheet" href="./assets/all.min.css">
</head>

<body>
    <div class="detail">
        <?php

        if ($count > 0) {

            while ($row = mysqli_fetch_assoc($runQuery)) {

        ?>
                <div class="img_container">
                    <div class="img_box">
                        <img src="./admin/assets/image/<?php echo $row['image'] ?>" alt="" class="main_img">
                        <div class="other_img_box">
                            <?php

                            if ($v_count > 0) {

                                while ($v_row = mysqli_fetch_assoc($run_variable_product_query)) {

                            ?>
                                <a href="variable-details.php?id=<?php echo $v_row['id'] ?>">
                                    <img src="./admin/assets/image/<?php echo $v_row['image'] ?>" alt="">
                                </a>

                            <?php

                                }
                            }

                            ?>
                        </div>
                    </div>
                </div>
                <div class="desc_container">
                    <div class="desc_box">
                        <h3><?php echo $row['name'] ?></h3>
                        <p class="category"><i class="fa-solid fa-tags"></i><span><?php

                                                                                    echo $row['category'];

                                                                                    ?></span></p>
                        <p class="price"><?php echo $row['price'] ?>$</p>
                        <div class="quantity">
                            <button>-</button>
                            <p>0</p>
                            <button>+</button>
                        </div>
                        <div class="colors">
                            <div class="color">
                                <div class="inner color-red"></div>
                            </div>
                            <div class="color">
                                <div class="inner color-lime"></div>
                            </div>
                            <div class="color">
                                <div class="inner color-blue"></div>
                            </div>
                        </div>
                        <div class="description">
                            <?php echo $row['description'] ?>
                        </div>
                        <button class="add_to_cart"><i class="bx bx-cart-alt"></i></button>
                    </div>

                </div>
        <?php

            }
        }

        ?>
    </div>
    <script src="./assets/all.min.js"></script>
</body>

</html>