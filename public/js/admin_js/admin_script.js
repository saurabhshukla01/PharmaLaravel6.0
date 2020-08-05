$(document).ready(function () {

	// Check Admin Password is Correct or not
	$("#current_pwd").keyup(function(){

		var current_pwd = $("#current_pwd").val();
		//alert(current_pwd);
		$.ajax({
			type:'post',
			url:'/admin/check-current-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				//alert(resp);
				if(resp=="false"){
					$("#chkCurrentPwd").html("<font color=red> Current Password Is Incorrect </font>");
				}else if(resp=="true"){
					$("#chkCurrentPwd").html("<font color=green> Current Password Is Correct </font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});


	// Update Status in Brands Table Active or Inactive
	//$(".updateBrandStatus").click(function(){
	$(document).on("click",".updateBrandStatus",function(e){
		//var status = $(this).text();
		var status = $(this).children("i").attr("status");
		//alert(status); return false;
		var brand_id = $(this).attr("brand_id");
		//alert(status +"&&"+brand_id);
		if(brand_id){
			$.ajax({
				type:'post',
				url:'/admin/update-brand-status',
				data:{status:status,brand_id:brand_id},
				success:function(resp){
					//alert(resp['status']);
					//alert(resp['brand_id']);
					if(resp['status']==0){
						$("#brand-"+brand_id).html("<i class='fas fa-toggle-off' aria-hidden='true' title='Inactive' status='Inactive'></i>");
					}else if(resp['status']==1){
						$("#brand-"+brand_id).html("<i class='fas fa-toggle-on' aria-hidden='true' title='Active' status='Active'></i>");
					}

				},error:function(){
					alert("Error");
				}
			});
		}
	});


	// Update Status in Sections Table Active or Inactive
	//$(".updateSectionStatus").click(function(){
	$(document).on("click",".updateSectionStatus",function(e){
		//var status = $(this).text();
		var status = $(this).children("i").attr("status");
		//alert(status); return false;
		var section_id = $(this).attr("section_id");
		//alert(status +"&&"+section_id);
		if(section_id){
			$.ajax({
				type:'post',
				url:'/admin/update-section-status',
				data:{status:status,section_id:section_id},
				success:function(resp){
					//alert(resp['status']);
					//alert(resp['section_id']);
					if(resp['status']==0){
						$("#section-"+section_id).html("<i class='fas fa-toggle-off' aria-hidden='true' title='Inactive' status='Inactive'></i>");
					}else if(resp['status']==1){
						$("#section-"+section_id).html("<i class='fas fa-toggle-on' aria-hidden='true' title='Active' status='Active'></i>");
					}

				},error:function(){
					alert("Error");
				}
			});
		}
	});


	// Update Status in Category Table Active or Inactive
	//$(".updateCategoryStatus").click(function(e){
	$(document).on("click",".updateCategoryStatus",function(e){
		//var status = $(this).text();
		var status = $(this).children("i").attr("status");
		//alert(status); return false;
		var category_id = $(this).attr("category_id");
		//alert(status +"&&"+category_id);
		if(category_id){
			$.ajax({
				type:'post',
				url:'/admin/update-category-status',
				data:{status:status,category_id:category_id},
				success:function(resp){
					//alert(resp['status']);
					//alert(resp['category_id']);
					if(resp['status']==0){
						$("#category-"+category_id).html("<i class='fas fa-toggle-off' aria-hidden='true' title='Inactive' status='Inactive'></i>");
					}else if(resp['status']==1){
						$("#category-"+category_id).html("<i class='fas fa-toggle-on' aria-hidden='true' title='Active' status='Active'></i>");
					}
				},error:function(){
					alert("Error");
				}
			});
		}
	});


	//Append Categories Lavel 
	$("#section_id").change(function(){
		var section_id = $(this).val();
		//alert(section_id);
		$.ajax({
			type:'post',
			url:'/admin/append-categories-level',
			data:{section_id:section_id},
			success:function(resp){
				$("#appendCategoriesLevel").html(resp);
			},error:function(){
				alert("Error");
			}

		});
	});


	// Update Status in Product Table Active or Inactive
	//$(".updateProductStatus").click(function(e){
	$(document).on("click",".updateProductStatus",function(e){
		//var status = $(this).text();
		var status = $(this).children("i").attr("status");
		//alert(status); return false;
		var product_id = $(this).attr("product_id");
		//alert(status +"&&"+product_id);
		if(product_id){
			$.ajax({
				type:'post',
				url:'/admin/update-product-status',
				data:{status:status,product_id:product_id},
				success:function(resp){
					//alert(resp['status']);
					//alert(resp['product_id']);
					if(resp['status']==0){
						$("#product-"+product_id).html("<i class='fas fa-toggle-off' aria-hidden='true' title='Inactive' status='Inactive'></i>");
					}else if(resp['status']==1){
						$("#product-"+product_id).html("<i class='fas fa-toggle-on' aria-hidden='true' title='Active' status='Active'></i>");
					}
				},error:function(){
					alert("Error");
				}
			});
		}
	});


	// Update Status in Attributes Table Active or Inactive
	//$(".updateAttributeStatus").click(function(e){
	$(document).on("click",".updateAttributeStatus",function(e){
		//var status = $(this).text();
		var status = $(this).children("i").attr("status");
		//alert(status); return false;
		var attribute_id = $(this).attr("attribute_id");
		//alert(status +"&&"+attribute_id);
		if(attribute_id){
			$.ajax({
				type:'post',
				url:'/admin/update-attribute-status',
				data:{status:status,attribute_id:attribute_id},
				success:function(resp){
					//alert(resp['status']);
					//alert(resp['attribute_id']);		
					if(resp['status']==0){
						$("#attribute-"+attribute_id).html("<i class='fas fa-toggle-off' aria-hidden='true' title='Inactive' status='Inactive'></i>");
					}else if(resp['status']==1){
						$("#attribute-"+attribute_id).html("<i class='fas fa-toggle-on' aria-hidden='true' title='Active' status='Active'></i>");
					}
				},error:function(){
					alert("Error");
				}
			});
		}
	});

	// Update Status in Product Image Table Active or Inactive
	//$(".updateImageStatus").click(function(e){
	$(document).on("click",".updateImageStatus",function(e){
		//var status = $(this).text();
		var status = $(this).children("i").attr("status");
		//alert(status); return false;
		var image_id = $(this).attr("image_id");
		//alert(status +"&&"+image_id);
		if(image_id){
			$.ajax({
				type:'post',
				url:'/admin/update-image-status',
				data:{status:status,image_id:image_id},
				success:function(resp){
					//alert(resp['status']);
					//alert(resp['image_id']);		
					if(resp['status']==0){
						$("#image-"+image_id).html("<i class='fas fa-toggle-off' aria-hidden='true' title='Inactive' status='Inactive'></i>");
					}else if(resp['status']==1){
						$("#image-"+image_id).html("<i class='fas fa-toggle-on' aria-hidden='true' title='Active' status='Active'></i>");
					}
				},error:function(){
					alert("Error");
				}
			});
		}
	});


	/*
	// Confirm Deletion of Record
	$(".confirmDelete").click(function(){
		var name = $(this).attr("name");
		if(confirm("Are You Sure to delete this "+name+"?")){
			return true;
		}
		return false;
	}); 
	*/

	/*
	// Confirm Deletion with SweatAlert 
	$(".confirmDelete").click(function(){
		var record = $(this).attr("record");
		var recordid = $(this).attr("recordid");
		Swal.fire({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.value) {
		    window.location.href="/admin/delete-"+record+"/"+recordid;
		  }
		});
	});
	*/

	// Confirm Deletion with SweatAlert 
	$(document).on("click",".confirmDelete",function(e){
	 	/* your code here after selected Any data and search as well as datasearching 
	 	after click any where call swaetalert box with help of jquery. */
	 	
	 	var record = $(this).attr("record");
		var recordid = $(this).attr("recordid");
		//alert(record+recordid);
		Swal.fire({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.value) {
		    window.location.href="/admin/delete-"+record+"/"+recordid;
		  }
		});

	});


	//Logout working with SweatAlert  (response return , confirmLogout class)
	$(".confirmLogout").click(function(){
		var response = $(this).attr("response");
		Swal.fire({
		  title: 'Are you sure ?',
		  text: "You won't be able to revert this!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, Logout !'
		}).then((result) => {
		  if (result.value) {
		    window.location.href="/admin/"+response;
		  }
		});
	});

	// Products Attributes Add/Remove Script

    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="mt-2 ml-2"><input type="text" name="size[]" placeholder="Size" style="width:100px;" required="">&nbsp;<input type="text" name="sku[]" placeholder="SKU" style="width:100px; required=""">&nbsp;<input type="number" name="price[]" placeholder="Price" style="width:100px;" required="">&nbsp;<input type="number" name="stock[]" placeholder="Stock" style="width:100px;" required=""><a href="javascript:void(0);" class="remove_button">&nbsp;&nbsp;<span class="text-danger"><i class="fas fa-trash"></i></span></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });


})
