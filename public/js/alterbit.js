$("#search").autocomplete({
    source: '/autocomplete',
    select: function (event, ui) {
        window.location.href = "/entity/" + ui.item.id;
    }
});