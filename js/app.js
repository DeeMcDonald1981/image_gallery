let navBtn = document.querySelector('.navbtn');
let mobileNav = document.querySelector('.navright');
let fixedNav = document.querySelector('#header');

navBtn.addEventListener('click', function(){
  mobileNav.classList.toggle('shownav');
})

