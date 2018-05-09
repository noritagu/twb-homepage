<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Keywords" content="Webアプリケーション,開発,情報,システム,ソフトウェア,PHP" />
<meta name="Description" content="より身近にWebアプリケーション開発をサポートする株式会社TWB" />

<title>お問い合わせ 内容確認　｜　株式会社ＴＷＢ</title>
<link href="./me_mailform/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="./me_mailform/assets/css/bootstrap-responsive.min.css" rel="stylesheet">
<script src="./me_mailform/assets/js/jquery-1.11.3.min.js" charset="UTF-8" type="text/javascript"></script>
<script src="./me_mailform/assets/js/memf.js" charset="UTF-8" type="text/javascript"></script>

<?php
include('/var/www/vhosts/twb.jp/httpdocs/common/header.html');
?>

<!--page_ttl-->
<div id="page_ttl" class="contact_bg">
	<h2>お問い合わせ</h2>
</div>
<div id="pan"><a href="index.html">HOME</a> > お問い合わせ 内容確認</div>
<!--/.page_ttl END-->


<!--main_contents-->
<div id="main_contents">

	<!--inner2-->
	<div class="inner2">
<!--    
	<h3 class="ttl_02">お急ぎの方は下記電話番号から<br>お問い合わせください</h3>
	<p class="contact_tel"><img src="images/page/contact/contact_tel.jpg" alt="TEL:03-5613-1284 営業時間 10：00～18：00 "></p>
-->
	<h3 class="ttl_02">お問い合わせ　内容確認</h3>
    <form name="me_mailform" action="inquiry.php" method="post">
    
    <table width="100%" class="table_info table_contact">
		<tr>
			<th scope="row">お問い合せの種類</th>
            <td id="type"></td>
		</tr>
		<tr>
			<th scope="row">お問い合せの内容</th>
            <td id="comment"></td>
		</tr>
		<tr>
			<th scope="row">会社名</th>
			<td id="office"></td>
        </tr>
		<tr>
			<th scope="row">部署名</th>
			<td id="department"></td>
		</tr>
		<tr>
			<th scope="row">役職名</th>
			<td id="appointment"></td>
		</tr>
		<tr>
			<th scope="row">ご担当者名</th>
			<td id="name"></td>
		</tr>
		<tr>
			<th scope="row">メールアドレス</th>
			<td id="email"></td>
		</tr>
		<tr>
			<th scope="row">郵便番号</th>
			<td>〒<span id="zipcode"></span></td>
		</tr>
		<tr>
			<th scope="row">住所</th>
			<td id="addr"></td>
		</tr>
		<tr>
			<th scope="row">電話番号</th>
			<td id="telno"></td>
		</tr>
		<tr>
			<th scope="row">御社ウェブサイト</th>
			<td id="url"></td>
		</tr>
	</table>
    <div class="submit">
    <!-- input type="submit" name="submitConfirm" value="入力内容を確認する" -->
    <input name="_back" type="submit" class="btn btn-primary" value="戻る">
    <input name="commit" type="submit" class="btn btn-primary" value="送信する">
    </div>

</form>
	</div> 
	<!--/.inner2 END-->   
    
</div>
<!--/.main_contents END-->

<?php
include('/var/www/vhosts/twb.jp/httpdocs/common/footer_area.html');
include('/var/www/vhosts/twb.jp/httpdocs/common/footer.html');
?>