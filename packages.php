<!DOCTYPE html>
<html>
<head>
	<title>Travel Experts - Vacation Packages</title>
	<meta name="viewport" content="width=device-width">
	<style type="text/css">
		body{color: white; border-top: 0;
    		margin: 0; padding: 0;clear: both;
    		background-image: url("images/bora_bora2.jpeg");
    	}
		header{position: fixed; background-color:#3F3F3F;width: 100%;top: 0;z-index: 5;}
		#navItems{
 		   list-style-type: none;
		   margin: 0;
		   padding: 0;
		   overflow: hidden;
		   background-color:#242424;
		   }
		#tab1, #tab2, #tab3 {float: left;}
		#tab4{float: right;}
		li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			}
		#tab1:hover,#tab2:hover,#tab3:hover,#tab4:hover {background-color: #333;}
		#packageMenu {
			width: 90vw;
			height: 90vh;
			background-color:#242424;
			margin: 3vw;
			opacity: 0.90;
		}
		#sectHead{margin: 1vw;}
		#searchBar{
			background-color:#3F3F3F;
			width: 95%;
			height: 15%;
			margin: 1vw;
		}
		#locations, #timeframe{display: block; float: left;margin: 1vw;}
		label{margin-right: 3vw;}
		.submit{float: right; margin: 1vw;}
		#displayPackages{
			background-color:#BCBCBC;
			width: 95%;height: 65vh;
			margin: 1vw;
			overflow: scroll;
		}
		.dummyItem{
			width: 95%;height: 15vh;
			margin: 1vw;
			background-color:#3F3F3F;
		}
		.dummyDesc{margin: 1vw;}
	</style>
</head>
<body>
	<header>
		<div><h2>Travel Experts (Placeholder Banner)</h2></div>		
		<nav id="navMenu">
			<ul id="navItems">
				<li id="tab1"><a>(item1)</a></li>
				<li id="tab2"><a>(item2)</a></li>
				<li id="tab3"><a>(item1)</a></li>
				<li id="tab4"><a>(item1)</a></li>
			</ul>
		</nav>
	</header>
	<br/><br/><br/><br/><br/><br/><br/>
	<section id="packageMenu">
		<h2 id="sectHead">Search for package</h2>
		<div id="searchBar">
			<form>
				<a id="locations">
					<label>From:
						<input type="text" id="from" name="from" required="true" size="30vw"></label>
					<label>Destination:
						<input type="text" id="destination" name="destination" required="true" size="30vw">
					</label>
				</a>
				<a id="timeframe">
					<label>When:
						<input type="date" name="date">
					</label>
					<label>Days
						<input type="number" name="days">
					</label>
				</a>
					<input type="submit" class="submit" name="submit" value="Search">
			</form>
		</div>
		<div id="displayPackages">
			<div class="dummyItem"><a class="dummyDesc">Dummy Item</a></div>
			<div class="dummyItem"><a class="dummyDesc">Dummy Item</a></div>
			<div class="dummyItem"><a class="dummyDesc">Dummy Item</a></div>
			<div class="dummyItem"><a class="dummyDesc">Dummy Item</a></div>
			<div class="dummyItem"><a class="dummyDesc">Dummy Item</a></div>
			<div class="dummyItem"><a class="dummyDesc">Dummy Item</a></div>
			<div class="dummyItem"><a class="dummyDesc">Dummy Item</a></div>
			<div class="dummyItem"><a class="dummyDesc">Dummy Item</a></div>
		</div>
	</section>
</body>
</html>