$(document).ready(function(){
//Initiate when ajax called
  $(document).ajaxStart(function(){
    $("#search-icon").addClass("display-none");
    $("#wait").css("display", "block");
  });

//Initiate when ajax complete
  $(document).ajaxComplete(function(){
	setTimeout(function(){
  		$("#wait").css("display", "none");
      $("#search-icon").removeClass("display-none");
  	}, 550) 
  });

/*anh MAX
  $(“#tags”).keydown (function (e) {
    console.log ($(this).val()+String.fromCharCode(e.which).toLowerCase());
  });

*/

  $('#tags').keydown (function (e) {
    //String with spaces
    var val = $(this).val()+String.fromCharCode(e.which).toLowerCase();
    console.log(val);
    console.log(val.length);
    //Remove spaces start and end if e.which not BACKSPACE
    var trim = val.trim();
    console.log(trim);
    console.log(trim.length);
    //Remove spaces at the end if e.which is BACKSPACE
    var b="";
    for(let i=0; i<trim.length; i++) if(trim.charCodeAt(i)>32&&trim.charCodeAt(i)<127) b+=trim.charAt(i);

    console.log(b);
    console.log((e.which==8)||(e.which>32 && e.which<127));
    console.log(b.length>2);
    //Search and loading spinner if input val length > 2
    if( (e.which==8)||(e.which>32 && e.which<127) && b.length>2 ){
      var myDataObj=getJSONData();
        $("#tags").autocomplete({
          source: myDataObj
        });
    }
  });

//Get JSON data
function getJSONData(){
	var items=[];
    $.ajax({
       url: 'demo.json',
       dataType: 'json',
       success: function(data) {
          $.each(data, function(key, val) {
            items.push(val);    
          });
          console.log(items);
          
       },
      statusCode: {
         404: function() {
           alert('There was a problem with the server.  Try again soon!');
         }
       }
    });
    return items;
}
});