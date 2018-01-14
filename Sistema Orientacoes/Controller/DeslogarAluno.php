<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 12/12/2017
 * Time: 04:42
 */

session_start();
session_destroy();

header("Location: ../View/html5-boilerplate_v6.0.1/index.php");