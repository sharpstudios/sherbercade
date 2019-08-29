<html>
	<head>
		<title>Sherbercade - Beta Access Code</title>
		<style>
			@keyframes title {
				0% {
					width: 80%;
					margin: 10%;
				}
				50% {
					width: 100%;
					margin: 0;
				}
				100% {
					width: 80%;
					margin: 10%;
				}
			}
			body {
				background-color: #222;
				margin: 0;
				padding: 0;
			}
			#title {
				width: 50%;
				height: auto;
				position: absolute;
				top: 10%;
				left: 25%;
			}
			#title_img {
				width: 80%;
				margin: 10%;
				animation-name: title;
				animation-timing-function: linear;
				animation-duration: 2s;
				animation-iteration-count: infinite;
			}
			#form {
				width: 40%;
				height: 20%;
				background-color: #FFF;
				position: absolute;
				bottom: 15%;
				left: 30%;
				border-radius: 2%;
			}
			#form_error {
				height: 20%;
				width: 90%;
				position: absolute;
				top: 5%;
				left: 5%;
				background-color: #FAA;
				text-align: center;
				line-height: 100%;
			}
			#form_title {
				font-size: 22px;
				line-height: 24px;
				display: inline-block;
				margin-right: 10px;
			}
			#form_code {
				height: 24px;
				display: inline-block;
			}
			#form_submit {
				width: 20%;
				height: 20%;
			}
			#form_container {
				position: absolute;
				bottom: 5%;
				width: 100%;
				height: 60%;
			}
		</style>
	</head>
	<body>
		<div id="title">
			<img id="title_img" src="imgs/betatitle.png">
		</div>
		<div id="form">
			<form method="post">
				<?php if (isset($access)) { echo "<div id='form_error'>Access Code Incorrect</div>"; } ?>
					<div id="form_container">
					<center>
						<div id="form_title">Access Code</div>
						<input type="text" name="code" id="form_code">
					</center>
					<br>
					<center>
						<input type="submit" id="form_submit">
					</center>
				</div>
			</form>
		</div>
	</body>
</html>