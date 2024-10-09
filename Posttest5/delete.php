<?php 
require 'koneksi.php';
    $id = $_GET['id'];
    $query = "DELETE FROM events WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "
        <script>
            alert('Berhasil Menghapus Event');
            document.location.href = 'data.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Gagal Menghapus Event)';
            document.location.href = 'data.php';
        </script>";

    }
?>