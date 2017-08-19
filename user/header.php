<nav class="col-12 col-md-12 col-md-12 col-lg-12 col-xl-12 navbar navbar-toggleable-md navbar-inverse bg-web-faded img-fluid">
 	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
  	</button>
  	<?php
		include "userconnect.php";
		$sql="SELECT * from tblcompany_info";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			while($row=$result->fetch_assoc())
			{
		?>
			<img class="mx-auto d-block img-fluid" src="/admin/plugins/images/<?php echo "" .$row['comp_logo'];?>">&nbsp;
			<a class="navbar-brand" href="userhome.php"><?php echo "" . $row['comp_name'];?></a>
		<?php
			}
		}
		$conn->close();
	?> 
  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
	  		<li class="nav-item">
				<a class="nav-link" href="userhome.php"><i class="fa fa-home"></i>&nbsp;HOME <span class="sr-only">(current)</span></a>
	  		</li>
	  		<li class="nav-item">
				<a class="nav-link" href="userproducts.php"><i class="fa fa-bed"></i>&nbsp;PRODUCTS</a>
	  		</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="modal" data-target="#myCart" href=""><span class="fa fa-shopping-cart"></span>&nbsp;CART&nbsp;<span class="badge text-info"></span></a>
			</li>
<!--
	  		<li class="nav-item dropdown">
				<a class="nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="">
					<i class="fa fa-user-circle-o"></i>&nbsp;ACCOUNTS
				</a>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" data-toggle="modal" href="" data-target="#loginmodal">Log In</a>
					<a class="dropdown-item" data-toggle="modal" href="" data-target="#signupmodal">Sign Up</a>
				</div>
	  		</li>
-->
		</ul>
		<form class="form-inline my-2 my-lg-0" action="uservalidate.php" method="post">
			<input type="text" class="form-control" name="username" placeholder="Username" required/><br>&nbsp;
			<input type="password" class="form-control" name="password" placeholder="Password" required/><br>&nbsp;
			<button role="button" type="submit" class="btn btn-outline-warning">Log in</button>&nbsp;
			<button type="button" data-target="#signupmodal" data-toggle="modal" class="btn btn-outline-success">Sign up</button>
		</form>
  	</div>
</nav>