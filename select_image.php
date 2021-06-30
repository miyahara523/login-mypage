<?php
mb_internal_encoding("utf8");

$pdo=new PDO("mysql:dbname=lesson03;host=localhost;","root","");
$result=$$pdo->query("select image from img_upload;");

foreach ($result as $row){
    $upload_img = $row{'img'};
    $image_path="./image/".$upload_img;
}
?>
<!doctype html>
<html lang="ja">
<head>
<meta charaset="UTF-8"/>
<title>画像アップロード</title>
</head>
<body>
<img src="<?php echo $image_path; ?>">
</body>
</html>