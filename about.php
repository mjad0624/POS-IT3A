<?php include 'header.php';?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  background-image: url('styles/b.jpg');
  padding-bottom: 80px;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>


<div class="about-section">
  <h1>Group 1</h1>
  <h2>BSIT 3A</h2>
</div>

<h2 style="text-align:center">Developers:</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="styles/baking2.jpg" alt="Jane" style="width:50%">
      <div class="container">
        <h2>Baking, Daniel Joshua C.</h2>
        <p>it.danieljoshuacbaking@gmail.com</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="styles/david2.jpg" alt="Mike" style="width:50%">
      <div class="container">
        <h2>David, Michael John A.</h2>
        <p>it.michaeljohnadavid@gmail.com</p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="styles/dizon2.jpg" alt="John" style="width:50%">
      <div class="container">
        <div class="container">
          <br>
            <h2>Dizon, Reister D.</h2>
            <p>it.reisterddizon@gmail.com</p>
           <br>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="column">
    <div class="card">
      <img src="styles/samia2.jpg" alt="Jane" style="width:50%">
      <div class="container">
        <h2>Samia, Angel C.</h2>
        <p>it.angelcsamia@gmail.com</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="styles/tungol2.jpg" alt="Mike" style="width:50%">
      <div class="container">
        <h2>Tungol, Patrick P.</h2>
        <p>it.patrickptungol@gmail.com</p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="styles/umali2.jpg" alt="John" style="width:50%">
      <div class="container">
        <h2>Umali, Noriel Jireh</h2>
        <p>it.norieljirehmumali@gmail.com</p>
      </div>
    </div>
  </div>
</div>


</body>
</html>
<?php include 'footer.php';?>