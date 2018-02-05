$("#search , #alternative").autocomplete({
    minLength: 2,
    typeAhead: true,
    source: '/autocomplete',
    select: function (event, ui) {
        window.location.href =  ui.item.id;
    }
});

$( ".search-mess" ).dialog({
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
