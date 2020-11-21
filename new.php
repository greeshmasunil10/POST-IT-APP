<?php
	require_once('includes/db.php');
	require_once('includes/functions.php');
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$title = prep_input($_POST["title"]);
		$content = prep_input($_POST["content"]);
		$important = prep_input($_POST["important"]);
		$sql = "INSERT INTO notes (title,content,important) VALUES('";
	    $sql .= $title . "','" . $content . "','" . $important . "')";
		echo $sql;
		if(mysqli_query($conn,$sql)){
		echo "data added to table!";
		}
		else {
		echo "data could not be added";
		}

	}
	//echo $title.$content.$important;
	//INSERT INTO notes('title','content','important') VALUES ()
	

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Post-it Notes</title>
        <link rel="stylesheet" href="styles/style.css">
        <script>
          function validateForm() {
            var x = document.forms["myform"]["title"].value;
            if (x == "" ) {
              alert("Title cannot be empty");
              return false;
            }
          }
        </script>
    </head>
    <header>
                Post-it App
    </header>

    <div class="titleDiv">
            <div class="backLink"><a class="nav-link" href="index.php"> Home</a></div>
            <div class="head">New Note</div>
    </div>
    <form name="myform" action="new.php" onsubmit="return validateForm()" method="post" >     

            <span class="label">Title</span>
            <input type="text" name="title" />
            
            <span class="label">Content</span>
            <textarea name="content"></textarea>

            <div class="chkgroup">
                <span class="label-in">Important</span>
                <input  type="hidden" name="important" value="0" />
                <input  type="checkbox" name="important" value="1" />
            </div>
			<p id="demo"></p>
            
        <input type="submit" value="Submit">
</html>

<?php require_once('includes/footer.php'); ?>