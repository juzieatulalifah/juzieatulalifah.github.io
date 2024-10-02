<link rel="stylesheet" href="style.css" type="text/css">

<div class="main">

<h1 class="menu-survey"> Log In Form </h1>

<form action="" class="survey-form" method="get">

        <div class="survey">
           <label for="username" class="samain">Username</label>
           <input type="text" name="username" id="username" required>
         </div>
      
         <div class="survey">
           <label for="pendapat" class="samain" >pendapat</label>
           <input type="text"  name="pendapat" id="pendapat" required>
         </div> 
       
       <div class="survey">
           <label for="Rating"class="samain" >Rating (0-10)</label>
           <input type="number" name="Rating" id="Rating" min="0" max="10" required>
         </div> 

         <div class="survey">
           <label for="email"class="samain" >Email </label>
           <input type="email" name="email" id="email">
         </div> 
        
         <button class="submit-button">
           submit
           </button>
         </form>
</div>

<div id="output">
    <h3>Submitted Data:</h3>
    <?php
    if (isset($_GET['username']) && isset($_GET['pendapat']) && isset($_GET['Rating']) && isset($_GET['email'])) {
        echo "<p>Username: " . htmlspecialchars($_GET['username']) . "</p>";
        echo "<p>pendapat: " . htmlspecialchars($_GET['pendapat']) . "</p>";
        echo "<p>Rating: " . htmlspecialchars($_GET['Rating']) . "</p>";
        echo "<p>email: " . htmlspecialchars($_GET['email']). "</p>";
    }
    ?>
</div>

