<div class="stack-navbar">
	<nav class="navbar navbar-expand-sm navbar-dark">
	  <div class="container">

	    <a class="navbar-brand" href="<?php echo $flow ?>"><img width="40px" src="<?php echo $flow ?>assents/img/logo/logo.png"></a>

	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
	      <span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse justify-content-end" id="nav">
	    	<ul class="navbar-nav">
	    		<a href="<?php echo $flow ?>dashboard" class="item_nav">Dashboard</a>
				<a href="<?php echo $flow ?>dashboard/infectados/" class="item_nav">Infectados</a>
		    	<a href="<?php echo $flow ?>" class="item_nav btn btn-stack">
		    		<i class="fa-regular fa-user"></i>
		    		Nebula Admin
		    	</a>
	    	</ul>
	    </div>
	  </div>
	</nav>
</div>

<style type="text/css">
	.stack-navbar{
		background-color: #242833;
	}
	.item_nav{
		display: block;
  		padding: 0.5rem 1rem;
		text-decoration: none;
		color: #fff;
		font-size: 13px;
	}
	.item_nav:hover{
		transition: 300ms;
		text-decoration: none;
		color: #c2c2c2;
	}
	.btn-stack{
		border: 0;
		background-color: #F9603E;
	}
</style>