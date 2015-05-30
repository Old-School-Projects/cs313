
// $(document).ready(function(){
//     $("#flip").click(function(){
//       $.ajax({type: "POST", url: "orderinfo.php", data: })
//     $(".panel").slideToggle("slow");
//   });
// });

function ajaxFunc(id) {
	//alert("fetching the data for id: " + id);
	var divId = "#divDetails" + id;

	$.post("getCustomerId.php", {customerId: id}, function(results){
		$(divId).html(results);	
		$(divId).slideToggle("slow");	
	});

}