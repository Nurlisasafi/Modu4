<?php

namespace app\Models;

include 'app/Config/DatabaseConfig.php';

use app\Config\DatabaseConfig;
use mysqli;

class Buku extends DatabaseConfig
{
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database_name, $this->port);
        if ($this->conn->connect_error) {
            die("Connection Failed : " . $this->conn->connect_error);
        }
    }

    public function findAll()
    {
        $sql = "SELECT * FROM buku";
        $result = $this->conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $this->conn->close();
        return $data;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM buku WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $this->conn->close();
        return $data;
    }

    public function create($data)
    {
        $namaBuku = $data['nama_buku'];
        $harga = $data['harga'];
        $query = "INSERT INTO buku (nama_buku, harga) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sd", $namaBuku, $harga);
        $stmt->execute();
        $this->conn->close();
        return ["id" => $stmt->insert_id, "nama_buku" => $namaBuku, "harga" => $harga];
    }

    public function update($data, $id)
    {
        $namaBuku = $data["nama_buku"];
        $harga = $data["harga"];
        $query = "UPDATE buku SET nama_buku = ?, harga = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sdi", $namaBuku, $harga, $id);
        $stmt->execute();
        $this->conn->close();
        return ["id" => $id, "nama_buku" => $namaBuku, "harga" => $harga];
    }

    public function delete($id)
    {
        $query = "DELETE FROM buku WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $this->conn->close();
        return ["id" => $id, "message" => "Deleted successfully"];
    }
}
