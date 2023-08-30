<?php

require('../../config/db.php');
require('../../config/autoload.php');
require('../../config/variables.php');

session_start();


////////// ADD HEROES ON FIGHT PANEL

header('Location: ../../fight.php');