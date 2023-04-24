<?php
		$conn = mysqli_connect("localhost", "root", 7665, "coledu");
        if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		// mysqli_close($conn);
?>
