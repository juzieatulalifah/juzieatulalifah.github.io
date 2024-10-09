<?php 
    require 'koneksi.php';

    $id = $_GET['id'];
    $query = "SELECT * FROM events WHERE id=$id";
    $result = mysqli_query($conn, $query);

    $event =[];
    while ($row= mysqli_fetch_assoc($result)){
        $event[]=$row;
    }
    $event = $event[0];

    if(isset($_POST['tambah'])){
        //var_dump($_POST);
        $event_name = $_POST['event_name'];
        $date = $_POST['date'];
        $rocket_name = $_POST['rocket_name'];
        $goal = $_POST['goal'];
        $detail = $_POST['detail'];

        $query = "UPDATE events SET event_name='$event_name', date='$date', rocket_name='$rocket_name', goal='$goal', detail='$detail' WHERE id=$id ";
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
            <form action="" method="post">
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
                <div class="input-field">
                    <label for="detail" class="label-field">Detail</label>
                    <input type="text" name="detail" id="detail">
                </div>
                <input type="submit" value="Tambah" name="tambah" class="button">
            </form>
        </div>
    </main>
</body>
</html>