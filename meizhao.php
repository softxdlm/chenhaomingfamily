<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <link href="public/css/1.0/common.css?134589" rel="stylesheet" type="text/css">
    <link href="public/css/1.0/app.css?134589" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="public/js/1.0/share.js"></script>
    <script type="text/javascript" src="public/js/shuju.js"></script>
    <script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.js"></script>
    <script type='text/javascript'>
        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            WeixinJSBridge.call('hideToolbar');
        });
    </script>   <script src="http://cdn.bootcss.com/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
    <title>明明美拍</title>

    <script type="text/javascript">
        $(function() {
            $("img.lazy").lazyload({effect : "fadeIn", threshold : 200, failurelimit : 10});
        });
    </script>
</head>
<body>
<section class="header video">
    <img src="public/images/img-book-gmexthjl.png" style="position:absolute;top: -1000px;left:-1000px;"/>
    <div class="face">
        <div class="icon">
            <img src="public/images/img-face.jpg" class="f" />
        </div>
        <div class="text">
            明明美拍
        </div>
    </div>
</section>

<section class="list-1">
    <a class="item" href="shenghuozhao.php">
        <div class="thumbnail" title="生活照">
            <img class="lazy" src="public/images/meipai/0001.jpg" alt="生活照" width="100" height="56">
        </div>
        <div class="caption" style="float:none;">
            <span >昊哥生活照</span>
        </div>
        <div class="clear"></div>
    </a>
    <a class="item" href="juzhao.php">
        <div class="thumbnail" title="昊哥剧照">
            <img class="lazy" src="public/images/meipai/0002.jpg" alt="昊哥剧照" width="100" height="56">
        </div>
        <div class="caption" style="float:none;">
            <span >昊哥剧照</span>
        </div>
        <div class="clear"></div>
    </a>
</section>

<?php include 'footer.php';?>

</body>
</html>