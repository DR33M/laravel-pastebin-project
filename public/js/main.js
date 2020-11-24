$(document).ready(function() {
    $(".js-header-dropdown").mouseover(function(){
        $('.dropdown-menu.-header').addClass('show');
    });

    $('.dropdown-menu.-header').mouseleave(function() {
        $(this).removeClass('show');
    });

    autosize($('#postform-text'));

    $('.postform-format').select2();
    $('.postform-status').select2({
        minimumResultsForSearch: -1
    });
});
