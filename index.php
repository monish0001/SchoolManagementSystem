<?php
require_once "utils/function.php";
require_once "utils/event.php";
require_once 'vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('resource');
$twig = new Twig_Environment($loader);
$uri = $_SERVER['REQUEST_URI'];
$uri = explode('/', $uri);
$pageFound=false;
if(empty($uri[1]))
{ updateCount();
  $pageFound=true;
  $event = new Event;
  $events = $event->getallNotification();
  echo $twig->render('home.html', array('title' => 'HomePage','events'=>$events));
}
elseif($uri[1]=='contact')
{
  $pageFound=true;
  echo $twig->render('contact.html', array('title' => 'Contact Us'));

}elseif(strstr($uri[1], 'showNotification'))
{
			$pageFound = true;
			$showNotification = $_GET['id'];
			$event = new Event;
			$events=$event->getallNotificationbyid($showNotification);
			echo $twig->render('/web/showNotification.html',array('title'=>'Notice Board','events'=>$events));
}
elseif($uri[1]=='studentAchievement')
{
			$pageFound = true;
			$event = new Event;
			$events = $event->getstudentAchievement();
			echo $twig->render('/web/showstudentAchievement.html',array('title'=>'Student Achievement','events'=>$events));
}
elseif($uri[1]=='teacherAchievement')
{
			$pageFound = true;
			$event = new Event;
			$events = $event->getteacherAchievement();
			echo $twig->render('/web/showteacherAchievement.html',array('title'=>'Teacher Achievement','events'=>$events));
}
elseif ($uri[1] == 'gallery')
 {
	$pageFound=true;
	$event = new Event;
	$events = $event->getallgallaryImage();
  	echo $twig->render('gallery.html', array('title' => 'Gallery','events'=>$events));
 
 } 
elseif ($uri[1]=='facilities' )
{
	$pageFound=true;
	if (empty($uri[2]))
	{
	$pageFound=true;
	echo $twig->render('facilities.html',array('title' => 'Facilities'));
	}
	elseif($uri[2]=='library')
	{
	$pageFound=true;
	$event = new Event;
	$events = $event->getlibraryTeacher();
	echo $twig->render('/web/facilities/library.html',array('title' =>'Library','events'=>$events));
	}
	elseif($uri[2]=='sports')
	{
	$pageFound=true;
	$event = new Event;
	$events = $event->getSports();
	echo $twig->render('/web/facilities/sports.html',array('title' =>'Sports' ,'events' => $events));
	}
	elseif($uri[2]=='residence')
	{
	$pageFound=true;
	echo $twig->render('/web/facilities/residence.html',array('title' =>'Residence'));
	}
	elseif($uri[2]=='medical')
	{
	$pageFound=true;
	echo $twig->render('/web/facilities/medical.html',array('title' =>'Medical'));
	}
	elseif($uri[2]=='chapel')
	{
	$pageFound=true;
	echo $twig->render('/web/facilities/chapel.html',array('title' =>'Chapel'));
	}
	elseif($uri[2]=='cafitArea')
	{
	$pageFound=true;
	echo $twig->render('/web/facilities/cafitArea.html',array('title' =>'Cafit Area'));
	}
}
 elseif ($uri[1]=='administration') {
 	$pageFound=true;
 	if (empty($uri[2]))
	{
 	$pageFound=true;
 	echo $twig->render('administration.html',array('title' =>'Administration'));
	}
	elseif($uri[2]=='principal')
	{
	$pageFound=true;
	$event = new Event;
	$events = $event->getprincipalDetail();
	echo $twig->render('/web/administration/principal.html',array('title' =>'Principal','events'=>$events));
	}
	elseif($uri[2]=='governingbody')
	{
	$pageFound=true;
	$event = new Event;
	$events = $event->getgoverningBody();
	echo $twig->render('/web/administration/governingbody.html',array('title' =>'Governing Body','events'=>$events));
	}
	elseif($uri[2]=='seniourtutor')
	{
	$pageFound=true;
	$event = new Event;
	$events = $event->getSeniourtutor();
	echo $twig->render('/web/administration/seniourtutor.html',array('title' =>'Seniour Tutor','events'=>$events));
	}
	elseif($uri[2]=='staffadvisor')
	{
	$pageFound=true;
	$event = new Event;
	$events = $event->getstaffadvisor();
	echo $twig->render('/web/administration/staffadvisors.html',array('title' =>'Staff Advisor','events'=>$events));
	}
	elseif($uri[2]=='asministrativestaff')
	{
	$pageFound=true;
	$event = new Event;
	$events = $event->getasministrativestaff();
	echo $twig->render('/web/administration/asministrativestaff.html',array('title' =>'Administrative Staff','events'=>$events));
	}
	elseif($uri[2]=='publicInformationofficer')
	{
	$pageFound=true;
	$event = new Event;
	$events = $event->getPIO();
	echo $twig->render('/web/administration/publicInformationofficer.html',array('title' =>' P I O ','events'=>$events));
	}
 	
 }
 elseif($uri[1]=='academices')
 {	$pageFound=true;
	if (empty($uri[2]))
	{
 	$pageFound=true;	
 	echo $twig->render('academices.html',array('title' =>'Academics'));
	}
	elseif($uri[2]=='syllabi')
	{
	$pageFound=true;
	echo $twig->render('/web/academics/syllabi.html',array('title' =>'Syllabi'));
	}
	elseif($uri[2]=='timetable')
	{
	$pageFound=true;
	echo $twig->render('/web/academics/timetable.html',array('title' =>'Time Table'));
	}
	elseif($uri[2]=='prizeandawards')
	{
	$pageFound=true;
	$event = new Event;
	$events = $event->getPrizeandawards();
	echo $twig->render('/web/academics/prizeandawards.html',array('title' =>'Prize and Awards','events'=>$events));
	}

 }























elseif($uri[1]=='adminPanel')
{
	if (empty($uri[2]))
	{	if (!auth_user()) {
		$errorMsg="invalid userName or Password";
		goto notFound;
	}
	$pageFound=true;
	$count = getCount();
	echo $twig->render('dashboard/dash.html',array('title' => 'adminPanel','count'=>$count));
	}
	elseif ($uri[2]=='Notification') 
	{
		if (empty($uri[3]))
		{
			$pageFound=true;
			$event = new Event;
			$events = $event->getallNotification();
			echo $twig->render('dashboard/Notification.html',array('title' => 'addNotification','events'=>$events));
		}
		elseif(strstr($uri[3], 'deleteNotification'))
		{	$pageFound = true;
			$notificationid = $_GET['id'];
			$event = new Event;
			if ($event->deleteNotification($notificationid));
			{
			header("Location: /adminPanel/Notification");
			$event = null;
			exit;
			}
		}
	}
	else if ($uri[2]=='manageGallery')
	{	
		if (empty($uri[3]))
		{

			$pageFound=true;
			$event = new Event;
			$events = $event->getallgallaryImage();
			echo $twig->render('dashboard/manageGallery.html',array('title' => 'Manage Gallery','events'=>$events));
		}
		elseif(strstr($uri[3], 'deletegalleryImage'))
		{	$pageFound = true;
			$imageid = $_GET['id'];
			$event = new Event;
			if ($event->deletegalleryImage($imageid));
			{
				header("Location: /adminPanel/manageGallery");
				$event = null;
				exit;
			}
		}
	}
	else if ($uri[2]=='teacherAchievement')
	{	
		if (empty($uri[3]))
		{

			$pageFound=true;
			$event = new Event;
			$events = $event->getteacherAchievement();
			echo $twig->render('dashboard/addteacherAchievement.html',array('title' => 'Teacher Achievement','events'=>$events));
		}
		elseif(strstr($uri[3], 'daleteAchievement'))
		{	$pageFound = true;
			$Achievementid = $_GET['id'];
			$event = new Event;
			if ($event->deleteteacherAchievement($Achievementid));
			{
				header("Location: /adminPanel/teacherAchievement");
				$event = null;
				exit;
			}
		}
	}
	else if ($uri[2]=='studentAchievement')
	{	
		if (empty($uri[3]))
		{

			$pageFound=true;
			$event = new Event;
			$events = $event->getstudentAchievement();
			echo $twig->render('dashboard/addstudentAchievement.html',array('title' => 'Student Achievement','events'=>$events));
		}
		elseif(strstr($uri[3], 'daleteAchievement'))
		{	$pageFound = true;
			$achievementId = $_GET['id'];
			$event = new Event;
			if ($event->deletestudentAchievement($achievementId));
			{
				header("Location: /adminPanel/studentAchievement");
				$event = null;
				exit;
			}
		}
	}else if ($uri[2]=='academices')
	{	
		if (empty($uri[3]))
		{

		$pageFound=true;
		echo $twig->render('dashboard/academicesdash.html',array('title' => ' Manage Academices'));
		}
		
		elseif($uri[3]=='syllabi')
		{
		$pageFound=true;
		echo $twig->render('/dashboard/academics/syllabi.html',array('title' =>'Manage Syllabi'));
		}
		elseif($uri[3]=='timetable')
		{
		$pageFound=true;
		echo $twig->render('/dashboard/academics/timetable.html',array('title' =>'Manage Time Table'));
		}
		elseif($uri[3]=='prizeandawards')
		{
		if (empty($uri[4]))
		{
		$pageFound=true;
		$event = new Event;
		$events = $event->getPrizeandawards();
		echo $twig->render('/dashboard/academics/prizeandawards.html',array('title' =>' Manage Prize & Awards','events'=>$events));
		}elseif(strstr($uri[4], 'daleteprizeandawards'))
		{	
			$pageFound = true;
			$id = $_GET['id'];
			$event = new Event;
			if ($event->deleteprizeandawards($id));
			{
				header("Location: /adminPanel/academices/prizeandawards");
				$event = null;
				exit;
			}

		}
		}
	}else if ($uri[2]=='facilities')
	{	
		if (empty($uri[3]))
		{

		$pageFound=true;
		echo $twig->render('dashboard/facilitiesdash.html',array('title' => ' Manage Facilities'));
		}elseif($uri[3]=='library')
		{
		if (empty($uri[4]))
		{
		$pageFound=true;
		$event = new Event;
		$events = $event->getlibraryTeacher();
		echo $twig->render('/dashboard/facilities/library.html',array('title' =>'Manage Library', 'events'=>$events));
		}elseif(strstr($uri[4], 'deleteteacher'))
		{	
			$pageFound = true;
			$teacherid = $_GET['id'];
			$event = new Event;
			if ($event->deletelibraryTeacher($teacherid));
			{
				header("Location: /adminPanel/facilities/library");
				$event = null;
				exit;
			}

		}
		}
		elseif($uri[3]=='sports')
		{	
		if (empty($uri[4]))
		{
		$pageFound=true;
		$event = new Event;
		$events = $event->getSports();
		echo $twig->render('/dashboard/facilities/sports.html',array('title' =>'Manage Sports','events'=> $events));
		}
		elseif(strstr($uri[4], 'deleteSport'))
		{	
			$pageFound = true;
			$sportid = $_GET['id'];
			$event = new Event;
			if ($event->deleteSport($sportid));
			{
				header("Location: /adminPanel/facilities/sports");
				$event = null;
				exit;
			}

		}
		}
		elseif($uri[3]=='residence')
		{
		$pageFound=true;
		echo $twig->render('/dashboard/facilities/residence.html',array('title' =>'Manage Residence'));
		}
		elseif($uri[3]=='medical')
		{
		$pageFound=true;
		echo $twig->render('/dashboard/facilities/medical.html',array('title' =>'Manage Medical'));
		}
		elseif($uri[3]=='chapel')
		{
		$pageFound=true;
		echo $twig->render('/dashboard/facilities/chapel.html',array('title' =>'Manage Chapel'));
		}
		elseif($uri[3]=='cafitArea')
		{
		$pageFound=true;
		echo $twig->render('/dashboard/facilities/cafitArea.html',array('title' =>'Manage Cafit Area'));
		}
	}else if ($uri[2]=='administration')
	{	
		if (empty($uri[3]))
		{

		$pageFound=true;

		echo $twig->render('dashboard/administrationdash.html',array('title' => ' Manage Administration'));
		}elseif($uri[3]=='principal')
		{
		$pageFound=true;
		$event = new Event;
		$events = $event->getprincipalDetail();
		echo $twig->render('/dashboard/administration/principal.html',array('title' =>'Manage Principal','events'=>$events));
		}
		elseif($uri[3]=='governingbody')
		{
		if (empty($uri[4]))
		{
		$pageFound=true;
		$event = new Event;
		$events = $event->getgoverningBody();
		echo $twig->render('/dashboard/administration/governingbody.html',array('title' =>'Governing Body','events'=>$events));
		}
		elseif(strstr($uri[4], 'deletegoverningbody'))
		{	
			$pageFound = true;
			$governingbodyid = $_GET['id'];
			$event = new Event;
			if ($event->deletegoverningBody($governingbodyid));
			{
				header("Location: /adminPanel/administration/governingbody");
				$event = null;
				exit;
			}

		}
		}
		elseif($uri[3]=='seniourtutor')
		{
		if (empty($uri[4]))
		{
		$pageFound=true;
		$event = new Event;
		$events = $event->getSeniourtutor();
		echo $twig->render('/dashboard/administration/seniourtutor.html',array('title' =>'Senior Tutor','events'=>$events));
		}elseif(strstr($uri[4], 'deleteseniourtutor'))
		{	
			$pageFound = true;
			$staffid = $_GET['id'];
			$event = new Event;
			if ($event->deleteSeniourtutor($staffid));
			{
				header("Location: /adminPanel/administration/seniourtutor");
				$event = null;
				exit;
			}

		}
		}
		elseif($uri[3]=='staffadvisor')
		{
		if (empty($uri[4]))
		{
		$pageFound=true;
		$event = new Event;
		$events = $event->getstaffadvisor();
		echo $twig->render('/dashboard/administration/staffadvisors.html',array('title' =>'Staff Advisor','events'=>$events));
		}elseif(strstr($uri[4], 'deletestaffadvisor'))
		{	
			$pageFound = true;
			$staffid = $_GET['id'];
			$event = new Event;
			if ($event->deletestaffadvisor($staffid));
			{
				header("Location: /adminPanel/administration/staffadvisor");
				$event = null;
				exit;
			}

		}
		}
		elseif($uri[3]=='asministrativestaff')
		{
		if (empty($uri[4]))
		{
		$pageFound=true;
		$event = new Event;
		$events = $event->getasministrativestaff();
		echo $twig->render('/dashboard/administration/asministrativestaff.html',array('title' =>'Administrative Staff','events'=>$events));
		}
		elseif(strstr($uri[4], 'deleteasministrativestaff'))
		{	
			$pageFound = true;
			$staffid = $_GET['id'];
			$event = new Event;
			if ($event->deleteasministrativestaff($staffid));
			{
				header("Location: /adminPanel/administration/asministrativestaff");
				$event = null;
				exit;
			}

		}
		}
		elseif($uri[3]=='publicInformationofficer')
		{
		if (empty($uri[4]))
		{
		$pageFound=true;
		$event = new Event;
		$events = $event->getPIO();
		echo $twig->render('/dashboard/administration/publicInformationofficer.html',array('title' =>' P I O ','events'=>$events));
		}elseif(strstr($uri[4], 'deletepublicInformationofficer'))
		{	
			$pageFound = true;
			$staffid = $_GET['id'];
			$event = new Event;
			if ($event->PIO($staffid));
			{
				header("Location: /adminPanel/administration/publicInformationofficer");
				$event = null;
				exit;
			}

		}
		}
	}
}
notFound:if(!$pageFound){
	echo $twig->render('error.html', array('title' => '404 Error' ,'error' => $errorMsg));
}
?>