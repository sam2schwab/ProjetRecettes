$(function() {

    $("button[type=reset]").click(function(event){
        $(event.target).closest("form").find("input[data-role='tagsinput']").tagsinput('removeAll');
    })
    
});