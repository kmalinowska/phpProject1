<?php

require 'config.php'; // will crashed the file if it cant be found
// include 'config.php'; - make script run even if the file coudn't be find

echo "Database $dbHost:$dbUser";