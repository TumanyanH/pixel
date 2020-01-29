<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Pixels—ը բջջային գադջեթների մասնագիտացված խանութ-սրահը է, որը զբաղվում է՝ բջջային հեռախոսների 📱, թաբլեթների, նոութբուքների, խաղային կցորդների և նրանց համալրող ողջ ակսեսուարների տեսականիի առք ու վաճառքով։">

    <link rel="icon" href="./img/ico/favicon.png" type="image/jpg">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="./css/style.css">

    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/fontawesome.min.js"></script>
    <script src="./js/all.js"></script>
    <script src="./js/jssor.slider-28.0.0.min.js"></script>
    <script src="./js/owl.carousel.min.js"></script>
    <script src="./js/wow.min.js"></script>
    <script src="./js/main.js"></script>

    <title>Mobile phone and accessories store in Armenia | Pixels.am</title>
</head>
<body>
<header>
    <div class="top_menu">
        <div class="container">
            <div class="p-15 flex-end">
                <ul class="top_menu_ul flex-center">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Tumanyan 33 front of V. Brusov univercity</p>
                    </li>
                    <li class="top_phone_li">
                        <i class="fas fa-phone-alt"></i>
                        <p class="ml-0"><a href="callto:+37444477747">+374 44 47 77 47</a></p>
                        <p><a href="callto:+37460511155">+374 60 51 11 55</a></p>
                    </li>
                    <li>
                        <ul class="top_menu_social">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <img class="iservice_img" src="./img/icerviceLink.png" alt="">
                        </a>
                    </li>
                    <li class="top_lang_li">
                        <img src="./img/eng.png" alt="">
                        <span>EN</span>
                        <i class="fas fa-chevron-down"></i>

                        <ul class="sub-menu lang_sub">
                            <li><a href="">
                                <img src="./img/eng.png" alt="">
                                <span>RU</span>
                            </a></li>
                            <li><a href="">
                                <img src="./img/eng.png" alt="">
                                <span>AM</span>
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <nav>
        <div class="container">
            <div class="p-15 space-between">
                <div class="logo">
                    <a href="#">
                        <img src="./img/PIXEL_LOGOcdr.png" alt="logo" title="logo">
                    </a>
                </div>

                <ul class="nav">
                    <li>
                        <a href="/">
                            <img src="./img/home.png" alt="" title="">
                            <p>Home</a></p>
                        </a>
                    </li>
                    <li>
                        <a href="/all_brands.php">    
                            <img src="./img/all_brands.png" alt="" title="">
                            <p>All Brands</p>
                        </a>
                        <ul class="sub-menu">
                            @foreach($brands as $brand)
                            <li><a href="/categories.php">Apple</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="/games">
                            <img src="./img/games.png" alt="" title="">
                            <p>Games</p>
                        </a>
                    </li>
                    <li>
                        <a href="/speakers">
                            <img src="./img/speaker.png" alt="" title="">
                            <p>Speakers</p>
                        </a>
                    </li>
                    <li>
                        <a href="/accessories">
                            <img src="./img/accessories.png" alt="" title="">
                            <p>Accessories</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about-us') }}">
                            <img src="./img/abaut_us.png" alt="" title="">
                            <p>About Us</p>
                        </a>
                    </li>
                    <li>
                        <img src="./img/Contact%20email.png" alt="" title="">
                        <p><a href="#">Contact Us</a></p>
                    </li>
                    <li>
                        <img src="./img/calculator.png" alt="" title="">
                        <p><a href="#">Calculator</a></p>
                    </li>
                    <li>
                        <img src="./img/search.png" alt="" title="">
                        <p><a href="#">Search</a></p>
                    </li>
                    <li>
                        <img src="./img/cart.png" alt="" title="">
                        <p><span class="cart_count">(0)</span></p>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

@yield('content')

<footer>
    <div class="container">
        <div class="p-15">
            <img class="pixel_logo" src="./img/logo (1).png" alt="logo">
            <p class="footer_address"><i class="fas fa-map-marker-alt pr-5"></i>Tumanyan 33 front of V. Brusov univercity</p>

            <p class="footer_phone">
                <i class="fas fa-phone-alt"></i>
                <a href="callto:+37444477747">+374 44 47 77 47</a>
                <a href="callto:+37460511155">+374 60 51 11 55</a>
            </p>

            <ul class="top_menu_social footer_social">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
            </ul>
                    
            <ul class="footer_menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Games</a></li>
                <li><a href="#">Speakers</a></li>
                <li><a href="#">Accessories</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Calculator</a></li>
                <li><a href="#">Cart</a></li>
                <li><a href="#">Privacy & Terms</a></li>
            </ul>               

            <ul class="footer_menu">
                <li><a href="#">Apple</a></li>
                <li><a href="#">Samsung</a></li>
                <li><a href="#">Xiaomi</a></li>
                <li><a href="#">Honor</a></li>
                <li><a href="#">Huawei</a></li>
                <li><a href="#">Used</a></li>
            </ul>

        </div>
    </div>

    <div class="line"></div>

    <div class="container">
        <div class="p-15 under_footer">
            <span class="created_by">Created by <a href="https://sed.am" target="_blanck">Sed Innovation</a>  &copy;  All Rights Reserved</span>

            <img class="pay_methods" src="./img/Mask Group 16.png" alt="">
        </div>
    </div>

</footer>

<script src="./js/slider.js"></script>
<script>
    jssor_1_slider_init();
    new WOW().init();    
</script>
</body>
</html>