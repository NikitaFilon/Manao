<?php
require_once 'conect.php';

require __DIR__ . '/header.php';

unset($_SESSION['logged_user']);
?>
<script> location.replace("index.php"); </script>