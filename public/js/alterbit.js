$(document).ready(function(){
      $('#submit').click(function () {
      if (!confirm("Are you sure ?")) {
        return false;
      };
    });

    $("#search").autocomplete({
        minLength: 2,
        typeAhead: true,
        source: '/autocomplete',
        select: function (event, ui) {
            window.location.href =  '/'+ui.item.category+'/'+ui.item.id;
        }
    });

      // function split(val) {
      //   return val.split(/,\s*/);
      // }
      // function extractLast(term) {
      //   return split(term).pop();
      // }

    // $("#alternative")
    // .autocomplete({
    //   minLength: 2,
    //   typeAhead: true,
    //   source: function (request, response) {
    //     $.getJSON("autocomplete", {
    //       term: extractLast(request.term)
    //     }, response);
    //   },
    //   search: function () {
    //     // custom minLength
    //     var term = extractLast(this.value);
    //     if (term.length < 2) {
    //       return false;
    //     }
    //   },
    //   focus: function () {
    //     // prevent value inserted on focus
    //     return false;
    //   },
    //   select: function (event, ui) {
    //     var terms = split(this.value);
    //     // remove the current input
    //     terms.pop();
    //     // add the selected item
    //     terms.push(ui.item.value);
    //     // add placeholder to get the comma-and-space at the end
    //     terms.push("");
    //     this.value = terms.join(", ");
    //     return false;
    //   }
    // });

    $( ".search-mess" ).dialog({
      draggable:false,
      resizable:false,
      modal:true,
      buttons: [
                  {
                    text: "Add another",
                    click: function() {
                      $( this ).dialog( "close" );
                    }
                  },
                  {
                    text: "Okay",
                    click: function() {
                      window.location.href = "/";
                    }
                  }
                ]
    });


    $( ".message" ).dialog({
      draggable:false,
      resizable:false,
      modal:true,
      buttons: [
                  {
                    text: "Okay",
                    click: function() {
                      $( this ).dialog( "close" );
                    }
                  }
                ]
    });

    $("#add").click(function() {
        $( ".admin" ).dialog({
          draggable:false,
          resizable:false,
          modal:true,
          buttons: [
                      {
                        text: "Okay",
                        click: function() {
                          $( this ).dialog( "close" );
                        }
                        }
                    ]
        });
    });

    $( "#accord" ).accordion({
      collapsible: true,
      heightStyle: "content",
      active:false,
      animate: 500
    });

    $( "#accord1" ).accordion({
      collapsible: true,
      heightStyle: "content",
      active:false,
      animate: 500
    });


    tags=[];

        function addElementsTags(data){
          for (i = 0; i < data.tags.length; i++) {
            $('.sugg-tags').append('<a href="" class="cat-tag" style="display:none">' + data.tags[i] + '</a>');
            $('.cat-tag').fadeIn("slow");
          }
          for (i = 0; i < data.terms.length; i++) {
            $('.alter').append('<div class="col-3 card-sugg"><h3>' + data.terms[i].name + '</h3><p>' + data.terms[i].description.substr(0, 100) + '</p><input class="alt-sel" type="button" value="Select" ><br><br><input type="checkbox">Select with alternatives</div>');

          }
          $('.cat-tag').each(function () {
            if ($.inArray(this.innerHTML,tags) >= 0) {
              $(this).css("color","black");
            }
          });
        }

    if($('#category-select').length){
      $.ajax({
        url:'/category',
        success:function(data){
          for(i=0;i<data.length;i++)
          $('#category-select').append('<option>'+data[i][0]+'</option');
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
      change: function(event,ui){
        $.getJSON("/category?category="+ui.item.value ,function(data){
          $('#alternatives').css('display','block');
          $('.card-sugg,.cat-tag').remove();
          tags=[];
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
    $('body').on('click','.cat-tag',function(event){
      event.preventDefault();
      $category=$('#category-select').val();
      if($.inArray(this.innerHTML,tags)>=0){
        tags.splice($.inArray(this.innerHTML,tags),1);
      }
      else
      tags.push(this.innerHTML);
      $.getJSON("/category?category=" + $category,"tags="+tags,function(data){
          $('.card-sugg,.cat-tag').remove();
          addElementsTags(data);
          });
    });

    $( ".controlgroup" ).controlgroup();

    $('body').on('click',".alt-sel",function() {
      if ($(this).val() == "Select"){
        $(this).parent().css({'background-color':'#e5e7e9','border':'1px solid grey'});
        $(this).css('background-color:',' #f2f3f4 ');
        $(this).val("Unselect");
    }
      else{
        $(this).parent().css({'background-color':'#fff','border':'1px solid lightgrey'});
        $(this).val("Select");
    }

    });

    $('body').on('click','#img-url',function(){
      $('#image-file').slideUp();
        $('#image-url').slideDown();
    });

    $('body').on('click','#img-file',function(){
      $('#image-url').slideUp();
        $('#image-file').slideDown();
    });

    $('body').on('click','.done',function(){
      $('.sugg-page-form').slideUp(800);
      $('.final-alt').append('<br><br>Selected alternatives:<br><div class="col-3 final-card"><p>Hello</p></div></div>');

  });



});
