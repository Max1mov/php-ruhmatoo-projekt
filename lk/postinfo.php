
<?php
	$product_name = $product_year = $product_problem = $product_name_error = $product_year_error = $product_problem_error = "";
	
	// et ei ole tühjad
	// clean input
	// salvestate
	
	if(isset($_POST["create1"])){
		if ( empty($_POST["product_name"]) ) {
			$product_name_error = "See väli on kohustuslik";
		}else{
			$product_name = cleanInput($_POST["product_name"]);
		}
		if ( empty($_POST["product_year"]) ) {
			$product_year_error = "See väli on kohustuslik";
		} else {
			$product_year = cleanInput($_POST["product_year"]);
		}
		if ( empty($_POST["product_problem"]) ) {
			$product_problem_error = "See väli on kohustuslik";
		} else {
			$product_problem = cleanInput($_POST["product_promlem"]);
		}
		
		if(	$product_name_error == "" && $product_year_error == "" && $product_problem_error ==  ""){
			
			// functions.php failis käivina funktsiooni
			// msq on message funktsioonist mis tagasi saadame
			$msg3 = createProduct($product_name, $product_year, $product_problem);
			
			if($msg3 != ""){
				//salvestamine õnnestus
				// teen tühjaks input value'd
	            $product_name = "";
				$product_year = "";
				$product_problem = "";
								
				echo $msg3;
				
			}
			
		}
    } // create if end
	
	//function cleanInput($data) {
		//$data = trim($data);
		//$data = stripslashes($data);
		//$data = htmlspecialchars($data);
		//return $data;
	//}
	
	
	
	
	$feedback_name = $feedback_name_error = "";
	
	// et ei ole tühjad
	// clean input
	// salvestate
	
	if(isset($_POST["create2"])){
		if ( empty($_POST["feedback_name"]) ) {
			$feedback_name_error = "See väli on kohustuslik";
		}else{
			$feedback_name = cleanInput($_POST["feedback_name"]);
		}
		
		if(	$feedback_name_error == "" ){
			
			// functions.php failis käivina funktsiooni
			// msq on message funktsioonist mis tagasi saadame
			$msg4 = createFeedback($feedback_name);
			
			if($msg4 != ""){
				//salvestamine õnnestus
				// teen tühjaks input value'd
				$feedback_name = "";
								
				echo $msg4;
				
			}
			
		}
    } // create if end
	
	//function cleanInput($data) {
		//$data = trim($data);
		//$data = stripslashes($data);
		//$data = htmlspecialchars($data);
		//return $data;
	  //}
	
	
	
	
	
	
	$comment_name = $comment_name_error = "";
	
	// et ei ole tühjad
	// clean input
	// salvestate
	
	if(isset($_POST["create3"])){
		if ( empty($_POST["comment_name"]) ) {
			$comment_name_error = "See väli on kohustuslik";
		}else{
			$comment_name = cleanInput($_POST["comment_name"]);
		}
		
		if(	$comment_name_error == "" ){
			
			// functions.php failis käivina funktsiooni
			// msq on message funktsioonist mis tagasi saadame
			$msg5 = createComment($comment_name);
			
			if($msg5 != ""){
				//salvestamine õnnestus
				// teen tühjaks input value'd
				$comment_name = "";
								
				echo $msg5;
				
			}
			
		}
    } // create if end
	
	
	?>
 
  
   <h2>Lisa probleemi</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
  	<label for="product_name" >Nimetus</label><br>
	<input id="product_name" name="product_name" type="text" value="<?=$product_name; ?>"> <?=$product_name_error; ?><br><br>
  	<label>Aasta</label><br>
	<input name="product_year" type="text" value="<?=$product_year; ?>"> <?=$product_year_error; ?><br><br>
	<label>Probleem</label><br>
	<input name="product_problem" type="text" value="<?=$product_problem; ?>"> <?=$product_problem_error; ?><br><br>
  	<input type="submit" name="create1" value="Salvesta">
  </form>
  
  
     <h2>Lisa tagasisidet</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
  	<label for="feedback_name" >Tagasiside</label><br>
	<input id="feedback_name" name="feedback_name" type="text" value="<?=$feedback_name; ?>"> <?=$feedback_name_error; ?><br><br>
    <input type="submit" name="create2" value="Salvesta">
  </form>
  
  
  
      <h2>Lisa kommentaare</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
  	<label for="comment_name" >Kommentaar</label><br>
	<input id="comment_name" name="comment_name" type="text" value="<?=$comment_name; ?>"> <?=$comment_name_error; ?><br><br>
    <input type="submit" name="create3" value="Salvesta">
  </form>
  
  