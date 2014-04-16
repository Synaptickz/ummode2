<?php

error_reporting(E_ALL);

try {
    include __DIR__ . "/../app/main.php";
} catch (\Exception $e) {
    echo $e->getMessage();
}