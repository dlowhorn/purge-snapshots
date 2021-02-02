<?php

// Require the Composer autoloader.
require __DIR__ . '/vendor/autoload.php';

if ($argc === 5) {
    [$script, $resource, $region, $days, $version] = $argv;
}
else if ($argc === 4) {
    [$script, $resource, $region, $days] = $argv;
    $version = '2016-11-28';
}
else {
    print "Invalid argument list\n";
    exit(1);
}

$purger = new \LTW\SnapshotPurger($region, $version ?? '2016-11-28');
$purger->purgeAutosnapshots($resource, $days);