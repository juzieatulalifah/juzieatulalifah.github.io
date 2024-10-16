<?php 
    require 'koneksi.php';

    $id = $_GET['id'];
    $query = "SELECT * FROM events WHERE id=$id";
    $result = mysqli_query($conn, $query);

    $event = [];
    while ($row = mysqli_fetch_assoc($result)){
        $event[] = $row;
    }
    $event = $event[0];

    if(isset($_POST['tambah'])){
        $event_name = $_POST['event_name'];
        $date = $_POST['date'];
        $rocket_name = $_POST['rocket_name'];
        $goal = $_POST['goal'];
        $olding = $_POST["olding"];

        $maxFileSize = 2 * 1024 * 1024;

        if ($_FILES["foto"]["error"] === 4) {
            $file_name = $olding;
        } else {
            $tmp_name = $_FILES["foto"]["tmp_name"];
            $file_name = $_FILES["foto"]["name"];
            $file_size = $_FILES["foto"]["size"];
            $validExtension = ['jpg', 'jpeg', 'png'];
            $fileExtension = explode('.', $file_name);
            $fileExtension = strtolower(end($fileExtension));

            if ($file_size > $maxFileSize) {
                echo "<script>
                alert('Ukuran file terlalu besar. Maksimal 2MB.');
                document.location.href = 'update.php';
                </script>";
            } elseif (!in_array($fileExtension, $validExtension)) {
                echo "<script>
                alert('File yang diupload bukan gambar');
                document.location.href = 'update.php';
                </script>";
            } else {
                $new_file_name = date('Y-m-d H.i.s') . '.' . $fileExtension;
                $foto = 'images/' . $new_file_name;

                if (move_uploaded_file($tmp_name, $foto)) {
                    unlink('images/' . $olding);
                    $file_name = $new_file_name;
                } else {
                    echo "Gagal mengunggah gambar";
                    exit;
                }
            }
        }

        $query = "UPDATE events SET event_name='$event_name', date='$date', rocket_name='$rocket_name', goal='$goal', foto='$file_name' WHERE id=$id";
        $result = mysqli_query($conn, $query);

        if($result){
            echo "
            <script>
             alert('Berhasil mengubah data event!');
             document.location.href = 'data.php';
            </script>
            ";
        } else {
            echo "
             <script>
             alert('Gagal mengubah data event!');
             document.location.href = 'data.php';
            </script>
            ";
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
                <div class="input-field" style="border: 1px solid rgba(0,0,0,6);border-radius:9px; padding: 7px 10px; font-size: 16px;">
                    <label for="foto" class="label-field">Foto</label>
                    <input type="file" name="foto" id="foto" required>
                    <br>
                    <img src="images/<?php echo $event['foto']  ?>" alt="<?php echo $event['foto'] ?>" style="width:80px; height: 100px">
                </div>
                <input type="submit" value="Tambah" name="tambah" class="button">
            </form>
        </div>
    </main>
</body>
</html>