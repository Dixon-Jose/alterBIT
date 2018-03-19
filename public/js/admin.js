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
            if(suggestions.data.length){
                for(var i=0;i<suggestions.data.length;i++){
                    if (suggestions.data[i].deleted_at)
                    continue;
                    var imgurl= (suggestions.data[i].imgurl) ? suggestions.data[i].imgurl : '/images/placeholder.jpg';
                    suggestion='<div class="row" >\
                                    <div class="col-2"></div>\
                                    <a href="">\
                                        <div class="col-6 search-result">\
                                            <div class="src-img"><img src="'+ imgurl +'"></div>\
                                            <span style="display:none">'+suggestions.data[i]._id+'</span>\
                                            <h2>'+suggestions.data[i].name+'</h2>\
                                            <p>'+ suggestions.data[i].description +'</p>\
                                        </div>\
                                    </a>\
                                    <div class="tab2-options">\
                                        <br>\
                                        <br>\
                                        <input type="button" class="insert" value="Insert">\
                                        <br>\
                                        <br>\
                                        <input type="button" class="edit" value="Edit">\
                                        <br>\
                                        <br>\
                                        <input type="button" class="delete" value="Delete">\
                                    </div>\
                                </div>';
                    $("#tabs-2").append(suggestion);
                }
            }
            else
                $("#tabs-2").append("<h2>It seems there were no suggestions</h2>");
        },
        error:function(jqXHR,status,error){
            alert(error+". Try reloading the page again!");
        }
    });


    $('body').on('click','.delete',function(){
        var sugg = $(this).parent().parent();
        var name=sugg.find("h2").html();
        if(confirm("Are you sure you want to delete '"+name+"' ?")){
            var id = sugg.find("span").html();
            $.ajax({
                url:"/delsuggestion",
                method:"POST",
                data: {id:id},
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                success:function(message,sstatus,sjqXHR){
                    if(message=="Deleted"){
                        sugg.slideUp("slow",function(){
                            sugg.remove();
                        });
                    }
                    else
                    alert(message);
                    console.log(sstatus);
                    console.log(sjqXHR);
                },
                error:function(jqXHR,status,error){
                    alert(error + ".Please Try again !");
                }
            });
        }
    });


    $('#optionalForm').prepend('<input type="text" class="tags" placeholder="Tags" title="Specify tags (comma seperated,without space in b/w)" required><br><br>');

    function split(val) {
        return val.split(/,\s*/);
    }

    function extractLast(term) {
        return split(term).pop();
    }
 var tags=[];


    $.ajax("/tagcomplete").done(function(data){
        for(var i=0;i<data.length;i++){
            tags.push(data[i][0]);
        }
    });

    $(".tags").autocomplete({
        typeAhead: true,
        source: function (request, response) {
            // delegate back to autocomplete, but extract the last term
            response($.ui.autocomplete.filter(
                tags, extractLast(request.term)));
        },
        search: function () {
            // custom minLength
            var term = extractLast(this.value);
            if (term.length < 2) {
            return false;
            }
        },
        focus: function () {
            // prevent value inserted on focus
            return false;
        },
        select: function (event, ui) {
            var terms = split(this.value);
            // remove the current input
            terms.pop();
            // add the selected item
            terms.push(ui.item.value);
            // add placeholder to get the comma-and-space at the end
            terms.push("");
            this.value = terms.join(",");
            return false;
        }
    });
});
