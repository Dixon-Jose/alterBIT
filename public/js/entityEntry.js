var payload;
$(document).ready(function () {
    var tags;//to manage the tags filter
    var elements;//to store the element and alternative to later parse(fluctuating data;changes with every ajax request)
    var selectedEle=[];//to store the selected elements
    var datadump=[];//to dump incoming ajax dat to later parse if required
    function addElementsTags(data) {
        elements = [];
        for (i = 0; i < data.tags.length; i++) {
            $('.sugg-tags').append('<a href="" class="cat-tag" style="display:none">' + data.tags[i] + '</a>');
            $('.cat-tag').fadeIn("slow");
        }
        for (i = 0; i < data.terms.length; i++) {
            $('.alter').append('<div class="col-3 card-sugg"><h3 title=' + data.terms[i]._id + '>' + data.terms[i].name + '</h3><p>' + data.terms[i].description.substr(0, 100) + '</p><input class="alt-sel" type="button" value="Select" ><br><br><input type="checkbox"><span id="checkbox">With it\'s Alternatives</span></div>');
            elements[data.terms[i]._id] = data.terms[i].alternatives;
            datadump[data.terms[i]._id]=data.terms[i];
        }
        $('.cat-tag').each(function () {
            if ($.inArray(this.innerHTML, tags) >= 0) {
                $(this).css("color", "black");
            }
        });
    }

    if ($('#category-select').length) {
        $.ajax({
            url: '/category',
            success: function (data) {
                for (i = 0; i < data.length; i++)
                    $('#category-select').append('<option>' + data[i][0] + '</option>');
                    $('#category-select').append('<option>' + "select new category" + '</option>');
                $('#category-select').val(null);
            },
            error: function(jqXHR,status,error){
                alert(status+':'+error);
            }

        });
        var tooltips = $("[title]").tooltip({
            position: {
                my: "left top",
                at: "right+10 top+1",
                collision: "none"
            }
        });
    }


    $('#category-select')
        .selectmenu({
            change: function (event, ui) {
                if (ui.item.value ==="select new category"){
                    var cat=prompt("Specify the category");
                    $('#category-select').children('option:selected').html(cat);
                    $('#category-select').append('<option>' + "select new category" + '</option>').selectmenu('refresh', true);
                }
                else{
                    $.getJSON("/category?category=" + ui.item.value, function (data) {
                        $('#alternatives').css('display', 'block');
                        $('.card-sugg,.cat-tag').remove();
                        tags = []; elements = []; selectedEle = [];
                        addElementsTags(data);
                        $('html,body').animate({
                            scrollTop: $(".sugg-page-form").offset().top
                        },
                            'slow');
                    });
                }
            }
        });

    /**
     * Function to filter the elements displayed in the entry form with that of tags
     * each subsequent clicks to different tags add them to tags array, the search is such a way that
     * all the elements in the tags array should be matched
     */
    $('body').on('click', '.cat-tag', function (event) {
        event.preventDefault();
        $category = $('#category-select').val();
        if ($.inArray(this.innerHTML, tags) >= 0) {
            tags.splice($.inArray(this.innerHTML, tags), 1);
        }
        else
            tags.push(this.innerHTML);
        $.getJSON("/category?category=" + $category, "tags=" + tags, function (data) {
            $('.card-sugg,.cat-tag').remove();
            addElementsTags(data);
            $('.card-sugg').each(function () {
                if ($.inArray($(this).children("h3").attr('title'), selectedEle) >= 0) {
                    $(this).css({ 'background-color': '#e5e7e9', 'border': '1px solid grey' })
                        .children('.alt-sel').val("Reject").css('background-color:', ' #f2f3f4 ');
                }
            });
        });

    });

    $(".controlgroup").controlgroup();



    function selectOrReject(data, action) {
        if (action === true) {
            $.each(data, function (index, value) {
                if ($.inArray(value, selectedEle) === -1) {
                    selectedEle.push(value);
                }
            });
        }
        else {
            if (action === false) {
                $.each(data, function (index, value) {
                    selectedEle.splice($.inArray(value, selectedEle), 1);
                });
            }
        }
    }

    $('body').on('click', ".alt-sel", function () {
        if ($(this).val() == "Select") {
            if ($(this).siblings("input:checked").length > 0) {
                alternatives = [];
                alternatives = elements[$(this).siblings("h3").attr("title")];
                alternatives.push($(this).siblings("h3").attr("title"));
                selectOrReject(alternatives, true);
                $('.card-sugg').each(function () {
                    if ($.inArray($(this).children("h3").attr('title'), alternatives) >= 0) {
                        if ($(this).children("input:checked").length > 0) {
                            $(this).children("input[type=checkbox]").prop("checked", false);
                        }
                        $(this).css({ 'background-color': '#e5e7e9', 'border': '1px solid grey' })
                            .children('.alt-sel').val("Reject").css('background-color:', ' #f2f3f4 ');
                    }
                });
            } else {
                alternatives = [];
                alternatives.push($(this).siblings("h3").attr("title"));
                selectOrReject(alternatives, true);
                $(this).val("Reject").css('background-color:', ' #f2f3f4 ');
                if ($(this).siblings("input:checked").length > 0) {
                    $(this).siblings("input[type=checkbox]").prop("checked", false);
                }
                $(this).parent().css({ 'background-color': '#e5e7e9', 'border': '1px solid grey' });
            }
        }
        else {
            if ($(this).val() == "Reject") {
                if ($(this).siblings("input:checked").length > 0) {
                    alternatives = [];
                    alternatives = elements[$(this).siblings("h3").attr("title")];
                    alternatives.push($(this).siblings("h3").attr("title"));
                    selectOrReject(alternatives, false);
                    $('.card-sugg').each(function () {
                        if ($.inArray($(this).children("h3").attr('title'), alternatives) >= 0) {
                            if ($(this).children("input:checked").length > 0) {
                                $(this).children("input[type=checkbox]").prop("checked", false);
                            }
                            $(this).css({ 'background-color': '#fff', 'border': '1px solid lightgrey' })
                                .children('.alt-sel').val("Select");
                        }
                    });
                }
                else {
                    alternatives = [];
                    alternatives.push($(this).siblings("h3").attr("title"));
                    selectOrReject(alternatives, false);
                    if ($(this).siblings("input:checked").length > 0) {
                        $(this).siblings("input[type=checkbox]").prop("checked", false);
                    }
                    $(this).val('Select').parent().css({ 'background-color': '#fff', 'border': '1px solid lightgrey' });
                }
            }
        }

    });

    $('body').on('click', '#img-url', function () {
        $('#image-file').slideUp();
        $('#image-url').slideDown();
    });

    $('body').on('click', '#img-file', function () {
        $('#image-url').slideUp();
        $('#image-file').slideDown();
    });


    function imgurUpload(){
        if($('#img-url:checked').length>0){
            if($('#url').val().length>0){
                $.ajax({
                    "async": true,
                    "crossDomain": true,
                    "url": "https://api.imgur.com/3/image",
                    "method": "POST",
                    "headers": {
                        "Authorization": "Client-ID 6130a8b5bbc1e9f"
                    },
                    "data":{"image":$('#url').val()},
                    "error":function(jqXHR,status,error){
                        alert(error+" Image Upload Failed.Try Again !");
                    }
                }).done(function(response){
                    link=response.data.link;
                    $('#imgurl').prop('src',link);
                    payload['imgurl'] = link;
                });
            }
        }
        else
        if($('#img-file:checked').length>0){

            var file=$("#file").get(0).files;
            if(file.length){
                if(file[0].size>$('#file').data('max-size')*1024){
                    alert('Please Upload a file less than 10mb');
                    return false;
                }
                var form = new FormData();
                form.append("image", file[0]);

                var settings = {
                    "async": true,
                    "crossDomain": true,
                    "processData":false,
                    "contentType":false,
                    "url": "https://api.imgur.com/3/image",
                    "method": "POST",
                    "headers": {
                        "Authorization": "Client-ID 6130a8b5bbc1e9f"
                    },
                    "processData": false,
                    "contentType": false,
                    "mimeType": "multipart/form-data",
                    "data": form,
                    "error":function(jqXHR,status,error){
                        alert(error + " Image Upload Failed.Try Again !");
                    }
                }

                $.ajax(settings).done(function (response) {
                    var responseJSON=$.parseJSON(response);
                    link = responseJSON.data.link;
                    $('#imgurl').prop('src', link);
                    payload['imgurl']=link;
                });

            }

        }
        return false;
    }

    var form = $('#inputForm');
    form.validate({
        messages: {
            name: {
                minlength:"Please enter atleast 2 charecters",
                required: "Please specify name of the entity",
            },
            description:{
                required:"Please specify description",
                minlength:"Please describe in atleast 20 letters"
            },
        }
    });
    var subForm=$('#optionalForm');
    subForm.validate();
    $('body').on('click', '.done', function () {

        if(form.valid()){
            if(subForm.valid()){
                if($('#category-select').val()){
                    if(payload==null){
                        payload={};
                        imgurUpload();
                    }
                    payload['name'] = $("input[name=name]").val().toLowerCase();
                    payload['description'] = $("#description").val().toLowerCase();
                    payload['category'] = $('#category-select').val().toLowerCase();
                    $('.Ent-alt-card').remove();
                    if(selectedEle.length){
                        payload['alternatives'] = selectedEle;
                        $('#alt-title').html("The Alternatives are:");
                    for (i = 0; i < selectedEle.length; i++) {
                        $('#EntityAlternatives').append('<div class="col-2 card Ent-alt-card"><h3>' + datadump[selectedEle[i]].name + '</h3><p>' + datadump[selectedEle[i]].description.substring(0, 100) + '</p></div >');
                    }
                      $('#EntityAlternatives').append('<div class="clear"></div><input type="button" class="edit" value="Edit"><input type="submit" class="submit" value="Submit"> <br><br> <div class="row footer"><div class="col-10" ><h3>alterBIT | The Unconventional Way of Life</h3><a href="https://github.com/Dixon-Jose/alterBIT" title="github"></a></div></div>');
                  }
                    else
                    {$('#alt-title').html("No Selected Alternatives.");
                    $('#alt-title').css("font-size","130%");
                    $('#alt-title').css("width","13em");
                    $('#alt-title').css("margin-left","17%");
                    $('#EntityAlternatives').css("height","0em");

                    }
                    $('#EntityName').html(payload['name']);
                    $('#EntityDescription').html(payload['description']);
                    $('#category').html(payload['category']);
                    $("html, body").animate({ scrollTop: 0 }, 1000);
                    $('#entityForm').slideUp(800);
                    // $('.user-form').slideUp(800);
                    // $('.sugg-page-form').slideUp(800);
                    $('.card-sugg').slideUp();
                    // $('.user-form1').slideUp(800);
                    $('.finalize-alt').slideDown(800);

                }
                else{
                    alert('select category!');
                    return false;
                }
            }
        }


    });

    $('body').on('click','.edit',function(){
    //   $('#category-select').val(null);
      $('.finalize-alt').slideUp(800);
      $('#entityForm').slideDown(800);
      $('.card-sugg').slideDown(800);
    //   $('.user-form').slideDown(800);
    //   $('.user-form1').slideDown(800);
    $("html, body").animate({ scrollTop: 0 }, 1000);
    });

    /**
     * Proceed button in admin/suggestion
     */
    $('body').on('click', '.proceed', function () {
        var sugg = $(this).parent().parent();
        var id = sugg.find("span").html();
        for(var i=0;i<suggest.length;i++){
            if(suggest[i]._id===id){
                var suggestion=suggest[i];
                break;
            }
        }
        console.log(suggestion);
        $("#category-select").val(suggestion.category).selectmenu('refresh', true);
        $.getJSON("/category?category="+suggestion.category, function (data) {
            $('#alternatives').css('display', 'block');
            $('.card-sugg,.cat-tag').remove();
            tags = []; elements = []; selectedEle = [];
            addElementsTags(data);
            selectedEle=suggestion.alternatives;
            $('.card-sugg').each(function () {
                if ($.inArray($(this).children("h3").attr('title'), selectedEle) >= 0) {
                    $(this).css({ 'background-color': '#e5e7e9', 'border': '1px solid grey' })
                        .children('.alt-sel').val("Reject").css('background-color:', ' #f2f3f4 ');
                }
            });
        });

        $("input[name=name]").val(suggestion.name);
        $("#description").val(suggestion.description);
        $('#url').val(suggestion.imgurl);
        $('#image-url').slideDown();
        $('#imgurl').prop('src', suggestion.imgurl);
        payload={};
        payload['imgurl'] = suggestion.imgurl;



        $("html, body").animate({ scrollTop: 0 }, 1000);
        $('#tabs-2').slideUp(800);
        $('#tabs-1').slideDown(800);
        $(".tab1").css("color", "black");
        $('.tab2').css("color", "#566573");
    });
});
