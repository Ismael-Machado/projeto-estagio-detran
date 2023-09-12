<?php 
session_start();
requireValidSession();

print_r($_SESSION['user']->usuario_id);