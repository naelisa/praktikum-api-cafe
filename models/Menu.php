<?php
/*
NAMA : Serli Nadia A.
NPM : 247006111080
*/
class Menu {
    private $conn;
    private $table_name = "menu";

    public $id;
    public $nama_menu;
    public $kategori;
    public $harga;
    public $stok;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . 
                 " (nama_menu, kategori, harga, stok) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            $this->nama_menu,
            $this->kategori,
            $this->harga,
            $this->stok
        ]);
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . 
                 " SET nama_menu=?, kategori=?, harga=?, stok=? WHERE id=?";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            $this->nama_menu,
            $this->kategori,
            $this->harga,
            $this->stok,
            $this->id
        ]);
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=?";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute([$this->id]);
    }
}
?>