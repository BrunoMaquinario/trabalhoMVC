<?php 

spl_autoload_register(function ($class_name) {
    // Define o caminho das classes
    $directories = [
        __DIR__ . '/controllers/',
        __DIR__ . '/models/',
        __DIR__ . '/views/',
        __DIR__ . '/config/'
    ];
    
    // Tenta carregar a classe de cada diretório
    foreach ($directories as $directory) {
        $file = $directory . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return; // Classe encontrada e carregada, sai do loop
        }
    }
});