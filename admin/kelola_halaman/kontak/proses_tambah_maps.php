<?php
include '../../../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maps_url = mysqli_real_escape_string($mysqli, $_POST['maps_url']);

    // Validasi hanya menerima URL embed
    if (strpos($maps_url, 'https://www.google.com/maps/embed?pb=') === 0) {

        // Menghapus data maps lama (jika ada)
        $delete_query = "DELETE FROM tb_kontak_maps";
        mysqli_query($mysqli, $delete_query);

        // Menyimpan URL baru ke database, tanpa perlu menyertakan created_at karena sudah otomatis
        $query = "INSERT INTO tb_kontak_maps (maps_url) VALUES ('$maps_url')";
        if (mysqli_query($mysqli, $query)) {
            header("Location: kontak_admin.php?success=maps_saved");
        } else {
            echo "Gagal menyimpan: " . mysqli_error($mysqli);
        }
    } else {
        echo "URL tidak valid. Harus menggunakan URL embed dari Google Maps.";
    }
}
?>