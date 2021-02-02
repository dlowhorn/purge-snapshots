<?php

// Require the Composer autoloader.
require __DIR__ . '/../../vendor/autoload.php';

if (count($argv) !== 4) {
    exit(1);
}

[$resource, $region, $days, $version] = $argv;

$purger = new \LTW\SnapshotPurger($region, $version ?? '2016-11-28');
$purger->purgeAutosnapshots($resource, $days);