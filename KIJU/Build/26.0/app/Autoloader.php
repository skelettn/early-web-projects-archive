<?php

namespace KIJU;

class Autoloader
{

    /**
     * Charge automatiquement les classes
     *
     * @return void
     */
    static function register()
    {
        spl_autoload_register(array(__CLASS__, "autoLoad"));
    }

    /**
     * Charge automatiquement les classes
     *
     * @return void
     */
    static function autoLoad($class_name): void
    {
        if (strpos($class_name, __NAMESPACE__ . '\\') === 0) {
            $class_name = str_replace(__NAMESPACE__ . '\\', '', $class_name);
            $class_name = str_replace('\\', '/', $class_name);
            require __DIR__ . '/Class/' . $class_name . ".php";
        }
    }
}
