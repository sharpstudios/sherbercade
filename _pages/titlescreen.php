<html>
	<head>
		<title>Sherbercade</title>
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
			#buttons {
				width: 600px;
				height: 50px;
				position: absolute;
				left: 50%;
				margin-left: -300px;
				bottom: 20%;
			}
			button {
				width: 250px;
				height: 50px;
				border-radius: 7.5%;
				border: 4px solid #000;
			}
			#buttons_demo {
				position: absolute;
				top: 0px;
				left: 0px;
				background: #FDC830;
				background: linear-gradient(to right, #F37335, #FDC830); 
			}
			#buttons_demo_contain {
				width: 100%;
				height: 100%;
				display: block;
				top: 0;
				left: 0;
			}
			#buttons_demo_img {
				height: 80%;
				position: absolute;
				top: 10%;
				left: 5%;
				display: block;
			}
			#buttons_demo_txt {
				height: 80%;
				position: absolute;
				top: 15%;
				left: 30%;
				font-size: 24px;
			}
			#buttons_login {
				position: absolute;
				top: 0px;
				right: 0px;
				font-size: 24px;
				background: #11998e;
				background: linear-gradient(to right, #38ef7d, #11998e);
			}
		</style>
	</head>
	<body>
		<div id="title">
			<img id="title_img" src="imgs/betatitle.png">
		</div>
		<center>
			<div id="buttons">
				<a href="?game=basketball">
					<button id="buttons_demo">
						<div id="buttons_demo_contain">
							<img src="imgs/basketball.png" id="buttons_demo_img">
							<div id="buttons_demo_txt">Demo Game</div>
						</div>
					</button>
				</a>
				<button id="buttons_login" onclick="alert('This feature is currently not available in this beta version.');">Login</button>
			</div>
		</center>
	</body>
</html>