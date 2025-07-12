<TABLE cellSpacing=0
       cellPadding=0 width="218" border=0>
    <TBODY>
    <TR>
        <TD><IMG height=11 src="qtimages/righttop.jpg"
                 width=218></TD>
    </TR>
    <TR>
        <TD background=qtimages/rightbg1.jpg height=33>
            <TABLE cellSpacing=0 cellPadding=0 width="83%" align=right
                   border=0>
                <TBODY>
                <TR>
                    <TD class=red width="69%">系统公告</TD>
                    <TD width="31%"></TD>
                </TR>
                </TBODY>
            </TABLE>
        </TD>
    </TR>
    <TR>
        <TD height="154">
            <TABLE cellSpacing=0 cellPadding=0 width="93%" align=center
                   border=0>
                <TBODY>
                <TR>
                    <TD>
                        <marquee border="0" direction="up" height="138" onMouseOut="start()" onMouseOver="stop()"
                                 scrollamount="1" scrolldelay="50">
                            <table width="100%" height="100%"
                                   border="0" align="center"
                                   cellpadding="0" cellspacing="5">
                                <tbody>
                                <tr>
                                    <td><p>
                                            <?php
                                            $sql = "select * from dx where leibie='系统公告'";
                                            $query = mysql_query($sql);
                                            $rowscount = mysql_num_rows($query);
                                            if ($rowscount > 0) {
                                                echo mysql_result($query, 0, "content");
                                            }
                                            ?>
                                        </p></td>
                                </tr>
                                </tbody>
                            </table>
                        </marquee>
                    </TD>
                </TR>
                </TBODY>
            </TABLE>
        </TD>
    </TR>
<!--    <tr>-->
<!--        <td background="qtimages/rightbg1.jpg" height="33">-->
<!--            <table cellspacing="0" cellpadding="0" width="83%" align="right"-->
<!--                   border="0">-->
<!--                <tbody>-->
<!--                <tr>-->
<!--                    <td class="red" width="69%">站内搜索</td>-->
<!--                    <td width="31%"></td>-->
<!--                </tr>-->
<!--                </tbody>-->
<!--            </table>-->
<!--        </td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td height="154">-->
<!--            <table width="93%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">-->
<!--                <form action="news.php" method="post" name="formsearch" id="formsearch">-->
<!--                    <tr>-->
<!--                        <td width="19%">标题</td>-->
<!--                        <td width="81%"><input name="biaoti" type="text" id="biaoti"-->
<!--                                               style="width:130px; height:20px; border:solid 1px #000000; color:#666666"/>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>类别</td>-->
<!--                        <td><select name="lb" style="width:130px; height:20px; border:solid 1px #000000; color:#666666">-->
<!--                                --><?php
//                                $sql = "select distinct(leibie) from xinwentongzhi";
//                                $query = mysql_query($sql);
//                                $rowscount = mysql_num_rows($query);
//                                if ($rowscount > 0) {
//                                    for ($i = 0; $i < $rowscount; $i++) {
//                                        ?>
<!--                                        <option value="--><?php //echo mysql_result($query, $i, "leibie") ?><!--">--><?php //echo mysql_result($query, $i, "leibie") ?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>&nbsp;</td>-->
<!--                        <td><input type="submit" name="Submit4" value="提交"-->
<!--                                   style=" height:19px; border:solid 1px #000000; color:#666666"/></td>-->
<!--                    </tr>-->
<!--                </form>-->
<!--            </table>-->
<!--        </td>-->
<!--    </tr>-->
    <tr>
        <td height="10"></td>
    </tr>

    <TR>
        <TD background=qtimages/rightbg1.jpg height=33>
            <TABLE cellSpacing=0 cellPadding=0 width="83%" align=right
                   border=0>
                <TBODY>
                <TR>
                    <TD class=red width="69%">用户登陆</TD>
                    <TD width="31%"></TD>
                </TR>
                </TBODY>
            </TABLE>
        </TD>
    </TR>
    <TR>
        <TD align=middle><?php
            if ($_SESSION['cx'] == "") {
                ?>
                <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
                    <form action="userlog_post.php" method="post" name="userlog" id="userlog">
                        <tr>
                            <td width="12" height="28">&nbsp;</td>
                            <td width="49" height="28">用户名:</td>
                            <td width="109" height="28" colspan="2"><input name="username" type="text" id="username"
                                                                           style="width:100px; height:20px; border:solid 1px #000000; color:#666666"/>
                            </td>
                        </tr>
                        <tr>
                            <td height="28">&nbsp;</td>
                            <td height="28">密码:</td>
                            <td height="28" colspan="2"><input name="pwd1" type="password" id="pwd1"
                                                               style="width:100px; height:20px; border:solid 1px #000000; color:#666666"/>
                            </td>
                        </tr>

                        <tr>
                            <td height="28">&nbsp;</td>
                            <td height="28">身份:</td>
                            <td height="28" colspan="2">
                                <select name="cx" id="cx"
                                        style="width:100px; height:20px; border:solid 1px #000000; color:#666666">
                                    <option value="注册用户">注册用户</option>
<!--                                    <option value="管理员">管理员</option>-->
                                </select></td>
                        </tr>
                        <tr>
                            <td height="28">&nbsp;</td>
                            <td height="28">验证码：</td>
                            <td height="28"><input name="yzm" type="text" id="yzm"
                                                   style=" height:20px; border:solid 1px #000000; color:#666666; width:50px"/>
                            </td>
                            <td><img alt="刷新验证码" onclick="this.src='code.php?time='+new Date().getTime();"
                                     src="code.php?time='+new Date().getTime();" style="cursor:hand"/></td>
                        </tr>
                        <tr>
                            <td height="38" colspan="4" align="center"><input type="submit" name="Submit" value="登陆"
                                                                              style=" height:19px; border:solid 1px #000000; color:#666666"/>
                                <input type="reset" name="Submit2" value="重置"
                                       style=" height:19px; border:solid 1px #000000; color:#666666"/></td>
                        </tr>
                    </form>
                </table>
                <?php
            } else {
                ?>
                <table width="93%" height="68%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="28" align="left">当前用户：<?php echo $_SESSION['username'] ?></td>
                    </tr>
                    <tr>
                        <td height="28" align="left">您的权限：<?php echo $_SESSION['cx'] ?></td>
                    </tr>
                    <tr>
                        <td height="28" align="left">欢迎您的到来!!!</td>
                    </tr>
                    <tr>
                        <td height="28" align="center"><input type="button" name="Submit3" value="退出"
                                                              onclick="javascript:location.href='logout.php';"
                                                              style=" height:19px; border:solid 1px #000000; color:#666666"/>
                            <input type="button" name="Submit22" value="个人中心"
                                   onclick="javascript:location.href='main.php';"
                                   style=" height:19px; border:solid 1px #000000; color:#666666"/></td>
                    </tr>
                </table>
            <?php } ?></TD>
    </TR>
    <TR>
        <TD height=10></TD>
    </TR>
    <TR>
        <TD background=qtimages/rightbg1.jpg height=33>
            <TABLE cellSpacing=0 cellPadding=0 width="83%" align=right
                   border=0>
                <TBODY>
                <TR>
                    <TD class=red width="69%">友情链接</TD>
                    <TD width="31%"><A
                                href="http://dsjjq.hzsm.gov.cn/NewsList.aspx?ModuleID=429"></A></TD>
                </TR>
                </TBODY>
            </TABLE>
        </TD>
    </TR>
    <TR>
        <TD style="PADDING-LEFT: 7px; PADDING-TOP: 5px" align=middle>
            <table class="newsline" cellspacing="0" cellpadding="0" width="94%"
                   align="center" border="0">
                <tbody>
                <?php
                $sql = "select * from youqinglianjie order by id desc";
                $query = mysql_query($sql);
                $rowscount = mysql_num_rows($query);
                if ($rowscount > 0) {
                    for ($i = 0; $i < $rowscount; $i++) {
                        ?>
                        <tr>
                            <td width="12%" height="25" align="center"><span class="STYLE2"><img src="qtimages/1.jpg"/></span>
                            </td>
                            <td width="20%" height="25"><a href="<?php echo mysql_result($query, $i, "wangzhi"); ?>"
                                                           target="_blank"><?php echo mysql_result($query, $i, "wangzhanmingcheng"); ?></a>
                            </td>
                            <td width="68%" height="25"><a href="<?php echo mysql_result($query, $i, "wangzhi"); ?>"
                                                           target="_blank"><?php echo mysql_result($query, $i, "wangzhi"); ?></a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </TD>
    </TR>
    <TR>
        <TD>&nbsp;</TD>
    </TR>
    </TBODY>
</TABLE>