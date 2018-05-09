<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Keywords" content="Webアプリケーション,開発,情報,システム,ソフトウェア,PHP" />
<meta name="Description" content="より身近にWebアプリケーション開発をサポートする株式会社TWB" />

<title>お問い合わせ　｜　株式会社ＴＷＢ</title>
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
<div id="pan"><a href="index.html">HOME</a> > お問い合わせ</div>
<!--/.page_ttl END-->


<!--main_contents-->
<div id="main_contents">

	<!--inner2-->
	<div class="inner2">
    
	<h3 class="ttl_02">お急ぎの方は下記電話番号から<br>お問い合わせください</h3>
	<p class="contact_tel"><img src="images/page/contact/contact_tel.jpg" alt="TEL:03-5613-1284 営業時間 10：00～18：00 "></p>

	<h3 class="ttl_02">お問い合わせフォーム</h3>
	<p class="contact_txt"><span class="c_red">【※必須】</span>は必須入力になります</p>
    <form name="me_mailform" action="inquiry.php" method="post">
    <div id="error_message" class="alert alert-error">入力内容に誤りがあります。</div>
    
    <table width="100%" class="table_info table_contact">
		<tr>
			<th scope="row"><span class="c_red">【※必須】</span><br>お問い合せの種類</th>
			<td>
            <input type="radio" name="type" value="見積りを出して欲しい"> 見積りを出して欲しい<br>
            <input type="radio" name="type" value="最適なシステムを提案して欲しい"> 最適なシステムを提案して欲しい<br>
            <input type="radio" name="type" value="直接具体的に相談したい"> 直接具体的に相談したい<br>
            <input type="radio" name="type" value="事業提携の相談がしたい"> 事業提携の相談がしたい<br>
            <input type="radio" name="type" value="その他"> その他<br>
            <div id="type_error" class="alert alert-error">エラーメッセージ</div>
            </td>
		</tr>
		<tr>
			<th scope="row"><span class="c_red">【※必須】</span><br>お問い合せの内容</th>
            <td><textarea name="comment"></textarea>
			<br>
			<br><div id="comment_error" class="alert alert-error">エラーメッセージ</div>
            </td>
		</tr>
		<tr>
			<th scope="row"><span class="c_red">【※必須】</span><br>会社名</th>
			<td><input type="text" name="office" class="inputA" placeholder="例) 株式会社TWB">　
            <div id="office_error" class="alert alert-error">エラーメッセージ</div>
            </td>
        </tr>
		<tr>
			<th scope="row">部署名</th>
			<td><input type="text" name="department" class="inputA" placeholder="例) システム開発事業部">
            <div id="department_error" class="alert alert-error">エラーメッセージ</div>
            </td>
		</tr>
		<tr>
			<th scope="row">役職名</th>
			<td><input type="text" name="appointment" class="inputA" placeholder="例) 主任　システムエンジニア">
            <div id="appointment_error" class="alert alert-error">エラーメッセージ</div>
            </td>
		</tr>
		<tr>
			<th scope="row"><span class="c_red">【※必須】</span><br>ご担当者名</th>
			<td><input type="text" name="name" class="inputA" placeholder="例) 山田　太郎">
            <div id="name_error" class="alert alert-error">エラーメッセージ</div>
            </td>
		</tr>
		<tr>
			<th scope="row"><span class="c_red">【※必須】</span><br>メールアドレス</th>
			<td><input type="text" name="email" class="inputA" placeholder="例) info@example.com">
            <div id="email_error" class="alert alert-error">エラーメッセージ</div>
            </td>
		</tr>
		<tr>
			<th scope="row">郵便番号</th>
			<td><input type="text" name="zipcode"  onkeyup="memf.zipAddr('zipcode', '', 'addr')" class="inputA" placeholder="例) 1000001">
            <div id="zipcode_error" class="alert alert-error">エラーメッセージ</div>
            </td>
		</tr>
		<tr>
			<th scope="row">住所</th>
			<td><input type="text" name="addr" class="inputA" placeholder="例）東京都千代田区千代田1番1号">
            <div id="addr_error" class="alert alert-error">エラーメッセージ</div>
            </td>
		</tr>
		<tr>
			<th scope="row"><span class="c_red">【※必須】</span><br>電話番号</th>
			<td><input type="text" name="telno" class="inputA" placeholder="例）03-5613-1284">
            <div id="telno_error" class="alert alert-error">エラーメッセージ</div>
            </td>
		</tr>
		<tr>
			<th scope="row">御社ウェブサイト</th>
			<td><input type="text" name="url" class="inputA" placeholder="例）https://www.twb.jp">
            <div id="url_error" class="alert alert-error">エラーメッセージ</div>
            </td>
		</tr>
	</table>
    <div class="submit"><input type="submit" name="submitConfirm" value="入力内容を確認する"></div>
    </form>
    <p class="privacy_policy"><a href="privacy.html" target="_blank">プライバシーポリシー</a></p>
	</div> 
	<!--/.inner2 END-->   
    
</div>
<!--/.main_contents END-->

<?php
include('/var/www/vhosts/twb.jp/httpdocs/common/footer_area.html');
include('/var/www/vhosts/twb.jp/httpdocs/common/footer.html');
?>