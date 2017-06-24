# tempo_server
0004 2017/6/25 各種機能追加２

0003 2017/6/16 各種機能追加

0002 2017/3/24 ログイン機能追加


----------------------------------------------
1. MAMPでのmysql利用方法
* データベース作成・パスワードの設定等
cd /Applications/MAMP/Library/bin/
./mysql -u root -p
root

* MySQLでのコマンド
CREATE DATABASE cakephp CHARACTER SET utf8;
GRANT ALL ON cakephp.* to 'cakeuser'@'localhost';

* cakephpのデータベース設定
cp /Applications/MAMP/htdocs/cakephp/app/Config/database.php.default /Applications/MAMP/htdocs/cakephp/app/Config/database.php

* 設定例
[重要]hostが127.0.0.1ではなくてlocalhostを設定されている場合、bake allの際に失敗することがあるので要注意。

class DATABASE_CONFIG {

public $default = array(
'datasource' => 'Database/Mysql',
'persistent' => false,
'host' => '127.0.0.1',     // ホスト名
'port' => '8889',
'login' => 'cakeuser',     // ユーザ名
'password' => 'cakepass',  // パスワード
'database' => 'cakephp',   // DB名
'prefix' => '',
'encoding' => 'utf8',      // 文字コード
);

public $test = array(
'datasource' => 'Database/Mysql',
'persistent' => false,
'host' => '127.0.0.1',
'login' => 'user',
'password' => 'password',
'database' => 'test_database_name',
'prefix' => '',
//'encoding' => 'utf8',
);
}
