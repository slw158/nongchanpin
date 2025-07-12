<?php
session_start();
include_once 'conn.php';
?>
<html>
<head>
    <title>农产品网上销售系统</title>
    <LINK href="qtimages/style.css" type=text/css rel=stylesheet>
    <link href="swiper-bundle.min.css" rel="stylesheet">
    <script src="swiper-bundle.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
    <style>
        .swiper-container {
            width: 220px;
            height: 197px; /* 根据需求调整高度 */
            overflow:hidden;
        }

        /* 轮播图样式 */
        .swiper-slide {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .swiper-slide img {
            max-width: 220px;
            max-height: 200px;
            object-fit: contain;
            overflow: hidden;
        }
    </style>
</head>
<body>
<TABLE cellSpacing=0 cellPadding=0 width=1005 align=center border=0>
    <TBODY>
    <TR>
        <TD>
            <?php include_once 'qttop.php'; ?>
        </TD>
    </TR><!--    导航栏结束-->
    <TR>
        <TD vAlign=top width=788>
            <TABLE cellSpacing=0 cellPadding=0 bgColor=#f9fdff border=0>
                <TBODY>
                    <TR>
                        <TD  vAlign=top width=786>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <TD height=42 background=qtimages/sy_bg.jpg class="title">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="8%">&nbsp;</td>
                                                    <td width="92%"><font class="title">[促销活动]</font></td><!-- news.php?lb=最新动态-->
                                                </tr>
                                            </table>
                                        </TD>
                                    </tr>
                                    <TR>
                                        <TD vAlign=top bgColor=#edf7f9 height=74>
                                            <TABLE cellSpacing=0 cellPadding=0 width=787 border=0>
                                                <TBODY>
                                                <TR>
                                                    <TD width=8 height="246" align=right><IMG height=246 src="qtimages/sy_line.jpg" width=8></TD>
                                                    <TD vAlign=top width=100% bgColor=#f9fdff>
                                                        <TABLE cellSpacing=0 cellPadding=0 width="100%"
                                                               border=0>
                                                            <TBODY>
                                                            <TR>
                                                                <TD vAlign=top align=middle width="30%" bgColor=#edf7f9>
                                                                    <TABLE borderColor=whitesmoke height=197 cellSpacing=0 cellPadding=0 width=220 border=0>
                                                                        <TBODY>
                                                                        <TR>
                                                                            <TD>
                                                                                <!-- 1. 先加载CSS -->
                                                                                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">

                                                                                <!-- 2. 轮播容器 -->
                                                                                <div class="td-swiper-container swiper-container" style="height:180px">
                                                                                    <div class="swiper-wrapper">
                                                                                        <div class="swiper-slide">
                                                                                            <img src="banner/1.jpg">
                                                                                        </div>
                                                                                        <div class="swiper-slide">
                                                                                            <img src="banner/2.jpg">
                                                                                        </div>
                                                                                        <div class="swiper-slide">
                                                                                            <img src="banner/3.jpg">
                                                                                        </div>
                                                                                        <div class="swiper-slide">
                                                                                            <img src="banner/4.jpg">
                                                                                        </div>
                                                                                        <!-- 其他幻灯片... -->
                                                                                    </div>
                                                                                </div>
                                                                                <script>
                                                                                    // 4. 确保在DOM和资源就绪后初始化
                                                                                    window.addEventListener('load', function() {
                                                                                        try {
                                                                                            new Swiper('.swiper-container', {
                                                                                                loop: true,
                                                                                                autoplay: {
                                                                                                    delay: 3000,
                                                                                                    disableOnInteraction: false
                                                                                                },
                                                                                                observer: true,  // 监测DOM变化
                                                                                                observeParents: true
                                                                                            });
                                                                                        } catch(e) {
                                                                                            console.error('Swiper初始化失败:', e);
                                                                                            // 备用方案：显示静态图片
                                                                                            document.querySelector('.swiper-container').innerHTML = `
                  <img src="uploadfile/1339211786gts3.jpg" style="max-width:100%">
                `;
                                                                                        }
                                                                                    });
                                                                                </script>
                                                                            </TD>
                                                                        </TR>
                                                                        </TBODY>
                                                                    </TABLE>
                                                                </TD>
                                                                <TD vAlign=top width="100%" bgColor=#edf7f9>
                                                                    <table width="97%" border="0" align="center" cellpadding="0"
                                                                           cellspacing="0" class="newsline">
                                                                        <?php
                                                                        $sql = "select biaoti,id,addtime from xinwentongzhi where leibie='促销活动' order by id desc";
                                                                        $query = mysql_query($sql);
                                                                        $rowscount = mysql_num_rows($query);
                                                                        if ($rowscount > 0) {
                                                                            for ($i = 0; $i < $rowscount; $i++) {
                                                                                if ($i == 8) {
                                                                                    break;
                                                                                }
                                                                                ?>
                                                                                <tr height="25">
                                                                                    <td width="4%" height="20" align="center">
                                                                                        <img src="qtimages/1.jpg" width="9"
                                                                                             height="9"></td>
                                                                                    <td width="79%" class="newslist"><a
                                                                                                href="gg_detail.php?id=<?php echo mysql_result($query, $i, "id"); ?>">
                                                                                            <?php
                                                                                            if (strlen(mysql_result($query, $i, "biaoti")) > 70) {
                                                                                                echo substr(mysql_result($query, $i, "biaoti"), 0, 70);
                                                                                            } else {
                                                                                                echo mysql_result($query, $i, "biaoti");
                                                                                            }

                                                                                            ?>
                                                                                        </a></td>
                                                                                    <td width="17%" align="right"
                                                                                        class="newslist"><?php echo date("Y-m-d", strtotime(mysql_result($query, $i, "addtime"))); ?></td>
                                                                                </tr>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </table>
                                                                </TD>
                                                            </TR>
                                                            <TR>
                                                                <TD height="40" colSpan=2 vAlign=middle
                                                                    background=qtimages/hsg1.jpg
                                                                    bgColor=#f9fdff>
                                                                    <table width="100%" border="0" cellspacing="0"
                                                                           cellpadding="0">
                                                                        <tr>
                                                                            <td width="9%" align="center" class="STYLE1">导读
                                                                            </td>
                                                                            <td width="91%" align="center">
                                                                                <MARQUEE onmouseover=stop() onmouseout=start()
                                                                                         scrollAmount=4
                                                                                         width=96%>
                                                                                    热列庆祝农产品在线销售平台正式开通,欢迎大家前来光顾及指导,谢谢!!
                                                                                </MARQUEE>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </TD>
                                                            </TR>
                                                            </TBODY>
                                                        </TABLE>
                                                    </TD>
                                                </TR>
                                                </TBODY>
                                            </TABLE>
                                        </TD>
                                    </TR>
                                    <TR>
                                        <TD bgColor=#f9fdff height=5></TD>
                                    </TR>
                                    <TR>
                                        <TD height=8></TD>
                                    </TR>
                                    <TR>
                                        <TD>
                                            <TABLE width="98%" height="221"
                                                   border=0 align=center cellPadding=0 cellSpacing=0>
                                                <TBODY>
                                                <TR>
                                                    <TD width=37 height="152" background="qtimages/food_1.jpg"><p align="center"
                                                                                                                  class="red">
                                                            推</p>
                                                        <p align="center" class="red">荐</p>
                                                        <p align="center" class="red">农</p>
                                                        <p align="center" class="red">产</p>
                                                        <p align="center" class="red">品</p></TD>
                                                    <TD width=719
                                                        background=qtimages/food_bg.gif>
                                                        <table width="100%" height="100%" border="0" cellpadding="0"
                                                               cellspacing="0">
                                                            <tr>
                                                                <?php
                                                                $sql = "select * from shangpinxinxi where tupian<>'' and  istj='是' ";

                                                                $sql = $sql . " order by id desc";

                                                                $query = mysql_query($sql);
                                                                $rowscount = mysql_num_rows($query);

                                                                for ($i = 0; $i < $rowscount; $i++) {
                                                                    if ($i < 4) {

                                                                        ?>
                                                                        <td height="163" align="center">
                                                                            <table width="20%" height="163" border="0"
                                                                                   cellpadding="0" cellspacing="0">
                                                                                <tr>
                                                                                    <td height="137" align="center"><a
                                                                                                href="shangpinxinxidetail.php?id=<?php echo mysql_result($query, $i, "id"); ?>"
                                                                                                target="_blank"><img
                                                                                                    src="<?php echo mysql_result($query, $i, "tupian"); ?>"
                                                                                                    width="131" height="130"
                                                                                                    border="0"></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td height="25" align="center"><a
                                                                                                href="shangpinxinxidetail.php?id=<?php echo mysql_result($query, $i, "id"); ?>"><?php echo mysql_result($query, $i, "shangpinmingcheng"); ?></a>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </tr>
                                                        </table>
                                                    </TD>
                                                    <TD width=15><IMG height=221
                                                                      src="qtimages/food_2.jpg"
                                                                      width=13></TD>
                                                </TR>
                                                </TBODY>
                                            </TABLE>
                                        </TD>
                                    </TR>
                                    <TR>
                                        <TD height=8></TD>
                                    </TR>
                                    <TR>
                                        <TD>
                                            <?php include_once 'qtdown.php'; ?>
                                        </TD>
                                    </TR>
                                </tbody>
                            </table>
                        </TD>
                        <TD vAlign=top width=216 background=qtimages/rightbg.jpg>
                            <?php include_once 'qtleft.php'; ?>
                        </TD>
                    </TR>

                </TBODY>
            </table>
        </TD>
    </TR>
    </TBODY>
</TABLE>


</body>
</html>