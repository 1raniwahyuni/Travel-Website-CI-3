<?php
require_once('v_head.php');
require_once('v_header.php');
require_once('v_nav.php');
if ($isi) {
    $this->load->view($isi);
}
require_once('v_footer.php');
?>
