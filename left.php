
<SCRIPT LANGUAGE="JavaScript" SRC="js/treemenu.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" SRC="js/Common.js"></SCRIPT>

<!--管理员后台导航栏-->
<link rel="stylesheet" href="css.css" type="text/css"><body>
<SCRIPT LANGUAGE='JavaScript'>
foldersTree = gFldr('<DIV CLASS=fldrroot><b>系统功能列表</b></DIV>','');

// Class1 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>管理员帐号管理</DIV>', ''));
// insDoc(Class1, gLnk(1, '<a href=yhzhgl.php target=main>管理员帐号管理</a>', '', 'images/editinfo.gif'));

Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>用户信息管理</DIV>', ''));

insDoc(Class2, gLnk(1, '<a href=yonghuzhuce_list.php target=main>用户信息查询</a>', '', 'images/editinfo.gif'));



// Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>新闻资讯管理</DIV>', ''));
// insDoc(Class2, gLnk(1, '<a href=xinwentongzhi_add.php?lb=最新动态 target=main>最新动态添加</a>', '', 'images/editinfo.gif'));
// insDoc(Class2, gLnk(1, '<a href=xinwentongzhi_list.php?lb=最新动态 target=main>最新动态查询</a>', '', 'images/editinfo.gif'));
// insDoc(Class2, gLnk(1, '<a href=xinwentongzhi_add.php?lb=促销活动 target=main>促销活动添加</a>', '', 'images/editinfo.gif'));
// insDoc(Class2, gLnk(1, '<a href=xinwentongzhi_list.php?lb=促销活动 target=main>促销活动查询</a>', '', 'images/editinfo.gif'));
// insDoc(Class2, gLnk(1, '<a href=xinwentongzhi_add.php?lb=购买须知 target=main>购买须知添加</a>', '', 'images/editinfo.gif'));
// insDoc(Class2, gLnk(1, '<a href=xinwentongzhi_list.php?lb=购买须知 target=main>购买须知查询</a>', '', 'images/editinfo.gif'));



Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>农产品信息管理</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=leibiexinxi_add.php target=main>农产品类别添加</a>', '', 'images/editinfo.gif'));
insDoc(Class2, gLnk(1, '<a href=leibiexinxi_list.php target=main>农产品类别查询</a>', '', 'images/editinfo.gif'));
insDoc(Class2, gLnk(1, '<a href=shangpinxinxi_add.php target=main>农产品信息添加</a>', '', 'images/editinfo.gif'));
insDoc(Class2, gLnk(1, '<a href=shangpinxinxi_list.php target=main>农产品信息查询</a>', '', 'images/editinfo.gif'));

Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>购物车管理</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=gouwuche_list.php target=main>购物车查询</a>', '', 'images/editinfo.gif'));

Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>订单信息管理</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=dingdanxinxi_list.php target=main>订单信息查询</a>', '', 'images/editinfo.gif'));
insDoc(Class2, gLnk(1, '<a href=dingdanxinxi_list1.php target=main>订单信息发货</a>', '', 'images/editinfo.gif'));

Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>销售统计</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=gouwuche_list1.php target=main>销售统计</a>', '', 'images/editinfo.gif'));


Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>留言管理</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=liuyanban_list.php target=main>留言管理</a>', '', 'images/editinfo.gif'));

// Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>系统管理</DIV>', ''));
// insDoc(Class2, gLnk(1, '<a href=shanchushuju.php target=main>批量删除</a>', '', 'images/editinfo.gif'));
// insDoc(Class2, gLnk(1, '<a href=dx.php?lb=系统简介 target=main>系统简介</a>', '', 'images/editinfo.gif'));
// insDoc(Class2, gLnk(1, '<a href=dx.php?lb=系统公告 target=main>系统公告</a>', '', 'images/editinfo.gif'));
// insDoc(Class2, gLnk(1, '<a href=youqinglianjie_add.php target=main>友情连接添加</a>', '', 'images/editinfo.gif'));
// insDoc(Class2, gLnk(1, '<a href=youqinglianjie_list.php target=main>友情连接查询</a>', '', 'images/editinfo.gif'));

insDoc(foldersTree, gLnk(1, '<a href=mod.php target=main>修改密码</a>', '', 'images/pwd.GIF'));
insDoc(foldersTree, gLnk(1, '退出', 'logout.php', 'images/exit.GIF'));
initializeDocument(0);</SCRIPT>
