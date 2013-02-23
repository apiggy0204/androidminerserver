<?php

	require('rb.php');
	R::setup('mysql:host=localhost;dbname=netdb','netdb','netdb603429');

	$deviceId = $_POST["deviceId"];
	$time = $_POST["time"];	
	$recordFreq = $_POST["recordFreq"];
	$batStatus = $_POST["batStatus"];
	$batPct = $_POST["batPct"];
	$gpsStatus = $_POST["gpsStatus"];
	$networkStatus= $_POST["networkStatus"];
	$locAcc= $_POST["locAcc"];
	$locProvider= $_POST["locProvider"];
	$lat = $_POST["lat"];
	$lon = $_POST["lon"];
	$speed = $_POST["speed"];
	$mobileState = $_POST["mobileState"];
	$wifiState = $_POST["wifiState"];
	$processCurrentPackage = $_POST["processCurrentPackage"];
	$isLowMemory = $_POST["isLowMemory"];	
	
	$mobileLog = R::findOne('mobilelog', ' deviceId = :deviceId AND time = :time ', 
		array(
			':deviceId' => $deviceId,
			":time" => $time
		)
	);
	if( $mobileLog == null){
		$mobileLog = R::dispense('mobilelog');
	}	
	
	$mobileLog->deviceId = $deviceId;
	$mobileLog->time = $time;
	$mobileLog->recordFreq = $recordFreq;
	$mobileLog->batStatus = $batStatus;
	$mobileLog->batPct = $batPct;
	$mobileLog->gpsStatus = $gpsStatus;
	$mobileLog->networkStatus = $networkStatus;
	$mobileLog->locAcc = $locAcc;
	$mobileLog->locProvider = $locProvider;
	$mobileLog->lat = $lat;
	$mobileLog->lon = $lon;
	$mobileLog->speed = $speed;
	$mobileLog->mobileState = $mobileState;
	$mobileLog->wifiState = $wifiState;
	$mobileLog->processCurrentPackage = $processCurrentPackage;
	$mobileLog->isLowMemory = $isLowMemory;
	
	$id = R::store($mobileLog);
	
?>