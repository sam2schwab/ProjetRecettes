/// <reference path="../typings/jquery/jquery.d.ts"/>

var ratingSearch = 0;

$(function() {

    //remember the value of the star-rating search
    $('#rating-search').on('starrr:change', function(e, value){
        ratingSearch = value;
        updateList();
    });

    //clear filters
    $("#clear_filters").click(function(event){
        $("form").trigger("reset");
        updateList();
    });
    
    $("form").on("reset",function(event){
        $(this).find("input[data-role='tagsinput']").tagsinput('removeAll');
        //setTimeout to ensure form is reset before calling updateList
        setTimeout(updateList);
    });
    
    $("#rating-form").on("reset",function(event){
        $("#rating-search").data("star-rating").setRating(0);
    });

    //sort results
    $(".btn-sort").click(function(event) {
        $(".btn-sort").not(this).children(".glyphicon").removeClass('glyphicon-sort-by-attributes-alt glyphicon-sort-by-attributes').addClass('text-muted glyphicon-sort');
        $(this).children(".glyphicon").removeClass('text-muted');
        if($(this).children(".glyphicon").hasClass('glyphicon-sort-by-attributes'))
        {
            $(this).children(".glyphicon").removeClass('glyphicon-sort-by-attributes').addClass('glyphicon-sort-by-attributes-alt');
            $("#order").val("desc");
        }
        else
        {
            $(this).children(".glyphicon").removeClass('glyphicon-sort-by-attributes-alt glyphicon-sort').addClass('glyphicon-sort-by-attributes');
            $("#order").val("asc");
        }
        $("#sorting").val(this.value);
    })

    $(".update-onclick").click(updateList);
    $(".update-onchange").change(updateList);

});

function updateList() {
    var data = {};
    data['order'] = $('#order').val();
    data['sorting'] = $('#sorting').val();
    data['category'] = $('#category input:checked').map(function(){
        return $(this).val();
    }).get();
    data['cooking'] = $('#cooking-form input:checked').val();
    data['prep-time'] = $('#prep-time input').val();
    data['cook-time'] = $('#cook-time input').val();
    data['rating'] = ratingSearch;
    console.log(data);
    $('#list-recipes').load('recherche_resultats.php',data,function(){
        $('#list-recipes .starrr').starrr();
    });
}