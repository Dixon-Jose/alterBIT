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

    $( "body" ).on('click','.tab1',function(){
      $('#tabs-2').slideUp(800);
      $('#tabs-1').slideDown(800);
    });

    $( "body" ).on('click','.tab2',function(){

      $('#tabs-1').slideUp(800);
      $('#tabs-2').slideDown(800);
    });

});
