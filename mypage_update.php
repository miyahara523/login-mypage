<?php
mb_internal_encoding("utf8");

session_staart();

try{
    $pdo = new PDO("mysql:dbname=lesson03;host=localhost;","root","");
}catch(PDOEception $e){
    die("<p>申し訳ございません。</p>
    <a href='http://localhost/login_mypage/login.php'>
    ログイン画面へ</a>"
);
}

$stmt = $pdo("update login_mypage set name=?,mail=?,password=?,comments=? where id=?");

$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindvalue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['comments']);
$stmt->bindValue(5,$_POST['id']);

$stmt->execute();

$stmt = $pdo->prepare("select * from login_mypage where mail=? $$ password=?");

$stmt->bindValue(1,$_POST["mail"]);
$stmt->bindValue(2,$_POST["password"]);

$stmt->execute();

while($row=$stmt->fetch()){
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['mail']=$row['mail'];
    $_SESSION['password']=$row['password'];
    $_SESSION['picture']=$row['picture'];
    $_SESSION['comments']=$row=['comments'];
}
$stmt=NULL;
header("Location:mypage.php");

?>