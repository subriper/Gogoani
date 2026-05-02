<?php 
// استفاده از مسیر ریشه برای جلوگیری از ارور فایل‌های جانبی
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__); 
}
require_once(ROOT_PATH . '/php/info.php');

$page = isset($_GET['page']) ? $_GET['page'] : 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="<?=$base_url?>/img/favicon.ico">

    <title>List All Anime at Gogoanime | Anime List</title>

    <meta name="robots" content="index, follow" />
    <meta name="description" content="List All Anime at Gogoanime | Anime List">
    <meta name="keywords" content="List All Anime at Gogoanime | Anime List">
    <meta itemprop="image" content="<?=$base_url?>/img/logo.png" />

    <meta property="og:site_name" content="Gogoanime" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="List All Anime at Gogoanime | Anime List" />
    <meta property="og:description" content="List All Anime at Gogoanime | Anime List">
    <meta property="og:image" content="<?=$base_url?>/img/logo.png" />

    <link rel="canonical" href="<?=$base_url?><?php echo $_SERVER['REQUEST_URI'] ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script type="text/javascript" src="<?=$base_url?>/js/libraries/jquery.js"></script>
    
    <?php 
    // اصلاح مسیر تبلیغات
    if(file_exists(ROOT_PATH . '/php/advertisments/popup.html')) {
        require_once(ROOT_PATH . '/php/advertisments/popup.html'); 
    }
    ?>

    <script>
        var base_url = 'https://' + document.domain + '/';
        var base_url_cdn_api = 'https://ajax.gogocdn.net/';
        var api_anclytic = 'https://ajax.gogocdn.net/anclytic-ajax.html';
    </script>
    <script type="text/javascript" src="https://cdn.gogocdn.net/files/gogo/js/main.js?v=7.1"></script>
</head>

<body>
    <div id="wrapper_inside">
        <div id="wrapper">
            <div id="wrapper_bg">
                <?php 
                // اصلاح مسیر هدر
                if(file_exists(ROOT_PATH . '/php/include/header.php')) {
                    require_once(ROOT_PATH . '/php/include/header.php'); 
                }
                ?>
                
                <section class="content">
                    <section class="content_left">
                        <div class="main_body">
                            <div class="anime_name anime_list">
                                <i class="icongec-anime_list i_pos"></i>
                                <h2>ANIME LIST</h2>
                                <div class="anime_name_pagination">
                                    <div class="pagination">
                                        <ul class='pagination-list'>
                                        <?php 
                                            // فراخوانی ای‌پی‌آی با کنترل خطا
                                            $pagination_data = @file_get_contents("$apiLink/anime-list-page?page=$page");
                                            if ($pagination_data) {
                                                $pagination = json_decode($pagination_data, true); 
                                                echo str_replace("active","selected",$pagination['pagination']);
                                            }
                                        ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- الفبای انیمه -->
                            <div class="list_search">
                                <ul>
                                    <li class="first-char"><a href="/anime-list" class="active">All</a></li>
                                    <?php foreach(range('A', 'Z') as $char): ?>
                                        <li class="first-char"><a href="/anime-list-<?=$char?>"><?=$char?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="anime_list_body">
                                <ul class="listing">
                                <?php
                                    $json_data = @file_get_contents("$apiLink/animeList?page=$page");
                                    if ($json_data) {
                                        $json = json_decode($json_data, true);
                                        foreach($json as $animeList)  { 
                                ?>
                                    <li title='<?php echo htmlspecialchars($animeList['liTitle']);?>'> 
                                        <a href="/category/<?=$animeList['animeId']?>"><?=$animeList['animeTitle']?></a>
                                    </li>
                                <?php 
                                        } 
                                    } else {
                                        echo "<p style='color:white;'>Error loading anime list from API.</p>";
                                    }
                                ?>
                                </ul>
                                <div class="clr"></div>
                            </div>
                        </div>
                    </section>

                    <section class="content_right">
                        <div class="main_body">
                            <div class="main_body_black">
                                <div class="anime_name ongoing">
                                    <i class="icongec-ongoing i_pos"></i>
                                    <h2>RECENT RELEASE</h2>
                                </div>
                                <div class="recent">
                                    <div id="scrollbar2">
                                        <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                                        <div class="viewport">
                                            <div class="overview">
                                                <?php 
                                                // اصلاح مسیر فایل Release
                                                if(file_exists(ROOT_PATH . '/php/include/recentRelease.php')) {
                                                    require_once(ROOT_PATH . '/php/include/recentRelease.php'); 
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                        if(file_exists(ROOT_PATH . '/php/include/sub-category.html')) {
                            require_once(ROOT_PATH . '/php/include/sub-category.html'); 
                        }
                        ?>
                    </section>
                </section>
                
                <footer>
                    <div class="menu_bottom">
                        <a href="/about-us"><h3>About us</h3></a>
                        <a href="/contact-us"><h3>Contact us</h3></a>
                        <a href="/privacy"><h3>Privacy</h3></a>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?=$base_url?>/js/files/combo.js"></script>
    <script type="text/javascript" src="<?=$base_url?>/js/files/jquery.tinyscrollbar.min.js"></script>
    
    <?php 
    if(file_exists(ROOT_PATH . '/php/include/footer.php')) {
        include(ROOT_PATH . '/php/include/footer.php'); 
    }
    ?>

    <script type="text/javascript" src="<?=$base_url?>/js/files/jqueryTooltip.js"></script>
    <script>
        $(".listing li[title]").tooltip({ offset: [10, 200], effect: 'slide', predelay: 300 });
        if (document.getElementById('scrollbar2')) { $('#scrollbar2').tinyscrollbar(); }
    </script>
</body>
</html>
