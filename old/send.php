<?php
//require_once("/home/twb/www/app/MatsMail.php");
//require_once("/home/twb/www/app/Config.php");

define("QUERY_MAIL_TO", "info@twb.jp");
define("QUERY_MAIL_FROM", "info@twb.jp");

session_start();
$contact = $_SESSION;

if(!$contact['subject']){
    header("location: query.php?e=1");
    exit;
}
if(!$contact['content']){
    header("location: query.php?e=2");
    exit;
}
if(!$contact['cname']){
    header("location: query.php?e=3");
    exit;
}
if(!$contact['name']){
    header("location: query.php?e=4");
    exit;
}
if(!$contact['tel']){
    header("location: query.php?e=5");
    exit;
}
if(!$contact['mail']){
    header("location: query.php?e=6");
    exit;
}
if(!isMail($contact['mail'])){
    header("location: query.php?e=7");
    exit;
}

if($contact){
    // メール送信
    sendMailAdmin($contact);
    sendMailUser($contact);
}

function sendMailAdmin($arr) {
    
    // メール本文作成
    
    $mail_body = "

ホームページの問い合わせフォームより、以下のお問い合せがありました。

========================================================

●お問い合せの種類
    {$arr['subject']}

●お問い合せの内容
    {$arr['content']}

●御社名
    {$arr['cname']}

●部署名
    {$arr['unitname']}

●役職名
    {$arr['appointmentname']}

●担当者名
    {$arr['name']}

●電話番号
    {$arr['tel']}

●住所
    {$arr['post']}
    {$arr['pref']}{$arr['address']}

●e-mailアドレス
    {$arr['mail']}

●御社ウェブサイト
    {$arr['weburl']}

========================================================
";

    // メール送信
    mb_language("japanese");
    mb_internal_encoding("UTF-8");
    $data = Array(
        'to' => QUERY_MAIL_TO,
        'from' => QUERY_MAIL_FROM,
//        'to' => 'tatsuhara@twb.jp',
//        'from' => 'tatsuhara@twb.jp',
        'name' => '株式会社ティーダブリュービー',
        'subject' => 'お問い合わせがありました',
        'body' => $mail_body,
    );
    $from = mb_encode_mimeheader(mb_convert_encoding($data['name'], "JIS", "UTF-8")) . "<{$data['from']}>";
    mb_send_mail($data['to'], $data['subject'], $data['body'], "From:{$from}");
/*    
    $mail = new MatsMail();
    $mail->to("info@twb.jp","");
//    $mail->to(QUERY_MAIL_TO,"");
    $mail->from(QUERY_MAIL_FROM, "");
    $mail->subject("お問い合わせがありました");
    $mail->addHeader("Content-Type", "text/plain; charset=\"ISO-2022-JP\"");
    $mail->addHeader("Content-Transfer-Encoding", "7bit");
    $mail->body($mail_body);
    $mail->send();
*/
}

function sendMailUser($arr) {

    // メール本文作成
    
    $mail_body = "

{$arr['cname']}　{$arr['name']}　様

この度は、T-Webホームページより、お問い合せいただきまして
誠にありがとうございます。

以下の内容で、お問い合せを受付ましたので、ご連絡させていただきます。

後ほど、担当のものより、ご連絡させていただきますので、しばらくお待ち下さい。

========================================================

●お問い合せの種類
    {$arr['subject']}

●お問い合せの内容
    {$arr['content']}

●御社名
    {$arr['cname']}

●部署名
    {$arr['unitname']}

●役職名
    {$arr['appointmentname']}

●担当者名
    {$arr['name']}

●電話番号
    {$arr['tel']}

●住所
    {$arr['post']}
    {$arr['pref']}{$arr['address']}

●e-mailアドレス
    {$arr['mail']}

●御社ウェブサイト
    {$arr['weburl']}

========================================================

  ご不明な点やご質問等ございましたら、本メール返信にてお問い合せ
  ください。
  
  また、本メールの内容に心当たりの無い方は、大変お手数ですが、
  本メールをそのままご返信いただけますようお願い申し上げます。
  
  今後とも、T-Webをよろしくお願い致します。

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
　株式会社TWB （T-Web)
　──────────────────────────────────
　〒120-0005
　東京都足立区綾瀬4-7-8-301
　E-mail：info@twb.jp 
　Tel：03-5613-1284 
　Fax：03-5613-1275
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

";

    // メール送信
    mb_language("japanese");
    mb_internal_encoding("UTF-8");
    $data = Array(
        'to' => $arr['mail'],
        'from' => QUERY_MAIL_FROM,
        'name' => "{$arr['cname']}　{$arr['name']}　様",
        'subject' => 'お問い合せありがとうございます。',
        'body' => $mail_body,
    );
    mb_send_mail($data['to'], $data['subject'], $data['body'], "From:{$data['from']}");
/*
    $mail = new MatsMail();
    $mail->to($arr['mail'],"");
    $mail->from(QUERY_MAIL_FROM, "");
    $mail->subject("お問い合せありがとうございます。");
    $mail->addHeader("Content-Type", "text/plain; charset=\"ISO-2022-JP\"");
    $mail->addHeader("Content-Transfer-Encoding", "7bit");
    $mail->body($mail_body);
    $mail->send();
*/
    header("location: thanks.php");
    exit;

}
function isMail($str) {
    return ereg("^(.+)@(.+)\\.(.+)$", $str);
}

?>
