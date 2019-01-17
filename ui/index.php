<!DOCTYPE html>
<html>
<head>
	<title>Ecommerce</title>
	 <meta charset="UTF-8">
	 <link rel="stylesheet" type="text/css" href="./static/Semantic-UI/dist/semantic.css">
	 <script type="text/javascript" src="./static/scripts/jquery-3.3.1.min.js"></script>
	 <script type="text/javascript" src="./static/Semantic-UI/dist/semantic.js"></script>
	 <script type="text/javascript" src="./static/scripts/scripts.js"></script>
</head>
<body>
	<div class="ui blue inverted top attached  menu">
		  	<a class="active item"><h3>E-Commerce</h3></a>
		  	<a class=" active item">Home</a>

		  <div class="right menu">
		  	<div class="item">
		      <div class="ui left icon action input">
			    <i class="search icon"></i>
			    <input type="text" placeholder="Order #">
			    <div class="ui teal submit button">Search</div>
			  </div>
		    </div>
		    <a class="ui item" onclick="toggle_menu()">Login</a>
		  </div>
	</div>
	
	<div class="ui grid" style="margin-top: -10px">
		<div class="row _menu" style="display: none;position: absolute;">
			<div class="ui right floated five wide column">
				<div class="ui inverted pointing   menu">
						<a class="active item login_btn" onclick="show_form('.login_form','.login_btn')">Login</a>
						<a class="item signup_btn" onclick="show_form('.signup_form','.signup_btn')">Signup</a>
					</div>
				<div class="ui segments">
					<div class="ui placeholder segment login_form">
					<div class="ui form "><form id="login_form">
					        <div class="field">
					          <label>Username</label>
					          <div class="ui left icon input">
					            <input type="text" placeholder="Username" name="email">
					            <i class="user icon"></i>
					          </div>
					        </div>
					        <div class="field">
					          <label>Password</label>
					          <div class="ui left icon input">
					            <input type="password" placeholder="Password" name="password">
					            <i class="lock icon"></i>
					          </div>
					        </div>
					        <div class="ui blue submit button" onclick="login()">Login</div></form>
					</div>
				</div>
				<div class="ui placeholder segment signup_form" style="display: none;">
					<div class="ui form" ><form id="signup_form">
					        <div class="field">
					          <label>Name</label>
					          <div class="ui left icon input">
					            <input type="text" name="name" placeholder="Name">
					            <i class="user icon"></i>
					          </div>
					        </div>
					        <div class="field">
					          <label>Email</label>
					          <div class="ui left icon input">
					            <input type="Email" name="email" placeholder="Email">
					            <i class="envelope outline icon"></i>
					          </div>
					        </div>
					        <div class="field">
					          <label>Password</label>
					          <div class="ui left icon input">
					            <input type="password" name="password" placeholder="Password">
					            <i class="lock icon"></i>
					          </div>
					        </div>
					        <div class="ui blue submit button" onclick="signup()">Signup</div></form>
					</div>
				</div>	
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" id="base_addr" value="http://locahost:5000" />

</body>
</html>