<?php
if (!isset($_GET['pid'])) {
    die();
}

$getId = $_GET['pid'];
$id = $getId[0];

$store = array(
    1 => "mtv",
    2 => "kadart",
    3 => "ice",
    4 => "cold",
    5 => "home",
    6 => "fashion"
);

if(!isset($_COOKIE['all'])) {
    $all = array(
        "1st" => $getId,
        "2nd" => 0,
        "3rd" => 0,
        "4th" => 0,
        "5th" => 0
    );
    $all = json_encode($all, true);
    setcookie('all', $all);
}

$key = $store[$id];

if(!isset($_COOKIE[$store[$id]])) {
    $value = array(
        "1st" => $getId,
        "2nd" => 0,
        "3rd" => 0,
        "4th" => 0,
        "5th" => 0
    );
    $value = json_encode($value, true);
    setcookie($key, $value);
}

if(isset($_COOKIE[$key]))
{
    $prod = $_COOKIE[$key];
    $prod = stripslashes($prod);    // string is stored with escape double quotes 
    $prod = json_decode($prod, true);
    $prod["5th"] = $prod["4th"];
    $prod["4th"] = $prod["3rd"];
    $prod["3rd"] = $prod["2nd"];
    $prod["2nd"] = $prod["1st"];
    $prod["1st"] = $getId;

    $prod = json_encode($prod, true);
    setcookie($key,$prod,time() + (86400*50));
}

if(isset($_COOKIE['all']))
{
    $prod = $_COOKIE['all'];
    $prod = stripslashes($prod);    // string is stored with escape double quotes 
    $prod = json_decode($prod, true);
    $prod["5th"] = $prod["4th"];
    $prod["4th"] = $prod["3rd"];
    $prod["3rd"] = $prod["2nd"];
    $prod["2nd"] = $prod["1st"];
    $prod["1st"] = $getId;

    $prod = json_encode($prod, true);
    setcookie('all',$prod,time() + (86400*50));
}


function get_data($url)
{
$curl = curl_init();
$timeout = 5;
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
$data = curl_exec($curl);
curl_close($curl);
return $data;
}

if (isset($id)) {
if ($id == 1) {
$content = get_data('http://deowanshi.me/prod_market_place.php');
} else if ($id == 2) {
$content = get_data('http://kadart.kademane.com/prod_market_place.php');
} else if ($id == 3) {
$content = get_data('http://www.icemodders.biz/prod_market_place.php');
} else if ($id == 4) {
$content = get_data('http://renup.org/product_marketplace.php');
} else if ($id == 5) {
$content = get_data('http://smitha.smithavenkatesh.com/prod_market_place.php');
} else if ($id == 6) {
$content = get_data('http://www.lvivek.com/prod_market_place.php');
}
}

$rows = json_decode($content, true);
//print_r($rows);
?>

<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fashionista</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800,400italic,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="lib/css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="lib/css/preview.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
        /****** Rating Starts *****/
        @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

        fieldset, label { margin: 0; padding: 0; }
        h1 { font-size: 1.5em; margin: 10px; }

        .rating {
            border: none;
            float: left;
        }

        .rating > input { display: none; }
        .rating > label:before {
            margin: 5px;
            font-size: 3em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        .rating > .half:before {
            content: "\f089";
            position: absolute;
        }

        .rating > label {
            color: #ddd;
            float: right;
        }

        .rating > input:checked ~ label,
        .rating:not(:checked) > label:hover,
        .rating:not(:checked) > label:hover ~ label { color: #FFD700;  }

        .rating > input:checked + label:hover,
        .rating > input:checked ~ label:hover,
        .rating > label:hover ~ input:checked ~ label,
        .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }


        /* Downloaded from http://devzone.co.in/ */
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#demo1 .stars").click(function () {

                $.post('rating.php',{rate:$(this).val()},function(d){
                    if(d>0)
                    {
                        alert('You already rated');
                    }else{
                        alert('Thanks For Rating');
                    }
                });
                $(this).attr("checked");
            });
        });
    </script>
</head>


<body class="home">
<header>
    <div class="header-container">
        <!--header top start-->
        <div class="container">
            <div class="top-bar">
                <div class="topbar-content">
                    <div class="header-email widget">
                        <i class="fa fa-envelope"></i><strong>Email:</strong> <a href="mailto:viveklakshmanan@live.com ">viveklakshmanan@live.com </a>
                    </div>
                    <div class="header-phone widget"><i class="fa  fa-phone"></i><strong>Phone:</strong><a href="tel:+16692924707"> (669) 272-4707</a> </div>
                    <div class="top-menu widget">
                        <div class="menu-top-menu-container">
                            <ul class="nav_menu" id="menu-top-menu">
                                <li class="menu-item  first"><a href="my-account.html">My Account</a></li>
                                <li class="menu-item"><a href="wishlist.html">My Wishlist</a></li>
                                <li class="menu-item"><a href="shopping-cart.html">Shopping Cart</a></li>
                                <li class="menu-item"><a href="checkout.html">Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header top end-->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="global-table">
                            <div class="global-row">
                                <div class="global-cell">
                                    <div class="logo">
                                        <a href="index.html" title="Market-Place" ><img src="img/logo/logo-1.png" alt="logo image" ></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-9 hidden-sm hidden-xs">
                        <div class="horizontal-menu">
                            <div class="global-table">
                                <div class="global-row">
                                    <div class="global-cell">
                                        <div class="visible-large">
                                            <div class="mega_main mega_main_menu" id="mega_main_menu_first">
                                                <div class="menu_holder">
                                                    <div class="menu_inner">
                                                        <nav>
                                                            <ul class="mega_main_menu_ul" id="mega_main_menu_ul_first">
                                                                <li >
                                                                    <a class="item_link" href="index.html">
															<span class="link_content">
																<span class="link_text">Home</span>
															</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item active">
                                                                    <a class="item_link" href="shop.html?id=4">
															<span class="link_content">
																<span class="link_text">Shop</span>
															</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item">
                                                                    <a class="item_link" href="blog.html">
															<span class="link_content">
																<span class="link_text">Blog</span>
															</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item">
                                                                    <a class="item_link" href="index.html#">
															<span class="link_content">
																<span class="link_text">Portfolio</span>
															</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item">
                                                                    <a class="item_link" href="index.html#">
															<span class="link_content">
																<span class="link_text">Pages</span>
															</span>
                                                                    </a>
                                                                </li>
                                                                <li class="menu-item">
                                                                    <a class="item_link" href="contact-us.html">
															<span class="link_content">
																<span class="link_text">Contact Us</span>
															</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                    <!-- /class="menu_inner" -->
                                                </div>
                                                <!-- /class="menu_holder" -->
                                            </div>
                                            <!-- /id="mega_main_menu" -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 hidden-md hidden-lg">
                        <!-- Main Menu End -->
                        <div class='mobile-menu-area'>
                            <nav id="mobile-menu">
                                <ul>
                                    <li><a href="index.html">Home</a>
                                    </li>
                                    <li><a href="shop.html">Shop</a>

                                    </li>
                                    <li><a href="blog.html">Blog</a>

                                    </li>
                                    <li><a href="portfolio-detailas.html">Portfolio</a>

                                    </li>
                                    <li><a href="index.html#">Pages</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Main Menu End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="clear"></div>
<div class="shop-header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="shop-header-title">
                    <h1>Shop All Products</h1>
                    <div class="shop-menu">
                        <ul>
                            <li><a <?php if(isset($getId) && $getId[0] == 4)  echo 'class="active"';?>href="shop.html?id=4">Cold Stone</a></li>
                            <li><a <?php if(isset($getId) && $getId[0] == 6)  echo 'class="active"';?>href="shop.html?id=6">Fashionista</a></li>
                            <li><a <?php if(isset($getId) && $getId[0] == 5)  echo 'class="active"';?>href="shop.html?id=5">Home Decors</a></li>
                            <li><a <?php if(isset($getId) && $getId[0] == 3)  echo 'class="active"';?>href="shop.html?id=3">Ice Modders</a></li>
                            <li><a <?php if(isset($getId) && $getId[0] == 2)  echo 'class="active"';?>href="shop.html?id=2">kadart</a></li>
                            <li><a <?php if(isset($getId) && $getId[0] == 1)  echo 'class="active"';?>href="shop.html?id=1">MTV Connect</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-container">


    <?php
        foreach ($rows as $row) {
if ($getId == $row['ProductId']) {
$price = $row['ProductPrice'];
$MRP = (int)$price + 2;
echo '    <div class="container">
    <div class="row" style="margin: 20px 0px;">
        <!-- product-simple-area start -->
        <div class="product-simple-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="breadcrumbs all-product-view-mode">
                            <a href="index.html">Home</a><span class="separator">&gt;</span><span><a href="shop.html?id=4"> Shop</a></span><span class="separator">&gt;</span><span>Product</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <div class="single-product-image">
                            <img src="img/product/'. $row['ProductId'] .'.jpg">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                        <div class="single-product-info">
                            <div class="clear"></div>
                            <div class="pro-rating">
                                <a class="yes" href="#"><i class="fa fa-star-o"></i></a>
                                <a class="yes" href="#"><i class="fa fa-star-o"></i></a>
                                <a class="yes" href="#"><i class="fa fa-star-o"></i></a>
                                <a class="yes" href="#"><i class="fa fa-star-o"></i></a>
                                <a href="#"><i class="fa fa-star-o"></i></a>
                                <span>&nbsp; &nbsp; | &nbsp; &nbsp;15 Customer Reviews</span>
                            </div>

                            <h1 class="product_title">'. $row['ProductName'] .'</h1>
                            <div class="short-description">
                                <p style="text-align: justify; margin-top: 10px;">'. $row['ProductDesc'] .'</p>
                            </div>
                            <div class="s-price-box">
                                <span class="new-price">'. $price .'</span>
                                <span class="old-price">'. $MRP .'</span>
                            </div>';
                            }
                            }
                            ?>
                            <form action="#">
                                <div class="quantity1">
                                    <input type="number" value="1">
                                    <button type="submit"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </form>
                            <div class="clear"></div>
                            <br />
                            <br />
                            <h3>Enter your Rating</h3>
                            <fieldset id='demo1' class="rating">
                                <input class="stars" type="radio" id="star5" name="rating" value="5" />
                                <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                <input class="stars" type="radio" id="star4" name="rating" value="4" />
                                <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                <input class="stars" type="radio" id="star3" name="rating" value="3" />
                                <label class = "full" for="star3" title="Meh - 3 stars"></label>
                                <input class="stars" type="radio" id="star2" name="rating" value="2" />
                                <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                <input class="stars" type="radio" id="star1" name="rating" value="1" />
                                <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                            </fieldset>
                            <div class="clear"></div>
                            <br />
                            <h3>Enter your Comments</h3>
                            <textarea id="comments" style="width: 100%; height: 130px;"></textarea>
                            <div class="quantity1">
                                <button type="submit" style="margin-top: 10px; width: 180px; height: 45px;">Submit Review</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product-simple-area end -->
    </div>
</div>
</div>
<div class="footer">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12 fix">
                    <div class="bottom_menu">
                        <div class="menu-customer-care-container">
                            <nav>
                                <ul class="nav_menu">
                                    <li class="menu-item"> <a href="index.html">Home</a> </li>
                                    <li class="menu-item"> <a href="shop.html">Shop </a> </li>
                                    <li class="menu-item"> <a href="about.html">About</a> </li>
                                    <li class="menu-item"> <a href="news.html">News</a> </li>
                                    <li class="menu-item"> <a href="contact.html">Contact</a> </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="copyright-info"> Copyright &copy; 2017 <a href="http://lvivek.com/">Lakshmanan Vivek </a> All Rights Reserved </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/vendor/jquery-1.11.3.min.js"></script>
<script src="lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="lib/home.js" type="text/javascript"></script>
</body>
</html>