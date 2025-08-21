<?
/*
=========================================================================
-------------------------------------------------------------------------
       メール送信クラス（MIME による添付ファイル対応）           
                                                              ver 1.1.0
                written by Y.Matsushima                       2002/2/22
-------------------------------------------------------------------------
=========================================================================

・配信モードが二つ、配信手段が二つあります。

  ☆ 配信モード
    通常配信モードと即時配信モード。
    大きな添付ファイルがあるなど、メモリの節約が重要なときは即時配信で。

  ☆ 配信手段
    PHP の mail 関数を使用するか否か。デフォルトは mail 関数を使用します。
    mail 関数を使用すると、宛先に「"hoge" <hoge@hoge.com> 」形式は使えません。
    useMTA() メソッドを呼ぶと、パイプで MTA を使用するようになります。
    使用する MTA は、/usr/sbin/sendmail です。MTA() メソッドで指定できます。
    MTA() メソッドの引数の __from__ は from() メソッドで設定した値に、
    __to__ は to() メソッドで設定した値に置き換えられます。
    即時配信モードでは mail 関数は使用できません。

・ 典型的な配信手順
  （省略可能な手順は [ ... ] で囲みます。）

    { // 通常配信モード ------------------------------------------
      ///// メモリの消費が多い(オブジェクト内に全ての
      ///// データを溜め込む)。手順はラフ。
    
      $m = new matsMail();
    
      // 順不同区間 はじめ
    [ $m->mta("/usr/sbin/sendmail -f '__from__' -- '__to__'"); ]
    [ $m->useMTA(); ]
    [ $m->hasAttachment(); ]
      // 順不同区間 おわり

      // 順不同区間 はじめ
      $m->to("hoge@hoge.com", "ほげほげ");
      $m->from("foo@foo.com", "ふー");
      $m->subject("my subject 日本語も OK");
    [ $m->addHeader("X-COUNT", "1025"); ]
    [ $m->addAttachment($data, "filename.txt", "filetype"); ]
      $m->body($text);
      // 順不同区間 おわり
    
      $m->send();
    }
    
    
    { // 即時配信モード ------------------------------------------
      ///// メモリ消費量が少ないが、手順が決まっている。
      ///// ヘッダはメモリに溜め込むが、本文、添付ファイルは溜め込まず、
      ///// そのままパイプ経由で MTA に書き出す。
      ///// 省略可能な手順は [ ... ] で囲みます。
    
      $m = new matsMail();
    
      // 順不同区間 はじめ
      $m->immediate();
    [ $m->hasAttachment(); ]
    [ $m->mta("/usr/sbin/sendmail -f '__from__' -- '__to__'"); ]
    [ $m->useMTA(); ]
      // 順不同区間 おわり

      // 順不同区間 はじめ
      $m->to("hoge@hoge.com", "ほげほげ");
      $m->from("foo@foo.com", "ふー");
      $m->subject("my subject 日本語も OK");
    [ $m->addHeader("X-COUNT", "1025"); ]
      // 順不同区間 おわり

      // このメソッドでパイプが開かれ、ヘッダ全てがパイプに書き出される
      $m->closeHeader();

      // body(), addAttachment() の順番厳守。
      $m->body($text);
    [ $m->addAttachment($data, "filename.txt", "filetype"); ]

      $m->send();
    }

・ 複数の同じメールを配信する手順

  ☆  通常モードの場合
      to() と send() だけをループ内に入れます。
      ※ addHeader() を使いたい場合は、ループ内で resetHeader() し、
         全ての追加ヘッダを addHeader() しなおさなければなりません。

  ☆  即時モードの場合
      to() , subject(), from(), closeHeader(), body(),
      addAttachment(), send() をループ内に入れます。
      ※ addHeader() を使いたい場合は、ループ内で resetHeader() し、
         全ての追加ヘッダを addHeader() しなおさなければなりません。
      

・ メソッド一覧

    matsMail()
      引数：なし
      返値：なし
      コンストラクタ。各種インスタンス変数の初期化をします。

    immediate()
      引数：なし
      返値：なし
      即時モードにする（デフォルトは通常モード）
      これを呼ぶと、mail 関数は使えなくなるので、mta() で
      メール送信プログラムの指定をしなければなりません。

    hasAttachment()
      引数：なし
      返値：なし
      添付ファイルがある場合は呼ぶ必要があります。

    useMTA()
      引数：なし
      返値：なし
      mail 関数を使わない場合は呼ぶ必要があります。

    to()
      引数： (1) 宛先アドレス
             (2) 宛先の名前（デフォルトは空文字列）
      返値：なし
      宛先アドレスの設定。To フィールドは「宛先の名前 <宛先アドレス>」の形になる。
      内部で MIME エンコーディングもしているので、ユーザは気にする必要はありません。

    from()
      引数： (1) 差出人アドレス
             (2) 差出人の名前（デフォルトは空文字列）
      返値：なし
      差出人アドレスの設定。From フィールドは「差出人の名前 <差出人アドレス>」の形になる。
      内部で MIME エンコーディングもしているので、ユーザは気にする必要はありません。

    subject()
      引数： (1) 件名
      返値：なし
      内部で MIME エンコーディングもしているので、ユーザは気にする必要はありません。

    mta()
      引数： (1) メール送信に使うプログラムのコマンドとオプション。
                 （デフォルトは /usr/sbin/sendmail）
      返値：なし
      メール送信用のプログラムを指定する。__from__ は、from() で指定されたアドレス、
      __to__ は、to() で指定されたアドレスに置き換わる。書き換わるタイミングは
      即時モードの時は closeHeader() が呼ばれたとき、通常モードの場合は send() が
      呼ばれたときになります。それまでに、to() と from() を所望の値にセットしておかな
      ければなりません。sendmail の -- オプションは、以降の引数を全て宛先として扱う
      ためのものです。ハイフンで始まるアドレスがあるそうなので、追加しておきました。
      例：
        $m->mta("/usr/sbin/sendmail -f '__from__' -- '__to__'");
      
    body($aBody)
      引数：本文文字列
      返値：なし
      本文の文字列を指定する。内部で JIS への変換をやっているので、
      ユーザは気にする必要はありません。

    closeHeader()
      引数：なし
      返値：なし
      即時モードの場合はヘッダを実際にパイプへ出力します。
      通常モードのときは呼ぶ必要はありません（単に return します）。

    addAttachment()
      引数： (1) 添付したいデータへのリファレンス
             (2) 添付ファイル名（デフォルトは uniqid("at") ）
             (3) 添付ファイルのタイプ（デフォルトは application/octet-stream ）
      返値：なし
      添付ファイルを追加していきます。複数のファイルを添付すること
      も可能です。その場合は、複数回このメソッドを呼び出してください。
      また、即時モードでは body() の後に呼び出さなければならない
      制約があります。

    addHeader($aName, $aValue)
      引数： (1) ヘッダフィールドの名前（ : の左）
             (2) ヘッダの値（ : の右 ）
      返値：なし
      Subject, To, From 以外のメールヘッダ（追加ヘッダ）を付け足すとき
      に使用します。一度付け足した追加ヘッダを削除するには、resetHeader()
      を用いて全ての追加ヘッダを削除しなければなりません。

    send()
      引数：なし
      返値：bool 値
      メールを送信します。即時モードではパイプのクローズだけを行っています。
      通常モードでは、メールヘッダの組み上げから送信までを一気に行います。

    resetHeader()
      引数：なし
      返値：なし
      付け足されている追加ヘッダを全て削除します。

    begin()
      引数：なし
      返値：なし
      内部で使っているメソッド。メール送信用プログラムへのパイプをオープンする。

    checkPipe()
      引数：なし
      返値：なし
      内部で使っているメソッド。パイプが開けていなければ、exit します。

・ 注意事項
   ☆ sendmail などの MTA がインストール・設定されていなければなりません。
   ☆ RedHat Linux 7.2J/PHP-4.0.7+mbstring にて動作の確認を行いました。
      国際化関数を内部で使っています。
   ☆ このプログラムを利用したことにより発生した問題の責任は負いません。
   ☆ プログラムの転載などを行われる場合は、
        株式会社 ITBoost 松嶋祥文 （ mats@itboost.co.jp ）
      までご連絡ください。
   ☆ RFC に準じていることの保証は致しません（^^;;;）。

*/


class matsMail {
  var $iIsImmediate;
  var $iIsUseMailFunction;
  var $iHasAttachment;
  var $iMTA;
  var $iTo;
  var $iToName;
  var $iFrom;
  var $iFromName;
  var $iSubject;
  var $iBody;
  var $iAttachment;
  var $iAdditionalHeader;
  var $boundary;

  function matsMail() {
    $this->iIsImmediate = false;
    $this->iIsUseMailFunction = true;
    $this->iHasAttachment = false;
    $this->iMTA = "/usr/sbin/sendmail";
    $this->iAttachment = array();
    $this->iTo = "";
    $this->iFrom = "";
    $this->iSubject = "";
    $this->iBody = "";
    $this->iAdditionalHeader = array();
    $this->boundary = "-*-*-*-*-*-*-*-*-Boundary_" . uniqid("b");
	mb_internal_encoding("EUC-JP");
	mb_language('Japanese');
  } 

  function immediate() {
    $this->iIsImmediate = true;
    $this->iIsUseMailFunction = false;
  }

  function hasAttachment() {
    $this->iHasAttachment = true;
  }

  function useMTA() {
    $this->iIsUseMailFunction = false;
  }

  function to($aTo, $aName = "") {
    $this->iTo = $aTo;
    if( $aName != "" ) {
      $this->iToName = mb_encode_mimeheader($aName);
    }
  }
  
  function from($aFrom, $aName) {
    $this->iFrom = $aFrom;
    if( $aName != "" ) {
      $this->iFromName = mb_encode_mimeheader($aName);
    }
  }

  function subject($aSubject) {
    $this->iSubject = mb_encode_mimeheader($aSubject);
  }

  function mta($aMTA) {
    $this->iMTA = $aMTA;
  }

  function begin() {
    $tmp = preg_replace("/__to__/i", $this->iTo, $this->iMTA) ;
    $tmp = preg_replace("/__from__/i", $this->iFrom, $tmp) ;
    $this->iMailPipe = popen($tmp, "w");
    if( !$this->iMailPipe ) {
      print "Can't open pipe to " . $this->tmp . "\n";
      exit;
    }
  }

  // 本文の書き出し。
  function body($aBody) {
    if( $this->iIsImmediate ) {
      $this->checkPipe();
      // メール本文のパートの開始（即時モード）
      if( $this->iHasAttachment ) {
	fputs($this->iMailPipe, "--".$this->boundary."\n");
	fputs($this->iMailPipe, "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n");
	fputs($this->iMailPipe, "Content-Transfer-Encoding: 7bit\n");
      }
      fputs( $this->iMailPipe, "\n");
      fputs( $this->iMailPipe, mb_convert_encoding($aBody,"JIS") );
      fputs( $this->iMailPipe, "\n");
    } else {
      $this->iBody = mb_convert_encoding($aBody, "JIS");
    }
  }

  function checkPipe() {
    if( !$this->iMailPipe ) {
      print("Pipe to MTA is not already opened. Abort.\n");
      exit;
    }
  }

  function closeHeader() {
    if( $this->iIsImmediate ) {

      // begin が呼ばれてなかったら、開いておく。
      if( !$this->iMailPipe ) {
	$this->begin();
      }
      $this->checkPipe();

      // 即時モードの場合のヘッダ出力
      fputs( $this->iMailPipe, "To: ".$this->iToName." <" . $this->iTo . ">\n");
      fputs( $this->iMailPipe, "From: ".$this->iFromName." <" . $this->iFrom . ">\n");
      fputs( $this->iMailPipe, "Subject: " . $this->iSubject . "\n");
      
      // 追加ヘッダ出力
      for( $i=0; $i<count($this->iAdditionalHeader); $i++ ) {
	fputs( $this->iMailPipe,
	       $this->iAdditionalHeader[$i]["name"] . ": ". $this->iAdditionalHeader[$i]["value"]. "\n" );
      }
      
      // MIME 用の Header 出力
      if( $this->iHasAttachment ) {
	fputs($this->iMailPipe, "MIME-Version: 1.0\n");
	fputs($this->iMailPipe, 
	      "Content-Type: multipart/mixed; boundary=\"".$this->boundary."\"\n");
      }
      // ヘッダの終了を示す空行
      fputs( $this->iMailPipe, "\n");
    } else {
      // 即時モードじゃなかったら何もしない。
      return;
    }
  }

  // データはサイズが大きい可能性があるので、参照で受け取る。
  // ただ、呼び出し元で一度メモリに取り込んでおく必要はあるので、
  // 本当にヘビーなデータには使えないかも、です。
  function addAttachment(&$aData, $aFilename = "", $aType = "application/octet-stream" ){
    if( $aFilename == "" ) {
      $aFilename = uniqid("at");
    }
    if( $this->iIsImmediate ) {
      $this->checkPipe();
      // 添付ファイルのパートの書き込み
      fputs($this->iMailPipe, "--".$this->boundary."\n");
      fputs($this->iMailPipe, 
	    "Content-Type: $aType"."; name=\"" . $aFilename . "\"\n");
      fputs($this->iMailPipe, "Content-Transfer-Encoding: base64\n");
      fputs($this->iMailPipe, 
	    "Content-Disposition: attachment; filename=\"".$aFilename."\"\n");
      fputs( $this->iMailPipe, "\n");
      fputs( $this->iMailPipe,
	     chunk_split(base64_encode($aData)));
      fputs( $this->iMailPipe, "\n");
    } else {
      // 即時モードじゃないときは、参照元のデータをコピーする。
      $tmp = count($this->iAttachment);
      $this->iAttachment[$tmp]["data"] = $aData;
      $this->iAttachment[$tmp]["file"] = $aFilename;
      $this->iAttachment[$tmp]["type"] = $aType;
    }
  }

  // MIME エンコードはしません。
  function addHeader($aName, $aValue) {
    $tmp = count($this->iAdditionalHeader);
    $this->iAdditionalHeader[$tmp]["name"] = $aName;
    $this->iAdditionalHeader[$tmp]["value"] = $aValue;
  }

  // 追加ヘッダをリセットする。
  function resetHeader() {
    $this->iAdditionalHeader = array();
  }

  // メールの送信メソッド。
  function send() {

    if( $this->iIsImmediate ) {
      $this->checkPipe();
      // MIME の終了のバウンダリを書いておく
      if( $this->iHasAttachment ) {
	fputs($this->iMailPipe, "--" .$this->boundary ."--\n");
      }
      pclose($this->iMailPipe);
      unset($this->iMailPipe);
      return true;
    } else {

      // 追加ヘッダ生成
      $additional = "From: ". $this->iFromName ." <" . $this->iFrom . ">\n";
      for( $i=0; $i<count($this->iAdditionalHeader); $i++ ) {
	$additional .= $this->iAdditionalHeader[$i]["name"] . ": ". $this->iAdditionalHeader[$i]["value"] ."\n";
      }
      
      // MIME 用の Header 生成
      if( $this->iHasAttachment ) {
	$additional .= "MIME-Version: 1.0\n";
	$additional .= "Content-Type: multipart/mixed; boundary=\"".$this->boundary."\"\n";
      }

	  $joinjoin = array();
	  $joinjoin = explode( "\n" , $additional );
	  array_pop($joinjoin);
	  $additional = implode( "\n" , $joinjoin );
	  

      // 送信方法に従った送信
      if( $this->iIsUseMailFunction ) {
	// メール関数

	$body = "";

	// 本文のパート用
	if( $this->iHasAttachment ) {
	  $body .= "--".$this->boundary."\n";
	  $body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n";
	  $body .= "Content-Transfer-Encoding: 7bit\n";
	  $body .= "\n";
	}

	$body .= $this->iBody;
	$body .= "\n";
	
	if( $this->iHasAttachment ) {
	  for( $i=0; $i<count($this->iAttachment); $i++ ) {
	    $body .= "--" . $this->boundary."\n";
	    $body .= "Content-Type: ".$this->iAttachment[$i]["type"]."; name=\"".
	      $this->iAttachment[$i]["file"]."\"\n";
	    $body .= "Content-Transfer-Encoding: base64\n";
	    $body .= "Content-Disposition: attachment; filename=\"".$this->iAttachment[$i]["file"]."\"\n";
	    $body .= "\n";
	    $body .= chunk_split(base64_encode($this->iAttachment[$i]["data"]));
	    $body .= "\n";
	  }
	  // マルチパートなメールの終わり
	  $body .= "--" .$this->boundary ."--\n";
	}
	// mail 関数を使う場合は、「"hoge" <hoge@hoge.com> 」形式は使わない。
	return mail( $this->iTo, $this->iSubject, $body, $additional );
      } else {
	// パイプを開く
	$this->begin();

	// 以降パイプで MTA に渡す。

	// ヘッダの出力
	fputs( $this->iMailPipe, "To: ".$this->iToName." <" . $this->iTo . ">\n");
	fputs( $this->iMailPipe, "Subject: " . $this->iSubject . "\n");
	fputs( $this->iMailPipe, $additional );
	fputs( $this->iMailPipe, "\n" );

	if( $this->iHasAttachment ) {
	  // 本文のパート用
	  fputs($this->iMailPipe, "--".$this->boundary."\n");
	  fputs($this->iMailPipe, "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n");
   	  fputs($this->iMailPipe, "Content-Transfer-Encoding: 7bit\n");
	  fputs( $this->iMailPipe, "\n");
	}

	fputs( $this->iMailPipe, $this->iBody);
	fputs( $this->iMailPipe, "\n");

	if( $this->iHasAttachment ) {
	  for( $i=0; $i<count($this->iAttachment); $i++ ) {
	    fputs($this->iMailPipe, "--".$this->boundary."\n");
	    fputs($this->iMailPipe, 
		  "Content-Type: ".$this->iAttachment[$i]["type"]."; name=\"".
		  $this->iAttachment[$i]["file"]."\"\n");
	    fputs($this->iMailPipe, "Content-Transfer-Encoding: base64\n");
	    fputs($this->iMailPipe,
		  "Content-Disposition: attachment; filename=\"".$this->iAttachment[$i]["file"]."\"\n");
	    fputs( $this->iMailPipe, "\n");
	    fputs( $this->iMailPipe,
		   chunk_split(base64_encode($this->iAttachment[$i]["data"])));
	    fputs( $this->iMailPipe, "\n");
	  }
	  fputs($this->iMailPipe, "--" .$this->boundary ."--\n");
	}
	return true;
      }   // end of MTA mode

    }     // end of not immediate mode
  }       // end of function send

} // end of matsMail
?>
