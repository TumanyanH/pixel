@extends('layouts.app')

@section('content')

<div class="container">
    <div class="p-15">
        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:480px;overflow:hidden;visibility:hidden;">
    <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
            <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:500px;overflow:hidden;">
                <div>
                    <img data-u="image" src="./img/slider/slider_img.png" />
                    <div class="slider_content p-120">
                        <h2 class="slider_title">iPhone 11 PRO</h2>
                        <p class="slider_text">The iPhone 11 Pro Max captures</p>
                        <p class="slider_text mt-0">superb videos - smooth, realistic, and superbly detailed.</p>
                        <button class="shop_now">Shop now</button>
                    </div>
                </div>
                <div>
                    <img data-u="image" src="img/slider/slider_img.png" />
                    <div class="slider_content p-120">
                        <h2 class="slider_title">iPhone 11 PRO</h2>
                        <p class="slider_text">The iPhone 11 Pro Max captures</p>
                        <p class="slider_text mt-0">superb videos - smooth, realistic, and superbly detailed.</p>
                        <button class="shop_now">Shop now</button>
                    </div>
                </div>
                <div>
                    <img data-u="image" src="img/slider/slider_img.png" />
                    <div class="slider_content p-120">
                        <h2 class="slider_title">iPhone 11 PRO</h2>
                        <p class="slider_text">The iPhone 11 Pro Max captures</p>
                        <p class="slider_text mt-0">superb videos - smooth, realistic, and superbly detailed.</p>
                        <button class="shop_now">Shop now</button>
                    </div>
                </div>
            </div> 
           
            <!-- Arrow Navigator -->
            <div data-u="arrowleft" class="jssora106 my_arrow" style="width:55px;height:55px;top:162px;left:30px;" data-scale="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                    <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3"></polyline>
                </svg>
            </div>
            <div data-u="arrowright" class="jssora106 my_arrow" style="width:55px;height:55px;top:162px;right:30px;" data-scale="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                    <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3"></polyline>
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="p-70 on_slider_block">
        <div class="shadow">
            <div class="top_slider_cards wow flipInX" data-wow-delay=".3s" style="background-image: url('./img/1.png');">
                <h2>iWatch</h2>
                <p>Shop Now</p>
                <p class="prc"><span>399000</span> AMD</p>
            </div>

            <div class="top_slider_cards wow flipInX" data-wow-delay=".6s" style="background-image: url('./img/2.png');">
                <h2>iPhone 11</h2>
                <p>Shop Now</p>
                <p class="prc"><span>399000</span> AMD</p>
            </div>

            <div class="top_slider_cards wow flipInX" data-wow-delay=".9s" style="background-image: url('./img/3.png');">
                <h2>AirPods</h2>
                <p>Shop Now</p>
                <p class="prc"><span>399000</span> AMD</p>
            </div>
        </div>
    </div>
</div>

<div class="container under_slider_block_container">
    <div class="p-70 under_slider_block">
        <div class="border-bottom">
            <div class="under_slider_block_card wow fadeInLeft" data-wow-delay=".3s">
                <i class="fas fa-truck float-left" style="color: #A3A3A3;font-size: 17px;"></i>
                <h3>Free Shipping</h3>
                <div class="clear-both"></div>
                <p>Free shipping on all US order ororder above $200</p>
            </div>

            <div class="under_slider_block_card wow fadeInLeft" data-wow-delay=".6s">
                <i class="fas fa-info-circle float-left" style="color: #A3A3A3;font-size: 17px;"></i>
                <h3>Support 24/7</h3>
                <div class="clear-both"></div>
                <p>Contact us 25 hours a day, 7 day8s a week</p>
            </div>

            <div class="under_slider_block_card wow fadeInLeft" data-wow-delay=".9s">
                <i class="fas fa-redo-alt float-left" style="color: #A3A3A3;font-size: 17px;"></i>
                <h3>30 Days Return</h3>
                <div class="clear-both"></div>
                <p>Simply return it within 30 days for an exchange</p>
            </div>

            <div class="under_slider_block_card wow fadeInLeft" data-wow-delay="1.2s">
                <i class="far fa-credit-card float-left" style="color: #A3A3A3;font-size: 17px;"></i>
                <h3>100% Payment Secure</h3>
                <div class="clear-both"></div>
                <p>We ensure secure payment with PEV</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="p-70">
        <h2 class="top_products_title">Top product</h2>

        <ul class="product_models">
            <li>Apple</li>
            <li>Samsung</li>
            <li>Xiaomi</li>
            <li>Honor</li>
            <li>Huawei</li>
            <li>Used</li>
        </ul>
    </div>
</div>

<div class="container slider_container">
    <div class="p-70">
        <div class="owl-carousel owl-theme">
            
            <div class="item">
                <img src="./img/slider1.png" alt="">

                <div class="product-name">
                    <span class="prod_name">Apple iPhone 11</span>
                    <span class="add_cart_text"><i class="fas fa-shopping-cart pr-5"></i>Add to cart</span>
                    <div class="clear-both"></div>
                </div>

                <div class="price">
                    <span class="curent_price">200000 AMD</span>
                    <span class="discount_price"><del>300000 AMD</del></span>
                    <div class="clear-both"></div>
                </div>

                <span class="new">NEW</span>
                <span class="discount">-20%</span>
            </div>
            
            <div class="item">
                <img src="./img/slider2.png" alt="">

                <div class="product-name">
                    <span class="prod_name">Apple iPhone 11</span>
                    <span class="add_cart_text"><i class="fas fa-shopping-cart pr-5"></i>Add to cart</span>
                    <div class="clear-both"></div>
                </div>

                <div class="price">
                    <span class="curent_price">200000 AMD</span>
                    <span class="discount_price"><del>300000 AMD</del></span>
                    <div class="clear-both"></div>
                </div>
            </div>
            
            <div class="item">
                <img src="./img/slider3.png" alt="">

                <div class="product-name">
                    <span class="prod_name">Apple iPhone 11</span>
                    <span class="add_cart_text"><i class="fas fa-shopping-cart pr-5"></i>Add to cart</span>
                    <div class="clear-both"></div>
                </div>

                <div class="price">
                    <span class="curent_price">200000 AMD</span>
                    <!-- <span class="discount_price">300000 AMD</span> -->
                    <div class="clear-both"></div>
                </div>

                <span class="new">NEW</span>
                <span class="discount">-20%</span>
            </div>
            
            <div class="item">
                <img src="./img/slider2.png" alt="">

                <div class="product-name">
                    <span class="prod_name">Apple iPhone 11</span>
                    <span class="add_cart_text"><i class="fas fa-shopping-cart pr-5"></i>Add to cart</span>
                    <div class="clear-both"></div>
                </div>

                <div class="price">
                    <span class="curent_price">200000 AMD</span>
                    <!-- <span class="discount_price">300000 AMD</span> -->
                    <div class="clear-both"></div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection