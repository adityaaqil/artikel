<!DOCTYPE html>
<html>
<head>
    <title>Tampil Data</title>
    <style>
        body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: #E2BFB3;
}
table {
    border-color: #FEECE2;
    width: 60%; 
    margin-bottom: 20px; 
    margin-left: 20%;
    background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);

}

th, td {
  padding: 15px;
  text-align: left;
  background :#FFBE98 ;
}

.button1 {
  display: flex;
  justify-content: space-between;
  margin-left: 5%;
  margin-top: 30px;
}

.buttona {
 display: flex;
  justify-content: space-between;
  margin-left: 5%;
  margin-top: 10px;
  padding: 10px 20px;
  margin-right: 10px; 
  background-color: #green; 
  color: #green; 
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}


.buttonb {
  display: flex;
  justify-content: space-between;
  margin-left: 90%;
  padding: 10px 20px;
  margin-right: 10px; 
  margin-top: -.30px ;
  background-color: #green; 
  color: #green; 
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}



    </style>
</head>
<body>
    <div>
  <button class="buttona" onclick="window.location.href='form_tambah_data.html'">TAMBAH DATA</button>
  <button class="buttonb" onclick="window.location.href='index.php'">logout</button>
</div>

<center><h1>artikel</h1></center>   
 <table>

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Judul</th>
            <th>Gambar</th>
            <th>Isi</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';

        $sql = "SELECT * FROM artikel";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $no = 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>".$row['nama']."</td>";
                echo "<td>".$row['judul']."</td>";
                echo "<td><img src='uploads/".$row['gambar']."' alt='".$row['judul']."' style='max-width: 100px; max-height: 100px;'></td>";
                echo "<td>".$row['isi']."</td>";
                echo "<td>";
                echo "<a href='update_data.php?id=".$row['id']."' class='btn'>Update</a>";
                echo "<a href='delete_data.php?id=".$row['id']."' class='btn btn-delete'>Delete</a>";
                echo "</td>";
                echo "</tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data yang tersimpan.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>

