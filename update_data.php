<?php
include 'koneksi.php';

// Periksa apakah parameter id telah diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data dari tabel berdasarkan id
    $sql = "SELECT * FROM artikel WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Tampilkan formulir untuk mengupdate data
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Data</title>
    <style>
        body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: #E2BFB3;
}

        form{
  position: absolute;
  top: 50%;
  left: 50%;
  width: 600px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: #FFBE98;
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;

        }       
        h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #black;
  text-align: center;
}      
label {
            color: #666;
            font-size: 14px;
        }
        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        img{
            margin-top: 10px;
            max-width: 150%; max-height: 150px;
        }

        .button {
  display: flex;
  justify-content: space-between;
  margin-left: 90%;
  margin-top: 30px;
}

.button {
  padding: 10px 20px;
  margin-right: 10px; 
  background-color: #007bff; 
  color: #fff; 
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.button:hover {
  background-color: #0056b3; 
}
    </style>
</head>
<body>
<div class="buttons">
  <button class="button" onclick="window.location.href='tampil_data.php'">kembali</button>
  </div>
<form action="proses_update_data.php" method="post" enctype="multipart/form-data">
    <h2>Update Data</h2>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" ><br><br>

        <label for="judul">Judul:</label><br>
        <input type="text" id="judul" name="judul" value="<?php echo $row['judul']; ?>" ><br><br>

        <label for="gambar">Gambar:</label><br>
        <input type="file" id="gambar" name="gambar"><br>
        <img src="uploads/<?php echo $row['gambar']; ?>" alt="<?php echo $row['judul']; ?>" style=""><br><br>

        <label for="isi">Isi:</label><br>
        <textarea id="isi" name="isi" rows="4" cols="50"><?php echo $row['isi']; ?></textarea ><br><br>

        <input type="submit" value="Update Data">
    </form>
</body>
</html>
<?php
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID tidak ditemukan.";
}

$conn->close();
?>
