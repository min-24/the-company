<?php

require "Database.php";     //Database.phpファイルを読み込む命令。このファイルにはデータベース接続のためのクラスや機能が含まれる。

class User extends Database {          //Userクラスを定義しDatabaseクラスを継承している。Databaseクラスのプロパティやメソッドを利用できる。


//registerのメソッド： ユーザーの登録を処理
public function store($first_name, $last_name, $username, $password) {     //public：外部からアクセス可能。引数として$first_nameなどを受け取る。これらはユーザーの入力データ

    $password = password_hash($password, PASSWORD_DEFAULT);               //passwordをハッシュ化する。

    $sql = "INSERT INTO users(first_name, last_name, username, `password`)
            VALUES('$first_name', '$last_name', '$username', '$password')";  //SQL文を作成。usersテーブルに新しいユーザーの情報を挿入する。

    if($this->conn->query($sql)) {                                           //データベース接続オブジェクトを使ってSQLクエリを実行する。 SQLクエリを実行すると、データベースに対して特定の操作、(データの取得、挿入、更新、削除など)を行うことができる。
        header("location: ../views"); //go to views index (login)            //ユーザー登録が成功したら、指定したページにリダイレクトする。viewsに移動する。
        exit;                                                                //スクリプトの実行を終了する。
    } else{
        die("Error registering user: ".$this->conn->error);                  //ユーザー登録ができなくてエラーが発生した場合、エラーメッセージを表示してスクリプトを終了する。
    }
  }


  //login

  public function login($request){     //$request = $_POST                   //loginメソッド： ユーザーのログインを処理

    $sql = "SELECT * FROM users WHERE username = '".$request['username']."'";   //ユーザー名でユーザーを検索するSQL文を作成する。

    $result = $this->conn->query($sql);                                      //$result：SQLクエリの実行結果を受け取るための変数。この変数を使って、クエリによって取得されたデータにアクセスできる。

    //chech if user is found
    if($result->num_rows == 1){                                               //ユーザーが見つかったかどうかを確認する。 入力されたユーザー名に対応するユーザーが1人だけ存在することを確認する。 ==0は「ユーザーが見つかりません」というエラーメッセージを表示するなどの処理が行われる。
        $user = $result->fetch_assoc();                                       //検索結果を連想配列として取得する。

        //check if password is correct
        if(password_verify($request['password'], $user['password'])){         //ユーザーが入力したパスワードがハッシュ化されたパスワードと一致するか確認する。 $requestはフォームから送信されたデータを格納する変数。 $userはデータベースから取得したユーザー情報を格納する変数。
         
            //login
            session_start();                                                  //セッションを開始する。
            $_SESSION['username'] = $user['username'];                        //ユーザーの情報をセッション変数に保存する。
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['full_name'] = $user['first_name'] . " " . $user['last_name'];

            //go to dashboard page
            header("location: ../views/dashboard.php");                        //ログインが成功した場合、ダッシュボードにリダイレクトする。
            exit;                                                              //スクリプトの実行を終了する。
        } else{
            die("Password is incorrect.");                                     //パスワードが間違っている場合、エラーメッセージを表示する。
        }
    } else{
        die("User not found.");                                                //ユーザーが見つからなかった場合、エラーメッセージを表示する。
    }
  }


  //logout

  public function logout() {
    session_start();
    session_unset();
    session_destroy();

    header("location: ../views"); //go to login page (index)
    exit;
  }

  //return all users
  public function readAll(){
    $sql = "SELECT * FROM users";

    if($result = $this->conn->query($sql)){
        return $result;
    } else{
        die("Error reading all users: ".$this->conn->error);
    }
  }

  //return one user
  public function getUser($id){
    $sql = "SELECT * FROM users WHERE id=$id";
  
    if($result = $this->conn->query($sql)){
        return $result->fetch_assoc();
  } else{
  die("Error retrieving user: ".$this->conn->error);
    }
  }

  //edit a specific user
  public function editUser($request, $id){
    $sql = "UPDATE users SET
                first_name = '".$request['first_name']."',
                last_name = '".$request['last_name']."',
                username = '".$request['username']."'
            WHERE id=$id";

            if($this->conn->query($sql)){
                //update done; go to dashboad
                header("location: ../views/dashboard.php");
                exit;
            } else{
                die("Error updating user: ".$this->conn->error);
            }
  }

  public function deleteUser($id){
    $sql = "DELETE FROM users WHERE id=$id";

    if($this->conn->query($sql)){
        //deleted successfuly: go to dashboard
        header("location: ../views/dashboard.php");
        exit;
    } else{
        die("Error deleting user: ".$this->conn->error);
    }
  }

  public function uploadPhoto($request){ //$request = $_FILES
    $filename = $request['photo']['name'];
    $tmp_file = $request['photo']['tmp_name'];
    $destination = "../assets/images/$filename"; //where to save the photo file
    if(move_uploaded_file($tmp_file, $destination)){ //attempt to move the file to images folder
        session_start();
        $sql = "UPDATE users SET photo = '$filename' WHERE id=".$_SESSION['user_id'];
        if($this->conn->query($sql)){
            //success; go back to profile
            header("location: ../views/profile.php");
            exit;
        }else{
            die("Error saving photo: ".$this->conn->error);
        }
    }else{
        die("Cannot move photo.");
    }
}

}





