<?php
	require_once("Dao.php");
	require_once("BamSessionHelper.php");
	session_start();
  
	$_SESSION['previousPage'] = "BamMajor.php";
	$_SESSION['Topic'] = $_GET['Major'];
	$_SESSION['Level'] = 3;
	
	$dao = new Dao();
	$result = $dao->getAbbr($_SESSION['Topic']);
	$_SESSION['Abbr'] = $result[0];
	
	require_once('BamHeader.php');
	require_once('BamForumNavBar.php');
?>	
		<section class="Topics">
			<ul>
				<li><a href="BamMajorThreadList.php?Major=<?php echo $_SESSION['Topic'] ?>&List=100s">100s</a></li>
				<li><a href="BamMajorThreadList.php?Major=<?php echo $_SESSION['Topic'] ?>&List=200s">200s</a></li>
				<li><a href="BamMajorThreadList.php?Major=<?php echo $_SESSION['Topic'] ?>&List=300s">300s</a></li>
				<li><a href="BamMajorThreadList.php?Major=<?php echo $_SESSION['Topic'] ?>&List=400s">400s</a></li>
				<li><a href="BamMajorThreadList.php?Major=<?php echo $_SESSION['Topic'] ?>&List=Project Ideas">Project Ideas</a></li>
				<li><a href="BamMajorThreadList.php?Major=<?php echo $_SESSION['Topic'] ?>&List=Other">Other</a></li>
			</ul>
		</section>
<?php
    require_once('BamFooter.php');
?>