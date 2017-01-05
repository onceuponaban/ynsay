<?php

session_start();
session_destroy(); // destruction des sessions
header('Location: ../accueil.php');

