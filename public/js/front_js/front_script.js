$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*$("#sort").on('change',function(){
        this.form.submit();
    });*/


    /* Product Sort Filter */
    $("#sort").on('change',function(){
        var sort = $(this).val();
        var cuisine = get_filter("cuisine");
        var country = get_filter("country");
        var foodpreference = get_filter("foodpreference");
        var url = $("#url").val();
        $.ajax({
           url:url,
           method:"post",
           data:{cuisine:cuisine,country:country,foodpreference:foodpreference,sort:sort,url:url},
           success:function(data){
               $('.filter_products').html(data);
           }
        })
    });

    /*  Product Filter  */
    $(".cuisine").on('click',function(){
        var cuisine = get_filter(this);
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
           $.ajax({
            url:url,
            method:"post",
            data:{cuisine:cuisine,sort:sort,url:url},
            success:function(data){
                $('.filter_products').html(data);
            }
        })
    });

    $(".country").on('click',function(){
        var country = get_filter(this);
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
           $.ajax({
            url:url,
            method:"post",
            data:{country:country,sort:sort,url:url},
            success:function(data){
                $('.filter_products').html(data);
            }
        })
    });

    $(".foodpreference").on('click',function(){
        var foodpreference = get_filter(this);
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
           $.ajax({
            url:url,
            method:"post",
            data:{foodpreference:foodpreference,sort:sort,url:url},
            success:function(data){
                $('.filter_products').html(data);
            }
        })
    });
    
    /* Get Filter Function */
    function get_filter(class_name){
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    /* Get Attr Price */
    $("#getPrice").on('change',function(){
        var size = $(this).val();
        var product_id = $(this).attr("product-id");
        $.ajax({
           url:'/get-product-price',
           data:{size:size,product_id:product_id},
           type:'post',
           success:function(resp){
               if(resp['discounted_price']>0){
                    // $(".getAttrPrice").html("<del>Rs. "+resp['product_price' ]+"</del> Rs."+resp['discounted_price']);
                    $(".getAttrPrice").html("Rs. "+resp['discounted_price' ]+" &nbsp; "+" <small> MRP: <del>Rs."+resp['product_price']+" </del> </small>");    

                }else{
                    $(".getAttrPrice").html("MRP:"+"&nbsp;"+" Rs "+resp['product_price']);
                }  
            },error:function(){
               alert("Error");
            }
        });
    });


});