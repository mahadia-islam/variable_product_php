<?php

require_once('./admin/connect/connect.php');

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
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- boostrap -->
    <link rel="stylesheet" href="./assets/all.min.css">
</head>

<body>
    <!-- header -->
    <header class="l-header">
        <nav class="nav bg-grid">
            <div>
                <a href="" class="nav__logo">SILON</a>
            </div>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="#featured" class="nav__link">Featured</a>
                    </li>
                    <li class="nav__item">
                        <a href="#new" class="nav__link">Top Collections</a>
                    </li>
                    <li class="nav__item">
                        <a href="#menwomen" class="nav__link">Men & Women</a>
                    </li>
                    <li class="nav__item">
                        <a href="#subscribed" class="nav__link">Subscribe</a>
                    </li>
                </ul>
            </div>
            <div>
                <i class='bx bx-cart-alt nav__cart'></i>
                <i class='bx bx-menu nav__toggle' id="nav-toggle"></i>
            </div>
        </nav>
    </header>
    <!-- main -->
    <main class="l-main">
        <!-- Home section -->
        <section class="home" id="home">
            <div class="home__container bg-grid">
                <div class="home__data">
                    <h1 class="home__title">
                        NEW
                        <br>
                        <span>ARRIVALS</span>
                    </h1>
                    <a href="#featured" class="button">GO SHOPPING</a>
                </div>
                <img src="assets/image/home.png" alt="" class="home__img">
            </div>
        </section>
        <!-- featured -->
        <section class="featured section" id="featured">
            <h2 class="section-title">FEATURED PRODUCTS</h2>
            <a href="" class="section-all">View All</a>
            <div class="featured__containar bg-grid">
                <?php

                if ($count > 0) {

                    while ($row = mysqli_fetch_assoc($runQuery)) {

                ?>
                        <div class="featured__product">
                            <div class="featured__box">
                                <div class="featured__new">NEW</div>
                                <img src="./admin/assets/image/<?php echo $row['image'] ?>" alt="" class="featured__img">
                            </div>
                            <div class="featured__data">
                                <h3 class="featured__name">
                                    <a href="details.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a>
                                </h3>
                                <span class="featured_preci">$<?php echo $row['price'] ?></span>
                            </div>
                        </div>
                <?php

                    }
                }

                ?>
            </div>
        </section>
        <!-- footer -->
        <footer class="footer section">
            <div class="footer__container bg-grid">
                <div class="footer__box">
                    <h3 class="footer__title">SILON</h3>
                    <p class="footer__deal">Products store</p>
                    <a href=""><img src="assets/image/footerstore1.png" alt="" class="footer__store"></a>
                    <a href=""><img src="assets/image/footerstore2.png" alt="" class="footer__store"></a>
                </div>

                <div class="footer__box">
                    <h3 class="footer__title">
                        EXPLORE
                    </h3>
                    <ul>
                        <li><a href="" class="footer__link">Home</a></li>
                        <li><a href="" class="footer__link">Featured</a></li>
                        <li><a href="" class="footer__link">New</a></li>
                        <li><a href="" class="footer__link">Subscribe</a></li>
                    </ul>
                </div>

                <div class="footer__box">
                    <h3 class="footer__title">
                        OUR SERVICES
                    </h3>
                    <ul>
                        <li><a href="" class="footer__link">Pricing</a></li>
                        <li><a href="" class="footer__link">Free shipping</a></li>
                        <li><a href="" class="footer__link">Gift Cards</a></li>
                    </ul>
                </div>

                <div class="footer__box">
                    <h3 class="footer__title">
                        FOLLOW
                    </h3>
                    <a href="" class="footer__social"><i class='bx bxl-facebook-square'></i></a>
                    <a href="" class="footer__social"><i class='bx bxl-instagram-alt'></i></a>
                    <a href="" class="footer__social"><i class='bx bxl-twitter'></i></a>
                </div>
            </div>
            <p class="footer__copy">&#169; 2021 copyright all right reserved</p>
        </footer>
    </main>
    <script src="./assets/js/app.js"></script>
    <script src="./assets/all.min.js"></script>
</body>

</html>