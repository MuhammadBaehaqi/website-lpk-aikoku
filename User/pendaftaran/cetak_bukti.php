<?php
require '../../vendor/dompdf-3.1.0/dompdf/autoload.inc.php'; // ← sesuai struktur folder kamu
use Dompdf\Dompdf;
use Dompdf\Options;

session_start();
include '../../includes/config.php'; // ← kalau file ini di folder "dashboard_user", gunakan ../ untuk naik satu folder

if (!isset($_SESSION['nama'])) {
    header("Location: ../../login.php");
    exit();
}

$username = $_SESSION['nama'];
$query = "SELECT * FROM tb_pendaftaran WHERE nama_lengkap = '$username' LIMIT 1";
$result = mysqli_query($mysqli, $query);
$data = mysqli_fetch_assoc($result);

// Inisialisasi Dompdf
$options = new Options();
$options->set('defaultFont', 'Arial');
$dompdf = new Dompdf($options);

// Buat HTML
$imgPath = 'C:/xampp/htdocs/Pendaftaran/img/ttd.png';
$imageData = base64_encode(file_get_contents($imgPath));
$html = '
<h2 style="text-align: center;">Bukti Pendaftaran</h2>
<hr>
<table border="0" cellpadding="10">
    <tr><td>Nama Lengkap</td><td>: ' . $data['nama_lengkap'] . '</td></tr>
    <tr><td>Nomor Pendaftaran</td><td>: ' . $data['nomor_pendaftaran'] . '</td></tr>
    <tr><td>Email</td><td>: ' . $data['email'] . '</td></tr>
    <tr><td>Tanggal Daftar</td><td>: ' . date("d F Y", strtotime($data['tanggal_daftar'])) . '</td></tr>
    <tr><td>Status</td><td>: ' . $data['status'] . '</td></tr>
</table>
<p style="margin-top:30px;">Silakan simpan bukti ini sebagai arsip.</p>
<br><br>
<table width="100%">
    <tr>
        <td width="60%"></td>
        <td align="center">
            Petunjungan, ' . date("d F Y") . '<br>
            Kepala LPK Aikoku Terpadu<br><br><br><br>
            <img src="data:image/png;base64,' . $imageData . '" alt="Tanda Tangan" style="width: 150px;"/><br>
            <strong><u>Imam Joharudin</u></strong><br> 
            NIP/NIK: 1234567890
        </td>
    </tr>
</table>
';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('bukti_pendaftaran.pdf', array("Attachment" => false));
exit();
