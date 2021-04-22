<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

  <body>
    <div class="main">
	<div class="floor-section">
        <div class="container">
            <div class="signup-content">
			    <div class="col-md-9">
					<div class="floor-sec">
						<div class="tab-listing">
						<div class="tab">
						  <h3>ZONES</h3>
						  <select class="dropdown" id="selectFloor">
							<option value="">SHOW ALL ZONES</option>
							<option value="project_not_completed">SHOW BOOTH PLACE ONLY</option>
							<option value="project_completed">SHOW COMMON AREA ONLY</option>
							<option value="project_completed">SHOW UNUSED SPACE ONLY</option>
 
						  </select>
						  
						  <select class="dropdown" id="selectShortBy">
							<option value="">SHORT BY</option>
                                                        <option value="zone_type">ZONE TYPE</option>
                                                        <option value="zone_type">ZONE NAME (A – Z)</option>
							<option value="floor_plan_A-Z">FLOOR PLAN NAME (A-Z)</option>
							<option value="project_A-Z">PROJECT NAME (A-Z)</option>
							<option value="project_latest">PROJECT START (LATEST FIRST)</option>
							<option value="project_earliest">PROJECT START (EARLIEST FIRST)</option>
							<option value="grid_smallest">CREATED (LATEST FIRST)</option>
							<option value="latest_created_floor">CREATED (EARLIEST FIRST)</option>
							<option value="earliest_created_floor">LAST EDITED (LATEST FIRST)</option>
							<option value="latest_edit_floor">LAST EDITED (EARLIEST FIRST)</option>
							 
						  </select>

						  <ul class="nav nav-tabs">
							<!-- <li class="active"><a href="#">Home</a></li> -->
							
							<li class="dropdown">
							  <a class="dropdown-toggle" data-toggle="dropdown" href="#">SHOW ALL ZONES <span class="caret"></span></a>
							  <ul class="dropdown-menu">
								<li><a href="#">Show projects completed</a></li>
								<li><a href="#">Show grid type 16x9</a></li> 
                                <li><a href="#">Show grid type 32x18</a></li> 
                                <li><a href="#">Show grid type 48x27</a></li> 								
							  </ul>
							</li>
							<li><button class="src-btn2" >SEARCH</button></li>
							<li class="dropdown">
							  <a class="dropdown-toggle sort-dropdown" data-toggle="dropdown" href="#">SHORT BY <span class="caret"></span></a>
							  <ul class="dropdown-menu">
								<li><a href="#">Zones name(A-Z)</a></li>
								<li><a href="#">Project name(A-Z)</a></li>
								<li><a href="#">Zone strat(latest start)</a></li> 
                                <li><a href="#">Project strat(earliest start)</a></li> 
                                <li><a href="#">Grid type(smallest first)</a></li> 
                                 <li><a href="#">Created(latest first)</a></li> 
								<li><a href="#">Created(earliest first)</a></li> 
								<li><a href="#">last edited(latest first)</a></li> 
								<li><a href="#">last edited(earliest first)</a></li> 																
							  </ul>
							</li>
							
<!-- 							<li class="dropdown">
							  <a class="dropdown-toggle" data-toggle="dropdown" href="#">SHORT BY <span class="caret"></span></a>
							  <ul class="dropdown-menu">
								<li><a href="#">Floor plan name(A-Z)</a></li>
								<li><a href="#">Project name(A-Z)</a></li>
								<li><a href="#">Prject strat(latest start)</a></li> 
                                <li><a href="#">Prject strat(earliest start)</a></li> 
								<li><a href="#">Grid type(smallest first)</a></li> 
								<li><a href="#">Created(latest first)</a></li> 
								<li><a href="#">Created(earliest first)</a></li> 
								<li><a href="#">last edited(latest first)</a></li> 
								<li><a href="#">last edited(earliest first)</</a></li> 								
							  </ul>
							</li> -->
							<li><button class="src-btn1" target="blank" onclick="window.open('<?=base_url();?>floor/addStep1FloorPlans')">ADD</button></li>
							<li><button class="src-btn1">EDIT</button></li>
							<li><button class="src-btn1">DELETE</button></li>
							<li><button class="src-btn1">DELETE ALL</button></li>
						  </ul>
						</div>
								<div class="floor-table">
					<P>All floor plans are listed Below:</P>
					 <div class="search-results"><p class=""></p> </div>
						<div class="table-cont">
							<table>
						<thead>
							<tr class="table-title" style="background:#d9d9d9;">
								<td>LAST EDIT</td>
								<td>ZONE ID</td>
								<td>ZONE NAME/DESCRIPTION</td>
								<td>FLOOR PLAN NAME </td>
								<td>PROJECT NAME</td>
								 
							</tr>
						</thead>
						<tbody></tbody>
					</table>
						</div>
<script>
$(document).ready(function(){

 load_data();
 
  $('#selectFloor').change(function(){
  var floor_plan = $('#selectFloor').val();
  load_data(floor_plan);
 });
 
 $('#selectShortBy').change(function(){
  var floor_shortby = $('#selectShortBy').val();
  load_data(floor_shortby);
 });
 
 function load_data(floor_plan='',floor_shortby='')
 {
	 
  $.ajax({
   url:"<?=base_url();?>floor/search",
   method:"POST", 
   data:{floor_plan:floor_plan,floor_shortby:floor_shortby},
   success:function(data)
   {
	console.log(data);
    $('tbody').html(data);
   } 
  })
 }


 
});
</script>

					</div>
                      </div>
					</div>
			
				</div>
				<div class="col-md-3 right-text">
				   <div class="tab right-tabs">
					<div class="top-close">
						  <input type="submit" value="CLOSE" class="close-btn" name="submit" id="close-btn">
						  </div>
						  <div class="table-content">	  
						  <ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#home"></a>MAIN MENU</li>
							<li><a data-toggle="tab" href="#menu1">ASSIGN ZONES</a></li>
						  </ul>
						  <div class="table_info">
						   <p><span class="current-bold">Currently Selected:</span>No Floor Plan Selected</p>
						  <h5>There Are No Floor Plans</h5>  
						  <div class="tab-content">
							<div id="home" class="tab-pane fade in active">
							  <!-- <h3>HOME</h3> -->
							  <!-- <p>To start simply click add</p> -->
							</div>
							<div id="menu1" class="tab-pane fade">
							  <!-- <h3>Menu 1</h3> -->
							  <p>To start simply click add</p>
							</div>
						  </div>
						  </div>
						</div>
<!-- 						  <ul class="nav nav-tabs">
							<li><button class="src-btn11">CONFIG PAGE</button></li>
							<li><button class="src-btn11">MAIN MENU</button></li>
						  </ul> -->
			<!-- 		<div class="table-content">	  
						  <table>
						   <p><span>Current Selected:</span>Floor Plan Name</p>
						  <h5>FLOOR PLAN CREATION INFO</h5>
					    <tbody>
						<tr>
						<td>Group</td>
						<td>Customer on group</td>
					  </tr>
					  <tr class="table-spacing">
						<td>Group Status</td>
						<td>Live/Suspended</td>
					  </tr>
					  <tr>
						<td>Product Id</td>
						<td>Xrtrty56756756</td>
					  </tr>
					  <tr>
						<td>Floor Plan Id</td>
						<td>Xrtrty56756756</td>
					  </tr>
					  <tr>
						<td>Created date & time</td>
						<td>12222230000,0700h</td>
					  </tr>
					  <tr>
						<td>Created ip address</td>
						<td>100.123.2.253</td>
					  </tr>
					  <tr>
						<td>Created Xmanage Id</td>
						<td>QESDWD353453</td>
					  </tr>
					  <tr class="table-spacing">
						<td>Created User Name</td>
						<td>johnjohny@xmanage.live</td>
					  </tr>
					  <tr>
						<td>Last Edited Date & Time</td>
						<td>Nil</td>
					  </tr>
					  					  <tr>
						<td>Last Edited Ip Address</td>
						<td>Nil</td>
					  </tr>
					  <tr>
						<td>Last Edited Xmanage Id</td>
						<td>Nil</td>
					  </tr>
					  <tr>
						<td>Last Edited User Name</td>
						<td>Nil</td>
					  </tr>
					</tbody>
				</table> 
			</div>	   -->
				</div>
				</div>
            </div>	
            </div>
            
        </div>

    </div>

  </body>