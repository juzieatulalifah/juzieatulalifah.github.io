<?php 
    require 'koneksi.php';

    if(isset($_POST['tambah'])){
        $event_name = $_POST['event_name'];
        $date = $_POST['date'];
        $rocket_name = $_POST['rocket_name'];
        $goal = $_POST['goal'];

        $tmp_name = $_FILES["foto"]["tmp_name"];
        $file_name = $_FILES["foto"]["name"];
        $file_size = $_FILES["foto"]["size"];

        $validExtension = ['jpg', 'jpeg', 'png'];
        $fileExtension = explode('.', $file_name);
        $fileExtension = strtolower(end($fileExtension));

        $maxFileSize = 2 * 1024 * 1024;

        if ($file_size > $maxFileSize) {
            echo "<script>
            alert('Ukuran file terlalu besar. Maksimal 2MB.');
            document.location.href = 'data.php';
            </script>";
        } elseif (!in_array($fileExtension, $validExtension)) {
            echo "<script>
            alert('File yang diupload bukan gambar');
            document.location.href = 'data.php';
            </script>";
        } else {
            $new_file_name = date('Y-m-d H.i.s') . '.' . $fileExtension;
            $foto = 'images/' . $new_file_name;

            if (move_uploaded_file($tmp_name, $foto)) {
                $query = "INSERT INTO events VALUES ('', '$event_name', '$date', '$rocket_name', '$goal', '$new_file_name')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo "<script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = 'data.php';
                    </script>";
                } else {
                    echo "<script>
                    alert('Data gagal ditambahkan');
                    document.location.href = 'data.php';
                    </script>";
                }
            } else {
                echo "<script>
                alert('Gagal mengunggah gambar');
                document.location.href = 'data.php';
                </script>";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Event</title>
    
    <link rel="stylesheet" href="update.css" />

</head>
<body>
    <main class="data-event-section">
        <h1 class="data-event-title">
            Tambah Event
        </h1>

        <div class="container">
            <a href="data.php">
                <button class="back">
                    <p>Back</p>
                </button>
            </a>
        </div>

        <div class="form-tambah-event">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-field">
                    <label for="event_name" class="label-field">Nama Event</label>
                    <input type="text" name="event_name" id="event_name" required>
                </div>
                <div class="input-field">
                    <label for="date" class="label-field">Tanggal Launching</label>
                    <input type="Date" name="date" id="date" required>
                </div>
                <div class="input-field">
                    <label for="rocket_name" class="label-field">Nama Rocket</label>
                    <input type="text" name="rocket_name" id="rocket_name" required>
                </div>
                <div class="input-field">
                    <label for="goal" class="label-field">Goal</label>
                    <input type="text" name="goal" id="goal">
                </div>
                <!-- <div class="input-field">
                    <label for="detail" class="label-field">Detail</label>
                    <input type="text" name="detail" id="detail">
                </div> -->
                <div class="input-field">
                    <label for="foto" class="label-field">Foto</label>
                    <input type="file" name="foto" id="foto" style="border: 1px solid rgba(0,0,0,6);border-radius:9px; padding: 7px 10px; font-size: 16px;" required>
                </div>
                <input type="submit" value="Tambah" name="tambah" class="button">
            </form>
        </div>
    </main>
</body>
</html>