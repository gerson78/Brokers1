<?php include_once("analyticstracking.php") ?>
<?php
SESSION_START();

SESSION_DESTROY();

echo 'Ha terminado la session <p> <a href="index.php">index</a></p>';
?>
<SCRIPT LANGUAJE="javascript">
location.href = "login.php";
</SCRIPT>
