$(function() {

    $("button[type=reset]").click(function(event){
        $(event.target).closest("form").find("input[data-role='tagsinput']").tagsinput('removeAll');
    })

    $('input[type=radio][name=cooking]').change(function() {
        if (this.value == 'without') {
            $("#cook-time-group").collapse("hide");
        }
        else {
            $("#cook-time-group").collapse("show");
        }
    });

    $("#cooking-form button[type=reset]").click(function(){
        $("#cook-time-group").collapse("show");
    });
    
});