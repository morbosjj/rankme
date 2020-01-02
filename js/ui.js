window.onload = function() {
  const dropdown = document.getElementById('dropdown');
  const dropdownContent = document.querySelector('.dropdown-content');

  dropdown.addEventListener('click', () => {
    toggle(dropdownContent);
  });

  function toggle(){
    dropdownContent.classList.toggle('is-visible');
  }
};