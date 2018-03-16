$(document).ready(function () {
    var tags = [];//to manage the tags filter
    var elements = [];//to store the element and alternative to later parse(fluctuating data;changes with every ajax request)
    var selectedEle = [];//to store the selected elements
    var datadump=[];//to dump incoming ajax dat to later parse if required
    function addElementsTags(data) {
        elements = []; datadump = [];
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
                    $('#category-select').append('<option>' + data[i][0] + '</option');
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

    function loader(){
        $('#loader').toggleClass("loader");
    }

    function imgurUpload(){
        var link=false;
        loader();
        if($('#img-url:checked').length>0){
            $.ajax({
                "async": false,
                "crossDomain": true,
                "url": "https://api.imgur.com/3/image",
                "method": "POST",
                "headers": {
                    "Authorization": "Client-ID 6130a8b5bbc1e9f"
                },
                "data":{"image":$('#url').val()},
                "error":function(jqXHR,status,error){
                    alert(status+":"+error);
                    loader();
                }  
            }).done(function(response){
                loader();
                link=response.data.link;
                $('#imgurl').prop('src',link);
            });
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
                    "async": false,
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
                        alert(status+":"+error);
                        loader();
                    }
                }
        
                $.ajax(settings).done(function (response) {
                    loader();
                    var responseJSON=$.parseJSON(response);
                    link = responseJSON.data.link;
                    $('#imgurl').prop('src', link);
                });

            }
    
        }
        loader();
        return link;
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
                minlength:"Please describe in atleast 20 words"   
            },
        }
    });
    var subForm=$('#optionalForm');
    subForm.validate();
    var payload = [];
    $('body').on('click', '.done', function () {
        
        if(form.valid()){
            if(subForm.valid()){
                if($('#category-select').val()){
                    payload={};
                    var link = imgurUpload();
                    if (link)
                        payload['imgurl'] = link;
                    payload['name'] = $("input[name=name]").val().toLowerCase();
                    payload['description'] = $("#description").val().toLowerCase();
                    payload['category'] = $('#category-select').val().toLowerCase();
                    $('.Ent-alt-card').remove();
                    if(selectedEle.length){
                        payload['alternatives'] = selectedEle;
                        $('#alt-title').html("The Alternatives are:");   
                    for (i = 0; i < selectedEle.length; i++) {
                        $('#EntityAlternatives').append('<div class="col-2 card Ent-alt-card"><h3>' + datadump[selectedEle[i]].name + '</h3><p>' + datadump[selectedEle[i]].description.substring(0, 100) + '</p></div >');
                    }}
                    else
                    {$('#alt-title').html("No Selected Alternatives");}
                    $('#EntityName').html(payload['name']);
                    $('#EntityDescription').html(payload['description']);
                    $('#category').html(payload['category']);
                    $("html, body").animate({ scrollTop: 0 }, 1000);
    
                    $('.user-form').slideUp(800);
                    $('.sugg-page-form').slideUp(800);
                    $('.card-sugg').slideUp();
                    $('.user-form1').slideUp(800);
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
      $('#category-select').val(null);  
      $('.finalize-alt').slideUp(800);
      $('.user-form').slideDown(800);
      $('.user-form1').slideDown(800);
    $("html, body").animate({ scrollTop: 0 }, 1000);
    });

    $('body').on('click', '.submit', function () {
        
        $.ajax({
            method:"POST",
            url: "/suggest",
            data: payload,
            headers:{
                "X-CSRF-TOKEN": $('input[type=hidden]').val()
            },
            success:function(data){
                    alert("form submitted successfully !");
                    console.log(data);
                    window.location="/suggest";
                },
            error:function(jqXHR,status,error){
                    alert(status+":"+error);
                }
        });
    });
});