// JScript 文件

function OnEnter( field,alertStr ) 
{ 
    if(field.value == alertStr)
    {
        field.value = '';
    }
	
}

function OnExit(field,alertStr) 
{
	if(field.value == '')
    {
        field.value = alertStr;
    }
}

function OnClick(field,keyWord,alertStr) 
{
	if(field.value == '')
    {
        alert(alertStr);
        return false;
    }
	if(field.value == keyWord)
    {
        alert(alertStr);
        return false;
    }
    return true;
}

function OnClick2(field,queryType,keyWord,alertStr) 
{
    if(queryType.options[queryType.selectedIndex].value==1)
    {
        //查询数据是否为数字
	    if(isDecimal(field.value)==false)
	    {
		    alert('金额格式不正确，请输入正确的金额！');
		    field.focus();
		    field.select();
            return false;
	    } 
    }
    if(field.value == '')
    {
        alert(alertStr);
        return false;
    }
	if(field.value == keyWord)
    {
        alert(alertStr);
        return false;
    }
    return true;
}

//检测是否为数字
function isDecimal(str)
{
    return /^(\+|-)?(0|[1-9]\d*)(\.\d*[1-9])?$/g.test(str) 
}


function SetKeydown(button) 
 { 
    if(event.keyCode==13) 
    { 
        event.keyCode = 9; 
        event.returnValue = false; 
        document.all[button].click(); 
    } 
 } 
 
 
function ZoomOutImg(maxWidth)
{
    var img=document.getElementsByTagName("img");
    for (var i=0;i<img.length;i++)
      { 
           if((img[i].width>maxWidth)
           &&(img[i].id!="sysImage1")
           &&(img[i].id!="sysImage2")
           &&(img[i].id!="sysImage3")
           &&(img[i].id!="sysImage4")
           &&(img[i].id!="sysImage11")
           &&(img[i].id!="sysImage12")
           &&(img[i].id!="sysImage13")
           &&(img[i].id!="sysImage14")
           )
            {
                img[i].width = maxWidth;
            }
      }
      
}
