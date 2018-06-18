/**These functions/variables are for the Instructors page**/
//get modal element
var editModal = document.getElementById('simpleModal');
var feedbackModal = document.getElementById('viewFeedbackModal');

//get modal button (what prompts the modal to pop up)
var modalBtn = document.getElementById('modalLink');
var feedbackBtn = document.getElementById('viewButton');

//get close button (button that closes modal)
var closeBtn = document.getElementsByClassName('closeBtn')[0];
var feedbackBtnClose = document.getElementsByClassName('closeBtn')[0];

//listen for open click
modalBtn.addEventListener('click', openModal);
feedbackBtn.addEventListener('click', openModal2);

//listen for close click
closeBtn.addEventListener('click', closeModal);
feedbackBtnClose.addEventListener('click', closeModal2);

//listen for outside click
window.addEventListener('click', outsideClick);

//function to open modal
function openModal(){
		editModal.style.display = 'block';
}
function openModal2(){
		feedbackModal.style.display = 'block';
}

//function to close modal
function closeModal(){
		editModal.style.display = 'none';
}
function closeModal2(){
		feedbackModal.style.display = 'none';
}

//function to close modal if outside click
function outsideClick(e){
	if(e.target == editModal){
		editModal.style.display = 'none';
	}
	if(e.target == feedbackModal){
		feedbackModal.style.display = 'none';
	}
}

//get course name from user input in editModal and set it as card header
function setCourseName() {
	//document.getElementById("courseIDInput").value = document.getElementById("courseNameInput").value;
	var courseName = document.getElementById('courseNameInput').value;
	var cardDiv = document.getElementById("myDIV");
    cardDiv.style.display = "block";
	document.getElementById('myLabel').innerHTML = courseName;
	editModal.style.display = 'none';
}

//get TA names from user input in editModal and set them in feedbackModal
function setTAList(){
	if(document.getElementById("taList").getElementsByTagName("li").length == 0){
		var names = document.getElementById("courseTAInput").value.split(",");
		var ul = document.getElementById("taList");

		var i;
		for(i=0; i<names.length; i++){
			var li = document.createElement("li");
			var a = document.createElement("a");
			a.textContent=names[i];
			a.setAttribute('href', "http://www.google.com");
			li.appendChild(a);
			ul.appendChild(li);
		}
	}
}

//delete card function
function deleteCard(){
	var cardDiv = document.getElementById("myDIV");
	cardDiv.style.display = "none";
}