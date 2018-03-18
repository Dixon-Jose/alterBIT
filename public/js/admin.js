$(document).ready(function (){

    $("body").on('click', '.tab1', function () {
        $("html, body").animate({ scrollTop: 0 }, 1000);
        $('#tabs-2').slideUp(800);
        $('#tabs-1').slideDown(800);
        $(this).css("color", "black");
        $('.tab2').css("color", "#566573");
    });

    $("body").on('click', '.tab2', function () {
        $("html, body").animate({ scrollTop: 0 }, 1000);
        $('#tabs-1').slideUp(800);
        $('#tabs-2').slideDown(800);
        $(this).css("color", "black");
        $('.tab1').css("color", "#566573");
    });


    $.ajax({
        url: "/suggestions",
        success:function(suggestions){
            for(var i=0;i<suggestions.data.length;i++){
                console.log(suggestions.data[i].name);
                var imgurl= (suggestions.data[i].imgurl) ? suggestions.data[i].imgurl : '/images/placeholder.jpg';
                suggestion='<div class="row" >\
                                <div class="col-2"></div>\
                                <a href="">\
                                    <div class="col-6 search-result">\
                                        <div class="src-img"><img src="'+ imgurl +'"></div>\
                                        <h2>'+suggestions.data[i].name+'</h2>\
                                        <p>'+ suggestions.data[i].description +'</p>\
                                    </div>\
                                </a>\
                                <div class="tab2-options">\
                                    <br>\
                                    <br>\
                                    <input type="button" value="Insert">\
                                    <br>\
                                    <br>\
                                    <a href="{{ route("suggest") }}"><input type="button" value="Edit"></a>\
                                    <br>\
                                    <br>\
                                    <input type="button" value="Delete">\
                                </div>\
                            </div>';
                $("#tabs-2").append(suggestion);
            }
        }
    });
});