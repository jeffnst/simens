<?php
include 'db/pdo.php';
session_destroy();
header("Location: $base_url/");
exit();
//echo "halo";