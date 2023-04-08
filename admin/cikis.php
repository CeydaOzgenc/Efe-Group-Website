<?php ob_start(); ?>
<?php
session_start();
?>
< !DOCTYPE html >
< html >
< body >

<?php
session_unset();
session_destroy();
header("Location:index.php");
?>
<?php ob_end_flush();?>