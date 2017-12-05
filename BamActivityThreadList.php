<?php
	require_once("BamSessionHelper.php");
	require_once("Dao.php");
	session_start();
  
	$_SESSION['previousPage'] = "BamActivityThreadList.php";
	$_SESSION['Table'] = $_GET['Activity'];
	$_SESSION['subTopic'] = $_GET['List'];
	$_SESSION['Level'] = 4;
	
	$dao = new Dao();
	$result = $dao->getAbbr($_SESSION['Table']);
	$_SESSION['Abbr'] = $result[0];
	
	require_once('BamHeader.php');
	require_once('BamForumNavBar.php');
	
	if($_SESSION['user'] !== "Guest"){
?>
		<section class = "CreateThread">
			<h4>
				<a href="BamCreateThread.php">Create Thread</a>
			</h4>
		</section>
<?php } ?>
	
		<section class = "Threads">
			<ul>
				<?php $result = $dao->getMainThreads();
					foreach($result as $row) {
						$Thread = $row['thread'];
					?>
						<li>
							<a href="BamPosts.php?Thread=<?php echo $Thread ?>&Type=Main"><?php echo $Thread?></a>
						</li>	
				<?php }
					$result = $dao->getThreads($_SESSION['Abbr'], $_SESSION['subTopic']);
					foreach($result as $row) {
						$Thread = $row['thread'];
				?>
						<li>
							<a href="BamPosts.php?Thread=<?php echo $Thread ?>&Type=Normal"><?php echo $Thread?></a>
						</li>
				<?php }	?>
			</ul>
		</section>
<?php
    require_once('BamFooter.php');
?>