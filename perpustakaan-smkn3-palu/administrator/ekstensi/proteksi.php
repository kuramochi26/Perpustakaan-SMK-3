<?php
if (!isset($_SESSION['admin']) OR empty($_SESSION['admin'])) {
	echo "<script>location='index.php'</script>";

}
?>