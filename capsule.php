<?php
/**
 * Created by PhpStorm.
 * User: rueta
 * Date: 4/28/15
 * Time: 3:42 PM
 */

define(BASEPATH, 'fake');
global $db;
require_once 'application/config/database.php';
new \Ionize\CLI\Services\DatabaseCapsule($db['default']);
//dd($db);