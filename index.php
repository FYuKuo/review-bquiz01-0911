<?php
$do = ($_GET['do'])??'main';
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>卓越科技大學校園資訊系統</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <div id="main">

        <?php
		include('./layout/header.php');
		?>

        <div id="ms">

            <div id="lf" style="float:left;">

                <div id="menuput" class="dbor ct">
                    <!--主選單放此-->
                    <span class="t botli">主選單區</span>


                </div>

                <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    <span class="t">
                        進站總人數 :1
                    </span>
                </div>

            </div>

            <div class="di"
                style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">

                <?php
				include('./layout/marquee.php');
				?>
                <div style="height:32px; display:block;"></div>

                <?php
					if(file_exists('./front/'.$do.'.php')){
						include('./front/'.$do.'.php');
					}else{
						include('./front/main.php');
					}
				?>
            </div>


            <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
                <!--右邊-->
                <button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;"
                    onclick="lo('?do=login')">
                    管理登入
                </button>
                <div style="width:89%; height:480px;" class="dbor">
                    <span class="t botli">校園映象區</span>
                    <script>
                    var nowpage = 0,
                        num = 0;

                    function pp(x) {
                        var s, t;
                        if (x == 1 && nowpage - 1 >= 0) {
                            nowpage--;
                        }
                        if (x == 2 && (nowpage + 1) * 3 <= num * 1 + 3) {
                            nowpage++;
                        }
                        $(".im").hide()
                        for (s = 0; s <= 2; s++) {
                            t = s * 1 + nowpage * 1;
                            $("#ssaa" + t).show()
                        }
                    }
                    pp(1)
                    </script>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>

        <?php
			include('./layout/footer.php');
			?>
    </div>


<script>

    $(".mainmu").mouseover(
		function()
		{
			$(this).children(".mw").stop().show()
		}
	)
	$(".mainmu").mouseout(
		function ()
		{
			$(this).children(".mw").hide()
		}
	)

</script>

    
</body>

</html>