 $(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });

  // Affiche ou non le temps de cuisson (radio)

    $('input[type=radio][name=cooking]').change(function() {
        if (this.value == 'without') {
            $("#cook-time-collapse").collapse("hide");
        }
        else {
            $("#cook-time-collapse").collapse("show");
        }
    });

    $("#cooking-form button[type=reset]").click(function(){
        $("#cook-time-collapse").collapse("show");
    });

    
    var a = $("#cook-time-collapse");
    if(a[0] != undefined)
    {
        while (a.next()[0] == undefined)
            a = a.parent();
        console.log(a.next()[0]);
        if (parseInt(a.next().css("margin-top").replace("px",""),10) <= 15)
            a.next().css("margin-top", 15)
    }

    a = $("#cook-time-collapse");
    if(a[0] != undefined)
    {
        while (a.prev()[0] == undefined)
            a = a.parent();
        a.prev().css("margin-bottom", 0)
    }
 });