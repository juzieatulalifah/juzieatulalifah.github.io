<?php //selesai
session_start();
  require 'koneksi.php';
  $query = "SELECT * FROM events";

  $result=mysqli_query($conn, $query);

  $event=[];
  while($row= mysqli_fetch_assoc($result)){
    $event[]=$row;
  }

  if (isset($_GET['search'])) {
    $search = $_GET['keyword'];
    $sql = mysqli_query($conn, "SELECT * FROM events WHERE event_name LIKE '%$search%' OR
      rocket_name LIKE '%$search%'");
    $event = [];
    while ($row = mysqli_fetch_assoc($sql)) {
      $event[] = $row;
    }
  }
  
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tentang Kami | Pendataan event Launching roket spaceX</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="search.css" /> 

  <link rel="stylesheet" href="data.css">
</head>

<body>

  <main class="data-event-section">
    <h1 class="data-event-title">
      Data event
    </h1>

    <search>
      <form action="" method="GET" class="search-bar-event">
        <input type="text" name="keyword" placeholder="Cari Event akan datang" class="search-input-event" />
        <button type="submit" name="search" class="search-button-event">
          <i class="fa-solid fa-magnifying-glass fa-xl"></i>
        </button>
      </form>
    </search>

    
    <table class="table-event">
      <thead>
        <tr class="table-event-row">
          <th class="table-event-header">No</th>
          <th class="table-event-header">Nama Event</th>
          <th class="table-event-header">Tanggal Launching</th>
          <th class="table-event-header">Nama Roket</th>
          <th class="table-event-header">Tujuan Launching</th>
          <th class="table-event-header">Foto</th>
          <?php if (isset($_SESSION['login']) && $_SESSION['role'] === 'admin') : ?>
          <th class="table-event-header">Edit/Del</th>
          <?php endif; ?>
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
            <td class="table-event-data">
              <img src="images/<?php echo $ev['foto'] ?>" alt="Foto" class="foto" style="width : 80px;height : 100px; display:block;margin : 0 auto ">
            </td>
            <?php if (isset($_SESSION['login']) && $_SESSION['role'] === 'admin') : ?>
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
            <?php endif; ?>
          </tr>
        <?php $i++; endforeach ?>
      </tbody>
    </table>
  </main>
    
  <?php if (isset($_SESSION['login']) && $_SESSION['role'] === 'admin') : ?>
    <div class="container">
      <a href = "update.php">
        <button class="tambah">
          <p>Tambah Event</p>
        </button> 
      </a>
      <?php endif; ?>
      <a href="index.php">
        <button class="back">
          <p>Back</p>
        </button>
      </a>
    </div>

  <script src="/scripts/script.js"></script>
</body>

</html>