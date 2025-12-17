<?php

spl_autoload_register(callback: function ($class): void {
    
    $paths = [
        __DIR__ . "./App/Models",
        __DIR__ . "./App/Controllers",
    ];

    foreach ($paths as $path) {
        $file = $path . $class . ".php";

        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});