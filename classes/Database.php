<?php

class Database {                                    //データベース接続へ接続
    private $server = "localhost";                  //データベースサーバーのアドレスを指定する。localhost。local環境で実行している。
    private $username = "root";                     //データベースに接続するユーザー名を指定。
    private $password = "root";                     //for MAMP, password should be root
    private $db_name = "the_company";               //使用するデータベースの名前を指定する。

    protected $conn;                                //データベース接続オブジェクトを格納するプロパティ。データベースとのやり取りを行うための情報を保存する。

    public function __construct() {                 //オブジェクトの初期状態を設定する           

        //connects to the database
        $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db_name);  //mysqliクラスを使ってデータベースに接続
        //接続に必要なサーバー、ユーザーネーム、パスワード、データベース名を引数として渡す。

        if($this->conn->connect_error) {            //接続時にエラーが出た場合、エラー情報が格納される
            die("Unable to connect to database: ". $this->conn->connect_error);      //接続エラーが出た場合、エラーメッセージを表示してスクリプトの実行を終了する。
        }
    }
}

