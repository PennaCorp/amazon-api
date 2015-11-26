<?php
    $mapping = array(
        'PennaCorp\S3\PCS3Client' => __DIR__ . '/PennaCorp/S3/PCS3Client.php',
    );
    spl_autoload_register(function ($class) use ($mapping) {
        if (isset($mapping[$class])) {
            require_once $mapping[$class];
        }
    }, true);
    require_once __DIR__."/../bancoDadosInfo.php";
    require_once __DIR__.'/aws-autoloader.php';
?>
