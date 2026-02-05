<?php

namespace Controllers;

use Model\Numero;
use Model\Cliente;
use Model\CompraNumero;

class NumeroController {

    // GET /api/numero
    public static function index() {
        $numeros = Numero::all();
        echo json_encode($numeros);
    }

    // POST /api/comprar
    public static function comprar() {

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

        $cliente = new Cliente([
            'nombre' => $data['nombre'],
            'telefono' => $data['telefono'],
            'precioTotal' => count($data['numeros']) * 3000 
        ]);

        $cliente->guardar();
        $clienteId = $cliente->id;

        if (!$clienteId) {
            http_response_code(500);
            echo json_encode([
                'ok' => false,
                'error' => 'No se pudo guardar el cliente'
            ]);
            return;
        }


        foreach ($data['numeros'] as $numeroId) {

            $numeroId = filter_var($numeroId, FILTER_VALIDATE_INT);
            if (!$numeroId) continue;

            $numero = Numero::find($numeroId);

            if ($numero && !$numero->estaVendido()) {

                // marcar como vendido
                $numero->vendido = 1;
                $numero->guardar();

                // guardar relación cliente - número
                $compra = new CompraNumero([
                    'clienteId' => $clienteId,
                    'numeroId' => $numeroId
                ]);

                $compra->guardar();
            }
        }

        echo json_encode([
            'ok' => true,
            'mensaje' => 'Compra realizada correctamente'
        ]);
    }
}
