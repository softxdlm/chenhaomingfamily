<?php
    $id = isset($_GET['id']) ? $_GET['id'] : '1';
    $data = json_decode(file_get_contents('video.json'), true);
    $datar = $data['video'][0];
    foreach($data['video'] as $v) {
        if ($v['id'] === $id) {
            $datar = $v;
            break;
        }
    }
?>
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
    <script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.js"></script>
    <script type='text/javascript'>
        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            WeixinJSBridge.call('hideToolbar');
        });
    </script>	
    <title><?php echo $datar['title'] ;?></title>
</head>
<body>
<section class="header video">
    <img src="public/images/img-book-gmexthjl.png" style="position:absolute;top: -1000px;left:-1000px;"/>
    <div class="face">
        <div class="icon">
            <img src="public/images/img-face.jpg" class="f" />
        </div>
        <div class="text">
            难忘片段
        </div>
    </div>
</section>

<section class="detail">
    <img src="public/images/img-book-gmexthjl.png" style="position:absolute;top: -1000px;left:-1000px;"/>
    <div class="video-player">
        <iframe id="video_frame" height="270" width="100%" src="<?php echo $datar['play_url'];?>" frameborder="0" allowfullscreen></iframe>
    </div>
    <h2><?php echo $datar['title'];?></h2>
</section>

<?php include 'footer.php';?>

</body>
</html>

