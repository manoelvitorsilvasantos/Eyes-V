<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="viewport=device-width,initial-scale=1.0">
		<title>QRCODE Scan -  Whatsapp API</title>
		<style type="text/css">
			*{
				box-sizing: border-box;
				padding:0;
				margin:0;
			}

			.box{
				display:flex;
				flex-direction:column;
				align-content:center;
				align-items:center;
				justify-content:center;
				margin-top:100px;
				padding:10px;
			}

			.box-title h3{
				font-size:24px;
			}

			.box-img img{
				height:300px;
			}

			.box-link a:hover{
				color:#f00;
			}
 

			/*SMARTPHONES PORTRAIT*/
			@media only screen and (min-width:300px){
				.box-img img{
					height:100;
				}

				.box-title h3{
					font-size:14px;
				}
			}

			/*SMARTPHONES LANDSCAPES*/
			@media only screen and (min-width:480px){
				.box-title h3{
					font-size:16px;
				}
			}

			/* TABLETS PORTRAITS */
			@media only screen and (min-width:768px){
				.box-title h3{
					font-size:18px;
				}
			}

			/*TABLET LANDSCAPE / DESKTOP*/
			@media only screen and (min-width:1024px){ 
				.box-img img{
					height: 300px;
				}

				.box-title h3{
					font-size:24px;
				}
			}

			.box-link a{
				font-weight:bold;
				text-decoration:none;
				color:#000;
			}

		</style>
	</head>
	<body>
		<div class="box">
			<div class="box-title">
				<h3>Leia QRCODE - E aperte ENTER.</h3>
			</div>
			<br>
			<div class="box-img">
				<img src="./assets/img/qrcode.png">
			</div>
			<br>
			<div class="box-texto">
				<p>
					Digite no chat do whatsapp: 
					<br>
					<span style="font-weight:bold"> join arm-tree</span>
				</p>
			</div>
			<br>
			<div class="box-link">
				<a href="https://wa.me/14155238886?text=join+arm-tree">Link Acesso</a>
			</div>
		</div>
	</body>
</html>