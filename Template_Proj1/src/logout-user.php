<?php
require_once __DIR__ . '/lib/Auth.php';

Auth::startSession();
Auth::logout();

header("Location: log-in.php");
exit();
?>
