<?php

//kill SESSION and COOKIE .
session_destroy();

header('Location: ./index.php?page=home');
exit;
