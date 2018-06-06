//get value from sliders
function sliderChange(val){
		document.getElementById('range_overall').innerHTML = val;
}

function sliderChange2(val){
		document.getElementById('range_comm').innerHTML = val;
}

//get modal element
var modal = document.getElementById('simpleModal');

//get modal button
var modalBtn = document.getElementById('modalLink');

//get close button
var closeBtn = document.getElementsByClassName('closeBtn')[0];

//listen for open click
modalBtn.addEventListener('click', openModal);

//listen for close click
closeBtn.addEventListener('click', closeModal);

//listen for outside click
window.addEventListener('click', outsideClick);

//function to open modal
function openModal(){
		modal.style.display = 'block';
}

//function to close modal
function closeModal(){
		modal.style.display = 'none';
}

//function to close modal if outside click
function outsideClick(e){
	if(e.target == modal){
		modal.style.display = 'none';
	}
}

//get course name from user input
function setCourseName() {
	//document.getElementById("courseIDInput").value = document.getElementById("courseNameInput").value;
	var courseName = document.getElementById('courseNameInput').value;
	var cardDiv = document.getElementById("myDIV");
    cardDiv.style.display = "block";
	document.getElementById('myLabel').innerHTML = courseName;
	modal.style.display = 'none';
	
    //document.getElementById("course1").innerHTML = courseName;
}

//delete card function
function deleteCard(){
	var cardDiv = document.getElementById("myDIV");
	cardDiv.style.display = "none";
}
