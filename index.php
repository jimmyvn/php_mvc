<?php

/**
 * Use an autoloader!
 */
require 'libs/Bootstrap.php';
require 'libs/View.php';
require 'libs/Controller.php';
require 'libs/Database.php';
require 'libs/Model.php';
require 'libs/Session.php';

require 'config/database.php';
require 'config/app.php';

$app = new Bootstrap();