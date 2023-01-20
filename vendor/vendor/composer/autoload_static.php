<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb15f2567e77b97f832e33ad16da1e045
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb15f2567e77b97f832e33ad16da1e045::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb15f2567e77b97f832e33ad16da1e045::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
