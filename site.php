<?php
	session_start();
	include_once 'includes/dbh.php';
	include_once 'includes/gallery.php'; 
	?>
<html>
<head>
	<title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
    <link rel="stylesheet" type="text/css" href="css/site.css">
	<script type="text/javascript" src="js/site.js"></script>
	<style>
	</style>
</head>
<body>
	<?php
			if(isset($_POST['search']))
			{
				$searchvalue = $_POST['searchvalue'];
				$query = "SELECT * FROM `users` WHERE CONCAT(`user_id`, `user_username`, `user_password`, `user_name`, `user_gender`, `user_age`, `user_contact`, `user_email`, `user_address`, `user_industry`, `user_findout`, `user_admin`) LIKE '%".$searchvalue."%'";
				$result = mysqli_query($conn,$query);
				echo"
				<script type='text/javascript'>
				$(document).ready(function () {
						$('html,body').animate({
							scrollTop: $('.graph').offset().top
						},
							'slow');
					})
				</script>";
			}
			else
			{
				$query = "SELECT * FROM `users`";
				$result = mysqli_query($conn,$query);
			}
	?>
	<div id="bg"></div>
    <div class="social-links">
        <div class="fb">
            <a href="https://twitter.com/?lang=en"><img src="https://image.flaticon.com/icons/png/512/124/124010.png" /></a>
        </div>
        <div class="twitter">
            <a href="https://www.facebook.com/"><img src="https://www.pi-expertises.com/wp-content/uploads/2016/10/twitter-bird-white-on-blue.png" /></a>
    </div>
    </div>

	<!-- navbar -->
	<div class ="navbar">
		<div class="navbarheader" id="navhead">
			<div class="navreactive" id="navele">
				<ul>
					<?php
						if(isset($_SESSION['u_username'])){
							echo '<form action = "includes/logout.php" method="POST"><input type="submit" name="logout" class="loginbutton" value="Logout '.$_SESSION['u_username'].'"></form>';
						}
						else
						{
							echo '<a href="javascript:void(1);" id="loginformbutton" class="loginbutton"><p>Login</p></a>';
						}
					?>
					<img src ="https://fiverr-res.cloudinary.com/t_main1,q_auto,f_auto/gigs/25731507/original/81e98715867731eabeb47674a49695ab23b0a186.png"/>
					<li><a id="homea" href="#" class="activenav">Home</a></li>
					<li><a id="gallerya" href ="#">Gallery</a></li>
					<li><a id="donatea" href ="#">Donate</a></li>
                    <li><a id="grapha" href="#">Graph</a></li>
					<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="responsivenavbar()">&#9776;</a>
				</ul>
			</div>
		</div>	
	</div>
	<!-- navbar -->
    <!-- login -->
    <div class="loginbgtrans" id="loginbg">
        <div class="loginform">
            <form action = "includes/login.inc.php" method="POST">
                <a href="javascript:void(0);" id="loginback"><h2>Back</h2></a>
                <h1>Login</h1>
                <label>UserName</label>
                <br />
                <input type="text" name="usernamelogin" required>
                <br />
                <label>Password</label>
                <br />
                <input type="password" name ="pwdlogin" placeholder="Password" required>
                <input type="submit" name="login" value="Submit">
                 <a href="javascript:void(0);" id="registerform"><h4>Register an account</h4></a>
            </form>
        </div>
    </div>
    <!-- login -->
    <!-- register -->
    <div class="registerbgtrans" id="registerbg">
        <div class="registerform">
            <form class="signupform" action="includes/signup.inc.php" method ="POST">
                <a href="javascript:void(0);" id="registerback"><h2>Back</h2></a>
                <h1>Register</h1>
                <label>UserName</label>
                <br />
                <input type="text" name="usernameregister" placeholder="Username" required>
                <br />
                <label>Password</label>
                <br />
                <input type="password" name="pwdregister" placeholder="Password" required>
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" required>
                <label>Gender</label>
                <select name ="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
				<label>Age</label>
                <input type="number" name = "age"placeholder="Age" required>
                <label>Contact</label>
                <input type="text" name = "contact"placeholder="Contact" required>
				<label>Email</label>
                <input type="email" name = "email"placeholder="Email" required>
				<label>Address</label>
                <input type="text" name = "address"placeholder="Address" required>
				<label>Industry</label>
				<select name ="industry" >
                    <option value="Music">Music</option>
                    <option value="Video">Video</option>
                </select>
				<label>How did you find out?</label>
				<select name ="findout" >
                    <option value="Friends">Friends</option>
                    <option value="Advertising">Advertising</option>
                </select>
                <input type="submit" name="signup" value="Sign Up">
                <a href="javascript:void(0);" id="loginform"><h4>Back to Login</h4></a>
            </form>
        </div>
    </div>
    <!-- register -->
	<!-- editadmin -->
	<div class="registerbgtrans" id="editbg">
        <div class="registerform">
            <form class="editform" action="includes/update.php" method ="POST">
                <a href="javascript:void(0);" id="editback"><h2>Back</h2></a>
                <h1>Edit User</h1>
				<label>Row : </label><input type="text" id="editid" name="editid" readonly>
                <label>UserName</label>
                <br />
                <input type="text" id ="editusername" name="editusername" placeholder="Username" required>
                <br />
                <label>Name</label>
                <input type="text" id="editname" name="editname" placeholder="Name" required>
                <label>Gender</label>
                <select id="editgender" name ="editgender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
				<label>Age</label>
                <input id="editage" type="number" name = "editage"placeholder="Age" required>
                <label>Contact</label>
                <input id="editcontact" type="text" name = "editcontact"placeholder="Contact" required>
				<label>Email</label>
                <input id="editemail" type="email" name = "editemail"placeholder="Email" required>
				<label>Address</label>
                <input id="editaddress" type="text" name = "editaddress"placeholder="Address" required>
                <input type="submit" name="update" value="Update">
            </form>
        </div>
    </div>
	<!-- editadmin -->
	<!-- home -->
	<div class="home">
		<div class ="video">
			<div class="videocontent">
				<video class="homevideo" controls >
				  <source src="video/shelter.mp4" type="video/mp4">
				  Your browser does not support HTML5 video.
				</video>
			</div>
		</div>
		<div class="aboutsite">
			<div class="acol-1">
				<img src="images/profpic.jpg"/>
			</div>
			<div class="acol-2">
				<h1>About this site</h1>
				<h2>This is a site where i discuss japanese music.It is where music comes to life.Try out some of my suggestions from the gallery</h2>
			</div>
		</div>
	</div>
	<!-- home -->
	<!-- gallery -->
	<div class="gallery">
		<h1>Gallery</h1>
		<div class = "gallerycontent">
			<div class="imagecontent">
				<ul class ="sliderimage">
					<li id="slide-1">
						<?php
						echo '<img id="ngnlimg" src="data:image/jpeg;base64,'.base64_encode( $galleryresultA['gallery_imgbig'] ).'"/>';
						?>
					</li>
					<audio id="ngnl">
					<source src="audio/ngnlaudio.mp3" type="audio/mpeg">
					</audio>
					<li id="slide-2">
						<?php
						echo '<img id="yliaimg" src="data:image/jpeg;base64,'.base64_encode( $galleryresultB['gallery_imgbig'] ).'"/>';
						?>					
					</li>
					<audio id="ylia">
					<source src="audio/yliaaudio.mp3" type="audio/mpeg">
					</audio>	
                    <li id="slide-3">
					<?php
					echo '<img id="fireimg" src="data:image/jpeg;base64,'.base64_encode( $galleryresultC['gallery_imgbig'] ).'"/>';
					?>
					</li>
                    <li id="slide-4">
					<?php
					echo '<img id="kimiimg" src="data:image/jpeg;base64,'.base64_encode( $galleryresultD['gallery_imgbig'] ).'"/>';
					?>
					</li>		
				</ul>
				<ul class ="sliderthumbnail">
					<?php
					echo '<li id="thumb-1"><a href="#slide-1"><img src="data:image/jpeg;base64,'.base64_encode( $galleryresultA['gallery_imgbig'] ).'"/></a></li>';
					echo'<li id="thumb-2"><a href="#slide-2"><img src="data:image/jpeg;base64,'.base64_encode( $galleryresultB['gallery_imgbig'] ).'"/></a></li>';
					echo'<li id="thumb-3"><a href="#slide-3"><img src="data:image/jpeg;base64,'.base64_encode( $galleryresultC['gallery_imgbig'] ).'"/></a></li>';
					echo'<li id="thumb-4"><a href="#slide-4"><img src="data:image/jpeg;base64,'.base64_encode( $galleryresultD['gallery_imgbig'] ).'"/></a></li>';
					?>
				</ul>
			</div>
			<div class="imagedesc">
				<div id="desc-1">
					<?php
					echo '<img class="singerimg" src="data:image/jpeg;base64,'.base64_encode( $galleryresultA['gallery_imgsmall'] ).'"/>';
					echo'<div class ="description">
						<h3>'.$galleryresultA['gallery_singer'].'</h3>
						<h3>'.$galleryresultA['gallery_song'].'</h3>
						<h4>.'.$galleryresultA['gallery_description'].'.</h4>
					</div>'
					?>
				</div>
				<div id="desc-2">
					<?php
					echo '<img class="singerimg" src="data:image/jpeg;base64,'.base64_encode( $galleryresultB['gallery_imgsmall'] ).'"/>';
					echo'<div class ="description">
						<h3>'.$galleryresultB['gallery_singer'].'</h3>
						<h3>'.$galleryresultB['gallery_song'].'</h3>
						<h4>.'.$galleryresultB['gallery_description'].'.</h4>
					</div>'
					?>
				</div>
                <div id="desc-3">
                    <?php
					echo '<img class="singerimg" src="data:image/jpeg;base64,'.base64_encode( $galleryresultC['gallery_imgsmall'] ).'"/>';
					echo'<div class ="description">
						<h3>'.$galleryresultC['gallery_singer'].'</h3>
						<h3>'.$galleryresultC['gallery_song'].'</h3>
						<h4>.'.$galleryresultC['gallery_description'].'.</h4>
					</div>'
					?>
                </div>
                <div id="desc-4">
                    <?php
					echo '<img class="singerimg" src="data:image/jpeg;base64,'.base64_encode( $galleryresultD['gallery_imgsmall'] ).'"/>';
					echo'<div class ="description">
						<h3>'.$galleryresultD['gallery_singer'].'</h3>
						<h3>'.$galleryresultD['gallery_song'].'</h3>
						<h4>.'.$galleryresultD['gallery_description'].'.</h4>
					</div>'
					?>
                </div>
			</div>
		</div>
	</div>
	<!-- gallery -->
	<!-- donate -->
	<div class ="donate">
		<div class="donateform">
			<h1>Donate!</h1>
			<form>
				<label>IC Number</label>
				<br/>
				<input type="text" id="ic-no" name="ic-no" placeholder="S1234567Z" pattern="(^[STFGstfg]\d{7}[A-Za-z]$)" required>
				<br/>
				<label>Email</label>
				<br/>
				<input type="email" id="email" name="email" placeholder="xx@xx.com" required>
				<br/>
				<label>Date</label>
				<br/>
				<input type="date" id="date" name="date" placeholder="1/1/2017" required>
				<br/>
				<label>Region</label>
				<br/>
				<select>
				  <option value="asia">Asia</option>
				  <option value="europe">Europe</option>
				  <option value="na">North America</option>
				</select>
				<br/>
				<label>Donation Amount(USD)</label>
				<input list="amount" name="amount" min="5" max="100" required>
				<datalist id="amount">
					<option value="5">
					<option value="10">
					<option value="50">
				 </datalist>
				<input type="submit" value="Submit">
			</form>
		</div>
	</div>
	<!-- donate -->
	<div class="graph" id="admin">
		<!--<h1>Graph</h1> -->
		<!--<h2>Amount of donations by region</h2>-->
        <!--<canvas id="myChart"></canvas>-->
		<form action="site.php" method="post">
		<input type="search" name="searchvalue" placeholder="Value To Search">
        <input type="submit" name="search" id="searchsubmit" value="Filter">
		<div class ="tablebg">
			<table id="customers">
				<tr>
					<th>Id</th>
					<th>Username</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Age</th>
					<th>Contact</th>
					<th>Email</th>
					<th>Address</th>
				</tr>
				<?php while($row = mysqli_fetch_array($result)):?>
				<tr id="row=<?php echo $row['user_id'];?>">
                    <td><?php echo $row['user_id'];?></td>
                    <td><?php echo $row['user_username'];?></td>
                    <td><?php echo $row['user_name'];?></td>
					<td><?php echo $row['user_gender'];?></td>
					<td><?php echo $row['user_age'];?></td>
					<td><?php echo $row['user_contact'];?></td>
					<td><?php echo $row['user_email'];?></td>
					<td><?php echo $row['user_address'];?></td>
					<td><input type="button" value ="edit" onclick="editrow('<?php echo $row['user_id'];?>','<?php echo $row['user_username'];?>','<?php echo $row['user_name'];?>','<?php echo $row['user_gender'];?>','<?php echo $row['user_age'];?>',
					'<?php echo $row['user_contact'];?>','<?php echo $row['user_email'];?>','<?php echo $row['user_address'];?>')"></td>
                </tr>
                <?php endwhile;?>
			</table>
			
		</div>	
		</form>
		<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
		
	</div> 
    <!-- donate -->
    <!-- music player -->
    <div class="music-player">
        <div class="buttonm">
            <img id="minimize" src ="https://material.io/icons/static/images/icons-180x180.png" />
        </div>
        <audio src="https://s0.vocaroo.com/media/download_temp/Vocaroo_s0YwG4AKKDKB.mp3" id="audioPlayer">
            Your browser does not support
        </audio>
        <!-- design -->
        <div class="playercontainer">
            <div class="player">
                <div class="playertop">
                    <div class="playercover">
                        <img src="https://upload.wikimedia.org/wikipedia/en/c/c1/Kimi_no_Shiranai_Monogatari_cover.jpg" class="imagecover">
                    </div>
                </div>
                <div class="playerbottom">
                    <img src="https://upload.wikimedia.org/wikipedia/en/c/c1/Kimi_no_Shiranai_Monogatari_cover.jpg" class="imagecover" />
                    <div class="album-info">
                        <span class="album-title">
                            Today Is a Beautiful Day
                        </span>
                        <span class="song-title">
                            Kimino Shiranai Monogatari
                        </span>
                        <span class="player-controls">
                            <span id="step backword" class="glyphicon glyphicon-step-backward"></span>
                            <span class="glyphicon glyphicon-step-forward"></span>
                            <span onclick="volumedecrease()" class="glyphicon glyphicon-volume-down"></span>
                            <span onclick="volumeincrease()" class="glyphicon glyphicon-volume-up"></span>
                        </span>
                        <div class="player-footer">
                            <div id="defaultBar">
                                <div id="progressBar"></div>
                            </div>
                            <span id="playbutton" onclick="play()" class="glyphicon glyphicon-play"></span>
                            <span id="fullDuration">0:00</span>
                            <span id="currentTime">0:00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- music player -->
        <ul class="bubbles">
            <li class="bubblecolor"></li>
            <li class="bubblecolor"></li>
            <li class="bubblecolor"></li>
            <li class="bubblecolor"></li>
            <li class="bubblecolor"></li>
        </ul>

</body>
</html>