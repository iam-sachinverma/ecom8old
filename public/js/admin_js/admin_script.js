$(document).ready(function(){
    // Check Current Admin Password 
    $("#current_pwd").keyup(function(){
        var current_pwd = $("#current_pwd").val();
        //alert(current_pwd);
        $.ajax({
            type:'post',
            url:'/admin/check-current-pwd',
            data:{current_pwd:current_pwd},
            success:function(resp){
                if(resp=="false"){
                    $("#chkCurrentPwd").html("<font color=red>Current Password is incorrect</font>");
                }else if(resp=="true"){
                    $("#chkCurrentPwd").html("<font color=green>Current Password is correct</font>");
                }   
            },error:function(){
                alert("Error");
            }
        });
    });

    // Sections Active and Inactive Status
    $(document).on("click",".updateSectionStatus",function(){    
        var status = $(this).children("i").attr("status");
        var section_id = $(this).attr("section_id");
        $.ajax({
            type: 'post',
            url:'/admin/update-section-status',
            data:{status:status,section_id:section_id},
            success:function(resp){
                if(resp['status']==0){
                    $("#section-"+section_id).html("<i class='fas fa-toggle-off fa-lg' aria-hidden='true' status='Inactive'></i>");
                }else if(resp['status']==1){
                    $("#section-"+section_id).html("<i class='fas fa-toggle-on fa-lg' aria-hidden='true' status='Active'></i>");
                }

            },error:function(){
                alert("Error");
            }
        });
    });

    // Category Active and Inactive Status
    $(document).on("click",".updateCategoryStatus",function(){      
        var status = $(this).children("i").attr("status");
        var category_id = $(this).attr("category_id");
        $.ajax({
            type: 'post',
            url:'/admin/update-category-status',
            data:{status:status,category_id:category_id},
            success:function(resp){
                if(resp['status']==0){
                    $("#category-"+category_id).html("<i class='fas fa-toggle-off fa-lg' aria-hidden='true' status='Inactive'></i>");
                }else if(resp['status']==1){
                    $("#category-"+category_id).html("<i class='fas fa-toggle-on fa-lg' aria-hidden='true' status='Active'></i>");
                }

            },error:function(){
                alert("Error");
            }
        });
    });

    // Append Category Level
    $('#section_id').change(function(){
        var section_id = $(this).val();
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

    // SweetAlert (Confirm Deletion of any record)
    $(document).on("click",".confirmDelete",function(){
        var record = $(this).attr("record");
        var recordid = $(this).attr("recordid");
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this file!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          })
          .then((result) => {
            if (result.isConfirmed) {
              window.location.href="/admin/delete-"+record+"/"+recordid;
            } 
          });

    });


    
});



