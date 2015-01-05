<section style="height:80px;" class="center" >
	<img src="../images/logo.png" width="216px" height="48px" align="left" style="padding-top:15px"/>
	<nav id="navListHeader">
		<ul>
			
			<?php
			if(isset($_SESSION["userid"]) ||isset($_SESSION["sid"]))
			{
				if(isset($_SESSION["userid"]))
					echo '<li><a href="myinfo.php?ut=u">My Account</a> |</li>';
				elseif(isset($_SESSION["sid"]))
					echo '<li><a href="myinfo.php?ut=sp">My Account</a> |</li>';
				else	
					echo "";		
			}
			else
			{
				echo '<li><a href="index.php">Home</a> |</li>';
			}
			?>
			<li><a href="partyideas.php">Party ideas</a> |</li>
			<li><a href="testimonial.php">Testimonials</a> |</li>
			<li><a href="contact.php">Contact Us</a> |</li> 
			<?php
			if(isset($_SESSION["userid"])  || isset($_SESSION["sid"]))
			{
				echo '<li><a href="logout.php">Logout</a> </li>';
			}
			else
			{
				
				echo '<li><a href="register.php">Sign Up</a> |</li>
				<li><a href="login.php">Sign In</a></li>';
			}
			?>
		</ul>
	</nav>
</section>
