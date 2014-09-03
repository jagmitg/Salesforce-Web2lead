<!DOCTYPE HTML>
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<title>Salesforce Web2lead Example</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.0.2/css/bootstrap2/bootstrap-switch.css"/>
</head>
<body>
	<div class="main-container">
		<?php include ('class/config.php');?>

			<form class="form-contact" id="contactform" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

				<div id="alertMore" class="alert alert-danger" <?php if(isset($error) && trim($error) != ""){  }else{ echo 'style="display:none;"'; } ?>>
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?php if(isset($error) && trim($error) != ""){ echo $error; } ?>
				</div>
			
				<input type='hidden' name="lead_source" value="web-to-lead">
				<input type='hidden' name="00ND0000005WdkH" value="Grade 3 (Hot)">
				<input type="hidden" id="recordType" name="recordType" value="012D0000000kQtI">
				<input type='hidden' name="00ND0000005ggmA" value="Example value">


				<label for="first_name">First Name*</label>
				<input  id="first_name"  name="first_name"type="text" value="<?php echo $_POST['first_name']; ?>" /><br>

				<label for="last_name">Last Name*</label>
				<input  id="last_name" name="last_name" type="text"  value="<?php echo $_POST['last_name']; ?>"/><br>

				<label for="email">Email Address*</label>
				<input  id="email" value="<?php echo $_POST['email']; ?>" name="email" type="text" /><br>

				<label for="company">Company*</label>
				<input  id="company" value="<?php echo $_POST['company']; ?>" name="company" type="text" /><br>

				<label for="00ND0000005gYZo">Example Custom Textbox</label>
				<input id="00ND0000005gYZo" value="<?php echo $_POST['00ND0000005gYZo']; ?>" name="00ND0000005gYZo" type="text">

				<div class="form-inline">
				  <label class="checkbox" for="00ND0000005x7lH" style="margin-top: 15px; margin-right: 15px;">Example checkbox</label>
				  <input type="checkbox" class="switch switch-success" name="00ND0000005x7lH" data-label-on="YES"  data-label-off="NO" value="1" />
				</div>

				<?php if($captcha){ ?>
				<br/><br/>
					<div class="form-inline">
						<label id="spambot">(Are you human, or spambot?)</label>
						<input id="num1" class="sum" type="text" name="num1" value="<?php echo rand(1,4) ?>" readonly="readonly" /> +
						<input id="num2" class="sum" type="text" name="num2" value="<?php echo rand(5,9) ?>" readonly="readonly" /> =
						<input id="captcha" class="captcha" type="text" name="captcha" maxlength="2" />
					</div>
				<?php } ?>
				<br><input type="submit" class="submit" value="REGISTER NOW" id="send" name="submit">
			</form>
		</div>
</body>
</html>
