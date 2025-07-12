
<SCRIPT LANGUAGE="JavaScript" SRC="js/treemenu.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" SRC="js/Common.js"></SCRIPT>

<!--用户后台导航栏-->
<link rel="stylesheet" href="css.css" type="text/css"><body>
<SCRIPT LANGUAGE='JavaScript'>
foldersTree = gFldr('<DIV CLASS=fldrroot><b>系统功能列表</b></DIV>','');

Class1 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>个人资料管理</DIV>', ''));
insDoc(Class1, gLnk(1, '<a href=yonghuzhuce_updt2.php target=main>个人资料管理</a>', '', 'images/editinfo.gif'));

Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>购物车管理</DIV>', ''));

insDoc(Class2, gLnk(1, '<a href=gouwuche_list2.php target=main>购物车查询</a>', '', 'images/editinfo.gif'));

Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>订单信息</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=dingdanxinxi_list2.php target=main>订单信息查询</a>', '', 'images/editinfo.gif'));


Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>收藏记录管理</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=shoucangjilu_list2.php target=main>收藏记录查询</a>', '', 'images/editinfo.gif'));





insDoc(foldersTree, gLnk(1, '退出', 'logout.php', 'images/exit.GIF'));
initializeDocument(0);</SCRIPT>
