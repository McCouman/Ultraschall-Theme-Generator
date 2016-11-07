<?php
$f3 = require( 'app/lib/base.php' );

// hier ändern falls erfolderlich
$f3->config( 'app/setup/config.ini' );
$f3->config( 'app/setup/routes.ini' );

$f3->run();