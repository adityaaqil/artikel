<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data dari tabel berdasarkan id
    $sql = "SELECT * FROM artikel WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Artikel: <?php echo $row['judul']; ?></title>
    <style>
        body{
            background: #E2BFB3;
        }

        .article {
            background: #FFBE98;
            max-width: 65%;
            margin: auto;
            padding: 100px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0,0,0,.6);
            border-radius: 10px
            
        }
        .article img {
            margin-left:50px;
            max-width: 50%;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .buttons {
  display: flex;
  justify-content: space-between;
  margin-left: 90%;
  margin-top: 75px;
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
  <button class="button" onclick="window.location.href='index.php'">kembali</button>
  </div>
    <div class="article">
        <center><h1><?php echo $row['judul']; ?></h1></center>
        <center><img src="uploads/<?php echo $row['gambar']; ?>" alt="<?php echo $row['judul']; ?>"></center>
        <center><p><strong>Nama Penulis:</strong> <?php echo $row['nama']; ?></p></center

        <p><?php echo $row['isi']; ?></p>
    </div>
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
