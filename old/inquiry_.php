<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="Keywords" content="Webアプリケーション,開発,情報,システム,ソフトウェア,PHP" />
<meta name="Description" content="より身近にWebアプリケーション開発をサポートする株式会社TWB" />
<script type="text/javascript" src="js/rollover.js"></script>
<link href="css/import_form.css" rel="stylesheet" type="text/css" media="all" />
<title>お問い合わせ　｜　株式会社ＴＷＢ</title>

<link rel="stylesheet" type="text/css" href="_inquiry.css"/>
<link rel="stylesheet" href="./css/validationEngine.jquery.css" />
<link rel="shortcut icon" href="/favicon.ico" />

<!--jQuery-->
<script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
<!--jQuery_Smooth-->
<script type="text/javascript" src="./js/jquery.smooth.js"></script>
<!--jQuery_Rollover-->
<script type="text/javascript" src="./js/jquery.rollover.js"></script>
<!--[if IE 6]>
	<script src="/_js/DD_belatedPNG.js"></script>
	<script>DD_belatedPNG.fix('img, .png_bg');</script>
<![endif]-->

<script src="https://ajaxzip3.googlecode.com/svn/trunk/ajaxzip3/ajaxzip3-https.js" charset="UTF-8"></script>

<script type="text/javascript" src="./js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="./js/jquery.validationEngine-ja.js"></script>
<script type="text/javascript">
jQuery(function ($) {
	$('#form1').validationEngine();
});
</script>

<script language="JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function inputCheck(){
	var obj = document.form1;
	if(!obj.content.value){
		alert("お問い合わせの内容を入力してください");
		return false;
	}
	if(!obj.cname.value){
		alert("御社名を入力してください");
		return false;
	}
	if(!obj.name.value){
		alert("担当者名を入力してください");
		return false;
	}
	if(!obj.tel.value){
		alert("電話番号を入力してください");
		return false;
	}
	if(!obj.mail.value){
		alert("e-mailアドレスを入力してください");
		return false;
	}
	var mailcheck = /.+@.+\..+/;
	var mailvalue = obj.mail.value;
	if(!mailvalue.match(mailcheck)){
		alert("e-mailアドレスが正しくありません");
		return false;
	}
	return true;
}
//-->
</script>
</head>

<body>
<a name="top" id="top"></a>
<!--　外枠ここから　-->
<div id="wrapper">
	
	<!--　ヘッダー　-->
	<div id="header">
		<div id="lead_text">
			<h1>株式会社ＴＷＢは<br />お客様のＷｅｂシステムをより身近にサポートする会社です</h1>
		</div>
		<div id="logo">
			<a href="index.html"><img src="img/logo.gif" width="113" height="36" alt="株式会社TWB" /></a></div>
		<div id="tel"><img src="img/tel.gif" width="209" height="36" alt="お気軽にご相談ください 03-5613-1284" /></div>
		
	</div>
	
	<!--　グローバルメニュー　-->
	<div id="navi">
		<ul>
			<li><a href="index.html"><img src="img/navi_home_off.gif" alt="ホーム" width="150" height="40" /></a></li>
			<li><a href="performance.html"><img src="img/navi_performance_off.gif" alt="実　績" width="150" height="40" /></a></li>
			<li><a href="rinen.html"><img src="img/navi_rinen_off.gif" alt="経営理念" width="150" height="40" /></a></li>
			<li><a href="company.html"><img src="img/navi_company_off.gif" alt="会社概要" width="150" height="40" /></a></li>
			<li><a href="recruit.html"><img src="img/navi_recruit_off.gif" alt="採用情報" width="150" height="40" /></a></li>
			<li><img src="img/navi_contact_on.gif" alt="お問い合わせ" width="150" height="40" /></li>
		</ul>
	</div>
	<!--　メインイメージ　-->
	<div id="page_image">
		<h2><img src="img/tit_inquiry.jpg" alt="お問い合わせ" width="900" height="100" /></h2>
	</div>
	<div id="topic_pass"><a href="index.html">ホーム</a> &gt; お問い合わせ</div>
	<!--　コンテンツ外枠ここから　-->
	<div id="main">
		
		<!--　コンテンツここから　-->
		<div id="inquiry">
			
			<p>以下フォームよりお問い合わせください。</p>
<!--
			<p>・必須項目は必ずご記入をお願いします。 <br />
			・文字化けを防ぐため，半角カタカナ，丸数字，特殊文字は使用しないでください。
			</p>
-->
            <div style="color:red;text-align:left;">
<?php
$msg_str = array(
    1 => 'お問い合わせの内容は必須項目です',
    2 => '御社名は必須項目です',
    3 => '担当者名は必須項目です',
    4 => '電話番号は必須項目です',
    5 => 'e-mailアドレスは必須項目です',
    6 => 'e-mailアドレスが正しくありません',
);
$msg = array();
if($flg == 6){
    $msg[5] = $msg_str[$flg];
} else if($flg > 0 && $flg < 6){
    $msg[$flg] = $msg_str[$flg];
}
?>
            </div>
<!--
			<form id="form1" name="form1" method="post"  action="conf.php" onsubmit="return inputCheck();">
-->
			<form id="form1" name="form1" method="post"  action="conf.php">
				<div id="contact_form">
					<table border="0" cellspacing="0" cellpadding="0" summary="お問い合わせ" >
						<tr>
							<th scope="row">お問い合せの種類<br />
							<span class="icon_need">必須</span></th>
							<td>
								<input type="radio" name="subject" value="見積りを出して欲しい" class="validate[required]"/>見積りを出して欲しい
								<input type="radio" name="subject" value="最適なシステムを提案して欲しい" class="validate[required]"/>最適なシステムを提案して欲しい
								<input type="radio" name="subject" value="直接具体的に相談したい" class="validate[required]"/>直接具体的に相談したい
								<input type="radio" name="subject" value="事業提携の相談がしたい" class="validate[required]"/>事業提携の相談がしたい
								<input type="radio" name="subject" value="その他" class="validate[required]"/>その他
							</td>
						</tr>
						<tr>
							<th scope="row">お問い合せ内容<br />
							<span class="icon_need">必須</span></th>
							<td><textarea name="content" cols="90" rows="10" class="validate[required]"></textarea>
							<br /><span class="fc_f30"><?php echo $msg[1]; ?></span></td>
						</tr>
						<tr>
							<th scope="row">御社名<span class="icon_need">必須</span></th>
							<td><input name="cname" type="text" size="80" class="validate[required]" /><br /><span class="fc_f30"><?php echo $msg[2]; ?></span></td>
						</tr>
						<tr>
							<th scope="row">部署・役職名</th>
							<td>
								<span>部署名：<input name="unitname" type="text" size="30" /></span>
								<span>役職名：<input name="appointmentname" type="text" size="30" /></span>
							</td>
						</tr>
						<tr>
							<th scope="row">担当者名<span class="icon_need">必須</span></th>
							<td><input name="name" type="text" size="50" class="validate[required]" /><br /><span class="fc_f30"><?php echo $msg[3]; ?></span></td>
						</tr>
						<tr>
							<th scope="row">電話番号<span class="icon_need">必須</span></th>
							<td><input style="ime-mode: disabled;" name="tel" type="text" size="50" class="validate[required]" /><br /><span class="fc_f30"><?php echo $msg[4]; ?></span></td>
						</tr>
<!--
						<tr>
							<th scope="row">FAX</th>
							<td><input style="ime-mode: disabled;" name="fax" type="text" size="30" /></td>
						</tr>
-->
						<tr>
							<th scope="row">郵便番号</th>
							<td>
							<input style="ime-mode: disabled;" name="post" type="text" size="10" maxlength="10" onkeyup="AjaxZip3.zip2addr(this,'','pref','address');" />
  <span class="text10">（記入例：187-0002）<br/>  ※ハイフンを入れて半角数字7桁の入力で、都道府県／市区町村番地が自動で入力されます。  </span>
							</td>
						</tr>
						<tr>
							<th scope="row">都道府県</th>
							<td>
							<input name="pref" type="text" size="30" />
							</td>
						</tr>
						<tr>
							<th scope="row">住所</th>
							<td>
							<input name="address" type="text" size="80" />
							</td>
						</tr>
						<tr>
							<th scope="row">e-mailアドレス<span class="icon_need">必須</span></th>
							<td><input style="ime-mode: disabled;" name="mail" type="text" size="80"  class="validate[required,custom[email]]" /><br /><span class="fc_f30"><?php echo $msg[5]; ?></span></td>
						</tr>
<!--
						<tr>
							<th scope="row">事業内容</th>
							<td><textarea name="businessdescription" cols="50" rows="5"></textarea></td>
						</tr>
-->
						<tr>
							<th scope="row">御社ウェブサイト</th>
							<td><input name="weburl" type="text" size="80" /></td>
						</tr>
					</table>
					
					<div class="btn_form">
						<input type="image" src="./img/btn_confirm.gif" onmouseover="this.src='./img/btn_confirm_on.gif'" onmouseout="this.src='./img/btn_confirm.gif'" value="　確　認　">
					</div>
				</div>
			</form>
			
		</div>
		<!--　コンテンツここまで　-->

<?php
if(0){
?>
		<!--　サイドバーここから　-->
		<div id="sideber">
			
			<!--　企業情報　-->
			<div id="side_tit_company"><img src="img/side_tit_company..gif" alt="企業情報" width="220" height="30" /></div>
			<div id="side_company_body">
				<p>株式会社TWB<br />
					〒120-0005<br />
					東京都足立区綾瀬4-7-8<br />
					営業時間：10時～18時
	<br />定休日：土日、祝日</p>
	<iframe width="200" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E6%9D%B1%E4%BA%AC%E9%83%BD%E8%B6%B3%E7%AB%8B%E5%8C%BA%E8%B0%B7%E4%B8%AD2-2-8-304&amp;ie=UTF8&amp;hq=&amp;hnear=%E6%9D%B1%E4%BA%AC%E9%83%BD%E8%B6%B3%E7%AB%8B%E5%8C%BA%E8%B0%B7%E4%B8%AD%EF%BC%92%E4%B8%81%E7%9B%AE%EF%BC%92%E2%88%92%EF%BC%98&amp;t=m&amp;brcurrent=3,0x60188fc31bd37bff:0x154f1b6ffe67254b,0,0x60188fc31af6d3ad:0x67eef2dbe0919c6c&amp;ll=35.774859,139.831238&amp;spn=0.013927,0.017166&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E6%9D%B1%E4%BA%AC%E9%83%BD%E8%B6%B3%E7%AB%8B%E5%8C%BA%E8%B0%B7%E4%B8%AD2-2-8-304&amp;ie=UTF8&amp;hq=&amp;hnear=%E6%9D%B1%E4%BA%AC%E9%83%BD%E8%B6%B3%E7%AB%8B%E5%8C%BA%E8%B0%B7%E4%B8%AD%EF%BC%92%E4%B8%81%E7%9B%AE%EF%BC%92%E2%88%92%EF%BC%98&amp;t=m&amp;brcurrent=3,0x60188fc31bd37bff:0x154f1b6ffe67254b,0,0x60188fc31af6d3ad:0x67eef2dbe0919c6c&amp;ll=35.774859,139.831238&amp;spn=0.013927,0.017166&amp;z=14&amp;iwloc=A&amp;output=embed" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>
			</div>
			
			<div id="bn_contact">
				<div id="bn_contact_body"><img src="img/side_bn_contact.gif" alt="お問い合わせ　サービスやwebシステム構築に関するご相談・お見積りなどお気軽にお問い合わせください。TEL 03-5613-1284 FAX 03-5613-1275 FAX・メールは24時間365日受け付けております。" width="220" height="230" /></div>
				<div id="btn_contact"><a href="inquiry.php"><img src="img/btn_contact_off.gif" alt="メールのお問い合わせ" width="200" height="30" /></a></div>
			</div>
		</div>
	<!--　サイドバーここまで　-->
<?php
}
?>

	</div>
	<!--　コンテンツ外枠ここまで　-->
</div>
<!--　外枠ここまで　-->

<!--　フッターここから　-->
<div class="page_top"><a href="#top"><img src="img/btn_page_top.gif" width="120" height="30" alt="PageTop" /></a></div>


<div id="footer">
<div id="bottom_menu">
	<ul>
		<li><a href="index.html">ホーム</a></li>
		<li>| <a href="performance.html">実績</a></li>
		<li>| <a href="rinen.html">経営理念</a></li>
		<li>| <a href="company.html">会社概要</a></li>
		<li>| <a href="recruit.html">採用情報</a></li>
		<li>|	<a href="inquiry.php">お問い合わせ</a></li>
		<li>|	<a href="notation.html">特定商取引法表記</a></li>
		<li>|	<a href="privacy.html">プライバシーポリシー</a></li>
		<li>|	<a href="isms-A-02.pdf" target="_blank">情報セキュリティ基本方針</a></li>
	</ul>	
	</div>
	<div id="copyright">Copyright(c) 2012 TWB All Rights Reserved.</div>
	
</div>

<!--　フッターここまで　-->

</body>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-42222167-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</html>
