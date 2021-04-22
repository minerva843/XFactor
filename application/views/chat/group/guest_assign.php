<style>
    tr{
        cursor: pointer;
    }
    option{
        padding-bottom: 15px;
        padding-top: 15px;
    }
    .current_tr{
        background-color:gray!important;
    }

</style>
<style>
    .fancybox-close-small{
        display:none!important;
    }
</style>
<?php session_start(); ?>
<div class="main-section poject-listing-QT" id="floor-sort"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>GROUP CHATS (<?php echo $action; ?>)<span id="actiontopText"style="font-size:18px;" ></span></h2> <?php //echo $group_id; ?>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	      

        <div class="middle-body">
            <div class="row">
                <div class="col-md-9">  
                    <div class="master-floorplan">
                        <div class="floor-sec"> 
                            <div class="tab-listing">
                                <div class="row master-filters"> 
                                    <div class="col-md-2">
                                        <select class="dropdown" id="selectData">
                                                                                    <option value="">SHOW ALL  </option>
											
											<option value="all-selected">SHOW ALL SELECTED</option>
											<option value="all-not-selected">SHOW ALL NOT SELECTED</option>
											

                                        </select>
                                    </div>
                                    <div class="col-md-3"><input type="text" class="src-btn2 SER" placeholder="SEARCH"><!--button class="src-btn2" >SEARCH</button--></div>
                                    <div class="col-md-2">
                                        <select class="dropdown" name="sortBy" id="selectShortBy">
                                                      <option value="">SORT BY</option>
                                                      <option value="gtype-a-z">GUEST TYPE (A-Z)</option>
							<option value="fname-a-z">FIRST NAME (A-Z)</option>
							<option value="lname-a-z">LAST NAME  (A-Z)</option>
							<option value="company-a-z">COMPANY NAME  (A-Z)</option>
							<option value="email-a-z">EMAIL ADDRESS (A-Z)</option>
							<option value="GUEST_start_earliest">CREATED (LATEST FIRST)</option>
							<option value="GUEST_start_earliest">CREATED (EARLIEST FIRST)</option>
							<option value="GUEST_start_earliest">LAST EDITED (LATEST FIRST)</option>
							<option value="GUEST_start_earliest">LAST EDITED (EARLIEST FIRST)</option>
                                        </select>
                                    </div> 

  
                                </div>

                                <div class="floor-table GUEST-table  GUEST-table-listing">
                                    <P>ALL GUESTS ARE LISTED BELOW :</P> <br>
                                    <div class="search-results"><p class="search_result"></p> </div>
                                    <div class="table-cont ">
                                        <form method="post" id="floor_form">


                                            <div class="table-fixed-class">
                                                <table style="margin-top: -40px;">
											<thead>
											<tr class="table-title" style="background:#d9d9d9;">
											<td id="first-td">&nbsp;&nbsp;</td>
											<td>LAST EDIT</td>
											<td>GUEST ID</td>
											<td>REG TYPE</td>
											<td>GUEST TYPE</td> 
											<td>FIRST NAME</td>
											<td>LAST NAME</td>
											<td>COMPANY NAME</td>
											<td>EMAIL ADDRESS</td>
											<td>CONTACT NUMBER</td>
											<td id="last-td"></td>
											</tr>   
											</thead>
                                                </table>      
                                            </div>          

                                            <div class="project-scroll">   
                                                <table>        
											<thead>
											<tr class="table-title" style="background:#d9d9d9; display:none; margin-top: 35px;"> 
											<td class="deletesingle"></td>
											<td>LAST EDIT</td>
											<td>GUEST ID</td>
											<td>REG TYPE</td>
											<td>GUEST TYPE</td> 
											<td>FIRST NAME</td>
											<td>LAST NAME</td>
											<td>COMPANY NAME</td>
											<td>EMAIL ADDRESS</td>
											<td>CONTACT NUMBER</td>
											<td></td>           
											</tr>   
											</thead>
                                                    <tbody id="AllData"></tbody>
                                                </table>  
                                            </div>   
                                        </form>
                                    </div>      
                                </div>    
                                <div id="myModal1" class="modal delete-sorting">

                                    <!-- Modal content -->
                                    <div class="modal-content">
									<div class="modal-body">
                                        <h4>GUESTS (EDIT) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>

                                        <p>NO ENTRY SELECTED.</p>
                                        <p>Please select an entry first to EDIT.</p>          
                                      </div>         
                                   
      
					<div class="modal-footer text-right"> <span class="close">OK</span> </div>									

                                </div>    
					</div>    
     
                                <div id="myModal" class="modal delete-sorting">

                                    <!-- Modal content -->
                                    <div class="modal-content">
					<div class="modal-body">
                                        <h4> GUESTS (DELETE) <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>   
                                        <p>NO ENTRY SELECTED.</p>
                                        <p>USE THE CHECK BOX ON THE LEFT OF EACH ENTRY TO SELECT.</p>
                                    </div> 
                                <div class="modal-footer text-right"><span class="close">OK</span> </div>								
                                   </div> 									

                                </div> 

                                <style>
                                    .activebtn{
                                        background: #00b050!important;
                                        color: #fff !important;
                                    }

                                </style>                                                    

                                <script>
                                    $(document).ready(function () {
                                    
                                    
                                    
        $("body").on('click','#openindivisualchatfrmgrp2',function(){
        $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>chat/individual_all",
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&group_id=<?php echo $group_id; ?>', type : 'POST' }
        },
        touch: false,
	clickSlide: false,
         clickOutside: false
        
    });
           
            
        });
                                    
										 
                                        $('.close').click(function () {
                                            var modal = document.getElementById("myModal");
                                            modal.style.display = "none";
                                        })
                                        $(".SER").on("keyup", function () {
                                            $("#ViewSingleData").empty();
                                            if ($(this).val().length >= 1) {
                                                $('.search_result').show();
                                                $('.search_result').html('SEARCH RESULTS :');
                                            } else {
                                                $('.search_result').hide();
                                            }

                                           
                                        });
                                    });
                                </script>
                                <script>

                                $(document).ready(function () {      
                                $('.deletClass').each(function(){
                                
                                $(this).removeClass('hide');
                                
                                });
                                        

                                $('body').on('click', '.close-btn', function () {
                                            $.fancybox.close();
                                             window.location.href = "<?php echo base_url(); ?>chat/deleteJunkRecord/<?php echo $groupchatid; ?>/<?php echo $this->session->userdata('group_id'); ?>/<?php echo $project_select; ?>/<?php echo $action; ?>/2";

                                });

    });

                                </script>

                                <script type="text/javascript">
                                    $(".deletClas").click(function (event) {
                                        event.preventDefault();
                                        var searchIDs = $(".deletClas input:checkbox:checked").map(function () {
                                            return $(this).val();
                                        }).get(); // <----
                                        console.log(searchIDs);
                                    });
                                    
                                   
                                    
                                    
$("#submitbtn33").click(function () {
                           
                                            
var ids = [];
$('.deletClas:checked').each(function(i, e) {
    ids.push($(this).val());

});
 
if(ids.length){
  var strids =  ids.join(',');
  
  //alert(strids);
        let groupchatid ='<?php echo $groupchatid;?>';
        $.ajax({
        url: '<?php echo  base_url(); ?>chat/assignGuestGroupChat/'+groupchatid,
        method: "POST",
        data: {ids: strids},
        success: function (data)
        {
			console.log(data);
        $.fancybox.getInstance('close');

       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>chat/groupChatCreateSuccess",
        ajax: { 
           settings: { data : 'project='+'<?php echo $project_select; ?>&groupchat_id=<?php echo $groupchatid; ?>&group_id=<?php echo $group_id; ?>&action=<?php echo $action; ?>', type : 'POST' }
        },
        touch: false,
         clickSlide: false,
         clickOutside: false
    });

     }
   });
  

    
    }else{
    
     
	            var modal = document.getElementById("myModal2");
				var span = document.getElementsByClassName("close")[0];
				modal.style.display = "block";
				span.onclick = function() {
				  modal.style.display = "none";
				}
				window.onclick = function(event) {
				  if (event.target == modal) {
					modal.style.display = "none";
				  }
				}
	  
    }
                                           
                                    });

                                    function check_multiple_select() {
                                        var val2 = [];

                                        $('.deletClas:checked').each(function () {
                                            val2.push($('.deletClas:checked').val());
                                        });

                                        if (val2.length > 1) {
                                            var val22 = val2.length + 1;
                                        }

                                        console.log(val2.length);
                                        if (val2.length > 1) {
                                            $('#currentlyViewing').css("display", "contents !important");
                                            $("#ViewSingleData").find("#multipleGUESTSelect").text("MULTIPLE ENTRIES");
                                            $("#ViewSingleData").find("#currentlyViewing").show();
                                        } else if(val2.length==1){
										 
												
										 var val233 = [];

                                        $('.deletClas:checked').each(function () {
                                            let pr = $(this).attr("data-GUEST");
											$("#ViewSingleData").find('#multipleGUESTSelect').text(pr);
                                        });
												
												
												
					}else {
					  
					var val23 = [];

                                        $('.deletClas:checked').each(function () {
                                            val23.push($('.deletClas:checked').val());
                                        });

                                        if (val23.length) {
                                            var val22 = val2.length + 1;
                                        }else{
											
					if($("#deleteGUESTS").hasClass('activebtn'))      {                                                 
                                                  $("#ViewSingleData").find("#multipleGUESTSelect").text("NO GUEST SELECTED");
 
                                               }else{
						
                                               $("#currentlyViewing").css("display","none");
                                               }
											 
										}

                                        }
				
                                        
                                    }


                                    reply_click();
                                    var currentid = '';
                                    function reply_click(clicked_id)
                                    {
                                        
                                        $.ajax({
                                            url: "<?= base_url(); ?>guest/searchSingleDataWorkshop",
                                            method: "GET",
                                            data: {clicked_id: clicked_id,chat_action:true},
                                            success: function (data)
                                            {


                                                $('#ViewSingleData').html(data);
                                                check_multiple_select();
												
						
                                                
                                               if($("#deleteGUESTS").hasClass('activebtn')){                                                 
                                                 $("#currentlyViewing").css("display","contents");
 
                                               }else{
						 
                                               }
                                               
                                             

                                            }
                                        });



                                        //    }
                                        currentid = clicked_id;

                                        $('.rightcheck').hide();
                                        $('.rightcheck' + currentid).show();
                                        $('.rightcheck' + currentid).prop('checked', true);

                                    }

 

                                </script>
                                <script>



                                    $(document).ready(function () {

                                        $('.deletClass').hide();
                                     //   $('.form-submit').hide();

                                        load_data();
					$(".SER").on("keyup", function () {
                                            
                                        //$("#AllData").empty();
                                         $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED:</span> NO GUEST SELECTED</p>');
					var Allsearch= $(this).val();
					var selectData = $('#selectData').val();
					$("#editGUEST").removeClass("activebtn");
												$("#deleteGUESTS").removeClass("activebtn");
												$("#actiontopText").hide();
												$('.deletClass').hide();
												//$('.form-submit').hide();
												$('.deletClas:checked').removeAttr('checked');
												$(".deletClass").removeClass('hide');
                                        var selectShortBy = $('#selectShortBy').val();
                                        load_data(selectData, selectShortBy,Allsearch);
                                        
					});
                                        $('#selectData').change(function () {
                                             $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED:</span> NO GUEST SELECTED</p>');
					    var Allsearch= $('.SER').val();
						$("#editGUEST").removeClass("activebtn");
												$("#deleteGUESTS").removeClass("activebtn");
												$("#actiontopText").hide();
												$('.deletClass').hide();
												//$('.form-submit').hide();
												$('.deletClas:checked').removeAttr('checked');
												$(".deletClass").removeClass('hide');
                                            var selectData = $('#selectData').val();
                                            var selectShortBy = $('#selectShortBy').val();
                                            load_data(selectData, selectShortBy,Allsearch);
                                        });

                                        $('#selectShortBy').change(function () {
                                             $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED:</span> NO GUEST SELECTED</p>');
					    var Allsearch=$('.SER').val();
												$("#editGUEST").removeClass("activebtn");
												$("#deleteGUESTS").removeClass("activebtn");
												$("#actiontopText").hide();
												$('.deletClass').hide();
												//$('.form-submit').hide();
												$('.deletClas:checked').removeAttr('checked');
												$(".deletClass").removeClass('hide');
                                            var selectData = $('#selectData').val();
                                            var selectShortBy = $('#selectShortBy').val();
                                            load_data(selectData, selectShortBy,Allsearch);
                                        });

                                        function load_data(selectData = '', selectShortBy = '',Allsearch='')
                                        {
											
                                            $.ajax({
                                                url: "<?= base_url(); ?>guest/searchChatGroupGuest",
                                                method: "POST",
                                                data: {selectData: selectData, selectShortBy: selectShortBy,AllSearchData:Allsearch,project:<?php echo $project_select; ?>,groupchat:'1',groupchatid:<?php echo $groupchatid; ?>},
                                                success: function (data)
                                                {
                                                   
                                                    $('#AllData').html(data);
                                                }
                                            })
                                        }

                                        $("body").on('click', '.deletesingle', function () {

                                            var numberOfChecked = $('input:checkbox:checked').length;

                                        });

                                    });
                                </script>



                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 right-text master-floor-left">
                    <div class="tab right-tabs">

                        <div class="table-content">	  
                            <ul class="nav nav-tabs ">
                                <!--li><a data-toggle="tab" href="#home">CONFIG PAGE</a></li-->

                                <li class=""><a data-toggle="tab" class="cnone" href="#">INDIVIDUAL CHAT</a></li> 
				                <li class="active"><a data-toggle="tab" href="#menu2">GROUP CHAT</a></li>
				                <li class=""><a data-toggle="tab" class="cnone" href="#"> CHAT LOGS</a></li>
                                
                            </ul>
                            <div class="table_info">

                                <table id="ViewSingleData">
                                
                                
                                
                                
                                
                                </table> 



    

                            </div>

                          
                            <div class="form-submit delete-sorting"  > 
                                <a href="#"  class="action-btn form-submit-btn" name="back" id="btn5allworkshop111">BACK</a>
                                 
                                <input type="button" value="Next"  data-id  class="action-btn form-submit-btn" name="submit" id="submitbtn33">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="footer">2019 – <?php echo date('Y'); ?>. <b>XPLATFORM</b>. </div>  



    </div>

</div>
<style>

    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 20%; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }    

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 6px;
        border: 3px solid bllack;
        width: 28%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }  

</style>   

<style>
    .fancybox-close-small{
        display:none;
    }
    .error{
        color:red !important;
    }
</style>
<script>
    $(document).ready(function () {

        $("select").change(function () {
            if ($(this).val() == "")
                $(this).css({color: "#6c757d"});
            else
                $(this).css({color: "#000000"});
        });
        
       
      $("body").on('click','#btn5allworkshop111',function(){
        $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>chat/addNewGroupChat/<?php echo $groupchatid;?>/<?php echo $project_select; ?>',
        ajax: { 
           settings: { data : 'project=<?php echo $project_select; ?>&action=<?php echo $action;  ?>', type : 'POST' }
        },
        touch: false,
		 clickSlide: false,
        clickOutside: false
        
        }); 
          
    
        });  


    });
</script>
