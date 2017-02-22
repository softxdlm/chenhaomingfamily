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
    <link href="public/css/1.0/common.css" rel="stylesheet" type="text/css">
    <link href="public/css/1.0/app.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="public/js/1.0/share.js"></script>
    <script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.js"></script>
    <script type='text/javascript'>
        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            WeixinJSBridge.call('hideToolbar');
        });
    </script>
    <title>粉丝团体</title>
    <style>
        span{
            font-size: 15px;
            font-weight: bold;
        }
        p{
            text-indent: 2em;
            margin: 20px 0 30px 0;
        }
        .book-content{background-color:#fff;padding:5px;border-bottom: 1px solid #dedede;}
    </style>
</head>
<body>

<section class="header sound">
    <img src="public/images/img-book-gmexthjl.png" style="position:absolute;top: -1000px;left:-1000px;"/>
    <div class="face">
        <div class="icon">
            <img src="public/images/img-face.jpg" class="f" />
        </div>
        <div class="text">
            粉丝团体
        </div>
    </div>
</section>
<section class="list-1">
<?php 
//加载配置文件中的数据。
$data = json_decode(file_get_contents('fansList.json'), true);
//循环便利数据。
foreach ($data['fans'] as $k => $v) {?>
    <a class="item" href="<?php echo $v['play_url'];?>">
        <div class="thumbnail" title=<?php echo $v['title'];?>>
            <img class="lazy" src="<?php echo $v['cover'];?>" alt=<?php echo $v['title'];?> width="100" height="56">
        </div>
        <div class="caption" style="float:none;">
            <span ><?php echo $v['title'];?></span>
        </div>
        <div class="clear"></div>
    </a>
<?php }?>
</section>

<?php include 'footer.php';?>
</body>
</html>
