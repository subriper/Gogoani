<?php 
require_once('php/info.php'); 

// تمیز کردن آدرس برای تشخیص درست صفحات
$request = $_SERVER['REQUEST_URI'];
$path = trim(parse_url($request, PHP_URL_PATH), '/');

// اگر آدرس خالی بود یا کلمه home بود، یعنی صفحه اصلی هستیم
if ($path == "" || $path == "home" || $path == "index.php") {
    $current_page = "home";
} else {
    $current_page = $path;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="<?=$base_url?>/img/favicon.ico">
    <title>Watch anime online - <?=$website_name?></title>

    <meta name="description" content="Watch anime online in English. Free series and movies online.">
    <meta name="keywords" content="gogoanime, watch anime, anime online">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />

    <script type="text/javascript" src="<?=$base_url?>/js/libraries/jquery.js"></script>
    <script>
        var base_url = 'https://' + document.domain + '/';
    </script>
    <script type="text/javascript" src="https://cdn.gogocdn.net/files/gogo/js/main.js"></script>

    <?php 
    if(file_exists('php/advertisments/popup.html')) {
        require_once('php/advertisments/popup.html');
    }
    ?>
</head>

<body>
    <div id="wrapper_inside">
        <div id="wrapper">
            <div id="wrapper_bg">
                <header>
                    <div class="menu_top_link">
                        <div class="link_face intro">
                            <a class="btn twitter" href="#"></a>
                            <a class="btn facebook" href="#"></a>
                            <a class="btn discord" href="#"></a>
                            <a class="btn telegram" href="#"></a>
                        </div>
                        <div class="submenu_intro">
                            <a href="#">Request</a><span>|</span>
                            <a href="/contact-us">Contact us</a>
                        </div>          
                    </div>
                    <div class="clr"></div>

                    <section class="headnav">
                        <div style="text-align:center;margin-bottom:20px;">
                            <a href="/home"><img src="<?=$base_url?>/img/logo.svg" class="l-logo" alt="Logo" /></a>
                        </div>
                        <nav>
                            <ul style="text-align:center; list-style:none;">
                                <li style="display:inline-block;margin:0px 18px;"><a href="/home" class="home">Home</a></li>
                                <li style="display:inline-block;margin:0px 18px;"><a href="/anime-list" class="list">Anime list</a></li>
                                <li style="display:inline-block;margin:0px 18px;"><a href="/new-season" class="series">New season</a></li>
                                <li style="display:inline-block;margin:0px 18px;"><a href="/anime-movies" class="movie">Movies</a></li>
                                <li style="display:inline-block;margin:0px 18px;"><a href="/popular" class="popular">Popular</a></li>
                            </ul>   
                        </nav>
                        <div class="form" style="padding:bottom:20px;width:100%;">
                            <form style="max-width:600px;margin:0 auto;position:relative;" action="/search" method="get">
                                <div class="row">
                                    <input placeholder="search" name="keyword" type="text" autocomplete="off">            
                                    <input class="btngui" value="" type="submit">
                                </div>
                            </form>            
                        </div>
                    </section>
                </header>

                <div class="main_body">
                    <?php
                    // اگر صفحه اصلی بود، این متن‌ها رو نشون بده
                    if ($current_page == "home") {
                        ?>
                        <div style="color:#FFF;padding:18px;">
                            <h1 style="text-transform:uppercase;font-size:20px;"><?=$website_name?> - Best site to watch anime online for FREE.</h1>
                            <p>Welcome! We created <?=$website_name?> to provide a better experience for anime fans world-wide.</p>
                            <p><?=$website_name?> is a completely free streaming site to watch or download anime in HD quality.</p>
                        </div>
                        <?php
                    } 
                    // در غیر این صورت، فایل مربوطه رو از صفحه اصلی لود کن
                    else {
                        $target_file = __DIR__ . "/" . $current_page . ".php";

                        if (file_exists($target_file)) {
                            include($target_file);
                        } else {
                            echo '<div style="color:#FFF;padding:18px;text-align:center;">
                                    <h1>404 - Not Found</h1>
                                    <p>فایل مربوط به صفحه <b>' . $current_page . '.php</b> در پوشه اصلی پیدا نشد.</p>
                                    <p>مطمئن شو اسم فایل در گیت‌هاب با حروف کوچک باشد.</p>
                                  </div>';
                        }
                    }
                    ?>
                </div>

                <div style="text-align:center;margin:20px 0;">
                    <a href="/home" style="background:#000;color:#ffc119;font-size:18px;border:1px solid #fff;padding:10px 25px;border-radius:20px;">GO TO HOMEPAGE</a>
                </div>

                <div class="clr"></div>
                <footer>
                    <div class="menu_bottom" style="text-align:center; padding: 20px;">
                        <a href="/about-us">About us</a> | 
                        <a href="/contact-us">Contact us</a> | 
                        <a href="/privacy">Privacy</a>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="<?=$base_url?>/js/files/combo.js"></script>
    <?php 
    if(file_exists('php/include/footer.php')) {
        include('php/include/footer.php');
    }
    ?>  
</body>
</html>
