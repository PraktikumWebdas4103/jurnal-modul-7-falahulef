<form action="#" method="POST">
<table>
<nav>
<td><a href="input.php">INPUT NEW DATA</a> | </td> <td align="right"><input type="text" name="nim" placeholder="Search by NIM"><input type="submit" name="submit" value="Search"></td>
</nav>
<tr>
<td>LIST NAMA MAHASISWA</td>
</tr>
</table>
</form>

<?php
$servername = "localhost";
$username ="root";
$password = "";
$db = "ourtable";

$con = new mysqli($servername,$username,$password,$db);

if($con==false){

	die("Connection Failed: ". $con->connect_eror);

}
$sql = "SELECT * FROM mahasiswa";
$getdata = mysqli_query($con,$sql);
echo "<table><tr align='center'>NIM</tr>
<tr>NAMA</tr>
<tr>ACTION</tr>";
	while($row = mysqli_fetch_array($getdata, MYSQLI_ASSOC))
	{
	$nim = $row['nim'];
	$nama = $row['nama'];
echo "
<td>$nim</td>
<td>$nama</td>
<td>DELETE</td>
</table></form>";
}
if(isset($_POST['submit'])) {
echo "<br><br>";
$sql2 = "SELECT * FROM mahasiswa WHERE nim='$nim'";
$viewdata = mysqli_query($con,$sql2);
$view = mysqli_fetch_array($viewdata);

	echo "Hasil Pencarian Data : <br>NIM :".$view['nim']."<br>"."NAMA :".$view['nama']."<br>"."Jenis Kelamin :".$view['jeniskelamin']."<br>"."Prodi :".$view['prodi']."<br>"."Fakultas :".$view['fakultas']."<br>"."Motto :".$view['motto'];
}
 ?>
