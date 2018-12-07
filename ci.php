<?php

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

require 'vendor/autoload.php';

$adapter = new Local(__DIR__, LOCK_EX, Local::DISALLOW_LINKS, [
    'file' => [
        'public' => 0777,
        'private' => 0777,
    ],
    'dir' => [
        'public' => 0777,
        'private' => 0777,
    ]
]);

$filesystem = new Filesystem($adapter);

$filesystem->deleteDir('Mini/');
$filesystem->deleteDir('public/');