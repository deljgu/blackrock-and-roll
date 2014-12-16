<!DOCTYPE html>
<!--
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
	use this for XHTML 1.1 STRICT, instead of html5 set by first line
-->
<!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<head>
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="http://www.wavesurfer.fm/build/wavesurfer.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:700&amp;subset=latin-ext,latin' rel='stylesheet' type='text/css'/>
	<link rel="icon" type="image/png" href="img/favicon.png"/>
	<title>Blackrock & Roll</title>
	<meta name="description" content="Private music band rehearsal helping tool"/>
	<meta name="author" content="Tomislav Gudelj"/>
</head>
<body>
	<?php
		$dir = "mp3/*";
		echo '<div class="players_global_container">';
		foreach(glob($dir) as $file){
			echo '<div class="players_own_container">
					<div class="hotlink inline">
						<a href="'.$file.'"><!--should escape spaces as %20-->
							<label>url</label>
						</a>
					</div>
					<div class="audio_control inline">
						<audio controls class="players">
							<source src="'.$file.'" type="audio/mpeg"><!--should escape spaces as %20-->
						</audio>
					</div>
					<div class="names inline">
						<label class="nameLabels">'.str_replace("mp3/","",$file).'</label>
					</div><br />
				</div>';
		}
		echo '<div class="clearBoth"></div></div>';
	?>

	<div class="cantSee" onclick="expandMargins();">
		<label>Can't see shit? Click Here!</label>
	</div>
	<div class="cantSee tooMuch" onclick="contractMargins();">
		<label>See too much shit? Click Here!</label>
	</div>
	<footer>
		<address>
			Written by <a href="mailto:tomislav.firehunter@gmail.com">Tomislav Gudelj</a>.<br> 
			ETFOS<br>
			Croatia
		</address>
	</footer>
</body>
<script>
	var nameLabels=document.getElementsByClassName("nameLabels");
	var players_own_container=document.getElementsByClassName("players_own_container");
	var audio_control=document.getElementsByClassName("audio_control");
	var players=document.getElementsByClassName("players");
	var originalNameLabels=new Array();
	var originalMargin;
	function shortStringManage(){
		for(x in nameLabels){
			if($(nameLabels[x]).text()=="..."){
				$(nameLabels[x]).text(originalNameLabels[x]);
			}
			if($(nameLabels[x]).width()>$(window).width()*0.50 && !($(nameLabels[x]).width()==$(window).width())){
				$(nameLabels[x]).text("...");
			}
			//alert("dfg");//fires
		}
		//alert("asd");//does not
	}
	$(document).ready(function(){
		var bonusHeight="+="+($(players).height()-28);
		$(players_own_container).css("margin-bottom",bonusHeight);
		var originalMargin=$(players_own_container).css("margin-bottom");
		/*shortStringManage();*/
	});
	function expandMargins(){//and players, "procs when can't see shit"
		var howMuch="+=80px";
		$(players_own_container).css("margin-bottom",howMuch);
		//$(audio_control).css("width","15%");//can break on certain phones
	}
	function contractMargins(){//procs when "too much shit"
		var howMuch="-=80px";
		var saveCurrent=$(players_own_container).css("margin-bottom");
		$(players_own_container).css("margin-bottom",howMuch);
		//$(audio_control).css("width","40%");//can break on certain phones
		if($(players_own_container).css("margin-bottom")[0]=='-'){
			$(players_own_container).css("margin-bottom",saveCurrent);
		}
			
	}
	/*var wavesurfer = Object.create(WaveSurfer);
	wavesurfer.init({
	    container: document.querySelector('.wave'),
	    waveColor: 'green',
	    progressColor: 'white'
	});
	wavesurfer.on('ready', function () {
	    //wavesurfer.play();
	});
	wavesurfer.load('mp3/Alice In Chains - Would (99).mp3');*/
</script>
<style>
	body{
		background-color:black;
		background-image:url("http://subtlepatterns.com/patterns/soft_kill.png");
	}
	a{
		color:#B2E0B2;
		font-family: 'Josefin Sans', sans-serif;
	}
	footer{
		margin-bottom:10%;
		margin-right:1%
	}
	address{
		color:white;
		text-align:right;
	}
	.cantSee{
		height:10%;
		position:fixed;
		bottom:0px;
		background: black;
		text-align:center;
		border:1px solid rgba(170,170,170,0.4);
		color:#B2E0B2;
		left:0px;
		width:50%;
		overflow:hidden;
	}
	.tooMuch{
		left:50%;
	}
	.players_own_container{
		vertical-align:middle;
		background: rgba(170,170,170,0.2);
		height:28px;/*here is why 28px from JS*/
		margin-bottom:0.5%;
		width:100%;
		color:#B2E0B2;
		font-family: 'Josefin Sans', sans-serif;
	}
	.names{
		width:45%;
		height:28px;
		line-height:28px;
		overflow:hidden;
	}
	.names,.hotlink{
		position:relative;
		margin-right:1%;
		margin-left:1%;
		font-weight:bold;
	}
	.hotlink{
		top:15%;
	}
	.audio_control{
		width:40%;
	}
	.players{
		width:100%;
		height:28px;
	}
	.inline{
		float:left;
	}
	.clearBoth{
		clear:both;
	}
</style>