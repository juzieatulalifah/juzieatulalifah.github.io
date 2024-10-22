<?php //selesai
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true || $_SESSION['role'] !== 'admin') {
    header('Location:index.php');
    exit;
}
require 'koneksi.php';

$id = $_GET['id'];
$findQuery = mysqli_query($conn, "SELECT * FROM events WHERE id = $id");
$event = [];
while ($mhs = mysqli_fetch_assoc($findQuery)) {
    $event[] = $ev;
}
unlink('images/' . $event[0]['foto']);

$query = "DELETE FROM events WHERE id=$id";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "
                <script>
                alert('Berhasil menghapus data event');
                document.location.href = 'data.php';
                </script>
            ";
} else {
    echo "
                <script>
                alert('Gagal menambah data event');
                document.location.href = 'data.php';
                </script>
            ";
}
