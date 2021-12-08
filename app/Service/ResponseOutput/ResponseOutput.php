<?php

namespace App\Service\ResponseOutput;

class ResponseOutput 
{
    private bool $success;
    private array  $data;
    private int $statusCode;
    private int $totalData;
    private string $message;

    public function __construct(bool $success, array $data = [], int $statusCode, ?string $message = '', int $totalData = 0)
    {
        $this->success = $success;
        $this->data = $data;
        $this->statusCode = $statusCode;
        $this->message = $message;
        $this->totalData = $totalData;
    }

    public function jsonOutput() {
        return response()->json([
            'success' => $this->success,
            'data' => ['total' => $this->totalData, 'data' => $this->data],
            'message' => $this->message
        ], $this->statusCode);
    }
}