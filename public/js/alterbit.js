$(document).ready(function(){

    $("#search").autocomplete({
        minLength: 2,
        typeAhead: true,
        source: '/autocomplete',
        select: function (event, ui) {
            window.location.href =  '/'+ui.item.category+'/'+ui.item.id;
        }
    });


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

    function fillData(data){
      $('#tag').after(
        '<div class="row del">\
              <div class= "col-1" ></div >\
              <div class="col-10 src-tags" id="appendTags">\
              </div>\
            </div >'
      );
      for(var i=0;i<data.tags.length;i++){
        if($.inArray(data.tags[i],tag)>=0)
        $('#appendTags').append('<a class="searchtags" style="color:black" href="#">'+data.tags[i]+'</a>');
        else
        $('#appendTags').append('<a class="searchtags" href="#">'+data.tags[i]+'</a>');
    }
      for(var i=0;i<data.entities.length;i++){
        var entities='<div class="row del" >\
        <div class="col-1" ></div >\
        <a href="/'+data.entities[i].category+'/'+data.entities[i]._id+'">\
          <div class="col-6 search-result">\
            <div class="src-img"><img src="'+data.entities[i].imgurl+'"></div>\
              <h2>'+data.entities[i].name+'</h2>\
              <p>'+ data.entities[i].description.substr(0,100)+'</p>\
            </div>\
        </a>\
       </div>';
        $("#entities").append(entities);
      }  
    }
    var tag=[];
  $('body').on('click','.searchtags',function(event){
      event.preventDefault();
      var t = $(this).html();
      if ($.inArray(t,tag)>=0)
        tag.splice($.inArray(t,tag), 1);
      else
      tag.push($(this).html());
      $(".del").remove();
      if(tag.length){
        $.ajax({
          url:"/search?tag="+tag,
          success:function(data){
            if ($(".original").is(":visible")){
              $(".original").hide();
            }  
            fillData(data);
          },
          error: function (jqXHR, status, error){
            alert(error+" Try Reloading the page!");
          }
        });
      }else
        $(".original").show();
    });
});
