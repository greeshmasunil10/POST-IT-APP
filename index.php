<?php
	require_once('includes/db.php');
	$sql = "SELECT * from notes";
	$notes = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Post-it Notes</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>
        <header> 
            Post-it Notes
        </header>
        <div>
                <div>
                    <a class="nav-link" href="new.php">Add a new note</a>
                </div>
				<?php 
					while($note = mysqli_fetch_assoc($notes)){
					
				?>
                    <div class="note">
                        <div class="titleContainer">
                            <span class="nt-title"></span><?php echo $note['title']?>
                            <div class="nt-links">
                                <a class="nt-link" href=<?php echo 'edit.php?id=' . $note['id']; ?>>Edit</a>
                                <a class="nt-link" href=<?php echo 'delete.php?id=' . $note['id']; ?>>Delete</a>
                            </div>                 
                        </div>
                    
                         <div class="nt-content">
							<?php if($note['important']){
							echo "<span class='imp'>IMPORTANT</span>";
							 }
							?>
							 <?php echo $note['content']?>	
						 </div>
                    </div>
					<?php } 
					mysqli_free_results($notes);?>
        </div> 
    </body>
</html>


<?php require_once('includes/footer.php'); ?>