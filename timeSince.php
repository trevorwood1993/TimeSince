function timeSince($since,$switchArray,$highestValueOnly) {
	// $since = seconds
	// $switchArray = values to return...in correct order
	// $highestValueOnly // 0,undefined off // 1 = on
		
	$secondsInYear 		= 31536000;//365 days
	$secondsInMonth 	= 2592000;//30 days
	$secondsInWeek 		= 604800;//7 days
	$secondsInDay 		= 86400;//24 hours
	$secondsInHour 		= 3600;//60 minutes
	$secondsInMinute 	= 60;//60 seconds
	$secondsInSecond	= 1;//1 second

	if($switchArray == "" || $switchArray == 0){
		// Will auto load this array if switchArray is empty
		$switchArray = array('year','month','week','day','hour','minute','second'); 
	}				

	$lastItemInArray = end($switchArray);
	$data = array();
	$dataText = "";

	foreach ($switchArray as $value) {
		switch ($value) {
			case 'second': $secondAmount = $secondsInSecond; break;
			case 'minute': $secondAmount = $secondsInMinute; break;
			case 'hour': $secondAmount = $secondsInHour; break;
			case 'day': $secondAmount = $secondsInDay; break;
			case 'week': $secondAmount = $secondsInWeek; break;
			case 'month': $secondAmount = $secondsInMonth; break;
			case 'year': $secondAmount = $secondsInYear; break;
			default: echo 'secondAmount not found. Break'; break;
		}

		//This is really the core of the code, the rest is just preparing
		$data[$value] = floor($since/$secondAmount);
		$since = $since - ($data[$value]*$secondAmount);

		if($data[$value] >= 1){
			$dataText .= number_format($data[$value])." ".$value;
			if($data[$value] >= 2){
				$dataText .= 's';
			}
			if($highestValueOnly == 1){
				break;
			}	
			if($value != $lastItemInArray && $since != 0){
				$dataText .= ', ';
			}
		}	
				
	}

	return $dataText;
}
