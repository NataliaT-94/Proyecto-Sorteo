<?php

namespace Controllers;

use Model\Numero;

class NumeroController {

    // GET /api/numero
    public static function index() {
        $numeros = Numero::all();
        echo json_encode($numeros);
    }

    // POST /api/comprar
    public static function comprar() {

        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data || empty($data['numeros'])) {
            http_response_code(400);
            echo json_encode([
                'ok' => false,
                'error' => 'Datos inválidos'
            ]);
            return;
        }

        foreach ($data['numeros'] as $numeroId) {

            $numeroId = filter_var($numeroId, FILTER_VALIDATE_INT);
            if (!$numeroId) continue;

            $numero = Numero::find($numeroId);

            if ($numero && !$numero->vendido) {
                $numero->vendido = 1;
                $numero->guardar();
            }
        }

        echo json_encode([
            'ok' => true
        ]);
    }
}
