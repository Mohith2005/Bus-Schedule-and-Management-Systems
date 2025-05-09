<?php
session_start();
session_destroy();
header("Location: ../login_user.html");
exit();
?>
