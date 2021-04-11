<?php
session_start();
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $par = session_get_cookie_params();
    setcookie(session_name(), '', 0, $par["path"], $par["domain"], $par["secure"], $par["httponly"]);
}
session_destroy();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <h1 style="margin-left: 550px">All measurements were deleted</h1>
    <p style="margin-left: 558px">Please make some measurements before accessing this page</p>
</div>
</body>
</html>