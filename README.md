# タイトル
what-kind-of-coffee??

# 環境
PHP 7.3.29
Laravel 8.74.0

# URL
https://what-kind-of-coffee.link/
テスト用アカウント
mail：mmm@gmail
パスワード：mmmm2222

# 課題修正
リリース後、このアプリケーションを開きたいと思うようなワクワク感がないとのコメントがあったため
メモページに遷移前にコーヒーの豆知識をランダムに表示するローディング画面を経由し5秒後メモページに遷移する様に実装しました。
[![Image from Gyazo](https://i.gyazo.com/5a0df7e318cc589945baa09018635359.gif)](https://gyazo.com/5a0df7e318cc589945baa09018635359)

# TOPページ
[![Image from Gyazo](https://i.gyazo.com/82a689bdac0379a64482dabc16bda2e8.gif)](https://gyazo.com/82a689bdac0379a64482dabc16bda2e8)

# 診断ページ
質問を答えていくとオススメのコーヒーをアテンドしてくれるその後メモページに遷移する
[![Image from Gyazo](https://i.gyazo.com/8771aeb8d162779b1acd03f0cb3e9b6b.gif)](https://gyazo.com/8771aeb8d162779b1acd03f0cb3e9b6b)

# メモページ タグから絞り込み
[![Image from Gyazo](https://i.gyazo.com/f1445870624134ed4b8f66684c8a1eab.gif)](https://gyazo.com/f1445870624134ed4b8f66684c8a1eab)

# メモページ 編集機能
[![Image from Gyazo](https://i.gyazo.com/a2ce3b1ab01f8f0182d2ece199ebb855.gif)](https://gyazo.com/a2ce3b1ab01f8f0182d2ece199ebb855)


# 目的
①様々なエンジニアの方からコーヒーについて聞かれることが多かったのでコーヒーに纏わるアプリケーションなら使ってもらえる可能性が高い
②エンジニアの方達が既にコーヒー豆のDBサイトを作ろうとしていたが皆多忙のため止まっていたのでそこに刺激を与えるようなアプリケーションを作りたかった
③複数人の方と話しているとエンジニアの技術はびっくりするぐらい整理されている方も飲んできているコーヒーの情報の整理をしている方は意外と少ない仮設ができた
④記録をつけて自分のコーヒーを記録するアプリを作成するとMVCの流れも復習できると考えました。

# ペルソナ
・エンジニア 26歳 男性
・元々コーヒーが好きでよく飲んでいる
・よく情報を探したりしている内容を整理したいと思っている
・普段いくコミュニティ内でコーヒーもLTをしたり積極的にコーヒーについて動きたいと思っている
・同僚にコーヒーの相談をしてもあまり話が盛り上がらない
・もっとコーヒーショップの店員さんと話をしてみたい
・家では土日はドリップを淹れたりする
・平日は20時に帰宅後はYouTubeを見るのが日課
・趣味は多くなく一つのことに特化したいタイプ
・土日は午前中はウォーキングを必ずする

# エンティティ
①TOPページがある
コーヒーの印象が残るようなページにする

②コーヒーの診断ページがある
JavaScriptを使用して最終診断後にメモページに遷移するようにする。
多くの人に見てもらえるようにこの診断は登録無しでもできるようにする
今回は既に存在(可視化できている)しているモノをアプリケーションに起こすことでリメイクしてみようと思います。
情報は多岐に渡るのですが、ライトアップコーヒーの川野氏が先日Twitterにアップしていた内容をリメイクしました。

![ccb](https://user-images.githubusercontent.com/88849254/143201851-b9014b0f-d3f0-475b-a1c4-f6af4327ba4a.jpeg)

③メモページがある
シンプルに記載できるようにする
追加実装で画像も投稿できるようにする

④タグで整理できる
ただ記録していくだけでは情報に埋もれてしまうので、振り返りやすいようにメモにタグ機能をつける

もくもく会で出会ったエンジニア達でコーヒー豆のDBサイトを作成するチームに参加させてもらったですが、デプロイなど基本の骨組みはできていたのですがそこから動きが止まっている状態でした。
もう少し具体的に提案できるようにミニアプリを作成しようと考えました。
前回のオリジナルアプリケーションでは本の内容という抽象的なモノをアプリケーションに起こすのがテーマでした。
今回は既に存在(可視化できている)しているモノをアプリケーションに起こすことでリメイクしてみようと思います。
情報は多岐に渡るのですが、ライトアップコーヒーの川野氏が先日Twitterにアップしていた内容をリメイクしました。

# 目指した解決
コーヒーが好きだけどどこから手をつけたら良いのかわからない人には診断機能
そして飲んだコーヒーを記録することによって今まで好きで飲んでいいただけのコーヒーの情報が整理できる。
コミュニティ内で使用すれば共通言語を作れる

# テーブル
[![Image from Gyazo](https://i.gyazo.com/78bff1b81134c8ee371b60837503b509.jpg)](https://gyazo.com/78bff1b81134c8ee371b60837503b509)

# users
| column     | type |  |
|:-----------|------------:|:------------:|
|  name  |  string     |          |
|  email  | string      | unique      |
| password      | string   |        |

# memos
| column  | type  |  |
|:-----------|------------:|:------------:|
| id       |         |          |
| content     | longText    |        |
|  updated_at| timestamp   |         |
| created_at   | timestamp |        |
|  user_id   |  foreign     |          |

# tags
| column | type |  |
|:-----------|------------:|:------------:|
| id       |        |         |
| name     | longText     |       |
| user_id |unsignedBigInteger|     |
| updated_at    | timestamp |            |
| created_at   | timestamp |        |
| user_id    |  foreign   |      |

# memo_tags
| column | type | Center  |
|:-----------|------------:|:------------:|
| memo_id   | unsignedBigInteger|foreign   |
| tag_id    | unsignedBigInteger| foreign |

# Qiitaにまとめました
https://qiita.com/kohei_04/items/8d54a19a308ce7d5a3de
