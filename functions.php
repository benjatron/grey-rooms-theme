<?php
/**
 * This file calls the vendor files and init.php file.
 *
 * All the fun stuff is in the init.php file and its imports. This is just here
 * because WordPress requires a functions.php file.
 *
 * You can add code below, but the structure of this project allows for better
 * placement of files outside of the root directory. If you're unfamiliar with
 * where something should go, poke around!
 */

// Composer files
require_once __DIR__ . '/vendor/autoload.php';

// FWD Boilerplate init file
require_once __DIR__ . '/app/init.php';