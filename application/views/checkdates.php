<?php

$getDates = $this->jaymitch->getDates();

foreach ($getDates as $dates) {
	$getdate[] = $dates->dateofevent;
}
	echo json_encode($getdate);
?>