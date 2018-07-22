//alert('Hello JS');

/*
window.onload = function(){

	document.querySelectorAll('.my_button_one').onclick = function(){

			var id = document.getElementById("info_id").value;
			alert(id);
		}

	}
*/

window.onload = function(){

  var items = document.querySelectorAll('.my_button_two');

  for(var i = 0; i < items.length; i++){

		items[i].onclick = function(){

			//console.log(items[3].innerHTML);

		}
  }

  function myFun(){
    //this.classList.toggle('items-active');
		// alert('hello');
		// console.log('125485');
		//  var id = document.getElementById("info_id").value;
		//  alert(id);

  }

}
