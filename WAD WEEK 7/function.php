<?php
$conn = mysqli_connect("localhost:3306","root","","tugas3wad");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows [] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $kodebarang = $data['kodebarang'];
    $namabarang = $data['namabarang'];
    $gambar = $data['gambarbarang'];
    $hargajual = $data['hargajual'];
    $stokbarang = $data['stokbarang'];

    $query = "INSERT INTO barang_add
        VALUES
        ('','$kodebarang','$namabarang','$gambar','$hargajual','$stokbarang')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function hapus($no){
    global $conn;
    mysqli_query($conn, "DELETE FROM barang_add WHERE no = $no");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    $no = $data["no"];
    $kodebarang = $data['kodebarang'];
    $namabarang = $data['namabarang'];
    $gambar = $data['gambarbarang'];
    $hargajual = $data['hargajual'];
    $stokbarang = $data['stokbarang'];

    $query = "UPDATE barang_add SET
        kodebarang = '$kodebarang',
        namabarang = '$namabarang',
        gambar = '$gambar',
        hargajual = '$hargajual',
        stokbarang = '$stokbarang'
        WHERE no = $no
    ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
?>