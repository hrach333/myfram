<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit763f7b6205796424f83f9c240b51be89
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'myfram\\' => 7,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
        'V' => 
        array (
            'Valitron\\' => 9,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'myfram\\' => 
        array (
            0 => __DIR__ . '/..' . '/myfram',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Valitron\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/valitron/src/Valitron',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit763f7b6205796424f83f9c240b51be89::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit763f7b6205796424f83f9c240b51be89::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
