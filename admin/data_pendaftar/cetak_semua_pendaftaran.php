<?php
require '../../vendor/dompdf-3.1.0/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

include '../../config.php'; // ← sesuaikan path juga kalau koneksi di luar folder ini

$options = new Options();
$options->set('defaultFont', 'Arial');
$dompdf = new Dompdf($options);
// Ambil data
$data = mysqli_query($mysqli, "SELECT * FROM tb_pendaftaran");

// HTML awal
$html = '<h3>Data Pendaftaran Siswa</h3>';
$html .= '<table border="1" cellpadding="5" cellspacing="0">';
$html .= '<tr>
<th>No</th><th>Nama Lengkap</th><th>Nomor Pendaftaran</th><th>Tempat Lahir</th>
<th>Tanggal Lahir</th><th>Usia</th><th>Jenis Kelamin</th><th>Agama</th>
<!-- Tambah kolom lainnya sesuai kebutuhan -->
</tr>';

$no = 1;
while ($d = mysqli_fetch_array($data)) {
    $html .= '<tr>';
    $html .= '<td>' . $no++ . '</td>';
    $html .= '<td>' . $d['nama_lengkap'] . '</td>';
    $html .= '<td>' . $d['nomor_pendaftaran'] . '</td>';
    $html .= '<td>' . $d['tempat_lahir'] . '</td>';
    $html .= '<td>' . date('d-m-Y', strtotime($d['tanggal_lahir'])) . '</td>';
    $html .= '<td>' . $d['usia'] . ' tahun</td>';
    $html .= '<td>' . $d['jenis_kelamin'] . '</td>';
    $html .= '<td>' . $d['agama'] . '</td>';
    // Tambah kolom lainnya...
    $html .= '</tr>';
}
$html .= '</table>';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream('data_pendaftaran_admin.pdf', array("Attachment" => false));
