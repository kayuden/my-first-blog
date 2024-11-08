<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2068562e486ca75ca3b32f2a0d499c92
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Router\\' => 7,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Router\\' => 
        array (
            0 => __DIR__ . '/../..' . '/routes',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2068562e486ca75ca3b32f2a0d499c92::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2068562e486ca75ca3b32f2a0d499c92::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2068562e486ca75ca3b32f2a0d499c92::$classMap;

        }, null, ClassLoader::class);
    }
}
