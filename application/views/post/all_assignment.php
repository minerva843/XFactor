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
<?php $rand=rand(1000,99999);?>
<div class="main-section poject-listing-QT" id="floor-sort"> 
    <div class="container">

        <div class="top-header">
            <div class="row">
                <div class="col-md-9">
                    <h2>ASSIGN POSTS<span id="actiontopText"style="font-size:18px;" ></span></h2>
                </div>

                <div class="col-md-3">
                    <div class="top-close"><input type="button" value="CLOSE" class="close-btn" name="submit" id="close-btn"></div>
                </div>
            </div>   
        </div>	      

        <div class="middle-body">
            <div class="row">
                <div class="col-md-9">  <?php // print_r($zone);  ?>
                    <div class="master-floorplan">
                        <div class="floor-sec"> 
                            <div class="tab-listing">
                                <div class="row master-filters"> 
                                    <div class="col-md-2">
                                        <select class="dropdown" id="selectData">
                                            <option value="">SHOW ALL POSTS</option>
							<option value="assigned">ALL ASSIGNED POSTS ONLY</option>
							<option value="unassigned">ALL UNASSIGNED POSTS ONLY</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3"><input type="text" class="src-btn2 SER" placeholder="SEARCH"><!--button class="src-btn2" >SEARCH</button--></div>
                                    <div class="col-md-2">
                                        <select class="dropdown" id="selectShortBy"> 
                                            <option value="">SORT BY</option>
                                            <option value="post_owner">POST OWNER (A-Z)</option>
							<option value="post_title">POST TITLE (A-Z)</option>
							<option value="post_content_set">POST CONTENT SET (1-5)</option>
							<option value="latest_created">Created(latest first)</option>
							<option value="earliest_created">Created(earliest first)</option>
							<option value="latest_edit">last edited(latest first)</option>
							<option value="earliest_edit">last edited(earliest first)</option>
                                        </select>
                                    </div> 

                                   
                                    <div class="col-md-2"><button class="src-btn1 deleteAction" id="deleteProjects" >CLEAR ASSIGNMENT</button></div>
                                    <div class="col-md-2"><button data-action="DELETE" class="src-btn1" id="deleteAll">CLEAR ALL ASSIGNMENT</button></div>
                                </div>

                                <div class="floor-table project-table  project-table-listing">
                                    <P>ALL POSTS ASSIGNMENT ARE LISTED BELOW :</P> <br>
                                    <div class="search-results"><p class="search_result"></p> </div>
                                    <div class="table-cont ">
                                        <form method="post" id="floor_form">


                                            <div class="table-fixed-class">
                                                <table style="margin-top: -40px;">
                                                    <thead>
                                                        <tr class="table-title" style="background:#d9d9d9;">
                                                            <td id="first-td">&nbsp;&nbsp;</td>
                                                            <td>LAST EDIT</td>
								<td>POST ID</td>
								<td>POST TITLE</td>
								<td>POST CONTENT SET</td>
								<td>ASSIGNED INFO ICON ID</td>
								<td>ASSIGNED INFO ICON</td>
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
								<td>POST ID</td>
								<td>POST TITLE</td>
								<td>POST CONTENT SET</td>
								<td>ASSIGNED INFO ICON ID</td>
								<td>ASSIGNED INFO ICON</td>

                                                            <td></td>           
                                                        </tr>   
                                                    </thead>
                                                    <tbody id="AllData<?=$rand?>"></tbody>
                                                </table>  
                                            </div>   
                                        </form>
                                    </div>      
                                </div>    
                                
     
                                <div id="myModal" class="modal delete-sorting">

                                    <!-- Modal content -->
                                    <div class="modal-content">
					<div class="modal-body">
                                        <h4> CLEAR ASSIGNMENT <span style="color:red ;font-weight:bold;">NOT SUCCESSFUL </span></h4>   
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
										 $("#btn5").click(function () {
												$("#editProject").removeClass("activebtn");
												$("#deleteProjects").removeClass("activebtn");
												$("#actiontopText").hide();
													
													$('.deletClass').hide();
													$('.form-submit').hide();
													$('.deletClas:checked').removeAttr('checked');
													$(".deletClass").removeClass('hide');
													
											});
                                        $("#editProject").click(function () {

                                            $("#deleteProjects").removeClass("activebtn");
                                            $(this).toggleClass("activebtn");
                                            $('.deletClass').hide();
                                             $('.form-submit').show();
                                             $(".form-submit-btn").toggleClass('hide');
                                            if($(this).hasClass('activebtn')){

                                                // $(".deletClass").removeClass('hide');
						 $("#actiontopText").show();
						 $('.form-submit-btn').removeClass('hide');
                                                 $("#actiontopText").text(" (EDIT) ");
                                                 $("#currentlyViewing").css("display","none");
                                                 
                                                 
                                                  
                                            }else{
						$("#actiontopText").hide();
                                                $("#currentlyViewing").css("display","block");
                                            }
                                             
                                        });
										$("#deleteProjects").click(function () {
											
                                            $("#editProject").removeClass("activebtn");
                                            // $(".deletClass").addClass('hide');
											$('.deletClass').show();
											$('.form-submit').show();
                                            $(".deletClass").toggleClass('hide');
                                            $(".form-submit-btn").toggleClass('hide');
											//$('.deletClass').toggle();
                                             
                                            // $(".form-submit").toggleClass('hide');
                                            $(this).toggleClass("activebtn");
                                            
                                            if($(this).hasClass('activebtn')){
											$(".form-submit-btn").removeClass('hide');
											
                                                 $(".deletClass").removeClass('hide');
                                                 $("#actiontopText").show();
                                                // $("#actiontopText").text(" (DELETE) ")
                                                 
                                                 
                                            }else{
												$("#actiontopText").hide();
											}
                                          
                                        });

                                        


                                        // $("#editProject").toggleClass('activebtn');


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

                                            // if ($(this).val().length >= 0) { 

                                                // var value = $(this).val().toLowerCase();
                                                // $("#AllData tr").filter(function () {
                                                    // $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1) 
													// var $trs = jQuery("#AllData tr:visible");
	// $trs.filter("#AllData tr:odd").css("background-color", "#ffffff");
	// $trs.filter("#AllData tr:even").css("background-color", "#d9d9d9");
                                                    
                                                // });
                                            // } 
                                        });
                                    });
                                </script>
                                <script>

                                    $(document).ready(function () {

                                        $("body").on('click', '#AllPost', function () {

                                            
											 $.fancybox.getInstance('close');
                                           
											$.fancybox.open({
												maxWidth  : 800,
												fitToView : true,
												width     : '100%',
												height    : 'auto',
												autoSize  : true,
												type        : "ajax",
												src         : "<?php echo base_url(); ?>post/index",
												ajax: { 
												   settings: { data : 'project=<?=$project;?>', type : 'POST' }
												},
												touch: false,
														clickSlide: false,
												clickOutside: false
												
											});

                                        });
										$("body").on('click', '#deleteAll', function () {

                                            $.fancybox.getInstance('close');
											$.fancybox.open({
												maxWidth  : 800,
												fitToView : true,
												width     : '100%',
												height    : 'auto',
												autoSize  : true,
												type        : "ajax",
												src         : "<?php echo base_url(); ?>post/clearSelected",
												ajax: { 
												   settings: { data : 'project=<?=$project;?>', type : 'POST' }
												},
												touch: false,
														clickSlide: false,
												clickOutside: false
												
											});

                                        });

                                        $('body').on('click', '.close-btn', function () {
                                            $.fancybox.close();

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
                                    
                                   
                                    
                                    
                                    $("#submitbtn").click(function () {
                                        
                                        
                                        if($("#editProject").hasClass('activebtn')){
                                            
                                            if (currentid != '') {
                                            $.fancybox.getInstance('close');
                                            $.fancybox.open({
                                                src: '<?= base_url(); ?>post/editstep1/' + currentid,
                                                type: 'ajax',
                                                ajax: {
                                                    settings: {data: 'ABC', type: 'POST'}
                                                },
                                                opts: {
                                                    afterShow: function (instance, current) {
                                                        console.info('done!');
                                                    },
                                                    touch: false,
                                                    clickSlide: false,
                                                    clickOutside: false
                                                }
                                            });
                                        } else {
                                            var modal = document.getElementById("myModal1");
                                            var span = document.getElementsByClassName("close")[0];
                                            modal.style.display = "block";
                                            span.onclick = function () {
                                                modal.style.display = "none";
                                            }
                                            window.onclick = function (event) {
                                                if (event.target == modal) {
                                                    modal.style.display = "none";
                                                }
                                            }
                                            
                                        }
                                            
  
                                        }else{
                                            
                                            var ids = [];
$('.deletClas:checked').each(function(i, e) {
    ids.push($(this).val());

});
if(ids==''){
		var modal = document.getElementById("myModal");
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
	}else{
		
  var strids =  ids.join(',');
 console.log(strids);     
       $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%',
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : "<?php echo base_url(); ?>post/clearSelected",
        ajax: { 
           settings: { data : 'ids='+strids, type : 'POST' }
        },
        touch: false,
        
    });
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
                                            $("#ViewSingleData").find("#multipleprojectselect").text("MULTIPLE ENTRIES");
                                            $("#ViewSingleData").find("#currentlyViewing").show();
                                        } else if(val2.length==1){
										 
												
										 var val233 = [];

                                        $('.deletClas:checked').each(function () {
                                            let pr = $(this).attr("data-project");
											$("#ViewSingleData").find('#multipleprojectselect').text(pr);
                                        });
												
												
												
										}else {
                                         
										  
										  			 var val23 = [];

                                        $('.deletClas:checked').each(function () {
                                            val23.push($('.deletClas:checked').val());
                                        });

                                        if (val23.length) {
                                            var val22 = val2.length + 1;
                                        }else{
											
											
											                 if($("#deleteProjects").hasClass('activebtn')){                                                 
                                                  $("#ViewSingleData").find("#multipleprojectselect").text("NO POST SELECTED");
 
                                               }else{
						
                                               $("#currentlyViewing").css("visibility","hidden");
                                               }
											 
										}

                                        }
									}

                                    // function check_multiple_select() {
                                        // var val2 = [];

                                        // $('.deletClas:checked').each(function () {
                                            // val2.push($('.deletClas:checked').val());
                                        // });

                                        // if (val2.length > 1) {
                                            // var val22 = val2.length + 1;
                                        // }

                                        // console.log(val2.length);
                                        // if (val2.length > 1) {
                                            // $('#currentlyViewing').css("display", "block !important");
                                            // $("#ViewSingleData").find("#multipleprojectselect").text("MULTIPLE ENTRIES");
                                            // $("#ViewSingleData").find("#currentlyViewing").show();
                                        // } else {
                                         
                                        // }
                                          
                                        
                                    // }


                                    reply_click();
                                    var currentid = '';
                                    function reply_click(clicked_id)
                                    {
                                        
                                        $.ajax({
                                            url: "<?= base_url(); ?>post/searchassignmentData",
                                            method: "GET",
                                            data: {clicked_id: clicked_id},
                                            success: function (data)
                                            {


                                                $('#ViewSingleData').html(data);
                                                check_multiple_select();
                                                
                                               if($("#deleteProjects").hasClass('activebtn')){                                                 
                                                 $("#currentlyViewing").css("display","block");
 
                                               }else{
						//alert();
                                                $("#currentlyViewing").remove();
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
                                        $('.form-submit').hide();

                                        load_data();
					$(".SER").on("keyup", function () {
                                            
                                        //$("#AllData").empty();
                                         $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED:</span> NO POST SELECTED</p>');
					var Allsearch= $(this).val();
					var selectData = $('#selectData').val();
					$("#editProject").removeClass("activebtn");
												$("#deleteProjects").removeClass("activebtn");
												$("#actiontopText").hide();
												$('.deletClass').hide();
												$('.form-submit').hide();
												$('.deletClas:checked').removeAttr('checked');
												$(".deletClass").removeClass('hide');
                                        var selectShortBy = $('#selectShortBy').val();
                                        load_data(selectData, selectShortBy,Allsearch);
                                        
					});
                                        $('#selectData').change(function () {
                                             $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED:</span> NO POST SELECTED</p>');
					   var Allsearch= $('.SER').val();
						$("#editProject").removeClass("activebtn");
												$("#deleteProjects").removeClass("activebtn");
												$("#actiontopText").hide();
												$('.deletClass').hide();
												$('.form-submit').hide();
												$('.deletClas:checked').removeAttr('checked');
												$(".deletClass").removeClass('hide');
                                            var selectData = $('#selectData').val();
                                            var selectShortBy = $('#selectShortBy').val();
                                            load_data(selectData, selectShortBy,Allsearch);
                                        });

                                        $('#selectShortBy').change(function () {
                                             $("#ViewSingleData").empty().html('<p><span class="current-bold">CURRENTLY SELECTED:</span> NO POST SELECTED</p>'); 
					   var Allsearch= $('.SER').val();
												$("#editProject").removeClass("activebtn");
												$("#deleteProjects").removeClass("activebtn");
												$("#actiontopText").hide();
												$('.deletClass').hide();
												$('.form-submit').hide();
												$('.deletClas:checked').removeAttr('checked');
												$(".deletClass").removeClass('hide');
                                            var selectData = $('#selectData').val(); 
                                            var selectShortBy = $('#selectShortBy').val();
                                            load_data(selectData, selectShortBy,Allsearch);
                                        });
 
                                        function load_data(selectData = '', selectShortBy = '',Allsearch='')
                                        {
											
                                            $.ajax({
                                                url: "<?= base_url(); ?>post/searchassignment",
                                                method: "POST",
                                                data: {selectData: selectData, selectShortBy: selectShortBy,AllSearchData:Allsearch,project:<?=$project;?>},
                                                success: function (data)
                                                {
                                                    //console.log(data); 
                                                    $('#AllData<?=$rand?>').html(data);
                                                }
                                            })
                                        }

                                        $("body").on('click', '.deletesingle', function () {

                                            var numberOfChecked = $('input:checkbox:checked').length;

                                        });

                                    });
									$("body").on('click','#posticon_assignmentfdf',function(){
   $.fancybox.getInstance('close');
        $.fancybox.open({
        maxWidth  : 800,
        fitToView : true,
        width     : '100%', 
        height    : 'auto',
        autoSize  : true,
        type        : "ajax",
        src         : '<?=base_url();?>post/icons',
        ajax: { 
           settings: { data : 'project=<?php echo $project; ?>', type : 'POST' }
        },
        touch: false,
        clickSlide: false,
        clickOutside: false
        
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

                                <li ><a data-toggle="tab" href="#menu1" id="AllPost">MAIN MENU</a></li>
								<li class="active"><a data-toggle="tab" href="">ALL ASSIGNMENTS</a></li>
								 <li><a data-toggle="tab" href="" id="posticon_assignmentfdf">ASSIGN POST</a></li>

                            </ul>
                            <div class="table_info">

                                <table id="ViewSingleData">
                                </table> 

                            </div>

                            <?php
                            if (!empty($_SESSION['SelectedIds'])) {
                                $showbtn = '';
                            } else {
                                $showbtn = 'style="display:none;"';
                            }
                            ?>
                            <div class="form-submit delete-sorting" <?php echo $showbtn; ?> > 
                                <a href="#" style="display:none;" class="action-btn form-submit-btn" name="back" id="btn5allproject">BACK</a>
                                <!--input type="submit" value="Back" class="close-btn" name="back" id="btn5"-->
                                <input type="submit" value="Next" class="action-btn form-submit-btn" name="submit" id="submitbtn">
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

    });
</script>