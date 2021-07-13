// document.getElementsByTagName("input").addEventListener("submit", function(evt){
//   evt.preventDefault();
// });

document.getElementById("addForm").addEventListener("submit", function(evt){
	evt.preventDefault();
	const task = document.getElementById('todo-list-item').value;
	task.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, '');
	if (task !== '') {
		$.post('proc.php',{tasksub:task},function(data){
			var rawData = JSON.parse(data);
			if (rawData.status) {
				Swal.fire(rawData.msg,'','success').then(function(){
					$("body").load(location.href);
				});
			}else{
				Swal.fire(rawData.msg,'','error');
			}
		})
	}else{
		Swal.fire('Empty Input Feild','','error');
	}
})
