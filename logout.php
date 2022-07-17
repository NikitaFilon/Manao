<?php
session_start();
require __DIR__ . '/header.php';

unset($_SESSION['logged_user']);
?>
<script> location.replace("index.php"); </script>