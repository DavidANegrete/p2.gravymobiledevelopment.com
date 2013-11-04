<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>
	
	<link href='http://fonts.googleapis.com/css?family=Press+Start+2P' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	
	<div>
		<div class = "wrapper">
			<h3 class ="branding-title"><a href="./">Yapper</a></h3>
			<?php if($user): ?>
                <li class="settings"><a href="/users/settings">settings</a></li>
                <li class="log-out"><a href="/users/logout">log out</a></li>
                <li class="home"><a href="/users/profile">home</a></li>
   			<?php else: ?>
				<li class="sign-in"><a href="/users/login">sign  in</a></li>
				<li class="sign-up"><a href="/users/signup">sign up</a></li>
			<?php endif; ?>
		</div>

	</div>

	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>