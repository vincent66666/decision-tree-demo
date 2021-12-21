<?php
spl_autoload_register(function ($class) {

        $prefix = 'DecisionTree\\';
        $len    = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            // no, move to the next registered autoloader
            return;
        }
        $relative_class = substr($class, $len);
        $file = TOP_AUTOLOADER_PATH .'/'. str_replace('\\', '/', $relative_class) . '.php';

        if (file_exists($file)) {
            include $file;
            return;
        }
});
?>