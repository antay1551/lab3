<!DOCTYPE html>
<html>
	<head>
		<title>site</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<!-- HEADER  -->
		<header class="header">
		   <div class="container">
			<h1>Main Header Here</h1>
			 <h2>
			   <small>small sub</small>
			 </h2>
		    </div>
		</header>
		<!-- /HEADER  -->
		<!-- NAV  -->
		<nav class="page-navigation">
			<div class="container">
				<ul>
					<li><a href="allMedia.php">all media</a></li>
					<li><a href="#">about</a></li>
					<li><a href="#">conect</a></li>
				</ul>
				<!-- login form -->
				<form action="#" class="login">
					<input type="text" placeholder="Login" required>
					<input type="password" placeholder="Password" required>
					<input type="submit" placeholder="Sign In" required>
				</form>
				<!-- /login form -->
			</div>
		</nav>
		<!-- /NAV  -->
		<!-- MAIN  -->
		<?php
        class AllInfo {
            static public $con;
            function __construct(  ){
                self::$con = Connection::get_instance()->dbh;
            }
            static public function getAllInfo(){
                $records = [];
                $res = self::$con->query("SELECT * FROM all_info");
                while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                    $records[] = $row;
                }
                return $records;
            }
        }




        require_once 'connection.php';
        $obj_select= new AllInfo();
        $res_select=$obj_select->getAllInfo();
        for ($i = 0; $i < count($res_select);$i++ ) {
            if($res_select[$i]['type'] == 'video'){
                $src = $res_select[$i]['src'];
                ?>
                <div class="collections-item-outer">
                    <div class="collection-item">
                        <video controls>
                            <source src="video/<?php echo"$src"?>" type="video/mp4">
                        </video>
                        <div class="collection-text">
                            <h3>List Element Item</h3>
                            <p>text text text text text text text text text text text text text
                                text text text text text text text text text text text text text text
                                text text text text text text text text text text text text text text
                                text text text text text text text text text text text text text text
                                text text text text text text text text text text text text text text
                                text text text text text text text text text text text text text text
                                text text text text text text text text text text text text text text
                            </p>
                            <button>Read More...</button>
                        </div>
                    </div>
                </div>
            <?php
            }elseif( $res_select[$i]['type'] == 'img'){
                $src = $res_select[$i]['src'];
                ?>
                <div class="collections-item-outer">
                    <div class="collection-item">
                        <img src="img/<?php echo"$src"?>" alt="List picture" width="" height="">
                    </div>
                </div>
                <?php
            }else {
                $src = $res_select[$i]['src'];
                ?>
                <audio controls>
                  <source src="" type="audio/ogg">
                  <source src="audio/<?php echo"$src"?>" type="audio/mpeg">
                  Your browser does not support the audio element.
                </audio>
            <?php  }

        }
        ?>

		<!-- /MAIN  -->
		<!-- FOOTER  -->
		<footer class="footer">
			<div class="container">
				<p>Copyright @copy 2017</p>
			</div>
		</footer>
		<!-- /FOOTER  -->
	</body>
</html>