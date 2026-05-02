<?php 
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__); 
}
require_once(ROOT_PATH . '/php/info.php');

// تمیز کردن اسلش اضافه از انتهای آدرس ای‌پی‌آی
$apiLink = rtrim($apiLink, '/');

$page = isset($_GET['page']) ? $_GET['page'] : 1;

// تابع کمکی برای دریافت اطلاعات با cURL (امن‌تر در ورسل)
function get_api_data($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="<?=$base_url?>/img/favicon.ico">
    <title>List All Anime - <?=$website_name?></title>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script type="text/javascript" src="<?=$base_url?>/js/libraries/jquery.js"></script>
    <?php if(file_exists(ROOT_PATH . '/php/advertisments/popup.html')) { require_once(ROOT_PATH . '/php/advertisments/popup.html'); } ?>
    <script>
        var base_url = 'https://' + document.domain + '/';
        var base_url_cdn_api = 'https://ajax.gogocdn.net/';
    </script>
    <script type="text/javascript" src="https://cdn.gogocdn.net/files/gogo/js/main.js?v=7.1"></script>
</head>

<body>
    <div id="wrapper_inside">
        <div id="wrapper">
            <div id="wrapper_bg">
                <?php if(file_exists(ROOT_PATH . '/php/include/header.php')) { require_once(ROOT_PATH . '/php/include/header.php'); } ?>
                
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
                                            $pag_response = get_api_data("$apiLink/anime-list-page?page=$page");
                                            if ($pag_response) {
                                                $pagination = json_decode($pag_response, true); 
                                                if(isset($pagination['pagination'])) {
                                                    echo str_replace("active","selected",$pagination['pagination']);
                                                }
                                            }
                                        ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

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
                                    $list_response = get_api_data("$apiLink/animeList?page=$page");
                                    if ($list_response) {
                                        $json = json_decode($list_response, true);
                                        if ($json && is_array($json)) {
                                            foreach($json as $animeList) { 
                                                ?>
                                                <li title='<?php echo htmlspecialchars($animeList['liTitle'] ?? '');?>'> 
                                                    <a href="/category/<?=$animeList['animeId']?>"><?=$animeList['animeTitle']?></a>
                                                </li>
                                                <?php 
                                            }
                                        } else {
                                            echo "<p style='color:white;'>No anime found on this page.</p>";
                                        }
                                    } else {
                                        echo "<p style='color:white;'>Error: Could not connect to API. (Checked: $apiLink)</p>";
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
                                                <?php if(file_exists(ROOT_PATH . '/php/include/recentRelease.php')) { require_once(ROOT_PATH . '/php/include/recentRelease.php'); } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(file_exists(ROOT_PATH . '/php/include/sub-category.html')) { require_once(ROOT_PATH . '/php/include/sub-category.html'); } ?>
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
    <?php if(file_exists(ROOT_PATH . '/php/include/footer.php')) { include(ROOT_PATH . '/php/include/footer.php'); } ?>
    <script type="text/javascript" src="<?=$base_url?>/js/files/jqueryTooltip.js"></script>
    <script>
        $(".listing li[title]").tooltip({ offset: [10, 200], effect: 'slide', predelay: 300 });
        if (document.getElementById('scrollbar2')) { $('#scrollbar2').tinyscrollbar(); }
    </script>
</body>
</html>
