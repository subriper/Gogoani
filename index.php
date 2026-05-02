<?php 
// تعریف مسیر اصلی پروژه برای جلوگیری از ارور در فایل‌های include شده
define('ROOT_PATH', __DIR__); 
require_once(ROOT_PATH . '/php/info.php'); 

// مدیریت آدرس صفحات
$request = $_SERVER['REQUEST_URI'];
$path = trim(parse_url($request, PHP_URL_PATH), '/');

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
    <title><?=$website_name?> - Watch Anime Online</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script type="text/javascript" src="<?=$base_url?>/js/libraries/jquery.js"></script>
    <script>var base_url = 'https://' + document.domain + '/';</script>
    <script type="text/javascript" src="https://cdn.gogocdn.net/files/gogo/js/main.js"></script>
    <?php if(file_exists(ROOT_PATH . '/php/advertisments/popup.html')) { require_once(ROOT_PATH . '/php/advertisments/popup.html'); } ?>
</head>
<body>
    <div id="wrapper_inside"><div id="wrapper"><div id="wrapper_bg">
        <header>
            <section class="headnav">
                <div style="text-align:center;margin-bottom:20px;">
                    <a href="/home"><img src="<?=$base_url?>/img/logo.svg" class="l-logo" alt="Logo" /></a>
                </div>
                <nav>
                    <ul style="text-align:center; list-style:none;">
                        <li style="display:inline-block;margin:0px 18px;"><a href="/home">Home</a></li>
                        <li style="display:inline-block;margin:0px 18px;"><a href="/anime-list">Anime list</a></li>
                        <li style="display:inline-block;margin:0px 18px;"><a href="/new-season">New season</a></li>
                        <li style="display:inline-block;margin:0px 18px;"><a href="/anime-movies">Movies</a></li>
                        <li style="display:inline-block;margin:0px 18px;"><a href="/popular">Popular</a></li>
                    </ul>   
                </nav>
            </section>
        </header>

        <div class="main_body">
            <?php
            if ($current_page == "home") {
                echo '<div style="color:#FFF;padding:18px;"><h1>Welcome to '.$website_name.'</h1><p>Enjoy watching anime in HD quality.</p></div>';
            } else {
                // لود کردن فایل از صفحه اصلی
                $target_file = ROOT_PATH . "/" . $current_page . ".php";
                if (file_exists($target_file)) {
                    include($target_file);
                } else {
                    echo '<div style="color:#FFF;padding:18px;text-align:center;"><h1>404</h1><p>File '.$current_page.'.php not found.</p></div>';
                }
            }
            ?>
        </div>

        <footer style="text-align:center; padding: 20px;">
            <a href="/home" style="background:#000;color:#ffc119;padding:10px 20px;border-radius:20px;text-decoration:none;border:1px solid #fff;">GO TO HOMEPAGE</a>
        </footer>
    </div></div></div>
    <?php if(file_exists(ROOT_PATH . '/php/include/footer.php')) { include(ROOT_PATH . '/php/include/footer.php'); } ?>  
</body>
</html>
