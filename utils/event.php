<?php
require_once "db.php";
require_once "function.php";

class Event
{	
	

	public function addNotification($notificationDate,$notificationTag,$notificationDescription,$notificationImage)
	{
	
		$db = new dataBase;
		$db->makeConnection();
		$sql = "INSERT INTO notifications(notificationDate,notificationTag,notificationDescription,notificationImage) values('$notificationDate','$notificationTag','$notificationDescription' ,'$notificationImage' )";
		$result = $db->query($sql);
		$db->close();
		if ($result)
		return true;
	}
	public function getallNotification()
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "SELECT * FROM notifications ";
		$result = $db->query($sql);
		$db->close();	
		$events = array();
		$row = $result->fetch_assoc();
		while ($row) 
		{
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;
	}
	public function getallNotificationbyid($id)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "SELECT * FROM notifications WHERE id='$id'";
		$result = $db->query($sql);
		$db->close();
				$events = array();
		$row = $result->fetch_assoc();
		while ($row) 
		{
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;	
		
	}

	public function deleteNotification($id)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "DELETE FROM notifications WHERE id='$id'";
		$result = $db->query($sql);
		$db->close();
		if ($result){return true;}
	}

	public function addgallaryImage($imageDescription,$galleryImage)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "INSERT INTO galleryimage(imageDescription,galleryImage) values('$imageDescription','$galleryImage')";
		$result = $db->query($sql);
		$db->close();
		if ($result)
		return true;
	}
	public function getallgallaryImage()
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "SELECT * FROM galleryimage ";
		$result = $db->query($sql);
		$db->close();	
		$events = array();
		$row = $result->fetch_assoc();
		while ($row) 
		{
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;
	}
	public function deletegalleryImage($id)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "DELETE FROM galleryimage WHERE id='$id'";
		$result = $db->query($sql);
		$db->close();
		if ($result){return true;}
	}
	public function addteacherAchievement($teacherName,$achievementDescription,$teacherAchievementimg)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "INSERT INTO teacherachievement(teacherName,achievementDescription,teacherAchievementimg) values('$teacherName','$achievementDescription','$teacherAchievementimg')";
		$result = $db->query($sql);
		$db->close();
		if ($result)
		return true;
	}
	public function getteacherAchievement()
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "SELECT * FROM teacherachievement ";
		$result = $db->query($sql);
		$db->close();	
		$events = array();
		$row = $result->fetch_assoc();
		while ($row) 
		{
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;
	}
	public function deleteteacherAchievement($id)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "DELETE FROM teacherachievement WHERE id='$id'";
		$result = $db->query($sql);
		$db->close();
		if ($result){return true;}
	}
	public function addstudentAchievement($studentName,$studentrollNumber,$studentClass,$studentDescription,$studentImage)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "INSERT INTO studentachievement(studentName,studentrollNumber,studentClass,studentDescription,studentImage)
		 values('$studentName','$studentrollNumber','$studentClass','$studentDescription','$studentImage')";
		$result = $db->query($sql);
		$db->close();
		if ($result)
		return true;
	}
	public function getstudentAchievement()
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "SELECT * FROM studentachievement ";
		$result = $db->query($sql);
		$db->close();	
		$events = array();
		$row = $result->fetch_assoc();
		while ($row) 
		{
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;
	}
	public function deletestudentAchievement($id)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "DELETE FROM studentachievement WHERE id='$id'";
		$result = $db->query($sql);
		$db->close();
		if ($result){return true;}
	}
	public function principalDetail($principalName,$principalDescreption,$principalImage)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "INSERT INTO principal(principalName,principalDescreption,principalImage)
		 values('$principalName','$principalDescreption','$principalImage')";
		$result = $db->query($sql);
		$db->close();
		if ($result)
		return true;
	}
	public function getprincipalDetail()
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "SELECT * FROM principal ";
		$result = $db->query($sql);
		$db->close();	
		$events = array();
		$row = $result->fetch_assoc();
		while ($row) 
		{
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;
	}
	public function addnewSport($sportName,$sportDescription,$sportImage)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "INSERT INTO sports(sportName,sportDescription,sportImage)
		 values('$sportName','$sportDescription','$sportImage')";
		$result = $db->query($sql);
		$db->close();
		if ($result)
		return true;
	}
	public function getSports()
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "SELECT * FROM sports ";
		$result = $db->query($sql);
		$db->close();	
		$events = array();
		$row = $result->fetch_assoc();
		while ($row) 
		{
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;
	}
	public function deleteSport($id)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "DELETE FROM sports WHERE id='$id'";
		$result = $db->query($sql);
		$db->close();
		if ($result){return true;}
	}
	public function addnewlibraryTeacher($teacherName)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "INSERT INTO library(teacherName)
		 values('$teacherName')";
		$result = $db->query($sql);
		$db->close();
		if ($result)
		return true;
	}
	public function getlibraryTeacher()
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "SELECT * FROM library ";
		$result = $db->query($sql);
		$db->close();	
		$events = array();
		$row = $result->fetch_assoc();
		while ($row) 
		{
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;
	}
	public function deletelibraryTeacher($id)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "DELETE FROM library WHERE id='$id'";
		$result = $db->query($sql);
		$db->close();
		if ($result){return true;}
	}
		public function addnewgoverningBody($Name,$Address)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "INSERT INTO governingbody(Name,Address)
		 values('$Name','$Address')";
		$result = $db->query($sql);
		$db->close();
		if ($result)
		return true;
	}
	public function getgoverningBody()
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "SELECT * FROM governingbody ";
		$result = $db->query($sql);
		$db->close();	
		$events = array();
		$row = $result->fetch_assoc();
		while ($row) 
		{
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;
	}
	public function deletegoverningBody($id)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "DELETE FROM governingbody WHERE id='$id'";
		$result = $db->query($sql);
		$db->close();
		if ($result){return true;}
	}
	public function addnewasministrativestaff($staffName,$staffDescreption)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "INSERT INTO asministrative(staffName,staffDescreption)
		 values('$staffName','$staffDescreption')";
		$result = $db->query($sql);
		$db->close();
		if ($result)
		return true;
	}
	public function getasministrativestaff()
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "SELECT * FROM asministrative ";
		$result = $db->query($sql);
		$db->close();	
		$events = array();
		$row = $result->fetch_assoc();
		while ($row) 
		{
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;
	}
	public function deleteasministrativestaff($id)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "DELETE FROM asministrative WHERE id='$id'";
		$result = $db->query($sql);
		$db->close();
		if ($result){return true;}
	}
	public function addnewstaffadvisor($staffName,$staffSocieties)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "INSERT INTO staffadvisors(staffName,staffSocieties)
		 values('$staffName','$staffSocieties')";
		$result = $db->query($sql);
		$db->close();
		if ($result)
		return true;
	}
	public function getstaffadvisor()
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "SELECT * FROM staffadvisors ";
		$result = $db->query($sql);
		$db->close();	
		$events = array();
		$row = $result->fetch_assoc();
		while ($row) 
		{
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;
	}
	public function deletestaffadvisor($id)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "DELETE FROM staffadvisors WHERE id='$id'";
		$result = $db->query($sql);
		$db->close();
		if ($result){return true;}
	}
	public function addnewSeniourtutor($Name,$Description)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "INSERT INTO seniourtutor(Name,Description)
		 values('$Name','$Description')";
		$result = $db->query($sql);
		$db->close();
		if ($result)
		return true;
	}
	public function getSeniourtutor()
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "SELECT * FROM seniourtutor ";
		$result = $db->query($sql);
		$db->close();	
		$events = array();
		$row = $result->fetch_assoc();
		while ($row) 
		{
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;
	}
	public function deleteSeniourtutor($id)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "DELETE FROM seniourtutor WHERE id='$id'";
		$result = $db->query($sql);
		$db->close();
		if ($result){return true;}
	}
		public function addnewPIO($Name,$Description)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "INSERT INTO pio(Name,Description)
		 values('$Name','$Description')";
		$result = $db->query($sql);
		$db->close();
		if ($result)
		return true;
	}
	public function getPIO()
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "SELECT * FROM pio ";
		$result = $db->query($sql);
		$db->close();	
		$events = array();
		$row = $result->fetch_assoc();
		while ($row) 
		{
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;
	}
	public function PIO($id)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "DELETE FROM pio WHERE id='$id'";
		$result = $db->query($sql);
		$db->close();
		if ($result){return true;}
	}	
	public function addPrizeandawards($Name,$Description,$Image)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "INSERT INTO prizeandawards(Name,Description,Image)
		 values('$Name','$Description','$Image')";
		$result = $db->query($sql);
		$db->close();
		if ($result)
		return true;
	}
	public function getPrizeandawards()
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "SELECT * FROM prizeandawards ";
		$result = $db->query($sql);
		$db->close();	
		$events = array();
		$row = $result->fetch_assoc();
		while ($row) 
		{
			array_push($events, $row);
			$row = $result->fetch_assoc();
		}
		return $events;
	}
	public function deleteprizeandawards($id)
	{
		$db = new dataBase;
		$db->makeConnection();
		$sql = "DELETE FROM prizeandawards WHERE id='$id'";
		$result = $db->query($sql);
		$db->close();
		if ($result){return true;}
	}

}

?>