<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Hello Swift</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styles.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.theme.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/script.js"></script>
</head>
<body>
<div id="header">
	
</div>
<div class="container">
	<div class="row">
		<p>Please fill the following form to book a  ticket</p>
	</div>
	<div class="row">
	<form action="/welcome/book" method="POST">
	  <div class="form-group">
		<label for="exampleInputEmail1">Email address</label>
		<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
	  </div>
	  <div class="form-group">
		<label for="passengers">Number of passengers</label>
		<select class="form-control" name="passengers" id="passengers">
		  <option>1</option>
		  <option>2</option>
		  <option>3</option>
		  <option>4</option>
		</select>
	  </div>
	  <div class="form-group">
	  	<label for="departure">Departure date</label>
	  	<input type="text" id="datepicker" name="departure">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
</form>
	</div>
</div>

</body>
</html>
