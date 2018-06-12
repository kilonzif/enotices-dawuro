
<?php
    require_once 'session.php';
   if(!empty($_FILES['image']['name'])){
    $uploadedFile = '';
    if(!empty($_FILES["image"]["type"])){
        $fileName = time().'_'.$_FILES['image']['name'];
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["image"]["name"]);
        $file_extension = end($temporary);
        if((($_FILES["image"]["type"] == "image/png") || ($_FILES["image"]["type"] == "image/jpg") || ($_FILES["image"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
            $sourcePath = $_FILES['image']['tmp_name'];
            $targetPath = "eventimages/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile = $fileName;
            }
        }
    }
    
    $eventtitle = $_POST['title'];
    $eventcat = $_POST['eventcategories'];
    $eventdate = $_POST['date'];
    $eventtime = $_POST['time'];
    $venue = $_POST['venue'];
    $description = $_POST['description'];
    $postdate = date("d/m/Y");
    $senderid = $_SESSION['user_id'];
    $status = 'unapproved';
    
    //include database configuration file
    include_once 'config.php';
    $sql = "INSERT into event (description,eventcat,eventdate, eventtime, eventtitle, image, postdate, senderid, status, venue) VALUES ('".$description."','".$eventcat."','".$eventdate."','".$eventtime."','".$eventtitle."','".$uploadedFile."','".$postdate."','".$senderid."','".$status."','".$venue."')";
    //insert form data in the database
    $insert = $db->query($sql);
    
    echo $insert?'ok': $db->error . $sql;
}
?>
