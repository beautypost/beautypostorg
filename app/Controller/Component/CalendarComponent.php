<?php  
App::uses('Component', 'Controller');
class CalendarComponent extends Component {
    public function getCalender($year, $month,$NewsObj) {

		//指定した月の最初の曜日を取得
		$sdate = date('w',strtotime($year.$month."01"));

		//月の最初の曜日分を埋める
		$calendar = array();
		for($y=0; $y<$sdate;$y++){
			$calendar[] = array('k'=>0,'v'=>0);
		}

		$alldate = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		$sql = "select DATE(newsdate) as newsdate from news where newsdate between '".$year."-".$month."-01 00:00:00' and '".$year."-".$month."-".$alldate." 23:59:59'";
		$alldata = $NewsObj->query($sql);

		$allcaldate = array();
		foreach($alldata as $data){
			$date = new DateTime($data[0]['newsdate']);
			$allcaldate[$date->format('j')] = $date->format('j');
		}
		ksort($allcaldate);
		//--------------------


		for($x=1;$x<=$alldate;$x++){
			$z=0;
			if(in_array($x,$allcaldate)){
				$day = sprintf('%02d',$x);
				$z = '2014'.$month.$day;


			}
			$calendar[] = array('k'=>$x,'v'=>$z);							
		}

    	
return $calendar;
    }
}
?>