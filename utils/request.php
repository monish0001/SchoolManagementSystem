 <?php
use PHPMailer\PHPMailer\PHPMailer;
require '../vendor/autoload.php';
require_once "db.php";
require_once "function.php";
require_once "event.php";

if (isset($_POST['query'])) 
{
 	$userMail=$_POST['userMail'];
 	$userName=$_POST['userName'];
 	$Message=$_POST['message'];
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->isHTML(false);
	$mail->SMTPDebug = 0;
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "mohdmonishksg@gmail.com";
	$mail->Password = "monish123@";
	$mail->setFrom('mohdmonishksg@gmail.com');
	$mail->addAddress($userMail,$userName);
	$mail->Subject = 'Email Coming From Php Project';
	$mail->Body = 'Name : ' . $userName . " \n";
	$mail->Body = $mail->Body . 'Email : ' . $userMail . " \n\n";
	$mail->Body = $mail->Body . 'Message : ' . $Message;
	if (!$mail->send()) 
	{
	    echo "<h1> Error Message: " . $mail->ErrorInfo."</h1>";
	    header("refresh:5; url=/");
	}
	else
	{
	    echo "<h1>Email hes been succesfully sent! we will contact soon. Thanku! </h1>	";
	    header("Location: /");
	}
}
elseif(isset($_POST['addNotification']))
{

	if (!empty($_POST['notificationDate'])) 
	{
		$notificationDate=filterData($_POST['notificationDate']);
	}
	if (!empty($_POST['notificationTag'])) 
	{
		$notificationTag=filterData($_POST['notificationTag']);
	}
	if (!empty($_POST['notificationDescription'])) 
	{
		$notificationDescription=filterData($_POST['notificationDescription']);
	}
	if (!empty($_POST['notificationImage'])) 
	{
		$notificationImage=$_FILES['notificationImage']['name'];
		$f_tmp=$_FILES['notificationImage']['tmp_name'];
		$f_size=$_FILES['notificationImage']['size'];
		$f_extension=explode('.', $notificationImage);
		$f_extension=strtolower(end($f_extension));
		$f_filename=uniqid().'.'.$f_extension;
		$store="uploads/".$f_filename;
		if ($f_extension=='jpg' || $f_extension=='png' || $f_extension=='gif') 
		{
		  	if ($f_size>=1000000)
		  	{
		    	echo "File Size Should Be 1 MB. !";
		  	}
		  	else
		  	{ if (move_uploaded_file($f_tmp, $store)) {} }
		}
		else{ echo "image must be jpg,png or gif only !";}
	}

	$event = new Event;
	if($event->addNotification($notificationDate,$notificationTag,$notificationDescription,$store))
	{	
		$event = null;
	header("Location: /adminPanel/Notification");
		exit;
	}
}elseif(isset($_POST['addgallaryImage']))
{

	if (!empty($_POST['imageDescription'])) 
	{
		$imageDescription=filterData($_POST['imageDescription']);
	}
	if (!empty($_POST['galleryImage'])) 
	{
		$galleryImage=$_FILES['galleryImage']['name'];
		$f_tmp=$_FILES['galleryImage']['tmp_name'];
		$f_size=$_FILES['galleryImage']['size'];
		$f_extension=explode('.', $galleryImage);
		$f_extension=strtolower(end($f_extension));
		$f_filename=uniqid().'.'.$f_extension;
		$store="uploads/".$f_filename;
		if ($f_extension=='jpg' || $f_extension=='png' || $f_extension=='gif') 
		{
		  	if ($f_size>=1000000)
		  	{
		    	echo "File Size Should Be 1 MB. !";
		  	}
		  	else
		  	{ if (move_uploaded_file($f_tmp, $store)) {} }
		}
		else{ echo "image must be jpg,png or gif only !";}
	}

	$event = new Event;
	if($event->addgallaryImage($imageDescription,$store))
	{	$event = null;

		header("Location: /adminPanel/manageGallery");
		exit;
	}
}elseif(isset($_POST['teacherAchievement']))
{
	if (!empty($_POST['teacherName'])) 
	{
		$teacherName=filterData($_POST['teacherName']);
	}
	if (!empty($_POST['achievementDescription'])) 
	{
		$achievementDescription=filterData($_POST['achievementDescription']);
	}
	if (!empty($_POST['teacherAchievementimg'])) 
	{
		$teacherAchievementimg=$_FILES['teacherAchievementimg']['name'];
		$f_tmp=$_FILES['teacherAchievementimg']['tmp_name'];
		$f_size=$_FILES['teacherAchievementimg']['size'];
		$f_extension=explode('.', $teacherAchievementimg);
		$f_extension=strtolower(end($f_extension));
		$f_filename=uniqid().'.'.$f_extension;
		$store="uploads/".$f_filename;
		if ($f_extension=='jpg' || $f_extension=='png' || $f_extension=='gif') 
		{
		  	if ($f_size>=1000000)
		  	{
		    	echo "File Size Should Be 1 MB. !";
		  	}
		  	else
		  	{ if (move_uploaded_file($f_tmp, $store)) {} }
		}
		else{ echo "image must be jpg,png or gif only !";}
	}

	$event = new Event;
	if($event->addteacherAchievement($teacherName,$achievementDescription,$store))
	{	$event = null;

		header("Location: /adminPanel/teacherAchievement");
		exit;
	}
}elseif(isset($_POST['studentAchievement']))
{	
	if (!empty($_POST['studentName'])) 
	{
		$studentName=filterData($_POST['studentName']);
	}
	if (!empty($_POST['studentrollNumber'])) 
	{
		$studentrollNumber=filterData($_POST['studentrollNumber']);
	}
	if (!empty($_POST['studentClass'])) 
	{
		$studentClass=filterData($_POST['studentClass']);
	}
	if (!empty($_POST['studentDescription'])) 
	{
		$studentDescription=filterData($_POST['studentDescription']);
	}
	if (!empty($_POST['studentImage'])) 
	{	
		$studentImage=$_FILES['studentImage']['name'];
		$f_tmp=$_FILES['studentImage']['tmp_name'];
		$f_size=$_FILES['studentImage']['size'];
		$f_extension=explode('.', $studentImage);
		$f_extension=strtolower(end($f_extension));
		$f_filename=uniqid().'.'.$f_extension;
		$store="uploads/".$f_filename;
		if ($f_extension=='jpg' || $f_extension=='png' || $f_extension=='gif') 
		{if ($f_size>=1000000){echo "File Size Should Be 1 MB. !";}
		else
		 { if (move_uploaded_file($f_tmp, $store)){} }
		}else{ echo "image must be jpg,png or gif only !";}
	}
	$event = new Event;
	if($event->addstudentAchievement($studentName,$studentrollNumber,$studentClass,$studentDescription,$store))
	{	
	$event = null;
	header("Location: /adminPanel/studentAchievement");

		exit;
	}

}elseif(isset($_POST['principalDetail']))
{
	if (!empty($_POST['principalName'])) 
	{
		$principalName=filterData($_POST['principalName']);
	}
	if (!empty($_POST['principalDescription'])) 
	{
		$principalDescription=filterData($_POST['principalDescription']);
	}
	if (!empty($_POST['principalImage'])) 
	{	
		$principalImage=$_FILES['principalImage']['name'];
		$f_tmp=$_FILES['principalImage']['tmp_name'];
		$f_size=$_FILES['principalImage']['size'];
		$f_extension=explode('.', $principalImage);
		$f_extension=strtolower(end($f_extension));
		$f_filename=uniqid().'.'.$f_extension;
		$store="uploads/".$f_filename;
		if ($f_extension=='jpg' || $f_extension=='png' || $f_extension=='gif') 
		{if ($f_size>=1000000){echo "File Size Should Be 1 MB. !";}
		else
		 { if (move_uploaded_file($f_tmp, $store)){} }
		}else{ echo "image must be jpg,png or gif only !";}
	}
	$event = new Event;

	if($event->principalDetail($principalName,$principalDescription,$store))
	{	
	$event = null;
	header("Location: /adminPanel/administration/principal");

		exit;
	}
	
}elseif(isset($_POST['sport']))
{
	if (!empty($_POST['sportName'])) 
	{
		$sportName=filterData($_POST['sportName']);
	}
	if (!empty($_POST['sportDescription'])) 
	{
		$sportDescription=filterData($_POST['sportDescription']);
	}
	if (!empty($_POST['sportImage'])) 
	{	

		$sportImage=$_FILES['sportImage']['name'];
		$f_tmp=$_FILES['sportImage']['tmp_name'];
		$f_size=$_FILES['sportImage']['size'];
		$f_extension=explode('.', $sportImage);
		$f_extension=strtolower(end($f_extension));
		$f_filename=uniqid().'.'.$f_extension;
		$store="uploads/".$f_filename;
		if ($f_extension=='jpg' || $f_extension=='png' || $f_extension=='gif') 
		{if ($f_size>=5000000){echo "File Size Should Be 5 MB. !";}
		else
		 { if (move_uploaded_file($f_tmp, $store)){} }
		}else{ echo "image must be jpg,png or gif only !";}
	}
	$event = new Event;

	if($event->addnewSport($sportName,$sportDescription,$store))
	{
	$event = null;
	header("Location: /adminPanel/facilities/sports");

		exit;
	}
}elseif(isset($_POST['library']))
{
	if (!empty($_POST['teacherName'])) 
	{
		$teacherName=filterData($_POST['teacherName']);
	}

	$event = new Event;
	if($event->addnewlibraryTeacher($teacherName))
	{	
	$event = null;
	header("Location: /adminPanel/facilities/library");

		exit;
	}
}elseif(isset($_POST['governingBody']))
{
	if (!empty($_POST['Name'])) 
	{
		$Name=filterData($_POST['Name']);
	}
	if (!empty($_POST['Address'])) 
	{
		$Address=filterData($_POST['Address']);
	}

	$event = new Event;
	echo "string";
	if($event->addnewgoverningBody($Name,$Address))
	{	
	$event = null;
	header("Location: /adminPanel/administration/governingbody");

		exit;
	}
}elseif(isset($_POST['asministrative']))
{
	if (!empty($_POST['staffName'])) 
	{
		$staffName=filterData($_POST['staffName']);
	}
	if (!empty($_POST['staffDescreption'])) 
	{
		$staffDescreption=filterData($_POST['staffDescreption']);
	}

	$event = new Event;
	if($event->addnewasministrativestaff($staffName,$staffDescreption))
	{	
	$event = null;
	header("Location: /adminPanel/administration/asministrativestaff");

		exit;
	}
}elseif(isset($_POST['staffadvisors']))
{
	if (!empty($_POST['staffName'])) 
	{
		$staffName=filterData($_POST['staffName']);
	}
	if (!empty($_POST['staffSocieties'])) 
	{
		$staffSocieties=filterData($_POST['staffSocieties']);
	}

	$event = new Event;
	if($event->addnewstaffadvisor($staffName,$staffSocieties))
	{	
	$event = null;
	header("Location: /adminPanel/administration/staffadvisor");

		exit;
	}
}elseif(isset($_POST['seniourtutor']))
{
	if (!empty($_POST['Name'])) 
	{
		$Name=filterData($_POST['Name']);
	}
	if (!empty($_POST['Description'])) 
	{
		$Description=filterData($_POST['Description']);
	}

	$event = new Event;
	if($event->addnewSeniourtutor($Name,$Description))
	{	
	$event = null;
	header("Location: /adminPanel/administration/seniourtutor");

		exit;
	}
}elseif(isset($_POST['publicInformationofficer']))
{
	if (!empty($_POST['Name'])) 
	{
		$Name=filterData($_POST['Name']);
	}
	if (!empty($_POST['Description'])) 
	{
		$Description=filterData($_POST['Description']);
	}

	$event = new Event;
	if($event->addnewPIO($Name,$Description))
	{	
	$event = null;
	header("Location: /adminPanel/administration/publicInformationofficer");

		exit;
	}
}elseif(isset($_POST['prizeandawards']))
{
	if (!empty($_POST['Name'])) 
	{
		$Name=filterData($_POST['Name']);
	}
	if (!empty($_POST['Description'])) 
	{
		$Description=filterData($_POST['Description']);
	}
	if (!empty($_POST['Image'])) 
	{	
		$Image=$_FILES['Image']['name'];
		$f_tmp=$_FILES['Image']['tmp_name'];
		$f_size=$_FILES['Image']['size'];
		$f_extension=explode('.', $Image);
		$f_extension=strtolower(end($f_extension));
		$f_filename=uniqid().'.'.$f_extension;
		$store="uploads/".$f_filename;
		if ($f_extension=='jpg' || $f_extension=='png' || $f_extension=='gif') 
		{if ($f_size>=1000000){echo "File Size Should Be 1 MB. !";}
		else
		 { if (move_uploaded_file($f_tmp, $store)){} }
		}else{ echo "image must be jpg,png or gif only !";}
	}
	$event = new Event;

	if($event->addPrizeandawards($Name,$Description,$store))
	{		
	$event = null;
	header("Location: /adminPanel/academices/prizeandawards");

		exit;
	}
	
}




?>
