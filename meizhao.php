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
    <link href="public/css/1.0/haiyang.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="public/js/1.0/share.js"></script>
    <script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.js"></script>
    <script type='text/javascript'>
        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            WeixinJSBridge.call('hideToolbar');
        });
    </script>	<script type="text/javascript" src="public/modernizr/2.6/modernizr.custom.js"></script>
    <script type="text/javascript" src="http://cdn.bootcss.com/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script type="text/javascript" src="public/jquery.masonry/3.5/jquery.masonry.min.js"></script>
    <script type="text/javascript" src="public/imagesloaded/3.0/imagesloaded.js"></script>
    <script type="text/javascript" src="public/AnimOnScroll/1.0/classie.js"></script>
    <script type="text/javascript" src="public/AnimOnScroll/1.0/AnimOnScroll.js"></script>
    <link href="public/AnimOnScroll/1.0/AnimOnScroll.css" rel="stylesheet" type="text/css">
    <title>我的美拍</title>

    <style type="text/css">
        .full-screen {position: fixed;height: 0px;width: 100%;left: 0px;top: 0px;background: rgba(0, 0, 0, 0.9);z-index: 10;overflow: hidden;display: none; z-index:2000;}
        .full-screen img {position: absolute;top: 50%;left: 50%;border: 7px solid #fff; box-sizing:border-box;}
        .full-screen .tip{position: absolute;display:block;left:50%;bottom:5px;margin-left:-60px;height:24px;width:120px;text-align:center;background-color: rgb(0, 0, 0);opacity:0.7;color:#fff;line-height:24px;font-size:14px;display:none;}
        .loading{position:absolute; display:block;left:50%;top:50%;width:24px;height:24px;margin-left:-12px;margin-top:-12px;;background:url(public/images/img-loading.gif) no-repeat center center; background-size:cover;}
    </style>
</head>
<body>
<section>
<img src="public/images/img-book-gmexthjl.png" style="position:absolute;top: -1000px;left:-1000px;"/>
<script type="text/javascript" src="http://ip.chinaz.com/getip.aspx"></script> 
    <ul class="grid effect-6" id="grid">
   <?php 
    $data = json_decode(file_get_contents('image.json'), true);
    $data = $data['img'];
    foreach ($data as $k => $v) {
    ?>
        <li><a href='public/images/xiaohaozi/large/<?php echo $v["big_img"];?>?20151105'><img src='public/images/xiaohaozi/small/<?php echo $v["small_img"];?>?20151105'/></a></li>
    <?php
        }
    ?>
    </ul>
    <div id="full-screen" class="full-screen">
        <span class="tip">点击屏幕关闭</span>
    </div>
</section>
<?php include 'footer.php';?>
</body>
</html>

<script type="text/javascript">
    function resizeImage($image, width, height) {
        var w_dim = {
            width   : $(window).width(),
            height  : $(window).height()
        };

        var widthMargin     = 40,
                heightMargin    = 40,
                windowH         = w_dim.height - heightMargin,
                windowW         = w_dim.width - widthMargin;

        var theImage = {};

        if(width > height) {
            var newwidth    = windowW,
                    ratio       = width / windowW,
                    newheight   = height / ratio;

            theImage.height = newheight;
            theImage.width  = newwidth;

            if(newheight > windowH) {
                var newnewheight    = windowH,
                        newratio        = newheight/windowH,
                        newnewwidth     = newwidth/newratio;

                theImage.width      = newnewwidth;
                theImage.height     = newnewheight;
            }
        }
        else {
            var newheight   = windowH,
                    ratio       = height / windowH,
                    newwidth    = width / ratio;

            theImage.height = newheight;
            theImage.width  = newwidth;

            if(newwidth > windowW) {
                var newnewwidth     = windowW,
                        newratio        = newwidth/windowW,
                        newnewheight    = newheight/newratio;

                theImage.height     = newnewheight;
                theImage.width      = newnewwidth;
            }
        }

        $image.css({
            'width'         : theImage.width + 'px',
            'height'        : theImage.height + 'px',
            'margin-left'   : -theImage.width / 2 + 'px',
            'margin-top'    : -theImage.height / 2 + 'px'
        });
    }

    function showFullImage($a) {
        var w_dim = {
            width	: $(window).width(),
            height	: $(window).height()
        };

        var	largeImageUrl = $a.attr('href');
        var smallImage = $a.find('img').get(0);

        var $fullScreen = $('#full-screen');
        $loading = $('<span class="loading"></span>');
        $a.append($loading);

        // preload large image
        $('<img/>').load(function() {
            var $largeImage	= $(this);
            $loading.remove();
            resizeImage($largeImage, smallImage.width, smallImage.height);
            $fullScreen.prepend($largeImage);
            $fullScreen.stop().css({display:'block', marginTop:(w_dim.height / 2)}).animate({
                        height 		: '100%',
                        marginTop	: '0px'
                    },
                    500, function(){
                        $fullScreen.find('.tip').show();
                    });
        }).attr('src',largeImageUrl);
    }


    function closeFullImage() {
        var w_dim = {
            width	: $(window).width(),
            height	: $(window).height()
        };

        var $fullScreen = $('#full-screen');
        $fullScreen.find('.tip').hide();

        $fullScreen.stop().animate({
                    height 		: '0',
                    marginTop	: w_dim.height / 2
                },
                500,
                function(){
                    $(this).css({display:'none'}).find('img').remove();
                });
    }

    new AnimOnScroll( document.getElementById( 'grid' ), {
        minDuration : 0.4,
        maxDuration : 0.7,
        viewportFactor : 0.2
    });

    $(function(){
        $('#grid li a').click(function(e){
            e.preventDefault();
            showFullImage($(this));
        });

        $('#full-screen').click(function(e){
            e.preventDefault();
            closeFullImage();
        });

        var location = window.location.href;
        if (location && location.indexOf('#') > 0) {
            var idx = location.substr(location.indexOf('#') + 1);
            if (!isNaN(idx)) {
                $('#grid li a').eq(idx).click();
                location.reload();
            }
        }
    });
</script>
