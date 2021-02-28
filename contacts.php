<?php include 'header.php';?>
<head>
  <link rel="stylesheet" href="css/contact.css"/>
</head>
<body style="padding-top: 60px">
<div class="container">
  <div style="text-align:center">
    <h1>Contact Us</h2>
    <p>Got a question? Send us a message and we'll respond as soon as possible.</p>
  </div>
  <div class="row">
    <div class="column">
    </div>
    <div class="column">
      <form action="/action_page.php">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
        <label for="country">Country</label>
        <select id="country" name="country">
          <option value="china">China</option>
          <option value="philippines">Philippines</option>
          <option value="united states">United States</option>
        </select>
        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:100px"></textarea>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</div>
</body>

<?php
include'footer.php';
?>
