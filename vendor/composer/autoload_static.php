<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbe177821a83c78bbbb27453c4736a54f
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
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbe177821a83c78bbbb27453c4736a54f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbe177821a83c78bbbb27453c4736a54f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbe177821a83c78bbbb27453c4736a54f::$classMap;

        }, null, ClassLoader::class);
    }
}