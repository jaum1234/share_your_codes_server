<?php

namespace App\Service\ResponseOutput;

use Illuminate\Http\JsonResponse;

class JsonResponseOutput 
{
    private bool $success;
    private array  $data;
    private string $message;
    private int $statusCode;

    public function set(bool $success = true, ?array $data = [], ?string $message = '', ?int $statusCode = 200) {
        $this->success = $success;
        $this->data = $data;
        $this->message = $message;
        $this->statusCode = $statusCode;

        return $this->display();
    }

    private function display(): JsonResponse
    {
        return response()->json([
            'success' => $this->success,
            'data' => $this->data,
            'message' => $this->message
        ], $this->statusCode) ;
    }

    public function validationErrors(array $erros): JsonResponse
    {
        return response()->json([
            'success' => false,
            'data' => ['erros' => $erros],
            'message' => "Houve um erro ao preencher os campos."
        ], 400); 
    }
}