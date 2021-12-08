<?php

namespace App\Service\ResponseOutput;

class ResponseOutput 
{
    private bool $success;
    private array  $data;
    private int $statusCode;
    private string $message;

    public function __construct(bool $success, array $data = [], int $statusCode, ?string $message = '')
    {
        $this->success = $success;
        $this->data = $data;
        $this->statusCode = $statusCode;
        $this->message = $message;
    }

    public function jsonOutput() {
        return response()->json([
            'success' => $this->success,
            'data' => $this->data,
            'message' => $this->message
        ], $this->statusCode);
    }
}