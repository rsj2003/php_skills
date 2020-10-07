<?php 
namespace src\Controller;
// session_start();
use src\Core\DB;

class User
{
  public function login() {
    view("login",[]);
  }
  public function join() {
    view("join",[]);
  }
	function loginAction(){
    $user = DB::fetch("SELECT * FROM users WHERE email = ? AND pass = ?",[$_POST["id"], $_POST["pass"]]);
    
		if($user) {
			$_SESSION["user"] = $user;
			
			move("/","로그인 되었습니다.");
		}else {
      back("아이디 또는 비밀번호가 일치하지 않습니다.");
		}
	}

	function logout() {
		unset($_SESSION["user"]);
		move("/","로그아웃 되었습니다.");
	}

	function joinAction() {
		$sql = "INSERT INTO user (email,pass,name,birth,image) VALUES ?,?,?,?,?";
		DB::query($sql,[$_POST["id"],$_POST["pass"],$_POST["name"],$_POST["birth"],$imgName]);
	}

	function emailCheck() {
		$id = $_POST['id'];
		$response = ["success" => true];
		if (DB::fetch("SELECT * FROM users WHERE email = ?", [$id])) {
			$response['success'] = false;
		}
		echo json_encode($response);
	}
	

}

