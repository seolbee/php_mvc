<?php
require("db.php");

unset($_SESSION['user']);

msgAndGo("로그아웃되었습니다.", "/");