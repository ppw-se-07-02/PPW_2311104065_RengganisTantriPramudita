<?php
// File: form_edit_produk.php
// Fungsi: Form untuk mengedit data produk

include "koneksi.php";

// Ambil ID dari URL
$id_produk = intval($_GET['id']);

// Query untuk mengambil data produk
$query = "SELECT * FROM produk WHERE id_produk=$id_produk";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

// Jika data tidak ditemukan
if (!$data) {
    echo "<script>
            alert('❌ Data artefak tidak ditemukan!');
            window.location.href='admin.php';
          </script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Artefak - The Conjuring</title>
  <link rel="stylesheet" href="admin.css" />
  <style>
    .edit-container {
      max-width: 800px;
      margin: 50px auto;
      background-color: rgba(20, 20, 20, 0.95);
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(255,0,0,0.3);
    }
    .edit-container h2 {
      color: #b30000;
      margin-bottom: 25px;
      text-align: center;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      display: block;
      margin-bottom: 8px;
      color: #e6e6e6;
      font-weight: 500;
    }
    .form-group input,
    .form-group select,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #333;
      border-radius: 6px;
      background-color: rgba(0,0,0,0.7);
      color: white;
      outline: none;
      transition: 0.3s;
      box-sizing: border-box;
    }
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
      border-color: #b30000;
    }
    .form-group textarea {
      resize: vertical;
      min-height: 100px;
    }
    .form-buttons {
      display: flex;
      gap: 15px;
      margin-top: 25px;
    }
    .btn-update {
      flex: 1;
      background-color: #2196F3;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 500;
      transition: 0.3s;
    }
    .btn-update:hover {
      background-color: #0b7dda;
    }
    .btn-cancel {
      flex: 1;
      background-color: #666;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 500;
      transition: 0.3s;
      text-decoration: none;
      text-align: center;
      display: block;
    }
    .btn-cancel:hover {
      background-color: #555;
    }
  </style>
</head>
<body>

  <div class="edit-container">
    <h2>✏️ Edit Data Artefak Terkutuk</h2>
    
    <form method="POST" action="proses_produk.php">
      <input type="hidden" name="action" value="edit">
      <input type="hidden" name="id_produk" value="<?php echo $data['id_produk']; ?>">
      
      <div class="form-group">
        <label>Nama Artefak:</label>
        <input type="text" name="nama_artefak" value="<?php echo htmlspecialchars($data['nama_artefak']); ?>" 
               required maxlength="100">
      </div>
      
      <div class="form-group">
        <label>Kategori:</label>
        <select name="kategori" required>
          <option value="">-- Pilih Kategori --</option>
          <option value="Boneka Terkutuk" <?php if($data['kategori']=='Boneka Terkutuk') echo 'selected'; ?>>Boneka Terkutuk</option>
          <option value="Lukisan Berhantu" <?php if($data['kategori']=='Lukisan Berhantu') echo 'selected'; ?>>Lukisan Berhantu</option>
          <option value="Benda Antik" <?php if($data['kategori']=='Benda Antik') echo 'selected'; ?>>Benda Antik</option>
          <option value="Perhiasan Terkutuk" <?php if($data['kategori']=='Perhiasan Terkutuk') echo 'selected'; ?>>Perhiasan Terkutuk</option>
          <option value="Alat Ritual" <?php if($data['kategori']=='Alat Ritual') echo 'selected'; ?>>Alat Ritual</option>
          <option value="Kotak Musik Berhantu" <?php if($data['kategori']=='Kotak Musik Berhantu') echo 'selected'; ?>>Kotak Musik Berhantu</option>
          <option value="Lainnya" <?php if($data['kategori']=='Lainnya') echo 'selected'; ?>>Lainnya</option>
        </select>
      </div>
      
      <div class="form-group">
        <label>Tahun Ditemukan:</label>
        <input type="text" name="tahun_ditemukan" value="<?php echo htmlspecialchars($data['tahun_ditemukan']); ?>" 
               maxlength="20">
      </div>
      
      <div class="form-group">
        <label>Lokasi Asal:</label>
        <input type="text" name="lokasi_asal" value="<?php echo htmlspecialchars($data['lokasi_asal']); ?>" 
               maxlength="100">
      </div>
      
      <div class="form-group">
        <label>Status Bahaya:</label>
        <select name="status_bahaya" required>
          <option value="Rendah" <?php if($data['status_bahaya']=='Rendah') echo 'selected'; ?>>Rendah</option>
          <option value="Sedang" <?php if($data['status_bahaya']=='Sedang') echo 'selected'; ?>>Sedang</option>
          <option value="Tinggi" <?php if($data['status_bahaya']=='Tinggi') echo 'selected'; ?>>Tinggi</option>
          <option value="Sangat Tinggi" <?php if($data['status_bahaya']=='Sangat Tinggi') echo 'selected'; ?>>Sangat Tinggi</option>
        </select>
      </div>
      
      <div class="form-group">
        <label>Deskripsi:</label>
        <textarea name="deskripsi" rows="4"><?php echo htmlspecialchars($data['deskripsi']); ?></textarea>
      </div>
      
      <div class="form-group">
        <label>Harga (untuk koleksi):</label>
        <input type="number" name="harga" step="0.01" value="<?php echo $data['harga']; ?>">
      </div>
      
      <div class="form-group">
        <label>Stok:</label>
        <input type="number" name="stok" value="<?php echo $data['stok']; ?>">
      </div>
      
      <div class="form-buttons">
        <button type="submit" class="btn-update">💾 Update Data</button>
        <a href="admin.php" class="btn-cancel">❌ Batal</a>
      </div>
    </form>
  </div>

</body>
</html>
<?php
mysqli_close($conn);
?>