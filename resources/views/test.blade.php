<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="rudiments">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('favicon/ms-icon-144x144.png')}}/">
    <meta name="theme-color" content="#ffffff">

    <title>Bidbuy</title>

</head>
<body>
<div class="Login_Banner sticky">
    <ul class="Lang_Section">
        <li><a class="selected">繁體</a></li>
        <li>|</li>
        <li><a>簡體</a></li>
    </ul>
    <ul class="Login_Function_Section">
        <li><a>註冊</a></li>
        <li>|</li>
        <li><a>登錄</a></li>
        <li>|</li>
        <li><a>購物車</a></li>
    </ul>
</div>
<div class="Header">
    <div class="Header_Logo">
        <a>
            <img src="{{ asset('img/bidbuy_logo.png') }}" alt="Logo">
        </a>
        {{--<p>Logo</p>--}}
    </div>
    <div class="Header_TopNav">
        <ul>
            <li><a>主頁</a></li>
            <li class="dropdown">
                <a class="dropbtn">日本Yahoo!拍賣</a>
                <div class="dropdown-content">
                    <a title="電腦" href="category.php?id=182160">電腦</a>
                    <a title="家電，AV，相機" target="_blank" href="category.php?id=182161">家電，AV，相機</a>
                    <a title="音楽" target="_blank" href="category.php?id=182162">音楽</a>
                    <a title="書，雜誌" target="_blank" href="category.php?id=182163">書，雜誌</a>
                    <a title="電影，錄像" target="_blank" href="category.php?id=182164">電影，錄像</a>
                    <a title="玩具，遊戲" target="_blank" href="category.php?id=182165">玩具，遊戲</a>
                    <a title="興趣，文化" target="_blank" href="category.php?id=182166">興趣，文化</a>
                    <a title="古董，蒐集" target="_blank" href="category.php?id=182167">古董，蒐集</a>
                    <a title="運動，悠閒" target="_blank" href="category.php?id=182168">運動，悠閒</a>
                    <a title="私家車，電單車" target="_blank" href="category.php?id=182169">私家車，電單車</a>
                    <a title="時裝" target="_blank" href="category.php?id=182170">時裝</a>
                    <a title="飾物，鐘錶" target="_blank" href="category.php?id=182171">飾物，鐘錶</a>
                    <a title="美容，健康護理" target="_blank" href="category.php?id=182172">美容，健康護理</a>
                    <a title="食品，飲料" target="_blank" href="category.php?id=182173">食品，飲料</a>
                    <a title="居住，室內裝飾" target="_blank" href="category.php?id=182174">居住，室內裝飾</a>
                    <a title="寵物，動物" target="_blank" href="category.php?id=182175">寵物，動物</a>
                    <a title="辦公室，店舖用品" target="_blank" href="category.php?id=182176">辦公室，店舖用品</a>
                    <a title="花，園藝" target="_blank" href="category.php?id=182177">花，園藝</a>
                    <a title="門票，金券，住宿預約" target="_blank" href="category.php?id=182178">門票，金券，住宿預約</a>
                    <a title="嬰兒用品" target="_blank" href="category.php?id=182179">嬰兒用品</a>
                    <a title="演員商品" target="_blank" href="category.php?id=182180">演員商品</a>
                    <a title="漫畫，動畫精品" target="_blank" href="category.php?id=182181">漫畫，動畫精品</a>
                    <a title="地產" target="_blank" href="category.php?id=182182">地產</a>
                    <a title="慈善事業" target="_blank" href="category.php?id=182183">慈善事業</a>
                </div>
            </li>
            <li class="dropdown">
                <a class="dropbtn">海外購物</a>
                <div class="dropdown-content">
                    <a>Amazon JP</a>
                    <a>Rakuten</a>
                    <a>ZOZOTOWN</a>
                    <a>Kakaku</a>
                </div>
            </li>
            <li><a>Bidbuy Shop</a></li>
        </ul>
    </div>
    <div class="Header_Cart">
        <a><img src="{{asset('img/shopping_cart.png')}}" alt="shopping cart"></a>
    </div>
</div>
<div class="Index_Component_Banner">
    <a><img src="{{asset('img/banner_1.jpg')}}" alt="banner"></a>
</div>
<div class="Index_Shop_Section">
    <div class="Index_Shop_Row">
        <div class="Index_Shop_Card"><a><img src="{{asset('img/site_logos/yahoo_auction.png')}}" alt="shop logo"></a>
        </div>
        <div class="Index_Shop_Card"><a><img src="{{asset('img/site_logos/amazon_jp.png')}}" alt="shop logo"></a></div>
        <div class="Index_Shop_Card"><a><img src="{{asset('img/site_logos/rakuten.png')}}" alt="shop logo"></a></div>
    </div>
    <div class="Index_Shop_Row">
        <div class="Index_Shop_Card"><a><img src="{{asset('img/site_logos/zozotown.jpg')}}" alt="shop logo"></a></div>
        <div class="Index_Shop_Card"><a><img style="object-fit: contain" src="{{asset('img/site_logos/kakaku.png')}}"
                                             alt="shop logo"></a></div>
        <div class="Index_Shop_Card"><a><img style="object-fit: contain" src="{{asset('img/bidbuy_logo.png')}}"
                                             alt="shop logo"></a></div>
    </div>
</div>
<div class="Index_Yahoo_Section">
    <div class="Index_Yahoo_Title">
        <img src="{{asset('img/yahoo_auction_title.png')}}">
        {{--<p>Yahoo!拍賣</p>--}}
    </div>

    @foreach ($data['recommendedProducts'] as $recommendedProduct)
    <div class="Index_Yahoo_Row">
        <div class="Index_Yahoo_Card">
            <a href=""></a><img class="Index_Yahoo_Pic" src="{{$recommendedProduct['productImgURL']}}" alt="item pic"></a>
            <p class="Index_Yahoo_Name">{{ $recommendedProduct['productName'] }}</p>
            <p class="Index_Yahoo_Price">現在 HK${{ $recommendedProduct['productHKDPrice'] }}</p>
            <p class="Index_Yahoo_TimeRemain">剩餘時間 {{ $recommendedProduct['productTimeLeft'] }}</p>
        </div>
    @endforeach
    </div>
</div>
<div class="Footer">
    <div class="Footer_Sitemap">
        <p>SiteMap</p>
        <div class="Footer_Sitemap_Content">
            <div class="Footer_Sitemap_Column">
                <div class="Footer_Sitemap_Title">
                    <p>site title</p>
                </div>
                <div class="Footer_Sitemap_Sites">
                    <p><a>haha1</a></p>
                    <p><a>haha1</a></p>
                    <p><a>haha1</a></p>
                    <p><a>haha1</a></p>
                    <p><a>haha1</a></p>
                </div>
            </div>
            <div class="Footer_Sitemap_Column">
                <div class="Footer_Sitemap_Title">
                    <p>site title</p>
                </div>
                <div class="Footer_Sitemap_Sites">
                    <p><a>haha1</a></p>
                    <p><a>haha1</a></p>
                    <p><a>haha1</a></p>
                    <p><a>haha1</a></p>
                    <p><a>haha1</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="Footer_ContactUs">
        <div class="Footer_ContactUs_Contact">

        </div>
        <div class="Footer_ContactUs_Follow"></div>
    </div>
</div>

<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</body>
</html>