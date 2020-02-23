$(document).ready(function(){
//Initiate when ajax called
  $(document).ajaxStart(function(){
    $("#wait").css("display", "block");
  });

//Initiate when ajax complete
  $(document).ajaxComplete(function(){
	setTimeout(function(){
  		$("#wait").css("display", "none");
  	}, 550) 
  });
//Call ajax
	/*$("#tags").keydown(function(){
		var myData = getJSONData();
    		$( "#tags" ).autocomplete({
      		source: myData
    	});
 	});*/

  //Debounce function
function debounce(func, wait) {
  var timeout;
  return function() {
    var context = this,
        args = arguments;

    var executeFunction = function() {
      func.apply(context, args);
    }

    clearTimeout(timeout);
    timeout = setTimeout(executeFunction, wait);
  }
}

var handleKeypressDelay = debounce(function(){
  
  var inVal = $("#tags").val();
  console.log(inVal);
  console.log(typeof inVal);
  console.log(inVal.length);
  console.log($( "#tags" ).length > 0);
  console.log(inVal.length > 2);
  //if( ($( "#tags" ).length > 0) && ( inVal.length > 2 )) {
   var myData = getJSONData();
    $( "#tags" ).autocomplete({
      source: myData
    });
   // myData = [];
  //}

}, 550);

//Using debounce funtion
  $('#tags').keypress( handleKeypressDelay );



// keypress length
/*$('#input').keydown( function(e) {

    if( $(this).length === 8 ) { alert('We have a winner!'); }
    else { return false; }

});*/
//Get JSON data
function getJSONData(){
	var items = [];
    $.ajax({
       url: 'demo.json',
       dataType: 'json',
       success: function(data) {
          console.log(data);
          $.each(data, function(key, val) {
            items.push(val);    
          });
          //console.log(items);
          
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