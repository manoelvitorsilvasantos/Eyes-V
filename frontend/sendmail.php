<?php
	$to = "manoelvitorsilvasantos@gmail.com";
	$subject = "HTML email";

	$message = "
		<html>
			<head>
				<meta charset='UTF-8'>
				<meta name='viewport' content='viewport=device-witdh,initial-scale=1.0'>
				<title>Manoel Vitor</title>
			</head>
			<body>
				<div>
					<h3>Title</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id nibh tortor id aliquet lectus proin nibh nisl. Neque sodales ut etiam sit amet nisl. In cursus turpis massa tincidunt dui ut ornare lectus. Tincidunt ornare massa eget egestas purus viverra accumsan in. Faucibus scelerisque eleifend donec pretium vulputate sapien nec. Luctus accumsan tortor posuere ac ut consequat semper viverra nam. Non pulvinar neque laoreet suspendisse interdum consectetur libero id. Non pulvinar neque laoreet suspendisse interdum consectetur. Odio eu feugiat pretium nibh. Lacinia quis vel eros donec ac. Dolor magna eget est lorem. Lacus luctus accumsan tortor posuere ac ut. Egestas egestas fringilla phasellus faucibus scelerisque. Vitae ultricies leo integer malesuada nunc. Dolor sit amet consectetur adipiscing elit duis. At lectus urna duis convallis.
					</p>
					<p>
					Quam elementum pulvinar etiam non quam. Sed vulputate mi sit amet mauris commodo quis imperdiet massa. Nunc non blandit massa enim nec dui nunc. Volutpat commodo sed egestas egestas fringilla phasellus. Accumsan tortor posuere ac ut consequat. Sed viverra tellus in hac habitasse platea dictumst. Aliquet nec ullamcorper sit amet risus nullam eget felis. Interdum varius sit amet mattis. Sem viverra aliquet eget sit amet. Pharetra massa massa ultricies mi quis hendrerit dolor magna eget. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis. Dictum fusce ut placerat orci. Aliquam vestibulum morbi blandit cursus risus at ultrices mi. Tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Augue eget arcu dictum varius duis. Laoreet sit amet cursus sit amet dictum sit amet. Nisl nunc mi ipsum faucibus vitae aliquet nec ullamcorper. Purus ut faucibus pulvinar elementum integer enim neque volutpat.
					</p>
					<p>
					Quis varius quam quisque id diam vel quam. Lacinia quis vel eros donec ac odio. A lacus vestibulum sed arcu non odio euismod. Nibh mauris cursus mattis molestie a iaculis at erat pellentesque. Ultricies integer quis auctor elit sed. Vitae nunc sed velit dignissim sodales ut eu sem integer. Enim sed faucibus turpis in eu mi bibendum neque. Dictum non consectetur a erat nam at lectus. Integer quis auctor elit sed vulputate mi sit. Sit amet est placerat in egestas erat imperdiet. Faucibus vitae aliquet nec ullamcorper. Magna eget est lorem ipsum dolor sit. Feugiat sed lectus vestibulum mattis ullamcorper velit sed. Nam at lectus urna duis convallis. Feugiat vivamus at augue eget. Donec massa sapien faucibus et. Ut aliquam purus sit amet.
					</p>
					<p>
					Et molestie ac feugiat sed lectus. Risus nec feugiat in fermentum posuere urna nec tincidunt praesent. Quisque id diam vel quam elementum pulvinar etiam. Congue mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Magna eget est lorem ipsum dolor. Magna etiam tempor orci eu. Dictumst quisque sagittis purus sit amet. Id ornare arcu odio ut sem nulla pharetra. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam. Etiam erat velit scelerisque in dictum non. Feugiat in ante metus dictum at. Aliquam sem et tortor consequat id porta nibh. Pulvinar pellentesque habitant morbi tristique senectus et netus. Vestibulum sed arcu non odio euismod.
					</p>
					<p>
					Enim neque volutpat ac tincidunt vitae semper quis. Pellentesque habitant morbi tristique senectus et netus et malesuada. Vitae turpis massa sed elementum tempus egestas sed sed risus. Facilisi etiam dignissim diam quis enim lobortis scelerisque fermentum dui. Fringilla phasellus faucibus scelerisque eleifend. Duis convallis convallis tellus id interdum. Mollis nunc sed id semper risus in hendrerit gravida rutrum. Malesuada fames ac turpis egestas maecenas pharetra. Sagittis orci a scelerisque purus semper. Amet consectetur adipiscing elit duis tristique sollicitudin. Cursus metus aliquam eleifend mi. Nunc scelerisque viverra mauris in aliquam sem fringilla ut. Dui faucibus in ornare quam. Auctor augue mauris augue neque gravida in fermentum et. Dictum at tempor commodo ullamcorper a. Amet facilisis magna etiam tempor. Quis ipsum suspendisse ultrices gravida dictum. Nisi lacus sed viverra tellus in. Mollis nunc sed id semper risus in hendrerit gravida. Enim nulla aliquet porttitor lacus luctus accumsan tortor.
					</p>
				<div>
			</body>
		</html>
	";

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";

	$headers .= 'From: <manoelvitorsilvasantos@gmail.com' . "\r\n";
	mail($to, $subject, $message, $headers); 
?>