
// $(document).ready(function(){
//     $("#flip").click(function(){
//       $.ajax({type: "POST", url: "orderinfo.php", data: })
//     $(".panel").slideToggle("slow");
//   });
// });

function lengthCheck(){
	var count = $('#orders tr').length;
	var results = "There are no open orders in the queue...";
	if (count == 0){
		$('#orders').html(results);
	}
}



function ajaxFunc(id) {
	var divId = "#divDetails" + id;

	$.post("getCustomerId.php", {customerId: id}, function(results){
		$(divId).html(results);	
		$(divId).slideToggle("fast");
		//$(divId).toggle();
		//$("#editMessage").html(results);	
	});

}

// function editFunc(id) {
// 	var divId = "#editMessage";

// 	$.post("getCustIdForEdit.php", {customerId: id}, function(results){
// 		$(divId).html(results);
// 	});

// }

function editFunc(id) {
	var orderInfo = "#center";
	alert(id);
	$.post("editOrder.php", {customerId: id}, function(results){
		$(orderInfo).html(results);
	})
}

function deleteFunc(id) {
	var divId = "#deleteMessage";

	$.post("getCustIdForDelete.php", {customerId: id}, function(results){
		$(divId).html(results);
	});
}

function completeFunc(id) {
	var divId = "#confirmMessage";

	$.post("getCustIdForComplete.php", {customerId: id}, function(results){
		$(divId).html(results);
	});
}





