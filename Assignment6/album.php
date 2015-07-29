<?php

$ArtistFNameError = $ArtistLNameError1 = $ArtistLNameError2 = $DOBError = $AlbumError = $ReleaseError = $LabelError = $BandError = $GenreError = "";
$Tname="";
$Success="";



function artistCheckn(){

		global $ArtistFNameError, $ArtistLNameError1, $DOBError;
		$toggle=true;
		if(empty($_POST['fName'])){
			$ArtistFNameError=" required";
			$toggle=false;
		}
		if(empty($_POST['lName'])){
			$ArtistLNameError1=" required";
			$toggle=false;
		}
		
		return $toggle;
}

function albumCheckn(){

		global $AlbumError , $ArtistLNameError2 , $ReleaseError  , $GenreError;
		$toggle=true;
		if(empty($_POST['album'])){
			$AlbumError=" required";
			$toggle=false;
		}
		if(empty($_POST['artist'])){
			$ArtistLNameError2=" required";
			$toggle=false;
		}
		if(empty($_POST['genre'])){
			$GenreError=" required";
			$toggle=false;
		}
		if(empty($_POST['release'])){
			$ReleaseError=" required";
			$toggle=false;
		}elseif(!ctype_digit($_POST['release'])){
			$ReleaseError=" must be a number";
			$toggle=false;
		}
		
		return $toggle;
}



if(!empty($_POST['newArt'])||!empty($_POST['newAlbum'])){
	if(!empty($_POST['newArt'])){
		if(artistCheckn()){
			$connection=mysqli_connect("localhost","jvedullapalli1","jvedullapalli1","jvedullapalli1");

			if (mysqli_connect_errno()) {
				$Success="MySQL connection fail: " . mysqli_connect_error();
			}

			$firstName = mysqli_real_escape_string($connection, $_POST['fName']);
			$lastName = mysqli_real_escape_string($connection, $_POST['lName']);
			if(empty($_POST['band'])){
			$bandName='Solo Artist';
			}else{
			$bandName = mysqli_real_escape_string($connection, $_POST['band']);
			}
			
			$query="Select ArtistID FROM artist WHERE FirstName='$firstName' AND LastName='$lastName'";
			
			$result=mysqli_query($connection,$query);
			if(mysqli_num_rows($result)){
				$Success="Existing Artist";		
			}else{
				$query="INSERT INTO artist(FirstName,LastName,Band) VALUES(\"$firstName\",\"$lastName\",\"$bandName\")";
				mysqli_query($connection,$query);
				$Success="$firstName $lastName added successfully ";
			}
		}
	}
	if(!empty($_POST['newAlbum'])){
		if(albumCheckn()){
			$connection=mysqli_connect("localhost","jvedullapalli1","jvedullapalli1","jvedullapalli1");

			if (mysqli_connect_errno()) {
				$Success="MySQL connection fail: " . mysqli_connect_error();
			}

			$an = mysqli_real_escape_string($connection, $_POST['album']);
			$artn = mysqli_real_escape_string($connection, $_POST['artist']);
			$y = mysqli_real_escape_string($connection, $_POST['release']);
			$gn = mysqli_real_escape_string($connection, $_POST['genre']);
			
			
			$queryAlb="Select AlbumName FROM album WHERE AlbumName LIKE '%$an%'";
			$queryArt="Select ArtistID FROM artist WHERE LastName LIKE '%$artn%'";
			$result=mysqli_query($connection,$queryAlb);
			$result2=mysqli_query($connection,$queryArt);
			$row=mysqli_fetch_array($result);
			if(mysqli_num_rows($result)){
				$Success="Existing $an ";		
			}elseif(!mysqli_num_rows($result2)){
				$Success="No details of the Artist , please create new";
			}else{
				$query="INSERT INTO album(AlbumName, ArtistName, Year, Genre) VALUES(\"$an\",\"$artn\",$y,\"$gn\")";
				mysqli_query($connection,$query);
				$Success="$an added successfully ";
			}
		}
	}	
}

elseif(!empty($_POST['search'])){
	
	if(!empty($_POST['search_field'])){
		if($_POST['searchlist']=="BandName"){
			$searchname=$_POST['search_field'];
			
			$connect=mysqli_connect("localhost","jvedullapalli1","jvedullapalli1","jvedullapalli1");
			if(mysqli_connect_errno()){
				$Success="MySQL connection fail: ".mysqli_connect_error();
			}
			$query="SELECT * FROM artist WHERE Band='$searchname'";
			$result=mysqli_query($connect,$query);
			
			$Tname="<tr><th>First Name</th><th>Last Name</th><th>Band</th></tr>";

			while($row=mysqli_fetch_array($result)){
				
				$Tname.="<tr><td>".trim($row['FirstName'])."</td>";
				$Tname.="<td>".$row['LastName']."</td>";
				$Tname.="<td>".$row['Band']."</td>";
				

			}
			mysqli_close($connect);
		}elseif($_POST['searchlist']=="LastName"){
		
			$searchname=$_POST['search_field'];
			
			$connect=mysqli_connect("localhost","jvedullapalli1","jvedullapalli1","jvedullapalli1");
			if(mysqli_connect_errno()){
				$Success="MySQL connection fail: ".mysqli_connect_error();
			}
			$query="SELECT * FROM artist WHERE LastName='$searchname' ";
			$result=mysqli_query($connect,$query);
			
			$Tname="<tr><th>First Name</th><th>Last Name</th><th>Band</th></tr>";

			while($row=mysqli_fetch_array($result)){
				
				$Tname.="<tr><td>".trim($row['FirstName'])."</td>";
				$Tname.="<td>".$row['LastName']."</td>";
				$Tname.="<td>".$row['Band']."</td>";
				
			}
			mysqli_close($connect);
			
		}else{
			$searchtype=$_POST['searchlist'];
			$searchname=$_POST['search_field'];
		
			
			$connect=mysqli_connect("localhost","jvedullapalli1","jvedullapalli1","jvedullapalli1");
			if(mysqli_connect_errno()){
				$Success="MySQL connection fail: ".mysqli_connect_error();
			}
			$query="SELECT * FROM album WHERE $searchtype='$searchname'";
			$result=mysqli_query($connect,$query);
			$Tname="<tr><th>Album Name</th><th>Artist</th><th>Year Released</th><th>Musical Genre</th></tr>";

			while($row=mysqli_fetch_array($result)){
				$artband=trim($row['ArtistName']);
				$queryArt="Select FirstName, LastName FROM artist WHERE LastName LIKE '%$artband%'";
				$resultA=mysqli_query($connect,$queryArt);
				if(mysqli_num_rows($resultA)==1){
					$rowA=mysqli_fetch_array($resultA);
					$artband=$rowA[0]." ".$rowA[1];
				}
				$Tname.="<tr><td>".$row['AlbumName']."</td>";
				$Tname.="<td>".$artband."</td>";
				
				$Tname.="<td>".$row['Year']."</td>";
				$Tname.="<td>".$row['Genre']."</td></tr>";

			}
			mysqli_close($connect);
		}
	}else{
	  $Success="Enter any term to Search";
	}
}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="album.css">
</head>
<body>
<div id="main">
<span><h1>Music Makes Life Beautiful</h1></span>

<h2> Add the Artist </h2>
<form name="addArtist" action="album.php" method="post">
	<label>*First Name:&nbsp;&nbsp; </label><input type="text" name="fName"></input><?php echo $ArtistFNameError ?></br>
	<label>*Last Name:&nbsp;&nbsp;&nbsp; </label><input type="text" name="lName"></input><?php echo $ArtistLNameError1 ?></br>
	<label>Band Name: &nbsp;&nbsp;&nbsp;</label><input type="text" name="band"></input></br>
	<input type="submit" name="newArt" value="Add Artist"></input>
	</br>
</form>  

<h2> Add the Album </h2>
<form name="addAlbum" action="album.php" method="post">
	<label>*Album Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" name="album"></input><?php echo $AlbumError ?></br>
	<label>*Artist Last Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" name="artist"></input><?php echo $ArtistLNameError2 ?></br>
	<label>*Released Year: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" name="release"></input><?php echo $ReleaseError ?></br>
	<label>*Genre:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp </label><input type="text" name="genre"></input><?php echo $GenreError ?></br>
	<input type="submit" name="newAlbum" value="Add Album" ></input>
	</br>

</form>
* is mandatory
<div style="clear: both"></div>

<form name="search" action="album.php" method="post">
<h2>Search </h2> <br/>
<select name="searchlist">
  <option value="BandName">By Band Name</option>
  <option value="AlbumName">By Album Name</option>
  <option value="Year">By Year</option>
   <option value="Genre">By Genre</option>
   <option value="LastName">Artists By Last Name</option>
 
</select>

<input type="text" name="search_field"></input>
	<input type="submit" name="search" value="Search"></input>
			
<h3> <?php echo $Success ?>	</h3>
</form>



<table>
	<?php echo $Tname ?>
</table>

</div>
</body>
</html>