<?php 
namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];
    protected string $currentUrl = '/';

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas()
    {
        $url_actual = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';

        $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/'));
        $scriptDir = rtrim($scriptDir, '/');

        if ($scriptDir && $scriptDir !== '/' && strpos($url_actual, $scriptDir) === 0) {
            $url_actual = substr($url_actual, strlen($scriptDir)) ?: '/';
        }

        if ($url_actual === '') {
            $url_actual = '/';
        }

        $url_actual = rtrim($url_actual, '/') ?: '/';

        $this->currentUrl = $url_actual;

        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        if($method === 'GET'){
            $fn = $this->getRoutes[$url_actual] ?? null;
        } else {
            $fn = $this->postRoutes[$url_actual] ?? null;
        }

        if($fn){
            $fn($this);
        } else {
            http_response_code(404);
            echo "404 - Ruta no encontrada";
        }
    }

    public function render($view, $datos = [])
    {
        foreach($datos as $key => $value){
            $$key = $value;
        }

        if (!defined('ROOT_DIR')) {
            define('ROOT_DIR', dirname(__DIR__));
        }

        $scriptDir = rtrim(str_replace('\\','/', dirname($_SERVER['SCRIPT_NAME'] ?? '/')), '/');
        $basePath = ($scriptDir && $scriptDir !== '/') ? ($scriptDir . '/') : '/';

        $assetBase = $basePath;

        $viewPath = ROOT_DIR . "/views/$view.php";

        if(!file_exists($viewPath)){
            echo "La vista $view no existe";
            exit;
        }

        ob_start();

        include_once $viewPath;

        $contenido = ob_get_clean();

        include_once ROOT_DIR . '/views/layout.php';
    }
}