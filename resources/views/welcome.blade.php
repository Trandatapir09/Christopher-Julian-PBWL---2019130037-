<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #000000ff;
  color: white;
}

table { border-collapse: collapse; width: 70%; }
        th, td { border: 1px solid #333; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }

</style>
  </head>
  <body>
  <div class="topnav">
  <a class="active" href="#">Home</a>
  <a href="#">Edit</a>
  <a href="#">View</a>
</div>

    <h2>Data Mahasiswa</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Umur</th>
            <th>No Telp</th>
            <th>alamat</th>
            <th>Status</th>
        </tr>
       
    </table>
  </body>
</html>