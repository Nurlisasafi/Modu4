<?php

namespace app\Traits;

// Untuk formatting responce
trait ApiResponseFormatter
{
    public function ApiResponse($code = 200, $message = "success" , $data = [])
    {
        // Dari parameter akan diformat menjadi format dibawah ini
        return json_encode([
            "code" => $code,
            "message" => $message,
            "data" => $data
        ]);
    }
}