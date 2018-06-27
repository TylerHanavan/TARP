/**These functions/variables are for the Instructors page**/
//get modal element
var editModal = document.getElementById('addCourseModal');

//get modal button (what prompts the modal to pop up)
var modalBtn = document.getElementById('modalLink');

//get close button (button that closes modal)
var closeBtn = document.getElementsByClassName('closeBtn')[0];

//listen for open click
modalBtn.addEventListener('click', openModal);

//listen for close click
closeBtn.addEventListener('click', closeModal);

//listen for outside click
window.addEventListener('click', outsideClick);

//function to open modal
function openModal(){
		editModal.style.display = 'block';
}

//function to close modal
function closeModal(){
		editModal.style.display = 'none';
}

//function to close modal if outside click
function outsideClick(e){
	if(e.target == editModal){
		editModal.style.display = 'none';
	}
}
