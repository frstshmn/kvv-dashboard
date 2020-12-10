<!DOCTYPE html>
	<html>
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	    <title>Program KVV</title>

	    <!-- Bootstrap CSS CDN -->
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

	    <!-- Our Custom CSS -->
	    <link rel="stylesheet" href="css/style.css">

	    <!-- Scrollbar Custom CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

	    <!-- Font Awesome JS -->
	    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

		<!-- Vue.js -->
		<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
		
		<!-- Axios -->
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

		<!-- Chart.js -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	</head>
	<body class="font-secondary">
		<div class="wrapper">
	        <nav id="sidebar">
	            <div id="dismiss">
	                <i class="fas fa-arrow-left"></i>
	            </div>

	            <div class="p-3 font-main">
	                <h3>Program<br><span class="color-secondary display-3 line-height">KVV</span></h3>
	            </div>
				<div id="app">
					<ul class="px-2 py-0">
		            	<li class="p-1 punctbutton font-weight-bold" type="none"  v-on:click="activate('Каса №1')">
					        <a class="py-2 pl-3" >Kaca #1</a>
					    </li>
		            </ul>
					<hr class="mx-5">
					<p><a class="catbutton py-2 pl-3 d-block m-2" data-toggle="collapse" href="#collapsePuncts" aria-expanded="false" aria-controls="collapsePuncts"><i class="fas fa-store-alt mr-2"></i>Пункти обміну</a></p>
					<div class="collapse" id="collapsePuncts">
					  	<ul class="p-2">
		            		<puncts v-for="punct in puncts" @click.native="activate(punct)" :punct="punct" :active="active"></puncts>
		            	</ul>
					</div>

					<p><a class="catbutton py-2 pl-3 d-block m-2" data-toggle="collapse" href="#collapsePerson" aria-expanded="false" aria-controls="collapsePerson"><i class="fas fa-user mr-2"></i>Касири</a></p>
					<div class="collapse" id="collapsePerson">
					  	<ul class="p-2">
		            	</ul>
					</div>
				</div>
	            
	        </nav>

	        <!-- Page Content  -->
	        <div id="content">
	        	<div class="row">
	        		<div class="col-12 mb-2">
			        	<button type="button" id="sidebarCollapse" class="btn bg-transparent text-right">
			        		<i class="fas fa-bars text-white"></i>
			        	</button>
	        		
	        			<span class="text-white text-center h3 font-main align-middle">{{ title }}</span>
	        		</div>
	        	</div>

	        	<div class="row">
	        		<div class="col-md-5 col-sm-12 col-xs-12 text-white text-center">
	        			<table class="table table-borderless table-striped">
	        				<thead>
	        					<tr>
	        						<th>Валюта</th>
	        						<th>Купівля</th>
	        						<th>Продаж</th>
	        						<th>Кількість</th>
	        					</tr>
	        				</thead>
	        				<tbody>
	        					<template v-for="currency in currencies">
	        						<tr>
								        <td v-html="currency.name"></td>
								        <td v-html="currency.buy"></td>
								        <td v-html="currency.sell"></td>
								        <td v-html="currency.count"></td>
								    </tr>
	        					</template>
	        				</tbody>
	        			</table>
	        		</div>
	        		<div class="col-md-7 col-sm-12 col-xs-12">
	        			<div class="dark-over d-none" id="loading_overflow"><i class='fas fa-circle-notch fa-spin display-4 text-white dark-over-text'></i></div>
	        			<canvas id="uah_data_day" width="100%"></canvas>
	        		</div>
	        	</div>

	        	<div class="row">
		        	<div class="col-md-5 col-sm-12 col-xs-12 text-white text-center">
		        		<!-- <canvas id="operations_day" width="100%"></canvas> -->
		        	</div>
		        	<div class="col-md-7 col-sm-12 col-xs-12">
		        		<!-- <canvas id="uah_data_day" width="100%"></canvas> -->
		        	</div>
		        </div>
	        </div>

	        
	        </div>
	    </div>

	    <!-- jQuery CDN -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	    <!-- Popper.JS -->
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	    <!-- Bootstrap JS -->
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	    <!-- jQuery Custom Scroller CDN -->
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>


	    <!-- Custom Scripts -->
	    <script type="text/javascript" src="js/data.js"></script>
	    <script type="text/javascript" src="js/layout.js"></script>
	</body>
</html>