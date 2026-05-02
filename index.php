<?php 
require_once('php/info.php'); 
// تمیز کردن مسیر برای تشخیص درست صفحات
$path = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
if ($path == '') { $path = '/'; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="<?=$base_url?>/img/favicon.ico">
    <title>Watch anime online, English anime online - <?=$website_name?></title>

    <meta name="description" content="Watch anime online in English. You can watch free series and movies online and English subtitle.">
    <meta name="keywords" content="gogoanime,watch anime, anime online, free anime, english anime, sites to watch anime">
    <meta itemprop="image" content="<?=$base_url?>/img/logo.png" />

    <meta property="og:site_name" content="<?=$website_name?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?=$website_name?> | Watch anime online" />
    <meta property="og:url" content="<?=$base_url?>" />
    <meta property="og:image" content="<?=$base_url?>/img/logo.png" />

    <link rel="canonical" href="<?=$base_url?>" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" />

    <script type="text/javascript" src="<?=$base_url?>/js/libraries/jquery.js"></script>
    <script>
        var base_url = 'https://' + document.domain + '/';
        var base_url_cdn_api = 'https://ajax.gogocdn.net/';
    </script>
    <script type="text/javascript" src="https://cdn.gogocdn.net/files/gogo/js/main.js"></script>

    <?php 
    // بررسی وجود فایل تبلیغات قبل از فراخوانی
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
                            <a class="btn twitter" href="#" target="_blank"></a>
                            <a class="btn facebook" href="#" target="_blank"></a>
                            <a class="btn discord" href="#" target="_blank"></a>
                            <a class="btn telegram" href="#" target="_blank"></a>
                        </div>
                        <div class="submenu_intro">
                            <a href="#">Request</a><span>|</span>
                            <a href="/contact-us">Contact us</a><span>|</span>
                            <a href="#">Gogotaku</a>
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
                    // منطق مدیریت صفحات
                    if ($path == '/' || $path == '/home' || $path == '/index.php') {
                        ?>
                        <div style="color:#FFF;padding:18px;">
                            <h1 style="text-transform:uppercase;font-size:20px;"><?=$website_name?> - Best site to watch anime online for FREE.</h1>
                            <p>Welcome! We created <?=$website_name?> to provide a better experience for anime fans world-wide.</p>
                            <p><?=$website_name?> is a completely free streaming site to watch or download anime in HD quality.</p>
                            <h6 style="font-size:18px;">Why choose us?</h6>
                            <p>Fast loading, huge content library, and daily updates are our core features.</p>
                        </div>
                        <?php
                    } 
                    else {
                        // تلاش برای لود کردن خودکار فایل از پوشه php بر اساس آدرس
                        $clean_path = ltrim($path, '/');
                        $target_file = __DIR__ . "/php/" . $clean_path . ".php";

                        if (file_exists($target_file)) {
                            include($target_file);
                        } else {
                            echo '<div style="color:#FFF;padding:18px;text-align:center;">
                                    <h1>404</h1>
                                    <p>Page ('.$clean_path.') not found in php folder.</p>
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
