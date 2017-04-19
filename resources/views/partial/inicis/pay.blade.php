@extends('app')
@section('title', 'Pay with Inicis')
@section('page', 'Checkout with Inicis')
@section('breadcrumb')
<!-- SECTION HEADLINE -->
<div class="section-headline-wrap v2">
	<div class="section-headline">
		<h2>Checkout</h2>
		<p>Home<span class="separator">/</span>Products<span class="separator">/</span><span class="current-section">Checkout</span></p>
	</div>
</div>
<!-- /SECTION HEADLINE -->
@endsection
<!-- SECTION -->
@section('body')
<style>
body, tr, td {font-size:10pt; font-family:±¼¸²,verdana; color:#433F37; line-height:19px;}
table, img {border:none}

/* Padding ******/ 
.pl_01 {padding:1 10 0 10; line-height:19px;}
.pl_03 {font-size:20pt; font-family:±¼¸²,verdana; color:#FFFFFF; line-height:29px;}

/* Link ******/ 
.a:link  {font-size:9pt; color:#333333; text-decoration:none}
.a:visited { font-size:9pt; color:#333333; text-decoration:none}
.a:hover  {font-size:9pt; color:#0174CD; text-decoration:underline}

.txt_03a:link  {font-size: 8pt;line-height:18px;color:#333333; text-decoration:none}
.txt_03a:visited {font-size: 8pt;line-height:18px;color:#333333; text-decoration:none}
.txt_03a:hover  {font-size: 8pt;line-height:18px;color:#EC5900; text-decoration:underline}
</style>

<script language=javascript src="http://plugin.inicis.com/pay61_uni_cross.js"></script>

<script language=javascript>
StartSmartUpdate();

var openwin;

function pay(frm){
	// MakePayMessage()¸¦ È£ÃâÇÔÀ¸·Î½á ÇÃ·¯±×ÀÎÀÌ È­¸é¿¡ ³ªÅ¸³ª¸ç, Hidden Field
	// ¿¡ °ªµéÀÌ Ã¤¿öÁö°Ô µË´Ï´Ù. ÀÏ¹ÝÀûÀÎ °æ¿ì, ÇÃ·¯±×ÀÎÀº °áÁ¦Ã³¸®¸¦ Á÷Á¢ÇÏ´Â °ÍÀÌ
	// ¾Æ´Ï¶ó, Áß¿äÇÑ Á¤º¸¸¦ ¾ÏÈ£È­ ÇÏ¿© Hidden FieldÀÇ °ªµéÀ» Ã¤¿ì°í Á¾·áÇÏ¸ç,
	// ´ÙÀ½ ÆäÀÌÁöÀÎ INIsecurepay.php·Î µ¥ÀÌÅÍ°¡ Æ÷½ºÆ® µÇ¾î °áÁ¦ Ã³¸®µÊÀ» À¯ÀÇÇÏ½Ã±â ¹Ù¶ø´Ï´Ù.

	if(document.ini.clickcontrol.value == "enable"){
		if(document.ini.goodname.value == "")  // ÇÊ¼öÇ×¸ñ Ã¼Å© (»óÇ°¸í, »óÇ°°¡°Ý, ±¸¸ÅÀÚ¸í, ±¸¸ÅÀÚ ÀÌ¸ÞÀÏÁÖ¼Ò, ±¸¸ÅÀÚ ÀüÈ­¹øÈ£)
		{
			alert("»óÇ°¸íÀÌ ºüÁ³½À´Ï´Ù. ÇÊ¼öÇ×¸ñÀÔ´Ï´Ù.");
			return false;
		}
		else if(document.ini.price.value == ""){
			alert("»óÇ°°¡°ÝÀÌ ºüÁ³½À´Ï´Ù. ÇÊ¼öÇ×¸ñÀÔ´Ï´Ù.");
			return false;
		}
		else if(document.ini.buyername.value == ""){
			alert("±¸¸ÅÀÚ¸íÀÌ ºüÁ³½À´Ï´Ù. ÇÊ¼öÇ×¸ñÀÔ´Ï´Ù.");
			return false;
		} 
		else if(document.ini.buyeremail.value == ""){
			alert("±¸¸ÅÀÚ ÀÌ¸ÞÀÏÁÖ¼Ò°¡ ºüÁ³½À´Ï´Ù. ÇÊ¼öÇ×¸ñÀÔ´Ï´Ù.");
			return false;
		}
		else if(document.ini.buyertel.value == ""){
			alert("±¸¸ÅÀÚ ÀüÈ­¹øÈ£°¡ ºüÁ³½À´Ï´Ù. ÇÊ¼öÇ×¸ñÀÔ´Ï´Ù.");
			return false;
		}
		else if( ( navigator.userAgent.indexOf("MSIE") >= 0 || navigator.appName == 'Microsoft Internet Explorer' ) && 
		(document.INIpay == null || document.INIpay.object == null) )  // ÇÃ·¯±×ÀÎ ¼³Ä¡À¯¹« Ã¼Å© 
		{
			alert("\nÀÌ´ÏÆäÀÌ ÇÃ·¯±×ÀÎ 128ÀÌ ¼³Ä¡µÇÁö ¾Ê¾Ò½À´Ï´Ù. \n\n¾ÈÀüÇÑ °áÁ¦¸¦ À§ÇÏ¿© ÀÌ´ÏÆäÀÌ ÇÃ·¯±×ÀÎ 128ÀÇ ¼³Ä¡°¡ ÇÊ¿äÇÕ´Ï´Ù. \n\n´Ù½Ã ¼³Ä¡ÇÏ½Ã·Á¸é Ctrl + F5Å°¸¦ ´©¸£½Ã°Å³ª ¸Þ´ºÀÇ [º¸±â/»õ·Î°íÄ§]À» ¼±ÅÃÇÏ¿© ÁÖ½Ê½Ã¿À.");
			return false;
		}
		else{			
			if(MakePayMessage(frm)){
				disable_click();
				openwin = window.open("childwin.html","childwin","width=299,height=149");		
				return true;
			}else{			
				if( IsPluginModule() ){  //pluginÅ¸ÀÔ Ã¼Å©
				   alert("°áÁ¦¸¦ Ãë¼ÒÇÏ¼Ì½À´Ï´Ù.");
			}
				return false;
			}
		}
	}
	else{
		return false;
	}
}


function enable_click()
{
	document.ini.clickcontrol.value = "enable"
}

function disable_click()
{
	document.ini.clickcontrol.value = "disable"
}

function focus_control()
{
	if(document.ini.clickcontrol.value == "disable")
		openwin.focus();
}
</script>


<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<form name=ini method=post action="" onSubmit="return pay(this)"> 
<table width="632" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td height="85" background="img/card.gif" style="padding:0 0 0 64">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="3%" valign="top"><img src="img/title_01.gif" width="8" height="27" vspace="5"></td>
          <td width="97%" height="40" class="pl_03"><font color="#FFFFFF"><b>°áÁ¦¿äÃ»</b></font></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td align="center" bgcolor="6095BC"><table width="620" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td bgcolor="#FFFFFF" style="padding:8 0 0 56"> <table width="530" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>ÀÌ ÆäÀÌÁö´Â °áÁ¦À» ¿äÃ»ÇÏ´Â ÆäÀÌÁö·Î½á »ùÇÃ(¿¹½Ã) ÆäÀÌÁöÀÔ´Ï´Ù. <br>
                  °áÁ¦ÆäÀÌÁö °³¹ßÀÚ´Â ¼Ò½º ³»¿ë Áß¿¡ "<font color=red>¡Ø ÁÖÀÇ ¡Ø</font>" Ç¥½Ã°¡ Æ÷ÇÔµÈ ¹®ÀåÀº Æ¯È÷ ÁÖÀÇÇÏ¿© ±Í»çÀÇ ¿ä±¸¿¡ ¸Â°Ô ÀûÀýÈ÷ ¼öÁ¤ Àû¿ëÇÏ½Ã±æ ¹Ù¶ø´Ï´Ù.
                  <br>
                  <br>ÀºÇàÀÇ ÀÎÅÍ³Ý¹ðÅ· Site¿¡¼­ »ç¿ë ÁßÀÎ ÇÃ·¯±×ÀÎ(º¸¾ÈÇÁ·Î±×·¥)°ú µ¿ÀÏÇÑ ¹æ½ÄÀ¸·Î ÀÌ´Ï½Ã½º °áÁ¦ ÆäÀÌÁö¿¡¼­µµ ÇÃ·¯±×ÀÎ ÇÁ·Î±×·¥À» ÀÌ¿ëÇÏ¿© º¸¾È ¹× ÀÎÁõ Ã³¸®¸¦ ÇÏ°í ÀÖ½À´Ï´Ù.<br>
		      ÀÎÅÍ³Ý ¹ðÅ· Site¿¡¼­ ÀÎÅÍ³Ý¹ðÅ· ¾÷¹«¸¦ ¼öÇàÇÏ±â Àü¿¡ ÇÃ·¯±×ÀÎ ¼³Ä¡È®ÀÎ ÆäÀÌÁö¸¦ ¼öÇàÇÏ´Â °Í°ú ¸¶Âù°¡Áö·Î ÀÌ´ÏÆäÀÌ ÇÃ·¯±×ÀÎ ¼³Ä¡È®ÀÎ ÆäÀÌÁö(plugin_check.html)¸¦ ¼öÇàÇÑ ÈÄ °áÁ¦¿äÃ» ÆäÀÌÁö(INIsecurepay.html)ÀÇ ±â´ÉÀ» ±¸ÇöÇÏ¼Å¾ß ÇÕ´Ï´Ù.
		  <br>
                  
                  <br>
                 "°áÁ¦" ¹öÆ°À» ´©¸£¸é °áÁ¦ Á¤º¸¸¦ ¾ÈÀüÇÏ°Ô ¾ÏÈ£È­ÇÏ±â À§ÇÑ ÇÃ·¯±×ÀÎ Ã¢ÀÌ Ãâ·ÂµË´Ï´Ù.<br>
                  ÇÃ·¯±×ÀÎ¿¡¼­ Á¦½ÃÇÏ´Â ´Ü°è¿¡ µû¶ó Á¤º¸¸¦ ÀÔ·ÂÇÑ ÈÄ <b>[°áÁ¦ Á¤º¸ È®ÀÎ]</b> ´Ü°è¿¡¼­ "È®ÀÎ" ¹öÆ°À» ´©¸£¸é 
                  °áÁ¦Ã³¸®°¡ ½ÃÀÛµË´Ï´Ù.<br>
                  Åë½ÅÈ¯°æ¿¡ µû¶ó ´Ù¼Ò ½Ã°£ÀÌ °É¸±¼öµµ ÀÖÀ¸´Ï °áÁ¦°á°ú°¡ Ç¥½ÃµÉ¶§±îÁö "ÁßÁö" ¹öÆ°À» ´©¸£°Å³ª ºê¶ó¿ìÀú¸¦ Á¾·áÇÏ½ÃÁö ¸»°í
                  Àá½Ã¸¸ ±â´Ù·Á ÁÖ½Ê½Ã¿À.<br></td>
              </tr>
            </table>
            <br>
            <table width="510" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="7"><img src="img/life.gif" width="7" height="30"></td>
                <td background="img/center.gif"><img src="img/icon03.gif" width="12" height="10"> 
                  <b>Á¤º¸¸¦ ±âÀÔÇÏ½Å ÈÄ °áÁ¦¹öÆ°À» ´­·¯ÁÖ½Ê½Ã¿À.</b></td>
                <td width="8"><img src="img/right.gif" width="8" height="30"></td>
              </tr>
            </table>
            <br>
            <table width="510" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="510" colspan="2"  style="padding:0 0 0 23"> <table width="470" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td width="18" align="center"><img src="img/icon02.gif" width="7" height="7"></td>
                      <td width="109" height="25">°á Á¦ ¹æ ¹ý </td>
                      <td width="343"> <select name=gopaymethod >
                          <option value="">[ °áÁ¦¹æ¹ýÀ» ¼±ÅÃÇÏ¼¼¿ä. ] 
                          <option value="Card">½Å¿ëÄ«µå °áÁ¦
                          <option value="VCard">½Å¿ëÄ«µå ISP°áÁ¦
                          <option value="DirectBank">½Ç½Ã°£ ÀºÇà°èÁÂÀÌÃ¼ 
                          <option value="HPP">ÇÚµåÆù °áÁ¦
                          <option value="PhoneBill">¹Þ´ÂÀüÈ­°áÁ¦ 
                          <option value="Ars1588Bill">1588 ÀüÈ­ °áÁ¦ 
                          <option value="VBank">¹«ÅëÀå ÀÔ±Ý(°¡»ó°èÁÂ) 
                          <option value="OCBPoint">OK Ä³½¬¹éÆ÷ÀÎÆ® °áÁ¦
                          <option value="Culture">¹®È­»óÇ°±Ç °áÁ¦
                          <option value="kmerce">K-merce »óÇ°±Ç °áÁ¦
                          <option value="TeenCash">Æ¾Ä³½Ã °áÁ¦
                          <option value="dgcl">°ÔÀÓ¹®È­ »óÇ°±Ç °áÁ¦
                         <option value="BCSH">µµ¼­¹®È­ »óÇ°±Ç °áÁ¦
                          <option value="OABK">¹Ì´Ï¹ðÅ© °áÁ¦
                          <option value="onlycard" >½Å¿ëÄ«µå °áÁ¦(Àü¿ë¸Þ´º) 
                          <option value="onlyisp">ÀÎÅÍ³Ý¾ÈÀü °áÁ¦ (Àü¿ë¸Þ´º) 
                          <option value="onlydbank">½Ç½Ã°£ ÀºÇà°èÁÂÀÌÃ¼ (Àü¿ë¸Þ´º) 
                          <option value="onlycid"> ½Å¿ëÄ«µå/°èÁÂÀÌÃ¼/¹«ÅëÀåÀÔ±Ý(Àü¿ë¸Þ´º) 
                          <option value="onlyvbank">¹«ÅëÀåÀÔ±Ý(Àü¿ë¸Þ´º) 
                          <option value="onlyhpp"> ÇÚµåÆù °áÁ¦(Àü¿ë¸Þ´º) 
                          <option value="onlyphone"> ÀüÈ­ °áÁ¦(Àü¿ë¸Þ´º) 
                          <option value="onlyocb"> OK Ä³½¬¹é °áÁ¦ - º¹ÇÕ°áÁ¦ ºÒ°¡´É(Àü¿ë¸Þ´º) 
                          <option value="onlyocbplus"> OK Ä³½¬¹é °áÁ¦- º¹ÇÕ°áÁ¦ °¡´É(Àü¿ë¸Þ´º) 
                          <option value="onlyculture"> ¹®È­»óÇ°±Ç °áÁ¦(Àü¿ë¸Þ´º) 
                          <option value="onlykmerce"> K-merce »óÇ°±Ç °áÁ¦(Àü¿ë¸Þ´º)
                          <option value="onlyteencash">Æ¾Ä³½Ã °áÁ¦(Àü¿ë¸Þ´º)
                          <option value="onlydgcl">°ÔÀÓ¹®È­ »óÇ°±Ç °áÁ¦(Àü¿ë¸Þ´º)
                          <option value="onlypoint">LGmyPoint
                          <option value="onlybcsh">µµ¼­¹®È­ »óÇ°±Ç °áÁ¦(Àü¿ë¸Þ´º)
                          <option value="onlyoabk">¹Ì´Ï¹ðÅ© °áÁ¦(Àü¿ë¸Þ´º)
                          </select></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="3" align="center"  background="img/line.gif"></td>
                    </tr>
                    <tr> 
                      <td width="18" align="center"><img src="img/icon02.gif" width="7" height="7"></td>
                      <td width="177" height="26">»ó Ç° ¸í</td>
                      <td width="280"><input type=text name=goodname size=20 value="Ãà±¸°ø"></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="3" align="center"  background="img/line.gif"></td>
                    </tr>
                    <tr> 
                      <td width="18" align="center"><img src="img/icon02.gif" width="7" height="7"></td>
                      <td width="109" height="25">°¡ °Ý</td>
                      <td width="343"><input type=text name=price size=20 value="1000"><br><font color=red><b>* ÁÖÀÇ* LGÄ«µå´Â ¹Ýµå½Ã 1004¿øÀ¸·Î °áÁ¦Å×½ºÆ® ÇÏ½Ã±â ¹Ù¶ø´Ï´Ù.</b></font></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="3" align="center"  background="img/line.gif"></td>
                    </tr>
                    <tr> 
                      <td width="18" align="center"><img src="img/icon02.gif" width="7" height="7"></td>
                      <td width="109" height="25">¼º ¸í</td>
                      <td width="343"><input type=text name=buyername size=20 value="È«±æµ¿"></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="3" align="center"  background="img/line.gif"></td>
                    </tr>
                    <tr> 
                      <td width="18" align="center"><img src="img/icon02.gif" width="7" height="7"></td>
                      <td width="109" height="25">Àü ÀÚ ¿ì Æí</td>
                      <td width="343"><input type=text name=buyeremail size=20 value="hkd@abcd.com"></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="3" align="center"  background="img/line.gif"></td>
                    </tr>
                    
                  <!-----------------------------------------------------------------------------------------------------
			¡Ø ÁÖÀÇ ¡Ø
			º¸È£ÀÚ ÀÌ¸ÞÀÏ ÁÖ¼ÒÀÔ·Â ¹Þ´Â ÇÊµå´Â ¼Ò¾×°áÁ¦(ÇÚµåÆù , ÀüÈ­°áÁ¦)
			Áß¿¡  14¼¼ ¹Ì¸¸ÀÇ °í°´ °áÁ¦½Ã¿¡ ºÎ¸ð ÀÌ¸ÞÀÏ·Î °áÁ¦ ³»¿ëÅëº¸ÇÏ¶ó´Â Á¤ÅëºÎ ±Ç°í »çÇ×ÀÔ´Ï´Ù. 
			´Ù¸¥ °áÁ¦ ¼ö´ÜÀ» ÀÌ¿ë½Ã¿¡´Â ÇØ´ç ÇÊµå(parentemail)»èÁ¦ ÇÏ¼Åµµ ¹®Á¦¾ø½À´Ï´Ù.
		  ------------------------------------------------------------------------------------------------------->  
                    <tr> 
                      <td width="18" align="center"><img src="img/icon02.gif" width="7" height="7"></td>
                      <td width="109" height="25">º¸È£ÀÚ ÀüÀÚ¿ìÆí</td>
                      <td width="343"><input type=text name=parentemail size=20 value="parents@parents.com"></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="3" align="center"  background="img/line.gif"></td>
                    </tr>
                    <tr> 
                      <td width="18" align="center"><img src="img/icon02.gif" width="7" height="7"></td>
                      <td width="109" height="25">ÀÌ µ¿ Àü È­</td>
                      <td width="343"><input type=text name=buyertel size=20 value="011-123-1234"></td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="3" align="center"  background="img/line.gif"></td>
                    </tr>
                    <tr valign="bottom"> 
                      <td height="40" colspan="3" align="center"><input type=image src="img/button_03.gif" width="63" height="25"></td>
                    </tr>
                    <tr valign="bottom">
                      <td height="45" colspan="3">ÀüÀÚ¿ìÆí°ú ÀÌµ¿ÀüÈ­¹øÈ£¸¦ ÀÔ·Â¹Þ´Â °ÍÀº °í°´´ÔÀÇ °áÁ¦¼º°ø ³»¿ªÀ» E-MAIL ¶Ç´Â SMS ·Î
                   ¾Ë·Áµå¸®±â À§ÇÔÀÌ¿À´Ï ¹Ýµå½Ã ±âÀÔÇÏ½Ã±â ¹Ù¶ø´Ï´Ù.</td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <br>
          </td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td><img src="img/bottom01.gif" width="632" height="13"></td>
  </tr>
</table>
</center>

<!-- 
»óÁ¡¾ÆÀÌµð.
Å×½ºÆ®¸¦ ¸¶Ä£ ÈÄ, ¹ß±Þ¹ÞÀº ¾ÆÀÌµð·Î ¹Ù²Ù¾î ÁÖ½Ê½Ã¿À.
-->
<input type=hidden name=mid value=worknplay0>

<!--
È­Æó´ÜÀ§
WON ¶Ç´Â CENT
ÁÖÀÇ : ¹ÌÈ­½ÂÀÎÀº º°µµ °è¾àÀÌ ÇÊ¿äÇÕ´Ï´Ù.
-->
<input type=hidden name=currency value="WON">


<!--
¹«ÀÌÀÚ ÇÒºÎ
¹«ÀÌÀÚ·Î ÇÒºÎ¸¦ Á¦°ø : yes
¹«ÀÌÀÚÇÒºÎ´Â º°µµ °è¾àÀÌ ÇÊ¿äÇÕ´Ï´Ù.
Ä«µå»çº°,ÇÒºÎ°³¿ù¼öº° ¹«ÀÌÀÚÇÒºÎ Àû¿ëÀº ¾Æ·¡ÀÇ Ä«µåÇÒºÎ±â°£À» ÂüÁ¶ ÇÏ½Ê½Ã¿À.
¹«ÀÌÀÚÇÒºÎ ¿É¼Ç Àû¿ëÀº ¹Ýµå½Ã ¸Å´º¾óÀ» ÂüÁ¶ÇÏ¿© ÁÖ½Ê½Ã¿À.
-->
<input type=hidden name=nointerest value="no">


<!--
Ä«µåÇÒºÎ±â°£
°¢ Ä«µå»çº°·Î Áö¿øÇÏ´Â °³¿ù¼ö°¡ ´Ù¸£¹Ç·Î À¯ÀÇÇÏ½Ã±â ¹Ù¶ø´Ï´Ù.

valueÀÇ ¸¶Áö¸· ºÎºÐ¿¡ Ä«µå»çÄÚµå¿Í ÇÒºÎ±â°£À» ÀÔ·ÂÇÏ¸é ÇØ´ç Ä«µå»çÀÇ ÇØ´ç
ÇÒºÎ°³¿ù¸¸ ¹«ÀÌÀÚÇÒºÎ·Î Ã³¸®µË´Ï´Ù (¸Å´º¾ó ÂüÁ¶).
-->
<input type=hidden name=quotabase value="¼±ÅÃ:ÀÏ½ÃºÒ:3°³¿ù:4°³¿ù:5°³¿ù:6°³¿ù:7°³¿ù:8°³¿ù:9°³¿ù:10°³¿ù:11°³¿ù:12°³¿ù">


<!-- ±âÅ¸¼³Á¤ -->
<!--
SKIN : ÇÃ·¯±×ÀÎ ½ºÅ² Ä®¶ó º¯°æ ±â´É - 6°¡Áö Ä®¶ó(ORIGINAL, GREEN, ORANGE, BLUE, KAKKI, GRAY)
HPP : ÄÁÅÙÃ÷ ¶Ç´Â ½Ç¹° °áÁ¦ ¿©ºÎ¿¡ µû¶ó HPP(1)°ú HPP(2)Áß ¼±ÅÃ Àû¿ë(HPP(1):ÄÁÅÙÃ÷, HPP(2):½Ç¹°).
Card(0): ½Å¿ëÄ«µå ÁöºÒ½Ã¿¡ ÀÌ´Ï½Ã½º ´ëÇ¥ °¡¸ÍÁ¡ÀÎ °æ¿ì¿¡ ÇÊ¼öÀûÀ¸·Î ¼¼ÆÃ ÇÊ¿ä ( ÀÚÃ¼ °¡¸ÍÁ¡ÀÎ °æ¿ì¿¡´Â Ä«µå»çÀÇ °è¾à¿¡ µû¶ó ¼³Á¤) - ÀÚ¼¼ÇÑ ³»¿ëÀº ¸Þ´º¾ó  ÂüÁ¶.
OCB : OK CASH BAG °¡¸ÍÁ¡À¸·Î ½Å¿ëÄ«µå °áÁ¦½Ã¿¡ OK CASH BAG Àû¸³À» Àû¿ëÇÏ½Ã±â ¿øÇÏ½Ã¸é "OCB" ¼¼ÆÃ ÇÊ¿ä ±× ¿Ü¿¡ °æ¿ì¿¡´Â »èÁ¦ÇØ¾ß Á¤»óÀûÀÎ °áÁ¦ ÀÌ·ç¾îÁü.
no_receipt : ÀºÇà°èÁÂÀÌÃ¼½Ã Çö±Ý¿µ¼öÁõ ¹ßÇà¿©ºÎ Ã¼Å©¹Ú½º ºñÈ°¼ºÈ­ (Çö±Ý¿µ¼öÁõ ¹ß±Þ °è¾àÀÌ µÇ¾î ÀÖ¾î¾ß »ç¿ë°¡´É)
-->
<input type=hidden name=acceptmethod value="SKIN(ORIGINAL):HPP(1):OCB">
<!--
»óÁ¡ ÁÖ¹®¹øÈ£ : ¹«ÅëÀåÀÔ±Ý ¿¹¾à(°¡»ó°èÁÂ ÀÌÃ¼),ÀüÈ­°áÀç °ü·Ã ÇÊ¼öÇÊµå·Î ¹Ýµå½Ã »óÁ¡ÀÇ ÁÖ¹®¹øÈ£¸¦ ÆäÀÌÁö¿¡ Ãß°¡ÇØ¾ß ÇÕ´Ï´Ù.
°áÁ¦¼ö´Ü Áß¿¡ ÀºÇà °èÁÂÀÌÃ¼ ÀÌ¿ë ½Ã¿¡´Â ÁÖ¹® ¹øÈ£°¡ °áÁ¦°á°ú¸¦ Á¶È¸ÇÏ´Â ±âÁØ ÇÊµå°¡ µË´Ï´Ù.
»óÁ¡ ÁÖ¹®¹øÈ£´Â ÃÖ´ë 40 BYTE ±æÀÌÀÔ´Ï´Ù.
-->
<input type=hidden name=oid size=40 value="merchant_oid">
<!--
ÇÃ·¯±×ÀÎ ÁÂÃø »ó´Ü »óÁ¡ ·Î°í ÀÌ¹ÌÁö »ç¿ë
ÀÌ¹ÌÁöÀÇ Å©±â : 90 X 34 pixels
ÇÃ·¯±×ÀÎ ÁÂÃø »ó´Ü¿¡ »óÁ¡ ·Î°í ÀÌ¹ÌÁö¸¦ »ç¿ëÇÏ½Ç ¼ö ÀÖÀ¸¸ç,
ÁÖ¼®À» Ç®°í ÀÌ¹ÌÁö°¡ ÀÖ´Â URLÀ» ÀÔ·ÂÇÏ½Ã¸é ÇÃ·¯±×ÀÎ »ó´Ü ºÎºÐ¿¡ »óÁ¡ ÀÌ¹ÌÁö¸¦ »ðÀÔÇÒ¼ö ÀÖ½À´Ï´Ù.
-->
<!--input type=hidden name=ini_logoimage_url  value="http://[»ç¿ëÇÒ ÀÌ¹ÌÁöÁÖ¼Ò]"-->

<!--
ÁÂÃø °áÁ¦¸Þ´º À§Ä¡¿¡ ÀÌ¹ÌÁö Ãß°¡
ÀÌ¹ÌÁöÀÇ Å©±â : ´ÜÀÏ °áÁ¦ ¼ö´Ü - 91 X 148 pixels, ½Å¿ëÄ«µå/ISP/°èÁÂÀÌÃ¼/°¡»ó°èÁÂ - 91 X 96 pixels
ÁÂÃø °áÁ¦¸Þ´º À§Ä¡¿¡ ¹Ì¹ÌÁö¸¦ Ãß°¡ÇÏ½Ã À§ÇØ¼­´Â ´ã´ç ¿µ¾÷´ëÇ¥¿¡°Ô »ç¿ë¿©ºÎ °è¾àÀ» ÇÏ½Å ÈÄ
ÁÖ¼®À» Ç®°í ÀÌ¹ÌÁö°¡ ÀÖ´Â URLÀ» ÀÔ·ÂÇÏ½Ã¸é ÇÃ·¯±×ÀÎ ÁÂÃø °áÁ¦¸Þ´º ºÎºÐ¿¡ ÀÌ¹ÌÁö¸¦ »ðÀÔÇÒ¼ö ÀÖ½À´Ï´Ù.
-->
<!--input type=hidden name=ini_menuarea_url value="http://[»ç¿ëÇÒ ÀÌ¹ÌÁöÁÖ¼Ò]"-->

<!--
ÇÃ·¯±×ÀÎ¿¡ ÀÇÇØ¼­ °ªÀÌ Ã¤¿öÁö°Å³ª, ÇÃ·¯±×ÀÎÀÌ ÂüÁ¶ÇÏ´Â ÇÊµåµé
»èÁ¦/¼öÁ¤ ºÒ°¡
uid ÇÊµå¿¡ Àý´ë·Î ÀÓÀÇÀÇ °ªÀ» ³ÖÁö ¾Êµµ·Ï ÇÏ½Ã±â ¹Ù¶ø´Ï´Ù.
-->
<input type=hidden name=quotainterest value="">
<input type=hidden name=paymethod value="">
<input type=hidden name=cardcode value="">
<input type=hidden name=cardquota value="">
<input type=hidden name=rbankcode value="">
<input type=hidden name=reqsign value="DONE">
<input type=hidden name=encrypted value="">
<input type=hidden name=sessionkey value="">
<input type=hidden name=uid value=""> 
<input type=hidden name=sid value="">
<input type=hidden name=version value=4000>
<input type=hidden name=clickcontrol value="">

</form>
<!-- SECTION -->
@endsection