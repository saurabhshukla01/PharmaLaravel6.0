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

	// Update Status in Sections Table Active or Inactive
	//$(".updateSectionStatus").click(function(){
	$(document).on("click",".updateSectionStatus",function(e){
		var status = $(this).text();
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
						$("#section-"+section_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>Inactive</a>");
					}else if(resp['status']==1){
						$("#section-"+section_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>Active</a>");
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
		var status = $(this).text();
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
						$("#category-"+category_id).html("<a class='updateCategoryStatus' href='javascript:void(0)'>Inactive</a>");
					}else if(resp['status']==1){
						$("#category-"+category_id).html("<a class='updateCategoryStatus' href='javascript:void(0)'>Active</a>");
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

	// Next Script code here 

})
