<?php
require('id/profilbd.php');
require('../plugins/FireCore.php');

$unique_id = $userinfo['unique_id'];

$link_edit = $_GET['link'];

if(isset($_SESSION['id']) AND $_SESSION['id'] > 0) {
  $getid = intval($_SESSION['id']);
  $reqlink = $bdd->prepare('SELECT * FROM my_links WHERE id = ?');
  $reqlink->execute(array($getid));
  $recup_links = $requser->fetch();
}

$data = $recup_links['link_number'];

echo $data[0];

$q = array(':unique_id'=>$unique_id);
$query = $bdd->prepare("SELECT * FROM my_links WHERE unique_id = :unique_id");
$query->execute($q) or die(print_r($query->errorInfo()));
$rows = $query->fetchAll();


if(isset($_SESSION['id'])) {
  if($data != $link_edit) {
    if(isset($_POST['submit'])) {
        $website_title = htmlspecialchars($_POST['website_title']);
        $website_subtitle = htmlspecialchars($_POST['website_subtitle']);
        $insert_1 = $bdd->prepare("INSERT INTO my_links(`unique_id`, `link_number`, `link_title`, `link_subtitle`) VALUES(?, ?, ?, ?)");
        $insert_1->execute(array($unique_id, $link_edit, $website_title, $website_subtitle));
        header('Location: test');
    }
  } else {
    echo "Erreur";
  }
}



if(isset($_SESSION['id'])) {
    if(isset($_POST['submit_2'])) {
        $update_website_title = htmlspecialchars($_POST['update_website_title']);
        $insert_2 = $bdd->prepare("UPDATE my_links SET link_title = ? WHERE link_number = ?");
        $insert_2->execute(array($update_website_title, $link_edit));
        header('Location: test');
    }
}


?>

<!-- Bootstrap CSS CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Website title</label>
    <input name="website_title" type="text" class="form-control" placeholder="Enter title">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Website description</label>
    <input name="website_subtitle" type="text" class="form-control" " placeholder="Enter subtitle">
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>

		
<div class="container">
			<div class="row">
				<?php
					foreach($rows as $row) {
				?>
				<div class="col-sm-3">
					<div class="membre-corps">
						<div>
               <button><?= $row['link_title'] ?></button>
						</div>
					</div>
				</div>
				<?php
					}	
				?>
			</div>
		</div>

<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">UPDATE Website title</label>
    <input name="update_website_title" type="text" class="form-control" placeholder="Enter title">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">UPDATE Website description</label>
    <input name="update_website_subtitle" type="text" class="form-control" " placeholder="Enter subtitle">
  </div>
  <button name="submit_2" type="submit" class="btn btn-primary">Submit</button>
</form>