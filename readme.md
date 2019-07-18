Laravel Vue.js PHP モブプロ会 #4 用のサンプルコードです。

connpass: https://plumsa.connpass.com/event/136291/

# 動作要件

- Laravel5.8が動作すること
- sqliteのデータベースファイルの作成ができること

# セットアップ手順

## clone

```
$ git clone {REPOS URL} plumsa-mobpro4
$ cd plumsa-mobpro4
```

## sqliteのdbを作成

```
$ sqlite3 database/database.sqlite
sqlite > .exit
```

## envの調整

```
$ cp .env.example .env
```

## Laravel本体のセットアップとmigrate

```
$ composer install
$ php artisan key:generate
$ php artisan migrate
```

## node系のセットアップとビルド

```
$ yarn install
$ yarn run dev
```

## browserで見る

laravel valetなら

```
http://plumsa-mobpro4.test
```