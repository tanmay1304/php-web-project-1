<?php
session_start();

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_unset();
session_destroy();


setcookie("nume", "", time() - 3600);
setcookie("prenume", "", time() - 3600);
setcookie("email", "", time() - 3600);
setcookie("user_role", "", time() - 3600);

header("Location: admin-auth.php");
exit();
?>

<head>
  <meta http-equiv='refresh' content='0; URL=http://localhost:8080/'>
</head>