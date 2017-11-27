function filter() {
	var search, filter, ul, li, a;

	search = document.getElementById('search-box');
	filter = search.value.toUpperCase();
	ul = document.getElementById('search-list');
	li = ul.getElementsByTagName('li');


	for (var i = 0; i < li.length; i++) {
		a = li[i].getElementsByTagName('a')[0];
		if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
			li[i].style.display = 'block';
			console.log(a);
		} else {
			li[i].style.display = 'none';
		}

	}

}

// $(document).ready(function() {

// 	// Filterable search list


// 	var reset = document.getElementById("pass-reset");
// 	var SignIn = document.getElementById("sign-in");

// 	$('reset').click(function() {
		
// 	})

	

// });


// Signup/Log In Display

const reset = document.querySelector('#password-reset');


function toggle_visibility(id) {
	const e = document.getElementById(id);
	e.style.display = ((e.style.display!='none') ? 'none' : 'block');
}

// onchange added to html

onchange="populate(this.id, 'childId')" 

// pass in the parent and child select Id as args
function populate(parentId, childId) {
	// assign variables to the args
	var parent = document.getElementById('parentId');
	var child = document.getElementById('childId');

	child.innerHTML = "";

	// change to a switch case for larger no. of options 
	if (parent.value == "option1") {
		var optionArray = ["|", "option-1|Option 1", "option-2|Option 2", "option-3|Option 3"];
	} else if (parent.value = "option2") {
		var optionArray = ["|", "option-1|Option 1", "option-2|Option 2", "option-3|Option 3"];
	}


	for (var i = options in optionArray) {
		var pair = optionArray[option].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		child.options.add(newOption);
	}
}