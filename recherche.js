/// <reference path="../typings/jquery/jquery.d.ts"/>
$(function() {

    //clear filters
    $("#clear_filters").click(function(event){
        $("form").trigger("reset");
    });
    
    $("form").on("reset",function(event){
        $(this).find("input[data-role='tagsinput']").tagsinput('removeAll');
    });
    
    $("#rating-form").on("reset",function(event){
        $("#rating-search").data("star-rating").setRating(0);
    });

    //sort results
    $(".btn-sort").click(function(event) {
        $(".btn-sort").not(this).children(".glyphicon").removeClass('glyphicon-sort-by-attributes-alt glyphicon-sort-by-attributes').addClass('text-muted glyphicon-sort');
        $(this).children(".glyphicon").removeClass('text-muted');
        if($(this).children(".glyphicon").hasClass('glyphicon-sort-by-attributes'))
            $(this).children(".glyphicon").removeClass('glyphicon-sort-by-attributes').addClass('glyphicon-sort-by-attributes-alt');
        else
            $(this).children(".glyphicon").removeClass('glyphicon-sort-by-attributes-alt glyphicon-sort').addClass('glyphicon-sort-by-attributes');
    })
});