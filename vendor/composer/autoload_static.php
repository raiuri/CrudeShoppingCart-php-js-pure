<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit27c9611af84ca5b08a037bb120f3fa8a
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit27c9611af84ca5b08a037bb120f3fa8a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit27c9611af84ca5b08a037bb120f3fa8a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit27c9611af84ca5b08a037bb120f3fa8a::$classMap;

        }, null, ClassLoader::class);
    }
}
