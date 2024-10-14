<?php

require "../classes/User.php";

$user = new User;   //新しいオブジェクトを生成し、変数userに代入する

$user->logout();   //ユーザーのセッションを終了させ、ログアウト処理を行う。
