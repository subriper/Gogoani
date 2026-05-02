<?php require_once('php/info.php'); ?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="shortcut icon" href="<?=$base_url?>/img/favicon.ico">

    <title>Watch anime online, English anime online - <?=$website_name?></title>

    <meta name="robots" content="index, follow" />
    <meta name="description"
        content="Watch anime online in English. You can watch free series and movies online and English subtitle.">
    <meta name="keywords"
        content="gogoanime,watch anime, anime online, free anime, english anime, sites to watch anime">
    <meta itemprop="image" content="<?=$base_url?>/img/logo.png" />

    <meta property="og:site_name" content="<?=$website_name?>" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?=$website_name?> | Watch anime online, English anime online HD" />
    <meta property="og:description"
        content="Watch anime online in English. You can watch free series and movies online and English subtitle.">
    <meta property="og:url" content="" />
    <meta property="og:image" content="<?=$base_url?>/img/logo.png" />
    <meta property="og:image:secure_url" content="<?=$base_url?>/img/logo.png" />

    <meta property="twitter:card" content="summary" />
    <meta property="twitter:title" content="<?=$website_name?> | Watch anime online, English anime online HD" />
    <meta property="twitter:description"
        content="Watch anime online in English. You can watch free series and movies online and English subtitle." />

    <link rel="canonical" href="<?=$base_url?>" />
    <link rel="alternate" hreflang="en-us" href="<?=$base_url?>" />



    <link rel="stylesheet" type="text/css" href="/css/style.css" />

    <script type="text/javascript" src="<?=$base_url?>/js/libraries/jquery.js"></script>
    <script>
        var base_url = 'https://' + document.domain + '/';
        var base_url_cdn_api = 'https://ajax.gogocdn.net/';
        var api_anclytic = 'https://ajax.gogocdn.net/anclytic-ajax.html';
    </script>
    <script type="text/javascript" src="https://cdn.gogocdn.net/files/gogo/js/main.js"></script>

<?php require_once('php/advertisments/popup.html'); ?>
    
</head>


  <body>
    <div class="clr"></div>
    <div id="wrapper_inside">
      <div id="wrapper">
        <div id="wrapper_bg">
          <header>
  <div class="menu_top_link">

    <div class="link_face intro">
      <a class="btn twitter" href="https://twitter.com/anime_around" target="_blank" data-url=""></a>
      <a class="btn reddit" href="https://www.reddit.com/r/AroundAnimeTV/" target="_blank" data-url=""></a>
      <a class="btn facebook" href="https://www.facebook.com/groups/409309663623039" target="_blank"></a>
      <a class="btn discord" style="margin-right:5px;" href="https://discord.gg/kyVfcGuCCQ" target="_blank" data-url=""></a>
      <a class="btn telegram" style="margin-right:5px;" href="https://t.me/joinchat/W4lYQ-RGOQ05MmI9" target="_blank" data-url=""></a>
    </div>
                    
    <div class="submenu_intro">
	    <a href="https://gogotaku.info/login.html" target="_blank">Request</a>
	    <span>|</span>
      <a href="/contact-us.html">Contact us</a>
      <span>|</span>
      <a href="https://gogotaku.info" target="_blank">Gogotaku</a>
    </div>          
  </div>
  <div class="clr"></div>

  <!-- banner -->
  <section class="headnav">
    <div style="text-align:center;margin-bottom:20px;">
      <a href="/home"><img src="<?=$base_url?>/img/logo.svg" class="l-logo" alt="gogoanime - Watch Anime Online" /></a>
    </div>
    <div style="width:100%;font-family: Tahoma, Geneva, sans-serif;font-size: 14px;text-transform: uppercase;text-align:center;">
      <!-- menu top -->
      <nav>
        <ul>
          <li style="display:inline-block;margin:0px 18px;">
            <a style="display: block;color: #fff;padding: 0 0 14px 0px;transition: all 0s linear 0s;webkit-transition: all 0s linear 0s;moz-transition: all 0s linear 0s;o-transition: all 0s linear 0s;" href="/home" title="Home" class="home">Home</a>
          </li>
          <li style="display:inline-block;margin:0px 18px;">
            <a style="display: block;color: #fff;padding: 0 0 14px 0px;transition: all 0s linear 0s;webkit-transition: all 0s linear 0s;moz-transition: all 0s linear 0s;o-transition: all 0s linear 0s;" href="/anime-list" title="Anime list" class="list">Anime list</a>
          </li>
          <li style="display:inline-block;margin:0px 18px;">
            <a style="display: block;color: #fff;padding: 0 0 14px 0px;transition: all 0s linear 0s;webkit-transition: all 0s linear 0s;moz-transition: all 0s linear 0s;o-transition: all 0s linear 0s;" href="/new-season" title="New season" class="series">New season</a>
          </li>
          <li style="display:inline-block;margin:0px 18px;">
            <a style="display: block;color: #fff;padding: 0 0 14px 0px;transition: all 0s linear 0s;webkit-transition: all 0s linear 0s;moz-transition: all 0s linear 0s;o-transition: all 0s linear 0s;" href="/anime-movies" title="Movies" class="movie">Movies</a>
          </li>
          <li style="display:inline-block;margin:0px 18px;">
            <a style="display: block;color: #fff;padding: 0 0 14px 0px;transition: all 0s linear 0s;webkit-transition: all 0s linear 0s;moz-transition: all 0s linear 0s;o-transition: all 0s linear 0s;" href="/popular" title="Popular" class="popular">Popular</a>
          </li>
        </ul>	
      </nav>
      <!-- /menu top -->
    </div>
    <div class="form" style="padding-bottom:20px;width:100%;">
        <form style="max-width:600px;margin:0 auto;position:relative;text-align:left;" onsubmit="" id="search-form" action="<?=$base_url?>/search" method="get">
          <div class="row">
            <input placeholder="search" name="keyword" id="keyword" type="text" value="" autocomplete="off">            
            <input class="btngui" value="" type="button" name="" onclick="do_search();">
            <input id="key_pres" name="key_pres" value="" type="hidden" />
            <input id="link_alias" name="link_alias" value="" type="hidden" />
            <input id="keyword_search_replace" name="keyword_search_replace" value="" type="hidden" />
          </div>
          <div class="hide_search hide"><i class="icongec-muiten"></i></div>
          <div id="header_search_autocomplete"></div>
          <div class="loader"></div>
        </form>           
        <div class="clr"></div>
        <div class="search-iph"><a href="javascript:void(0)"><i class="icongec-search-mb"></i></a></div>
      </div>
      <div style="text-align:center;color:#00a651;text-transform:none;">Make sure to bookmark the domain <a style="color:#ffc119;" href="https://gogotaku.info/" target="_blank">gogotaku.info</a> to stay updated.</div>
  </section>
  <!-- /banner -->
</header>


<div class="main_body">
    <?php
    // گرفتن مسیر از آدرس‌بار مرورگر
    $request = $_SERVER['REQUEST_URI'];
    $path = parse_url($request, PHP_URL_PATH);

    // بررسی مسیر و لود کردن فایل مربوطه
    if ($path == '/' || $path == '/home' || $path == '/index.php') {
        // محتوای صفحه اصلی (همین متن‌هایی که الان فرستادی)
        ?>
        <div style="color:#FFF;padding:18px;">
            <h1 style="text-transform:uppercase;font-size:20px;"><?=$website_name?> - Best site to watch anime online for FREE.</h1>
            <p>When we create gogoanime, we hope for anime fans...</p>
            <!-- بقیه متن‌های صفحه اصلی که داشتی رو اینجا نگه دار -->
        </div>
        <?php
    } 
    elseif ($path == '/anime-list') {
        // لود کردن فایل لیست انیمه‌ها از پوشه php
        if (file_exists('php/anime-list.php')) {
            include('php/anime-list.php');
        } else {
            echo "<p style='color:white;'>Anime List file not found.</p>";
        }
    } 
    elseif ($path == '/popular') {
        // لود کردن انیمه‌های محبوب
        if (file_exists('php/popular.php')) {
            include('php/popular.php');
        }
    }
    else {
        // برای بقیه صفحات مثل جستجو یا تماشای اپیزود
        // اینجا معمولاً کدی قرار می‌گیرد که دیتای انیمه را از API می‌گیرد
        echo '<div style="color:#FFF;padding:18px;"><h1>Content Loading...</h1></div>';
    }
    ?>
</div>

  <div style="text-align:center;margin:20px 0;">
    <a href="<?=$base_url?>/home" style="background:#000;color:#ffc119;font-size:18px;border:1px solid #fff;padding:10px 25px;border-radius:20px;">GO TO HOMEPAGE</a>
  </div>
                                                
     
          <div class="clr"></div>
<footer>
  <div class="menu_bottom">
    <a href="/about-us.html"><h3>Abouts us</h3></a>
    <a href="/contact-us.html"><h3>Contact us</h3></a>
    <a href="/privacy.html"><h3>Privacy</h3></a>
  </div>
  <div class="croll">
    <div class="big"><i class="icongec-backtop"></i></div>
    <div class="small"><i class="icongec-backtop_mb"></i></div>
  </div>
</footer>
        </div>
      </div>
    </div>
    <div id="off_light"></div>
    <div class="clr"></div>
    <div class="mask"></div>
    <script type="text/javascript" src="<?=$base_url?>/js/files/combo.js"></script>
    <script type="text/javascript" src="<?=$base_url?>/js/files/video.js"></script>
    <script type="text/javascript" src="<?=$base_url?>/js/files/jquery.tinyscrollbar.min.js"></script>
    <?php include('php/include/footer.php')?>  
    <script>
      if(document.getElementById('scrollbar2')){
        $('#scrollbar2').tinyscrollbar();
      }
    </script>
  </body>
</html>
