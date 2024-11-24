<?php

namespace app\Routes;

include 'app/Controllers/BukuController.php';

use app\Controllers\BukuController;

class BukuRoutes
{
    public function handle($method, $path)
    {
            
        if ($method == "GET" && $path == '/api/buku') {
            $controller = new BukuController();
            echo $controller->index();
        }

        if ($method == "GET" && strpos($path, "/api/buku/") === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new BukuController();
            echo $controller->getById($id);
        }

        if ($method == "POST" && $path == "/api/buku") {
            $controller = new BukuController();
            echo $controller->insert();
        }

        if ($method == "PUT" && strpos($path, "/api/buku/") === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new BukuController();
            echo $controller->update($id);
        }

        if ($method == "DELETE" && strpos($path, "/api/buku/") === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new BukuController();
            echo $controller->delete($id);
        }
    }
}
