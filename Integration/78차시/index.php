<?
$host = "HOST";
$id = "USERID";
$pw = "******";
$db = "DBNAME";

$connection = mysqli_connect($host, $id, $pw, $db);

// if there is an error die;
if(mysqli_connect_errno()) {
	die("db connection error : ".mysqli_connect_errno());
}

// get character as utf8
mysqli_query($connection, "SET NAMES 'utf8';");

// check that request is posting request
if( ($content = @$_POST['content'])
	&& ($author = @$_POST['author'])
	&& ($title = @$_POST['title'])) {
	$query = sprintf("INSERT INTO `Posting` (`no`, `title`, `date`, `content`, `author`) " 
		."VALUES (NULL, '%s', '%s', '%s', '%s');", 
		mysqli_real_escape_string($connection, htmlspecialchars($title)), 
		date("Y-m-d"), 
		mysqli_real_escape_string($connection, htmlspecialchars($content)), 
		mysqli_real_escape_string($connection, htmlspecialchars($author)));
	mysqli_query($connection, $query);

	header("Refresh:0;");
	die;
}

if(($no = @$_POST['no'])) {
	if(is_numeric($no)) {
		$query = sprintf("DELETE FROM `Posting` WHERE `no` = %s", 
			mysqli_real_escape_string($connection, $no));
		mysqli_query($connection, $query);
		
		header("Refresh:0;");
	}
	die;
}

$posts = array();

if($searchKeyword = @$_GET['s']) {
	$searchKeyword = mysqli_real_escape_string($connection, htmlspecialchars($searchKeyword));
	$query = sprintf("SELECT * FROM `Posting` WHERE `title` LIKE '%%%s%%' OR `content` LIKE '%%%s%%' OR `author` LIKE '%%%s%%';",
		$searchKeyword,
		$searchKeyword,
		$searchKeyword);
} else {
	$query = "SELECT * FROM `Posting` WHERE 1;";
}

if($queryResults = mysqli_query($connection, $query)) {
	while($row = mysqli_fetch_assoc($queryResults)) {
		array_push($posts, $row);
	}
	mysqli_free_result($queryResults);
}
mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>게시판 만들기!</title>
	
	<!-- Bootstrap core CSS
	================================================== -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
	<script src="http://code.jquery.com/jquery-latest.min.js" type='text/javascript'></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script type='text/javascript'>
	function validate(form) {
		if(form.title.value == "") {
			alert('제목을 입력하지 않았습니다.');
			return false;
		} else if(form.author.value == "") {
			alert('글쓴이를 입력하지 않았습니다.');
			return false;
		} else if(form.content.value == "") {
			alert('글을 입력하지 않았습니다.');
			return false;
		}

		return true;
	}

	function validateForSearch(form) {
		if(form.s.value == "") {
			alert("검색할 키워드를 입력해주세요.");
			return false;
		}
		return true;
	}

	</script>

    <!-- Custom Style
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<!-- Navigation
	================================================== -->
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="./">게시판</a>
				<p class="navbar-text">간단한 게시판 만들기!</p>
			</div>

			<!-- 검색 -->
			<form class="nav navbar-nav navbar-form navbar-right" role="search" method='get' onsubmit='javascript:return validateForSearch(this);'>
				<div class="form-group">
					<input type="text" class="form-control" name="s" placeholder="검색할 키워드" value="<?=@$_GET['s']?>">
				</div>
				<button type="submit" class="btn btn-default">검색</button>
			</form>
		</div>
	</nav>

	<div class="container">
		<!-- Post -->
		<?php

		foreach($posts as $index => $val) {
			
			?>
			<div>
				<form method='post'>
					<input type='hidden' value="<?=$val['no']?>" name='no'>
					<button type='submit' class='right no-border'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>
					<h3><?=$val['title']?><small><?=$val['author']?> (<?=$val['date']?>)</small></h3>
					<p><?=$val['content']?></p>
				</form>
			</div>
			<?

			if($index < count($posts) - 1) {
				echo "<hr>";
			}
		}

		?>

		<!-- Button for writing new post -->
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#writingModal">New Post!</button>

		<!-- Modals
		==================================== -->
		<!-- Modal for writing new post -->
		<div class="modal fade" id="writingModal" tabindex="-1" role="dialog" aria-labelledby="writingModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<!-- Modal Head -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="writingModalLabel">Writing A New Post!</h4>
					</div>
					<form id='modal-form' name='modal-form' class="form-horizontal" method='post' action='.' onsubmit="javascript:return validate(document.getElementById('modal-form'));">
						<!-- Modal Body -->
						<div class="modal-body">
							<!-- Input Title -->
							<div class="form-group">
								<label for="inputTitle" class="col-sm-2 control-label">Title</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputTitle" placeholder="Title" name='title'>
								</div>
							</div>
							<!-- Input Author -->
							<div class="form-group">
								<label for="inputAuthor" class="col-sm-2 control-label">Author</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="inputAuthor" placeholder="Author" name='author'>
								</div>
							</div>
							<!-- Input Content -->
							<div class="form-group">
								<label for="inputContent" class="col-sm-2 control-label">Content</label>
								<div class="col-sm-10">
									<textarea id="inputContent" placeholder='Content' class='form-control' name='content'></textarea>
								</div>
							</div>
						</div>
						<!-- Modal Footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Post!</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!-- /.container -->
</body>
</html>