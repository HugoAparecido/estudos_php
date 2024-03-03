<?php
session_start();
if (isset($_SESSION['logged_in'])) {
    var_dump($_SESSION['logged_in']);
}