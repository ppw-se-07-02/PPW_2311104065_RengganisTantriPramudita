<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>The Conjuring - Halaman Administrator</title>
  <link rel="stylesheet" href="admin.css" />
</head>
<body>

  <!-- Header -->
  <header>
    <h1>🕯 The Conjuring - Halaman Administrator</h1>
  </header>

  <!-- Menu Sidebar & Konten -->
  <main>
    <aside class="sidebar">
      <h3>Menu Ritual</h3>
      <ul>
        <li><a href="#" class="active" onclick="showContent('dashboard', this)">📊 Beranda</a></li>
        <li><a href="#" onclick="showContent('dataUser', this)">🧙 Data Korban</a></li>
        <li><a href="#" onclick="showContent('kelolaProduk', this)">📜 Kelola Artefak</a></li>
        <li><a href="#" onclick="showContent('editPassword', this)">🔐 Ganti Mantra</a></li>
        <li><a href="#" onclick="logout()">🚪 Keluar</a></li>
      </ul>
    </aside>

    <section class="content">

      <!-- DASHBOARD -->
      <div id="dashboard" class="box active">
        <h2>Selamat Datang, Penjaga Gerbang 👁</h2>
        <p>Gunakan menu di sebelah kiri untuk mengontrol data ritual, artefak, dan mantra rahasia.</p>

        <div class="info">
          <h3>⚰ Informasi Kehidupan Ed dan Lorraine Warren</h3>
          <ul>
            <li><strong>Ed Warren:</strong> meninggal pada 23 Agustus 2006.</li>
            <li><strong>Lorraine Warren:</strong> meninggal pada 18 April 2019</li>
            <li><strong>Tahun pertama pertolongan paranormal:</strong> sekitar 1952–1953</li>
            <li><strong>Lokasi Awal:</strong> Wilayah Connecticut, Amerika Serikat</li>
            <li><strong>Kasus pertama yang tercatat:</strong> Ed dan Lorraine melakukan penyelidikan pada rumah dan properti yang dilaporkan mengalami aktivitas paranormal, termasuk penampakan hantu dan gangguan supranatural kecil.</li>
          </ul>
        </div>
      </div>

      <!-- DATA USER -->
      <div id="dataUser" class="box hidden">
        <h2>🧙 Data Korban</h2>
        <p>Daftar entitas yang telah terjebak dalam lingkaran ritual:</p>
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Tahun Kejadian</th>
              <th>Lokasi</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>1</td><td>Carolyn dan Roger Perron</td><td>1971–1972</td><td>Harrisville</td></tr>
            <tr><td>2</td><td>Andrea, Nancy, Christine, Cindy, April Perron</td><td>1971–1972</td><td>Harrisville</td></tr>
            <tr><td>3</td><td>Bathsheba Sherman</td><td>1800-an</td><td>Rumah Perron</td></tr>
          </tbody>
        </table>
      </div>

      <!-- KELOLA PRODUK -->
      <div id="kelolaProduk" class="box hidden">
        <h2>📜 Kelola Artefak Terkutuk</h2>
        
        <!-- Search Box -->
        <div class="search-box">
          <form method="GET" action="" id="searchForm">
            <input type="text" name="keyword" id="keyword" 
                   placeholder="🔍 Cari artefak berdasarkan nama, kategori, atau lokasi..." 
                   value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
            <button type="submit" class="btn-search">Cari</button>
            <?php if (isset($_GET['keyword']) && $_GET['keyword'] != ''): ?>
              <button type="button" class="btn-reset" onclick="resetSearch()">Reset</button>
            <?php endif; ?>
          </form>
        </div>

        <button class="btn-primary" onclick="showAddForm()">+ Tambah Artefak Baru</button>
        
        <!-- Form Tambah (Hidden by default) -->
        <div id="formTambah" class="form-container" style="display:none;">
          <h3>➕ Tambah Artefak Baru</h3>
          <form method="POST" action="proses_produk.php">
            <input type="hidden" name="action" value="tambah">
            
            <label>Nama Artefak:</label>
            <input type="text" name="nama_artefak" required maxlength="100">
            
            <label>Kategori:</label>
            <select name="kategori" required>
              <option value="">-- Pilih Kategori --</option>
              <option value="Boneka Terkutuk">Boneka Terkutuk</option>
              <option value="Lukisan Berhantu">Lukisan Berhantu</option>
              <option value="Benda Antik">Benda Antik</option>
              <option value="Perhiasan Terkutuk">Perhiasan Terkutuk</option>
              <option value="Alat Ritual">Alat Ritual</option>
              <option value="Lainnya">Lainnya</option>
            </select>
            
            <label>Tahun Ditemukan:</label>
            <input type="text" name="tahun_ditemukan" maxlength="20">
            
            <label>Lokasi Asal:</label>
            <input type="text" name="lokasi_asal" maxlength="100">
            
            <label>Status Bahaya:</label>
            <select name="status_bahaya" required>
              <option value="Rendah">Rendah</option>
              <option value="Sedang">Sedang</option>
              <option value="Tinggi">Tinggi</option>
              <option value="Sangat Tinggi">Sangat Tinggi</option>
            </select>
            
            <label>Deskripsi:</label>
            <textarea name="deskripsi" rows="3"></textarea>
            
            <label>Harga (untuk koleksi):</label>
            <input type="number" name="harga" step="0.01" value="0">
            
            <label>Stok:</label>
            <input type="number" name="stok" value="1">
            
            <div class="form-buttons">
              <button type="submit" class="btn-primary">💾 Simpan</button>
              <button type="button" class="btn-secondary" onclick="hideAddForm()">❌ Batal</button>
            </div>
          </form>
        </div>

        <!-- Tabel Data Produk -->
        <div class="table-container">
          <?php
          // Proses pencarian
          if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
              $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
              $query = "SELECT * FROM produk 
                        WHERE nama_artefak LIKE '%$keyword%' 
                        OR kategori LIKE '%$keyword%' 
                        OR lokasi_asal LIKE '%$keyword%'
                        ORDER BY id_produk DESC";
              $result = mysqli_query($conn, $query);
              $jumlah = mysqli_num_rows($result);
              echo "<p class='info-text'>🔍 Ditemukan <strong>$jumlah</strong> artefak dengan keyword: 
                    <span class='keyword-highlight'>'" . htmlspecialchars($keyword) . "'</span></p>";
          } else {
              $query = "SELECT * FROM produk ORDER BY id_produk DESC";
              $result = mysqli_query($conn, $query);
              $jumlah = mysqli_num_rows($result);
              echo "<p class='info-text'>📊 Total <strong>$jumlah</strong> artefak terkutuk</p>";
          }
          ?>

          <table>
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Artefak</th>
                <th>Kategori</th>
                <th>Tahun</th>
                <th>Lokasi Asal</th>
                <th>Status Bahaya</th>
                <th>Stok</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (mysqli_num_rows($result) > 0) {
                  $no = 1;
                  while ($row = mysqli_fetch_assoc($result)) {
                      // Tentukan class badge berdasarkan status bahaya
                      $badgeClass = '';
                      switch($row['status_bahaya']) {
                          case 'Sangat Tinggi': $badgeClass = 'badge-danger'; break;
                          case 'Tinggi': $badgeClass = 'badge-warning'; break;
                          case 'Sedang': $badgeClass = 'badge-info'; break;
                          case 'Rendah': $badgeClass = 'badge-success'; break;
                      }
                      
                      echo "<tr>";
                      echo "<td>" . $no++ . "</td>";
                      echo "<td>" . htmlspecialchars($row['nama_artefak']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['kategori']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['tahun_ditemukan']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['lokasi_asal']) . "</td>";
                      echo "<td><span class='badge $badgeClass'>" . htmlspecialchars($row['status_bahaya']) . "</span></td>";
                      echo "<td>" . $row['stok'] . "</td>";
                      echo "<td class='action-buttons'>
                              <a href='form_edit_produk.php?id=" . $row['id_produk'] . "' class='btn-edit'>✏️ Edit</a>
                              <a href='proses_produk.php?action=hapus&id=" . $row['id_produk'] . "' 
                                 class='btn-delete' 
                                 onclick=\"return confirm('⚠️ Yakin ingin menghapus artefak " . htmlspecialchars($row['nama_artefak']) . "?')\">
                                 🗑️ Hapus
                              </a>
                            </td>";
                      echo "</tr>";
                  }
              } else {
                  if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
                      echo "<tr><td colspan='8' style='text-align:center; color: #ff4d4d;'>
                            ❌ Artefak tidak ditemukan dengan keyword tersebut!</td></tr>";
                  } else {
                      echo "<tr><td colspan='8' style='text-align:center'>
                            📭 Belum ada artefak yang terdaftar</td></tr>";
                  }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- EDIT PASSWORD -->
      <div id="editPassword" class="box hidden">
        <h2>🔐 Ganti Mantra</h2>
        <form>
          <label>Mantra Lama</label>
          <input type="password" placeholder="Bisikkan mantra lama..." />

          <label>Mantra Baru</label>
          <input type="password" placeholder="Bisikkan mantra baru..." />

          <button type="button" class="btn-primary">💾 Simpan Mantra</button>
        </form>
      </div>

    </section>
  </main>

  <!-- Footer -->
  <footer>
    <p>© 2025 The Conjuring — Wilayah Terlarang</p>
  </footer>

  <!-- Script -->
  <script>
    function showContent(id, element) {
      document.querySelectorAll('.box').forEach(b => {
        b.classList.add('hidden');
        b.classList.remove('active');
      });

      document.getElementById(id).classList.remove('hidden');
      document.getElementById(id).classList.add('active');

      document.querySelectorAll('.sidebar a').forEach(a => a.classList.remove('active'));
      element.classList.add('active');
      
      // Reset keyword saat pindah menu
      if (id !== 'kelolaProduk') {
        window.history.replaceState({}, document.title, window.location.pathname);
      }
    }

    function logout() {
      const confirmLogout = confirm("⚠️ Apakah Anda yakin ingin meninggalkan ruang ini?");
      if (confirmLogout) {
        window.location.href = "login.html";
      }
    }

    function showAddForm() {
      document.getElementById('formTambah').style.display = 'block';
      document.getElementById('formTambah').scrollIntoView({ behavior: 'smooth' });
    }

    function hideAddForm() {
      document.getElementById('formTambah').style.display = 'none';
    }

    function resetSearch() {
      window.location.href = 'admin.php';
    }

    // Auto show kelola produk jika ada parameter keyword
    <?php if (isset($_GET['keyword'])): ?>
    window.addEventListener('DOMContentLoaded', function() {
      const kelolaProdukLink = document.querySelector('a[onclick*="kelolaProduk"]');
      showContent('kelolaProduk', kelolaProdukLink);
    });
    <?php endif; ?>
  </script>

</body>
</html>
<?php
mysqli_close($conn);
?>