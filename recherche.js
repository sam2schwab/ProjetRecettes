$(function() {

    $("button[type=reset]").click(function(event){
        $(event.target).closest("form").find("input[data-role='tagsinput']").tagsinput('removeAll');
    })
    
    $("#rating-form button[type=reset]").click(function(event){
        $("#rating-search").data("star-rating").setRating(0);
    })
});