<?php
	include 'config.php';

	 $connection = new mysqli($servername, $username, $password, $dbname);  
	 if ($connection->connect_error) die($connection->connect_error);

	function queryMysql($query)  {    
	  	global $connection;    
	  	$result = $connection->query($query);    
	  	if (!$result) 
	  		die($connection->error);    
	  	return $result;  
	 }

  function destroySession()  {    
  	$_SESSION=array();
    if (session_id() != "" || isset($_COOKIE[session_name()]))      
    	setcookie(session_name(), '', time()-2592000, '/');
    session_destroy();  
	}
  
  function sanitizeString($var)  {    
  	global $connection;    
  	$var = strip_tags($var);    
  	$var = htmlentities($var);    
  	$var = stripslashes($var);    
  	return $connection->real_escape_string($var);  
  }

  function loadEvents($var=""){
    $ans = '';
    $result = queryMysql("select * from event where status = 'approved' ".$var. " order by postdate desc");
    $count = 0;
    if($result -> num_rows > 0){
      while($row = $result -> fetch_assoc()){
        $cat = queryMysql("select * from categories where categoryid = '".$row['eventcat'] ."'");
        $cat = $cat -> fetch_assoc()['categoryname'];
        $name = queryMysql("select * from user where userid = '".$row['senderid'] ."'");
        $name = $name -> fetch_assoc()['name'];
        if ($count == 0)
          $ans .= '<div class="row myslides" style="display:block">
                <div class="sm-8">
                  <img src="./eventimages/'. $row['image'] .'">
                </div>
                <div class="sm-4">
                  <h3>Event Details</h3>
                  <p>Title: <span>'. $row['eventtitle'] .'</span></p>
                  <p>Category: <span>'. $cat .'</span></p>
                  <p>Date: <span>'. $row['eventdate'] .'</span></p>
                  <p>Time: <span>'. $row['eventtime'] .'</span></p>
                  <p>Venue: <span>'. $row['venue'] .'</span></p>
                  <p>Sender: <span>'. $name .'</span></p>
                  <p>Description: <span>'. $row['description'] .'</span></p>
                </div>
              </div>';
            else
              $ans .= '<div class="row myslides" style="display:none">
                <div class="sm-8">
                  <img src="./eventimages/'. $row['image'] .'">
                </div>
                <div class="sm-4">
                  <h3>Event Details</h3>
                  <p>Title: <span>'. $row['eventtitle'] .'</span></p>
                  <p>Category: <span>'. $cat .'</span></p>
                  <p>Date: <span>'. $row['eventdate'] .'</span></p>
                  <p>Time: <span>'. $row['eventtime'] .'</span></p>
                  <p>Venue: <span>'. $row['venue'] .'</span></p>
                  <p>Sender: <span>'. $name .'</span></p>
                  <p>Description: <span>'. $row['description'] .'</span></p>
                </div>
              </div>';
              $count++;
      }
    }
    return $ans;
  }

  function loadCategories(){
    $ans = "";
    $count = 0;
    $result = queryMysql("select * from categories");
    if($result -> num_rows > 0){
      while($row = $result -> fetch_assoc()){
        if ($count == 0)
          $ans .= "<option value='".$row['categoryid']."' selected='selected'>". $row['categoryname'] ."</option>";
        else
          $ans .= "<option value='".$row['categoryid']."'>". $row['categoryname'] ."</option>";
        $count++;
      }
    }
    return $ans;
  }

  function facebookEvents($var = ""){
    $ans = '';
    $result = queryMysql("select description, eventcat, eventdate, eventid, eventtime, eventtitle, image, postdate, senderid, venue, year(eventdate), month(eventdate), day(eventdate) from event where status = 'approved' ".$var. " order by postdate desc");
    if($result -> num_rows > 0){
      while($row = $result -> fetch_assoc()){
        $cat = queryMysql("select * from categories where categoryid = '".$row['eventcat'] ."'");
        $cat = $cat -> fetch_assoc()['categoryname'];
        $name = queryMysql("select * from user where userid = '".$row['senderid'] ."'");
        $name = $name -> fetch_assoc()['name'];
        $pieces = explode(":", $row['eventtime']);
        $ans .= '<div class="facebook-box">
          <div class="content">
            <div class="row header">
              <div class="avatar">
                <img src="dawuro.png" alt="" width="40px" height="40px" />
              </div>
              <div class="name">
                <h5><a href="" target="_blank">'.$name.'</a></h5>
                <span class="sub">'.$row['postdate'].'</span>
              </div>
            </div>
            <div class="row text">
              <span><b>'.$row['eventtitle'].'</b> - '.$cat.'</span><br>'.$row['description'].'<br><span>Date: '.$row['eventdate'].'</span>
          <br><span>Time: '.$row['eventtime'].'</span>
          <br><span>Venue: '.$row['venue'].'</span>
            </div>
            <div class="row thumbnail">
              <img src="eventimages/'.$row['image'].'" alt="" class="hund" />
            </div>
            <hr />
        </div>
        <a href="ics.php?id='.$row['eventid'].'&title='.$row['eventtitle'].'&description='.$row['description'].'&day='.sprintf("%02d", $row['day(eventdate)']).'&month='.sprintf("%02d", $row['month(eventdate)']).'&year='.$row['year(eventdate)'].'&hr='.sprintf("%02d", $pieces[0]).'&min='.sprintf("%02d", $pieces[1]).'&sec=00&stage='.$row['venue'].'">Save to Calendar</a>
    </div>';
    }
  } return $ans;
}
 
function loadAll($var = ""){
  $ans = "<table id='customers'>
            <tr>
              <th>Event number</th>
              <th>Event title</th>
              <th>Category</th>
              <th>Event date</th>
              <th>Event time</th>
              <th>Event venue</th>
              <th>Description</th>
              <th>Sender</th>
              <th>Posted date</th>
              <th>Status</th>
            </tr>";
  $result = queryMysql("SELECT eventid, eventtitle, dawurodb.categories.categoryname, eventdate, eventtime, venue, postdate, description, status, dawurodb.user.name FROM event, dawurodb.categories, dawurodb.user WHERE dawurodb.categories.categoryid = dawurodb.event.eventcat and dawurodb.user.userid = senderid " .$var. "  order by postdate desc");

  if($result -> num_rows > 0){
      while($row = $result -> fetch_assoc()){
        $ans .= "<tr>
                  <td>". $row['eventid'] ."</td>
                  <td>". $row['eventtitle'] ."</td>
                  <td>". $row['categoryname'] ."</td>
                  <td>". $row['eventdate'] ."</td>
                  <td>". $row['eventtime'] ."</td>
                  <td>". $row['venue'] ."</td>
                  <td>". $row['description'] ."</td>
                  <td>". $row['name'] ."</td>
                  <td>". $row['postdate'] ."</td>
                  <td>". $row['status'] ."</td>
                  <td>
                    <a href='javascript:void(0)' onclick='approve(".$row['eventid'].")'><i style='font-size:18px' class='fa'>&#xf046;</i></a>
                    <a href='javascript:void(0)' onclick='unapprove(".$row['eventid'].")'><i style='font-size:18px' class='fa'>&#xf2d4;</i></a>
                    <a href='javascript:void(0)' onclick='deleteit(".$row['eventid'].")'><i style='font-size:18px' class='fa'>&#xf014;</i></a>
                  </td>
                </tr>";
      }
    }
    return $ans . "</table>";
}

function loadApproved(){
  return loadAll(' and status = "approved"');
}

function loadUnapproved(){
  return loadAll(' and status = "unapproved"');
}

function approve($id){
  $result = queryMysql("update event set status = 'approved' where eventid = $id");
  return $result;
}

function unapprove($id){
  $result = queryMysql("update event set status = 'unapproved' where eventid = $id");
  return $result;
}

function delete($id){
  $result = queryMysql("delete from event where eventid = $id");
  return $result;
}

function categories(){
  $ans = "<table id='customers'>
            <tr>
              <th>Category number</th>
              <th>Category name</th>
            </tr>";
  $result = queryMysql('select * from categories');
  if($result -> num_rows > 0){
      while($row = $result -> fetch_assoc()){
        $ans .= "<tr>
                  <td>". $row['categoryid'] ."</td>
                  <td>". $row['categoryname'] ."</td>
                </tr>";
      }
    }
    return $ans . "</table>";
}
?>