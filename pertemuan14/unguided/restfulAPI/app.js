const express = require("express");
const db = require("./crud");
const path = require("path");

const app = express();
const port = 3000;

app.use(express.static(path.join(__dirname, "public")));

app.use(express.json());

// CREATE
app.post("/mahasiswaCreate", (req, res) => {
  const { nama, nim, jurusan, email } = req.body;
  db.createMahasiswa(nama, nim, jurusan, email, (err) => {
    if (err) return res.status(500).send("Error creating data");
    res.send("Mahasiswa created");
  });
});

// READ
app.get("/mahasiswaGet", (req, res) => {
  db.getAllMahasiswa((err, result) => {
    if (err) return res.status(500).send("Error fetching data");
    res.json(result);
  });
});

// UPDATE
app.put("/mahasiswaUpdate/:id", (req, res) => {
  const { id } = req.params;
  const { nama, nim, jurusan, email } = req.body;
  db.updateMahasiswa(id, nama, nim, jurusan, email, (err) => {
    if (err) return res.status(500).send("Error updating data");
    res.send("Mahasiswa updated");
  });
});

// DELETE
app.delete("/mahasiswaDelete/:id", (req, res) => {
  const { id } = req.params;
  db.deleteMahasiswa(id, (err) => {
    if (err) return res.status(500).send("Error deleting data");
    res.send("Mahasiswa deleted");
  });
});

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});