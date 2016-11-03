$(function() {
    $("button.close").click(function(event){
        $(event.target).closest("form").find("input[data-role='tagsinput']").tagsinput('removeAll');
    })
});