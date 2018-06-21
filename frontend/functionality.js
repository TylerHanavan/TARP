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

//delete card function
function deleteCard(){
	var cardDiv = document.getElementById("myDIV");
	cardDiv.style.display = "none";
}
