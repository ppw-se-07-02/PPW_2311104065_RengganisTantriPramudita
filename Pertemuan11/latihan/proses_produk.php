<?php
// File: proses_produk.php
// Fungsi: Memproses CRUD produk (Create, Read, Update, Delete)

include "koneksi.php";

// TAMBAH DATA
if (isset($_POST['action']) && $_POST['action'] == 'tambah') {
    $nama_artefak = mysqli_real_escape_string($conn, $_POST['nama_artefak']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $tahun_ditemukan = mysqli_real_escape_string($conn, $_POST['tahun_ditemukan']);
    $lokasi_asal = mysqli_real_escape_string($conn, $_POST['lokasi_asal']);
    $status_bahaya = mysqli_real_escape_string($conn, $_POST['status_bahaya']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $harga = floatval($_POST['harga']);
    $stok = intval($_POST['stok']);
    
    $query = "INSERT INTO produk (nama_artefak, kategori, tahun_ditemukan, lokasi_asal, status_bahaya, deskripsi, harga, stok) 
              VALUES ('$nama_artefak', '$kategori', '$tahun_ditemukan', '$lokasi_asal', '$status_bahaya', '$deskripsi', $harga, $stok)";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('✅ Artefak berhasil ditambahkan ke koleksi!');
                window.location.href='admin.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Gagal menambahkan artefak: " . mysqli_error($conn) . "');
                window.location.href='admin.php';
              </script>";
    }
}

// UPDATE DATA
if (isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id_produk = intval($_POST['id_produk']);
    $nama_artefak = mysqli_real_escape_string($conn, $_POST['nama_artefak']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $tahun_ditemukan = mysqli_real_escape_string($conn, $_POST['tahun_ditemukan']);
    $lokasi_asal = mysqli_real_escape_string($conn, $_POST['lokasi_asal']);
    $status_bahaya = mysqli_real_escape_string($conn, $_POST['status_bahaya']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $harga = floatval($_POST['harga']);
    $stok = intval($_POST['stok']);
    
    $query = "UPDATE produk SET 
              nama_artefak='$nama_artefak',
              kategori='$kategori',
              tahun_ditemukan='$tahun_ditemukan',
              lokasi_asal='$lokasi_asal',
              status_bahaya='$status_bahaya',
              deskripsi='$deskripsi',
              harga=$harga,
              stok=$stok
              WHERE id_produk=$id_produk";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('✅ Data artefak berhasil diperbarui!');
                window.location.href='admin.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Gagal memperbarui data: " . mysqli_error($conn) . "');
                window.location.href='form_edit_produk.php?id=$id_produk';
              </script>";
    }
}

// HAPUS DATA
if (isset($_GET['action']) && $_GET['action'] == 'hapus') {
    $id_produk = intval($_GET['id']);
    
    $query = "DELETE FROM produk WHERE id_produk=$id_produk";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('✅ Artefak berhasil dihapus dari koleksi!');
                window.location.href='admin.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Gagal menghapus artefak: " . mysqli_error($conn) . "');
                window.location.href='admin.php';
              </script>";
    }
}

mysqli_close($conn);
?>