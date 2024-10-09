<?php
  require 'koneksi.php';
  $query = "SELECT * FROM events";

  $result=mysqli_query($conn, $query);

  $event=[];
  while($row= mysqli_fetch_assoc($result)){
    $event[]=$row;
  }
  
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tentang Kami | Pendataan event Launching roket spaceX</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- <link rel="stylesheet" href="style.css" /> -->

  <link rel="stylesheet" href="data.css">
</head>

<body>

  <main class="data-event-section">
    <h1 class="data-event-title">
      Data event
    </h1>

    <table class="table-event">
      <thead>
        <tr class="table-event-row">
          <th class="table-event-header">No</th>
          <th class="table-event-header">Nama Event</th>
          <th class="table-event-header">Tanggal Launching</th>
          <th class="table-event-header">Nama Roket</th>
          <th class="table-event-header">Tujuan Launching</th>
          <th class="table-event-header">Detail</th>
          <th class="table-event-header">Edit/Del</th>
        </tr>
      </thead>
  
      <tbody>
        <?php $i=1; foreach($event as $ev): ?>
          <tr class="table-event-row">
            <td class="table-event-data"><?php echo $i;?></td>
            <td class="table-event-data"><?php echo $ev['event_name']?></td>
            <td class="table-event-data"><?php echo $ev['date']?></td>
            <td class="table-event-data"><?php echo $ev['rocket_name']?></td>
            <td class="table-event-data"><?php echo $ev['goal']?></td>
            <td class="table-event-data"><?php echo $ev['detail']?></td>
            <td class="table-event-data">
              <div class="button-UD">
                <a href="edit.php?id=<?=$ev['id']?>">
                <button class="edit-data">
                  <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
                </button>
                </a>
                <a href="delete.php?id=<?=$ev['id']?>">
                <button class="hapus-data">
                  <i class="fa-solid fa-trash-can" style="color: #ffffff;"></i>
                </button>
                </a>
              </div>
            </td>
          </tr>
        <?php $i++; endforeach ?>
      </tbody>
    </table>
  </main>

    <div class="container">
      <a href = "update.php">
        <button class="tambah">
          <p>Tambah Event</p>
        </button> 
      </a>
      <a href="index.php">
        <button class="back">
          <p>Back</p>
        </button>
      </a>
    </div>
      

  <script src="/scripts/script.js"></script>
</body>

</html>