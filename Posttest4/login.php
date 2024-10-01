<link rel="stylesheet" href="style.css" type="text/css">

<div class="main">

<h1 class="menu-login"> Log In Form </h1>

<form action="" class="login-form" method="get">

        <div class="login">
           <label for="username" class="samain">Username</label>
           <input type="text" name="username" id="username" required>
         </div>
      
         <div class="login">
           <label for="password" class="samain" >Password</label>
           <input type="password"  name="password" id="password" required>
         </div> 
       
       <div class="login">
           <label for="Age"class="samain" >Age</label>
           <input type="number" name="Age" id="Age" min="0" max="120" required>
         </div> 
        
         <button class="login-button">
           LOGIN
           </button>
         </form>
</div>

<div id="output">
    <h3>Submitted Data:</h3>
    <?php
    if (isset($_GET['username']) && isset($_GET['password']) && isset($_GET['Age'])) {
        echo "<p>Username: " . htmlspecialchars($_GET['username']) . "</p>";
        echo "<p>Password: " . htmlspecialchars($_GET['password']) . "</p>";
        echo "<p>Age: " . htmlspecialchars($_GET['Age']) . "</p>";
    }
    ?>
</div>

