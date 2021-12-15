<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="refresh" content=" 5; url=./home">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('javascript')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" type="image/png" href="/favicon.png">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="/css/load.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
</head>
<body>
  <div class="sp"></div>
  <div class="load_title">
  <div class="sp"></div>
    <h5>One of the trivia about coffee!!</h5>
    <div class="mt-3">
              <?php $draw = rand(1,21);
                if ($draw == 1){
                  $result = '1、エスプレッソを日本語にすると"表現"';
                } elseif ($draw == 2){
                  $result ="2、コーヒー豆の品種の数は200以上ある";
                } elseif ($draw == 3){
                  $result ="3、商品名に○○ブレンドと書いてある場合は○○に入る品種や銘柄は全体の30%入ってブレンドされていたら名乗れる";
                } elseif ($draw == 4){
                  $result ='4、マッキャートの意味は"染み"　キャラメルマキアートはキャラメルの染みという意味';
                } elseif ($draw == 5){
                  $result ='5、コーヒーでは”フレグランス”・”アロマ”・”フレーバー”は明確な違いがある';
                } elseif ($draw == 6){
                  $result ='6、インスタントコーヒーを発明したのは日本人科学者加藤サトリ博士　厳密には”ソリュブル・コーヒー”を発明';
                } elseif ($draw == 7){
                  $result ='7、日本で最初に創業された喫茶店”可否茶館”にはシャワールーム・ビリヤード場なども完備されていた';
                } elseif ($draw == 8){
                  $result ='8、”ドトール”はポルトガル語で医者の意味';
                } elseif ($draw == 9){
                  $result ='9、”フレグランス”は豆の状態や挽いた時に感じる香りのこと';
                } elseif ($draw == 10){
                  $result ='10、”アロマ”は抽出された液体の揮発(きはつ)で感じる香りのこと';
                } elseif ($draw == 11){
                  $result ='11、”フレーバー”は口に含んだ時に感じる香りのこと';
                } elseif ($draw == 12){
                  $result ='12、たんぽぽの根っこを乾燥させて焙煎した”たんぽぽコーヒー”という商品(代用コーヒー)がある';
                } elseif ($draw == 13){
                  $result ='13、米海軍は補給が長引いてコーヒーが切れた時パンを焦がしてその焦げを抽出して代用コーヒーを作っていた時がある';
                } elseif ($draw == 14){
                  $result ='14、高級コーヒーの代名詞”ブルーマウンテン”の約95％は日本輸出されている';
                } elseif ($draw == 15){
                  $result ='15、”カルディ”の由来はコーヒーの発見者と言われいる羊飼いの名前　そのため紙袋にも羊が描かれている';
                } elseif ($draw == 16){
                  $result ='16、スターバックスのロゴの人魚は実は神話の怪物  美しい歌声で航行中の人を惑わすギリシャ神話に登場する怪物”セイレーン”、その歌声が聞こえると助からないことから危険信号を表す”サイレン”の語源になっている';
                } elseif ($draw == 17){
                  $result ='17、ゾウの糞から採取したコーヒーもある　その名も”ブラック・アイボリー”';
                } elseif ($draw == 18){
                  $result ='18、”愛のない夫婦とは、砂糖の入っていないコーヒーのことである”ということわざがポーランドに存在する';
                } elseif ($draw == 19){
                  $result ='19、バッハはコーヒー愛好家であり 作品にもコーヒー好きの娘と飲む事を反対する父親を描いた”コーヒー・カンタータ”がある　カンタータは交声曲';
                } elseif ($draw == 20){
                  $result ='20、カフェと喫茶店の違いは法律で定義されている、でも店名は自由につけられる';
                } elseif ($draw == 21){
                  $result ='21、最高価格で落札されたコーヒー豆(BoP2021　#1　サザコーヒー落札)は1gで約615円　カップ1杯抽出に必要な生豆原価のみで約1万円する';
                }
              ?>
              {{$result}}
    </div>
    
  </div>
  <div class="sp"></div>
  <div class="whiskey-loader">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 65 65" height="65px" width="65px">
      <path fill="#FFFFFF" d="M58.4,8.3c-0.6-2.2-1.7-4.1-8.4-5.5c-4.8-1-17.5-3.5-35.2-0.1C9.6,3.7,7,5.6,6.9,7.6c-0.3,1.8-5.8,32-4,40.2
            C5.3,58.5,15.3,64,32.7,64c17.6,0,26.9-5.6,29.3-16.6C63.9,39.2,58.9,10.2,58.4,8.3 M32.4,3.1c15.3,0,23.6,3.1,23.6,4.6
            c0,1.6-8.3,4.6-23.6,4.6S8.9,9.3,8.9,7.8C8.9,6.2,17.2,3.1,32.4,3.1 M60,47.4C57.7,57.4,49.4,62,32.7,62C16.4,62,7.1,57,4.9,47.4
            c-1.5-6.7,2.3-29.6,3.6-37c1.3,0.9,3.4,1.7,6.4,2.4c4.7,1.1,11,1.7,17.6,1.7s12.9-0.6,17.6-1.7c3-0.7,5.1-1.5,6.4-2.4
            C57.7,17.7,61.5,40.8,60,47.4" />
      <path fill="#EB5B45" fill-opacity="1.5" d="M5.4,31.3C4.6,38,4.2,44.4,4.9,47.4C7.1,57,16.4,62,32.7,62c16.7,0,25.1-4.5,27.3-14.6
            c0.7-3,0.3-9.5-0.5-16.3c-6,2-16.7,5-27.3,5C21.9,36.1,11.5,33.3,5.4,31.3z">
      <animate attributeName="d" calcMode="spline" keySplines="0.45 0.03 0.5 0.95; 0.45 0.03 0.5 0.95" values="
                                M5.4,31.3C4.6,38,4.2,44.4,4.9,47.4C7.1,57,16.4,62,32.7,62c16.7,0,25.1-4.5,27.3-14.6
            c0.7-3,0.3-9.5-0.5-16.3c-6,2-16.7,5-27.3,5C21.9,36.1,11.5,33.3,5.4,31.3z; 
                                M5.1,34.6c-0.8,6.8-0.8,9.8-0.2,12.8C7.1,57,16.4,62,32.7,62c16.7,0,25.1-4.5,27.3-14.6
            c0.7-3,0.6-6.1-0.2-12.9c-6,2-17,4.3-27.7,4.3C21.9,38.8,11.2,36.6,5.1,34.6z;
                                M5.4,31.3C4.6,38,4.2,44.4,4.9,47.4C7.1,57,16.4,62,32.7,62c16.7,0,25.1-4.5,27.3-14.6
            c0.7-3,0.3-9.5-0.5-16.3c-6,2-16.7,5-27.3,5C21.9,36.1,11.5,33.3,5.4,31.3z" dur="2s" repeatCount="indefinite" />
      </path>
    </svg>
</div>
<div class="load_title">
  <h5>Now Loading.....</h5>
</div>
</body>
</html>
