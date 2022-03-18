# drive-webapp

## 概要
自分のお気に入りのドライブスポットを登録して、他の人にシェアが出来るWebサイト。
他人の登録したスポットをランダムに閲覧したり、キーワードや都道府県で検索も可能。

## 使用技術
* Composer v2.2.5
* Laravel Framework v8.81.0
* PHP v8.1.1
* mysql v15.1 Distrib 10.4.22-MariaDB
* bootstrap v5.1.3
* node.js v16.13.2
* npm v8.1.2
* jquery v3.4.1
* Google Maps API

## デモ

<https://drive-spot.tuesday-hstm.com>

## 機能一覧
* サインアップ機能
* 認証機能（ログイン・ログアウト）
* 投稿機能（スポット名称・写真・駐車場有無など）
* 検索機能（キーワード・都道府県）
* 投稿に対するコメント機能
* 地図表示機能（GoogleMap）
* レスポンシブ対応（携帯・PC対応）

## 使い方
##### 登録
ユーザー登録（氏名・メールアドレス・パスワード）
##### 投稿
* addから必要事項を入力する
* 投稿した地点の現在地が使用されるため*必ずスポットで*投稿する
##### 詳細ページ
* 自他の投稿の詳細を閲覧することができる
* スポットに対してコメントを書くことができる

## 注力した機能
自身のコメントと他人のコメントを判別して、自身のものは削除出来るようにした。

## ローカル環境構築の手順
* xamppまたはmampをCドライブ直下にインストール(PHPのバージョンは上記の使用技術を参照)
* "C:/xampp/htdocs"の直下に"drive-webapp"をコピー
* ドキュメントルートを"C:/xampp/htdocs/drive-webapp/public"に変更
* localhostの指定されたポート番号に接続

## その他
レスポンシブ対応を施しているが、投稿した地点の現在地が反映されることから、携帯で利用することを推奨する。

## 作成者
谷野優和

## ライセンス
"drive-webapp" is under [MIT license](https://en.wikipedia.org/wiki/MIT_License).
