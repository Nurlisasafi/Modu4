<?php

namespace app\Controllers;

include 'app/Traits/ApiResponseFormatter.php';
include 'app/Models/Buku.php';

use app\Models\Buku;
use app\Traits\ApiResponseFormatter;

class BukuController
{
    use ApiResponseFormatter;

    public function index()
    {
        $bukuModel = new Buku();
        $response = $bukuModel->findAll();
        return $this->apiResponse(200, "success", $response);
    }

    public function getById($id)
    {
        $bukuModel = new Buku();
        $response = $bukuModel->findById($id);
        return $this->apiResponse(200, "success", $response);
    }

    public function insert()
    {
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        if (json_last_error()) {
            return $this->apiResponse(400, "Error invalid input", null);
        }

        $bukuModel = new Buku();
        $response = $bukuModel->create([
            "nama_buku" => $inputData['nama_buku'],
            "harga" => $inputData['harga']
        ]);

        return $this->apiResponse(200, "success", $response);
    }

    public function update($id)
    {
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        if (json_last_error()) {
            return $this->apiResponse(400, "Error invalid input", null);
        }

        $bukuModel = new Buku();
        $response = $bukuModel->update([
            "nama_buku" => $inputData['nama_buku'],
            "harga" => $inputData['harga']
        ], $id);

        return $this->apiResponse(200, "success", $response);
    }

    public function delete($id)
    {
        $bukuModel = new Buku();
        $response = $bukuModel->delete($id);

        return $this->apiResponse(200, "success", $response);
    }
}
