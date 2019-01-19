<?php
require_once('auth.php');
?>


<?php
	$amici = array();
	try{
		$db = new PDO("sqlite:./db/sujetten.db");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		$sql = 'SELECT * FROM Sujetten ORDER BY score';
		$stmt = $db->query($sql);
		while ($row = $stmt->fetch()){
			$amici[] = $row;
		}
	}catch(PDOException $e){
		echo $e->getMessage();
	}
?>

<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
    	<link rel="stylesheet" type="text/css" href="./style/header.css">
    	<link rel="stylesheet" type="text/css" href="./style/scores.css">
    	<title>En dan maar hopen dat dit werkt</title>
    </head>
    <body>

    	<?php include 'header.php'; ?>

    	<div id="body">
    		<div id="entryContainer">
    			<div class="entry">
    				<div class="rank entryText">
    					1.
    				</div>
    				<div class="name entryText">
    					M.O.C.C.A. 2
    				</div>
    				<div class="score entryText">
    					Verdrietig
    				</div>
    			</div>
    			<?php
    				foreach($amici as $i => $amice){
    					echo '
    					<div class="entry">
		    				<div class="rank entryText">
			    				' . ($i + 2) . '.
			    			</div>
			    			<div class="name entryText">
			    				' . $amice["cognomen"] . '
			    			</div>
			    			<div class="score entryText">
			    				' . $amice["score"] . '
			    			</div>
		    			</div>';
    				}
    			?>
    		</div>
    	</div>
    </body>
</html>

