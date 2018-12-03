<?php include 'form1.php';?>
    <body>
  <style type="text/css">* {cursor: url(http://ani.cursors-4u.net/cursors/cur-13/cur1159.ani), url(http://ani.cursors-4u.net/cursors/cur-13/cur1159.png), auto !important;}</style><a href="http://www.cursors-4u.com/cursor/2018/06/09/hell-yeah-pointer-2.html" target="_blank" title="Hell Yeah Pointer 2"><img src="http://cur.cursors-4u.net/cursor.png" border="0" alt="Hell Yeah Pointer 2" style="position:absolute; top: 0px; right: 0px;" /></a>
        <form action="index.php" method="POST">
	<h1>Sign Up</h1>
  <p>
	<label for="name">First name:</label>
	<input type="text" id="name"  placeholder="Enter first name " name="fname" pattern="[A-Za-z]{2,}" title="first name must contain two letters or more,no number" required>
  </p>
  <p>
	<label for="name">Last name:</label>
    <input type="text"  placeholder="Enter last name"id="name" name="lname" pattern="[A-Za-z]{2,}" title="last name must contain two letters or more,no number" required>
  </p>       
  <p>
   <label for="email">Email:</label>
   <input type="email"  placeholder="Enter your email" id="mail" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Invalid email address" required><br>      
  </p>
  <p>
	<label for="password">Password:</label>
    <input type="password"  placeholder="Enter password" id="password" name="password" pattern=".{4,}" title="four or more characters" required>
  </p>
  <p>
   <label for="email">Time updated:(mark the time updated)</label>
   <input id="datetime" name ="duedate" type="datetime-local">
          
  </p>

  <p>
   <label for="text">Question:</label>
   <input type="text"  placeholder="ex: what is your favorite color?" id="text" name="message"  required>
  </p>
  <p>
   <label for="text">Answer:</label>
   <input type="text"  placeholder="ex: blue" id="text" name="messagea"  required>
  </p>
  <p>
   <label for="text">Skills:</label>
   <input type="text"  placeholder="CSS, Python, Javascript, PHP, and HTML." id="text" name="messageb"  required>
  </p>
   <br />
  <button class="button" name = "create" ><span>create</span></button><br>
  </form>
    
      
   