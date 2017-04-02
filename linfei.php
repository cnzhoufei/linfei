<?php

session_start();
$_SESSION['__login__'] = 1;
header('location:/Admin/Login/index.php?admin=linfei');