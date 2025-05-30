<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data_pendaftaran.xls");

include '../../config.php'; // sesuaikan path koneksi
$where = '';
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $where = "WHERE id_pendaftaran = $id";
}
$data = mysqli_query($mysqli, "SELECT * FROM tb_pendaftaran $where ORDER BY id_pendaftaran ASC");


echo "<h3>Data Pendaftaran</h3>";
echo "<table border='1'>";
echo "
<tr>
    <th>No</th>
    <th>Nama Lengkap</th>
    <th>Nomor Pendaftaran</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Usia</th>
    <th>Jenis Kelamin</th>
    <th>Agama</th>
    <th>Email</th>
    <th>Program</th>
    <th>Status</th>
    <th>Tanggal Daftar</th>
</tr>
";

$no = 1;
while ($d = mysqli_fetch_array($data)) {
    echo "<tr>";
    echo "<td>$no</td>";
    echo "<td>{$d['nama_lengkap']}</td>";
    echo "<td>{$d['nomor_pendaftaran']}</td>";
    echo "<td>{$d['tempat_lahir']}</td>";
    echo "<td>" . date('d-m-Y', strtotime($d['tanggal_lahir'])) . "</td>";
    echo "<td>{$d['usia']} tahun</td>";
    echo "<td>{$d['jenis_kelamin']}</td>";
    echo "<td>{$d['agama']}</td>";
    echo "<td>{$d['email']}</td>";
    echo "<td>{$d['program']}</td>";
    echo "<td>{$d['status']}</td>";
    echo "<td>" . date('d-m-Y H:i:s', strtotime($d['tanggal_daftar'])) . "</td>";
    echo "</tr>";
    $no++;
}

echo "</table>";
?>