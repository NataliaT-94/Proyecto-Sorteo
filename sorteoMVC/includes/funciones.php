<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function pagina_actual($path) : bool{
    return str_contains($_SERVER['PATH_INFO'] ?? '/', $path) ? true : false;
}

function app_base(): string {
    $scriptDir = str_replace('\\','/', dirname($_SERVER['SCRIPT_NAME'] ?? '/'));
    $scriptDir = rtrim($scriptDir, '/');
    return ($scriptDir && $scriptDir !== '/') ? ($scriptDir . '/') : '/';
}

function url_to(string $path = ''): string { 
    return app_base() . ltrim($path, '/'); 
}

function redirect(string $path = ''): void { 
    header('Location: ' . url_to($path)); 
    exit; 
}