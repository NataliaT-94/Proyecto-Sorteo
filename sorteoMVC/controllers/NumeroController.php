<?php

namespace Controllers;

use Model\Usuario;
use Model\Numero;
use Model\Registros;

class NumeroController {

    // GET /api/numero
    public static function index() {
        $numeros = Numero::all();
        echo json_encode($numeros);
    }

    // POST /api/comprar
   public static function comprar() {
        header('Content-Type: application/json');


        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['ok' => false, 'error' => 'Método no permitido']);
            return;
        }

        $data = json_decode(file_get_contents('php://input'), true);

        if (
            empty($data['nombre']) ||
            empty($data['telefono']) ||
            empty($data['numeros']) 
        ) {
            http_response_code(400);
            echo json_encode(['ok' => false, 'error' => 'Datos incompletos']);
            return;
        }

        $usuario = new Usuario([
            'nombre' => $data['nombre'],
            'telefono' => $data['telefono'],
            'precioTotal' => count($data['numeros']) * 3000 
        ]);

        $resultado = $usuario->guardar();
        $usuarioId = $resultado['id'] ?? null;

        if (!$usuarioId) {
            http_response_code(500);
            echo json_encode([
                'ok' => false,
                'error' => 'No se pudo guardar el usuario'
            ]);
            return;
        }


        foreach ($data['numeros'] as $numeroId) {

            $numeroId = filter_var($numeroId, FILTER_VALIDATE_INT);
            if (!$numeroId) continue;

            $numero = Numero::find($numeroId);

            if ($numero && !$numero->estaVendido()) {

                $numero->vendido = 1;
                $numero->guardar();

                $compra = new Registros([
                    'usuarioId' => $usuarioId,
                    'numeroId' => $numeroId
                ]);

                $compra->guardar();

            }
        }

        echo json_encode([
            'ok' => true,
            'mensaje' => 'Compra realizada correctamente'
        ]);
        exit;

    }

}
