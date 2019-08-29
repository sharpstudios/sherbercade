<html>
	<head>
		<title>Sherbercade - Demo Game</title>
		<style>
			@keyframes title {
				0% {
					height: 80%;
					top: 10%;
					left: 31.2%;
				}
				50% {
					height: 100%;
					top: 0%;
					left: 26.5%;
				}
				100% {
					height: 80%;
					top: 10%;
					left: 31.2%;
				}
			}
			body {
				background: #222;
				margin: 0px;
				padding: 0px;
			}
			#game_contain {
				position: absolute;
				top: 0px;
			}
			#game_sprite {
				display: block;
				height: 50%;
				margin-left: 5%;
				margin-top: 45%;
			}
			#game_basketball {
				display: block;
				width: 10%;
				position: absolute;
				top: 50%;
				left: 25%;
			}
			.game_dots {
				height: 2.5%;
				width: 2.5%;
				background-color: #FFF;
				border-radius: 100%;
				position: absolute;
			}
			#game_dot1 {
				top: 46.3936%;
				left: 35%;
			}
			#game_dot2 {
				top: 44.6798%;
				left: 40%;
			}
			#game_dot3 {
				top: 43.6394%;
				left: 45%;
			}
			#game_dot4 {
				top: 43.2904%;
				left: 50%;
			}
			#game_net {
				position: absolute;
				right: 5%;
				top: 30%;
				height: 65%;
			}
			#topbar {
				width: 90%;
				height: 11%;
				position: absolute;
				top: 5%;
				left: 5%;
			}
			#topbar_left {
				width: 15%;
				height: 100%;
				background: #DDD;
				position: absolute;
				top: 0px;
				left: 0px;
				border: 5px solid #000;
				border-radius: 5%;
			}
			#topbar_right {
				width: 15%;
				height: 100%;
				background-color: #DDD;
				position: absolute;
				top: 0px;
				right: 0px;
				border: 5px solid #000;
				border-radius: 5%;
			}
			#topbar_control {
				width: 65%;
				height: 100%;
				background-color: #DDD;
				position: absolute;
				top: 0px;
				left: 17.5%;
				border: 5px solid #000;
				border-radius: 5%;
			}
			#topbar_left_title {
				font-size: 1.7vw;
				text-align: center;
				color: #222;
			}
			#topbar_left_number {
				font-size: 3.4vw;
				text-align: center;
				color: #444;
			}
			#topbar_right_title {
				font-size: 1.7vw;
				text-align: center;
				color: #222;
			}
			#topbar_right_time {
				font-size: 3.4vw;
				text-align: center;
				color: #444;
			}
			#topbar_control_title {
				height: 80%;
				position: absolute;
				top: 10%; /*10% -> 0%*/
				left: 31.2%; /*31.2 -> 26.5*/
				animation-name: title;
				animation-duration: 2s;
				animation-timing-function: linear;
				animation-iteration-count: infinite;
			}
			#topbar_control_menu {
				height: 40%;
				width: 20%;
				position: absolute;
				top: 30%;
				left: 2.5%;
				border-radius: 10%;
				border: 2px solid #000;
				background: #2980B9;
				background: linear-gradient(to left, #FFFFFF, #6DD5FA, #2980B9);
				font-size: 0.8vw;
			}
			#topbar_control_start {
				height: 40%;
				width: 20%;
				display: block;
				position: absolute;
				top: 30%;
				right: 2.5%;
				border-radius: 10%;
				border: 2px solid #000;
				background: #a8ff78;
				background: linear-gradient(to right, #78ffd6, #a8ff78);
				font-size: 0.8vw;
			}
			#topbar_control_stop {
				height: 40%;
				width: 20%;
				display: none;
				position: absolute;
				top: 30%;
				right: 2.5%;
				border-radius: 10%;
				border: 2px solid #000;
				background: #f12711;
				background: linear-gradient(to right, #f5af19, #f12711);
			}
			#game_throw {
				height: 5%;
				width: 20%;
				position: absolute;
				bottom: 5%;
				left: 40%;
				border: 2px #000 solid;
				border-radius: 10%;
				font-size: 1.2vw;
				background: #654ea3;
				background: linear-gradient(to right, #eaafc8, #654ea3);
			}
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
			window.onload = function() {
				$(window).resize (function () {
					var h = $(window).height();
					var w = $(window).width();
					if (h > w) {
						var l = w;
						$("#game_contain").css("margin-top",(h-l)/2)
					}
					else {
						var l = h;
						$("#game_contain").css("margin-left",(w-l)/2)
					}
					$("#game_contain").css("height",l);
					$("#game_contain").css("width",l);
				});
				var h = $(window).height();
				var w = $(window).width();
				if (h > w) {
					var l = w;
					$("#game_contain").css("margin-top",(h-l)/2)
				}
				else {
					var l = h;
					$("#game_contain").css("margin-left",(w-l)/2)
				}
				$("#game_contain").css("height",l);
				$("#game_contain").css("width",l);
			};

			var angle = 20;
			var angleAccend = true;
			var throw_ball = false;
			var throw_x = -1;
			var throw_angle = 0;
			var startTime = 0;
			var throw_ball_run = false;
			var a1 = null;
			var a2 = null;
			var a3 = null;
			var net = 0;
			var hitNet = false;
			var hits = 0;

			function findPosition(x,a) {
				function radians(d) {
					return (d * Math.PI) /180;
				}
				function degrees(r) {
					return (r * 180) / Math.PI;
				}
				y = 0.75 * Math.tan(radians(a));
				c = (1 - y^2) / (-2 * y);
				t = degrees(Math.atan(1 / (-1 * c)));
				r = y - c;
				t2 = -1 * x * t;
				return 48.75 - (20 * ((Math.cos(radians(t2)) * r) + c)); 
			}

			function updateClock() {
				if (netHit == true) {
					hits = hits + 1;
					$("#topbar_left_number").html(hits);
					netHit = false;
				}
				var currentSetting = $("#topbar_right_time").html();
				var currentMin = currentSetting[0];
				var currentSec = (currentSetting[2] * 10) + currentSetting[3];
				var timeInSetting = Math.round((currentMin * 60) + currentSec);
				var currentTime = Math.round((new Date()).getTime() / 1000);
				var timeLeft = (startTime + 120) - currentTime;
				if (timeLeft % 60 < 10) {
					var secondSetting = "0" + (timeLeft % 60);
				}
				else {
					var secondSetting = timeLeft % 60;
				}
				var minuteSetting = Math.floor(timeLeft / 60);
				if (timeLeft != timeInSetting) {
					$("#topbar_right_time").html(minuteSetting + ":" + secondSetting);
				}
				if (timeLeft <= 0) {
					stopGame();
				}
			}

			function moveDots(a) {
				$("#game_dot1").css("top",findPosition(-0.75,a) + "%");
				$("#game_dot2").css("top",findPosition(-0.5,a) + "%");
				$("#game_dot3").css("top",findPosition(-0.25,a) + "%");
				$("#game_dot4").css("top",findPosition(0,a) + "%");
			}

			function resetGame() {
				throw_ball = false;
				angle = 20;
				angleAccend = true;
				startTime = 0;
				hits = 0;
				$("#topbar_right_time").html("2:00");
				$("#topbar_left_number").html("0");
			}

			function stopGame() {
				clearInterval(a1);
				clearInterval(a2);
				a1 = null;
				a2 = null;
				$("#topbar_control_start").css("display","block");
				$("#topbar_control_stop").css("display","none");
			}

			function startGame() {
				resetGame();
				$("#topbar_control_start").css("display","none");
				$("#topbar_control_stop").css("display","block");
				startTime = Math.round((new Date()).getTime() / 1000);
				a1 = setInterval(game, 8);
				a2 = setInterval(updateClock, 250);
			}

			function ballTravel() {
				var netContact = [27.55,29.04,30.43,31.92,33.21,34.8,36.28,37.67,39.16,40.55];
				var throw_y = findPosition(throw_x,throw_angle);
				$("#game_basketball").css("top",(throw_y-3.75)+"%");
				$("#game_basketball").css("left",(51.25 + (throw_x * 21.25)) + "%");
				if (throw_y - 3.75 < netContact[net] + 5 && throw_y - 3.75 > netContact[net] - 5) {
					var netBeenHit = true;
				}
				if (throw_x <= 0.9 && throw_x >= -1) {
					throw_x = throw_x + 0.05;
				}
				else {
					if (netBeenHit == true) {
						netHit = true;
						netBeenHit = false;
					}
					clearInterval(a3);
					a3 = null;
					throw_ball = false;
					throw_ball_run = false;
					throw_x = -1;
					net = Math.floor(Math.random() * 10);
					$("#game_net").attr("src","imgs/basketball_net"+net+".png");
				}	
			}

			function game() {
				if (throw_ball == true) {
					if (throw_ball_run == false) {
						throw_angle = angle;
						throw_ball_run = true;
						a3 = setInterval(ballTravel, 25);
					}
				}
				else {
					$("#game_basketball").css("top","50%");
					$("#game_basketball").css("left","25%");
					moveDots(angle);
				}
				if (angleAccend == true && angle < 63) {
					angle = angle + 1;
				}
				else if (angle == 63) {
					angle = angle - 1;
					angleAccend = false;
				}
				else if (angleAccend == false && angle > 20) {
					angle = angle - 1;
				}
				else {
					angle = angle + 1;
					angleAccend = true;
				}
			}

			function throwball() {
				throw_ball = true;
			}

		</script>
	</head>
	<body>
		<div id="game_contain">
			<div id="topbar">
				<div id="topbar_left">
					<div id="topbar_left_title">Score</div>
					<div id="topbar_left_number">0</div>
				</div>
				<div id="topbar_control">
					<a href="/">
						<button id="topbar_control_menu">Back To Menu</button>
					</a>
					<img id="topbar_control_title" src="imgs/betatitle.png">
					<button id="topbar_control_start" onclick = "startGame();">Start</button>
					<button id="topbar_control_stop" onclick = "stopGame();">Stop</button>
				</div>
				<div id="topbar_right">
					<div id="topbar_right_title">Time Left</div>
					<div id="topbar_right_time">2:00</div>
				</div>
			</div>
			<img id="game_sprite" src="imgs/sprite_basketball.png">
			<img id="game_basketball" src="imgs/basketball.png">
			<div class="game_dots" id="game_dot1"></div>
			<div class="game_dots" id="game_dot2"></div>
			<div class="game_dots" id="game_dot3"></div>
			<div class="game_dots" id="game_dot4"></div>
			<img id="game_net" src="imgs/basketball_net0.png">
			<button id="game_throw" onclick="throwball();">Throw the Ball</button>
		</div>
	</body>
</html>