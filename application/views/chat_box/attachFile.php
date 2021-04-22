 <div class="upload-btn-wrapper">
										
										
										<form method="post" action="http://13.235.169.150/XFactor/chat_box/attachFile" id="fileupload" enctype="multipart/form-data">
 
<input type="file" name="project_header_visual"  id="file"  class="file" >
  <input type="submit">
</form>
									</div> 
										
	<script>
	$('#fileupload').submit(function(e) {
	e.preventDefault();
		//alert('1');
		var formdata = new FormData();
		var file_data = $('#file').prop('files')[0]; 
		
		formdata.append('project_header_visual', file_data);
		console.log(formdata);
		//alert('2');
		$.ajax({
			url: "http://13.235.169.150/XFactor/chat_box/attachFile",
			method: 'post',
			data: formdata,
		contentType:false,
		cache:false,
		processData:false, 
			success: function(response) {
		console.log(response);
		
		}

		});
	})
	
	</script>