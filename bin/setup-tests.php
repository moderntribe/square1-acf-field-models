#!/usr/bin/php
<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/src/Downloader.php';
require __DIR__ . '/src/Plugin_Downloader.php';
require __DIR__ . '/src/Wordpress_Downloader.php';
require __DIR__ . '/src/Installer.php';

$downloaders = [
	new Wordpress_Downloader(),
	new Plugin_Downloader( 'advanced-custom-fields' ),
	new Plugin_Downloader( 'acf-color-swatches' ),
];

( new Installer( $downloaders ) )->install();

$tests_dist_file = __DIR__ . '/../tests/.env-dist';
$tests_dest_file = __DIR__ . '/../tests/.env';

if ( ! file_exists( $tests_dest_file ) ) {
    echo "copying $tests_dist_file to $tests_dest_file" . PHP_EOL;
    copy( $tests_dist_file, $tests_dest_file );
}

echo 'Done!';
