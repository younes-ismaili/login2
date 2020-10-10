
function login(){ 
	let hisEmail=document.getElementById('username').value
	let hisPwd=document.getElementById('pwd').value

	let xhr = new XMLHttpRequest();
	xhr.open('GET', 'http://localhost/ucd/test.php?email='+hisEmail+'&pwd='+hisPwd);
	xhr.send();


	xhr.onload = function() {

	  if (xhr.status != 200) { 
	    alert(xhr.response);
	  } else { 
	    console.log(xhr.response); 

	    let user = JSON.parse(xhr.response);
		document.getElementById('infos').innerHTML=user.first_name + ' '+ user.last_name

	  }
	};


	
}