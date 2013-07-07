<?php
/*
 * @author     Ralph John Galindo <ralphjesy12@yahoo.com>
 * @since      File last edited since June 27, 2013
 */


echo '<ul class="nav pull-right">
						<li class="dropdown">
							<a id="signupdrop" class="dropdown-toggle" href="#" data-toggle="dropdown">Sign Up <strong class="caret"></strong></a>
							<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
								<form id="myForm" method="POST" action="cont/signup.php" accept-charset="UTF-8">
										<legend><h5>Basic Info</h5></legend>
										<input style="margin-bottom: 15px;" type="text" required="required" placeholder="Firstname" name="fname">
										<input style="margin-bottom: 15px;" type="text" required="required" placeholder="Lastname" name="lname">
										<input style="margin-bottom: 15px;" type="email" required="required" placeholder="Email Address"  name="eml">
										<legend><h5>User Account</h5></legend>
										<input style="margin-bottom: 15px;" type="text" required="required" placeholder="StudID e.g. 2013XXXX-XXXX" name="uname">
										<input style="margin-bottom: 15px;" type="text" required="required" placeholder="Username" name="nick">
										<input style="margin-bottom: 15px;" type="password" required="required" placeholder="Password"  name="pass">
										<input style="margin-bottom: 15px;" type="password" required="required" placeholder="Confirm Password"  name="cpass">
										<button class="btn btn-success btn-block" id="submit">Sign Up</button>
								</form>
								<div id="ack" class="alert hidden"></div>
							</div>
						</li>
						<li class="divider-vertical"></li>
						<li class="dropdown logindrop">
							<a class="dropdown-toggle" href="#" data-toggle="dropdown">Login <strong class="caret"></strong></a>
							<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
								<form id="myForm3" method="post" action="cont/signin.php" accept-charset="UTF-8">
									<legend><h5>Student Login</h5></legend>
									<input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="uname">
									<input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="pass">
									<button class="btn btn-success btn-block" type="submit" id="loginbtn2">Login</button>
								</form>
								<div id="ack3" class="alert hidden"></div>
							</div>
						</li>
						<li class="divider-vertical"></li>
						<li class="dropdown">  
							<a href="#"  
								  class="dropdown-toggle"  
								  data-toggle="dropdown">  
								  <i class="icon-star"></i>
								  <b class="caret"></b>  
							</a>  
							<ul class="dropdown-menu">  
								<li class="socials"><!-- Place this tag where you want the +1 button to render -->  
									<g:plusone annotation="inline" width="150"></g:plusone>  
								</li>  
								<li class="socials"><div class="fb-like" data-send="false" data-width="150" data-show-faces="true"></div></li>  
								<li class="socials"><a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>  
								</li>  
							</ul>  
						</li>  
						
					</ul>
					
					';
					
					
					?>