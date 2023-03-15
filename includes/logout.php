<?php

session_start();
session_unset();
session_destroy();

header("Loaction: ../index.php");