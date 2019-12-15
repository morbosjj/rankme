// we grab a modal by ID
let myModal = document.getElementById('signin-modal');

// we grab some button by ID, we will use it later
let btnModal = document.getElementById('anchorID');
// this button IS NOT a triggering element, as it has no reference to the above modal



// initialize Modal for this triggering element
let modalInitJS = new Modal(myModal, {
  backdrop: 'static'
});

// OR initialize with no options provided
// the options object is optional

// when we click btnModal, open the modal
btnModal.addEventListener('click', (e) => {
  modalInitJS.show();
}, false)

// BONUS
// since there is no triggering element, you might need
// access to the initialization object from another application
let findModalInitJS = myModal.Modal;