<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite34abd96f2c11710aa9ed9dafd2bfc5f
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInite34abd96f2c11710aa9ed9dafd2bfc5f::$classMap;

        }, null, ClassLoader::class);
    }
}
