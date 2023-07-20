<?php
require_once(dirname(__FILE__, 2) . '/src/config/database.php');

echo "Hello world!";

Database::getConnection();

?>
