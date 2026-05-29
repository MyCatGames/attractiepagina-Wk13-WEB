<?php
session_start();
require_once 'backend/config.php';
session_destroy();
header("Location: $base_url");
exit;
