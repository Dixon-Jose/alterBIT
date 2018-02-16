



$('#submit').click(function () {
  if (!confirm("Are you sure ?")) {
    return false;
  };
});

$("#search").autocomplete({
    minLength: 2,
    typeAhead: true,
    source: 'autocomplete',
    select: function (event, ui) {
        window.location.href =  '/entity/'+ui.item.id;
    }
});

  function split(val) {
    return val.split(/,\s*/);
  }
  function extractLast(term) {
    return split(term).pop();
  }

$("#alternative")
.autocomplete({
  minLength: 2,
  typeAhead: true,
  source: function (request, response) {
    $.getJSON("autocomplete", {
      term: extractLast(request.term)
    }, response);
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
    this.value = terms.join(", ");
    return false;
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

$('#category-select').selectmenu();
