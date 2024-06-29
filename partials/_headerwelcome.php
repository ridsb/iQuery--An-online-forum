<?php
echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/phprids/forum/welcome.php">iQuery</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/phprids/forum/welcome.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/phprids/forum/about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/phprids/forum/categories/_askquery.php">Ask query</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/phprids/forum/contact.php">Contact</a>
      </li>
    </ul>
    <div class=" row mx-2">
    <a href="/phprids/forum/logout.php"><button class="btn btn-primary ml-2">Logout</button></a>
    </div>
    
  </div>
</nav>';
?>