<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Mad Libs</title>
  <link rel="stylesheet" type="text/css" href="project1Style.css" />
</head>
<body>
  <div id=headerImage">
    <img alt="Mad Libs" src="madLibPageHeader50.jpg" />
  </div>
  
  <p>Build your own Silly Story!</p>
  
<?php
    require_once('MadLibs.php');
    
    /*Application that will create a madLib story for user*/

    /*Form entry*/
    if ($output_form = true) {
    	?>
    	
    	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    		<label class="formLabel" for="noun">Enter a noun:</label><br />
    		<input class="formInput" id="noun" name="noun" type="text" value="<?php echo $noun; ?>"/><br /> 
    		<label class="formLabel" for="verb">Enter a verb:</label><br />
    		<input class="formInput" id="verb" name="verb" type="text" value="<?php echo $verb; ?>"/><br />
    		<label class="formLabel" for="adjective">Enter an adjective:</label><br />
    		<input class="formInput" id="adjective" name="adjective" type="text" value="<?php echo $adjective; ?>"/><br />
    		<label class="formLabel" for="adverb">Enter an adverb:</label><br />
    		<input class="formInput" id="adverb" name="adverb" type="text" value="<?php echo $adverb; ?>"/><br />
    		
    		<input class="button" type="submit" name="submit" value="Submit" />
    	</form>
    	
    <?php
    }
    
    /*Print mad lib story or error message if field is not populated*/
    if (isset($_POST['submit'])) {
    	$noun = $_POST['noun'];
    	$verb = $_POST['verb'];
    	$adjective = $_POST['adjective'];
    	$adverb = $_POST['adverb'];
    	$output_form = false;
    	
    	if (empty($noun) && empty($verb) && empty($adjective) && empty($adverb)) {
    		echo 'You must enter a noun, verb, adjective and adverb. <br />';
    		$output_form = true;	
    	} elseif (empty($noun) && !empty($verb) && !empty($adjective) && !empty($adverb)) {
    		echo 'You must enter a noun. <br />';
    		$output_form = true;
    	} elseif (!empty($noun) && empty($verb) && !empty($adjective) && !empty($adverb)) {
    		echo 'You must enter a verb. <br />';
    		$output_form = true;
    	} elseif (!empty($noun) && !empty($verb) && empty($adjective) && !empty($adverb)) {
    		echo 'You must enter an adjective. <br />';
    		$output_form = true;
    	} elseif (!empty($noun) && !empty($verb) && !empty($adjective) && empty($adverb)) {
    		echo 'You must enter an adverb. <br />';
    		$output_form = true;
    	} elseif (empty($noun) && empty($verb) && !empty($adjective) && !empty($adverb)) {
    		echo 'You must enter a noun and verb';
    		$output_form = true;
    	} elseif (empty($noun) && !empty($verb) && empty($adjective) && !empty($adverb)) {
    		echo 'You must enter a noun and adjective';
    		$output_form = true;
    	} elseif (empty($noun) && !empty($verb) && !empty($adjective) && empty($adverb)) {
    		echo 'You must enter a noun and adverb';
    		$output_form = true;
    	} elseif (!empty($noun) && empty($verb) && empty($adjective) && !empty($adverb)) {
    		echo 'You must enter a verb and adjective';
    		$output_form = true;
    	} elseif (!empty($noun) && empty($verb) && !empty($adjective) && empty($adverb)) {
    		echo 'You must enter a verb and adverb';
    		$output_form = true;
    	} elseif (!empty($noun) && !empty($verb) && empty($adjective) && empty($adverb)) {
    		echo 'You must enter an adjective and adverb. <br />';
    		$output_form = true;
    	} elseif (!empty($noun) && empty($verb) && empty($adjective) && empty($adverb)) {
    		echo 'You must enter a verb, adjective and adverb. <br />';
    		$output_form = true;	
    	} elseif (empty($noun) && !empty($verb) && empty($adjective) && empty($adverb)) {
    		echo 'You must enter a noun, adjective and adverb. <br />';
    		$output_form = true;
    	} elseif (empty($noun) && empty($verb) && !empty($adjective) && empty($adverb)) {
    		echo 'You must enter a noun, verb, and adverb. <br />';
    		$output_form = true;
    	} elseif (empty($noun) && empty($verb) && empty($adjective) && !empty($adverb)) {
    		echo 'You must enter a noun, verb, and adjective. <br />';
    		$output_form = true;
    	} elseif (!empty($noun) && !empty($verb) && !empty($adjective) && !empty($adverb)) {
    	
    	    $user_Story = new MadLibs();
    	    
    	    $user_Story->setNoun($noun);
    	    $user_Story->setVerb($verb);
    	    $user_Story->setAdjective($adjective);
    	    $user_Story->setAdverb($adverb);
    	    $user_Story->setStory("The $noun $verb over the $adjective snow pile $adverb. \n");
    	    
    	    $user_Story->addComponents();
    	    $result = $user_Story->userStories();
    	    $user_Story->displayStory($result);
        } else {
            $output_form = true;
        }
     }
   
    ?>
  
</body>
</html>
