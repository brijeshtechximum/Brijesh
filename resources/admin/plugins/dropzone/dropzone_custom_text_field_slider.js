var myDropzone;

Dropzone.options.myDropzone = {
	maxFiles : 40,
	init: function() {
	  var removeButton;
	  var _this;
	  var is_image_primary;
	  var is_image_primaryy;
	  this.on("addedfile", function(file) {
		// console.log(file);
	    // Capture the Dropzone instance as closure.
	    _this = this;

	  });
	  
	  this.on("success", function(file,responseText) {
	   
	  	// Create the remove button
		removeButton = Dropzone.createElement('<button class="btn btn-dropzone remove-image" image="'+responseText+'" type="button" style="width: 100%;margin-bottom: 10px;">Remove file</button>');
		is_image_primary = Dropzone.createElement('<input class="tags-input form-control" type="text" name="description[]" placeholder="Enter your Title" style="border:1px solid;margin-bottom:10px">');
		is_image_primaryy = Dropzone.createElement('<input class="tags-input form-control" type="text" name="sec_description[]" placeholder="Enter your Second Title" style="border:1px solid;">');
		
		// Listen to the click event
	    removeButton.addEventListener("click", function(e) {
	    	//alert();
	      // Make sure the button click doesn't submit the form:
	      e.preventDefault();
	      e.stopPropagation();
			
		  var image_name = $(this).attr('image');	
		  
		  $('#uploaded-image input[value="'+image_name+'"]').remove();
		  
	      // Remove the file preview.
	      _this.removeFile(file);
	      
	      // If you want to the delete the file on the server as well,
	      // you can do the AJAX request here.
	     var getUrl = window.location;
         var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        
	      $.ajax({type: "POST",
          	url: ""+baseUrl+"/admin/dropzone/deleteFiles/"+image_name,
            //data: { id: $("#Shareitem").val(), access_token: $("#access_token").val() },
            success:function(result){
            	console.log("========="+result);
          }});
          
	    });
	    
		// Add the button to the file preview element.
	    file.previewElement.appendChild(removeButton);
	    
	    //Add radio button for making image primary
	    file.previewElement.appendChild(is_image_primary);
	    file.previewElement.appendChild(is_image_primaryy);
	    	
		     $('#uploaded-image').append('<input type="hidden" value="'+responseText+'" name="ad_images[]">');
		     var fileonserver = responseText; // response is the file on the server
		     file.name = fileonserver; // IF THIS ONLY WORKED i would solve my problem 
		});
	}
};

$(document).ready(function(){
	$('.remove-image-update').click(function(){
		
		var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
		
		var image_name = $(this).attr('image');	
		$(this).parent().remove();
		$.ajax({type: "POST",
          	url: ""+baseUrl+"/admin/dropzone/deleteFiles/"+image_name,
            //data: { id: $("#Shareitem").val(), access_token: $("#access_token").val() },
            success:function(result){
            	console.log("========="+result);
          }});
		$('#uploaded-image input[value="'+image_name+'"]').remove();
	});
});



/**************************
*
*	EXT - for the quotes
*
**************************/
$(document).ready(function(){
    $('button.last_page_back, .back').click(function(){
        window.history.back()
        //return false;
    });

});




