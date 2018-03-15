$(document).ready(function () {
    tags = [];//to manage the tags filter
    elements = [];//to store the element and alternative to later parse(fluctuating data;changes with every ajax request)
    selectedEle = [];//to store the selected elements
    function addElementsTags(data) {
        for (i = 0; i < data.tags.length; i++) {
            $('.sugg-tags').append('<a href="" class="cat-tag" style="display:none">' + data.tags[i] + '</a>');
            $('.cat-tag').fadeIn("slow");
        }
        for (i = 0; i < data.terms.length; i++) {
            $('.alter').append('<div class="col-3 card-sugg"><h3 title=' + data.terms[i]._id + '>' + data.terms[i].name + '</h3><p>' + data.terms[i].description.substr(0, 100) + '</p><input class="alt-sel" type="button" value="Select" ><br><br><input type="checkbox"><span id="checkbox">With it\'s Alternatives</span></div>');
            elements[data.terms[i]._id] = data.terms[i].alternatives;
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

    $('body').on('click', '.done', function () {
        $('.user-form').slideUp(800);
        $('.sugg-page-form').slideUp(800);
        $('.card-sugg').slideUp();
        $('.user-form1').slideUp(800);
        $('.finalize-alt').slideDown(800);

    });

    $('body').on('click','.edit',function(){
      $('.finalize-alt').slideUp(800);
      $('.user-form').slideDown(800);
      $('.user-form1').slideDown(800);
    });
});
