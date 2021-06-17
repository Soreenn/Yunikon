<?php
ob_start();
$title = "Lost";
?>
<section id="lost"></section>
<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>