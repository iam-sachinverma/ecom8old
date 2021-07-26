$(document).ready(function(){
    /*$("#sort").on('change',function(){
        this.form.submit();
    });*/

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
    
    function get_filter(class_name){
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

});