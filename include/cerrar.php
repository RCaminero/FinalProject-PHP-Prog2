<?php

session_start();

// limpiar datos de session
session_destroy();

header("Location: ../login.php");