'use strict';

// variables for navbar menu toggle
const header = document.querySelector('header');
const nav = document.querySelector('nav');
const navbarMenuBtn = document.querySelector('.navbar-menu-btn');

// variables for navbar search toggle
const navbarForm = document.querySelector('.navbar-form');
const navbarFormCloseBtn = document.querySelector('.navbar-form-close');
const navbarSearchBtn = document.querySelector('.navbar-search-btn');


// navbar menu toggle function
function navIsActive() {
  header.classList.toggle('active');
  nav.classList.toggle('active');
  navbarMenuBtn.classList.toggle('active');
}

navbarMenuBtn.addEventListener('click', navIsActive);



// navbar search toggle function
const searchBarIsActive = () => navbarForm.classList.toggle('active');

navbarSearchBtn.addEventListener('click', searchBarIsActive);
navbarFormCloseBtn.addEventListener('click', searchBarIsActive);

// // skip a_d_s
// const video = document.querySelector('.iframe-video');
// const a_d_s = document.querySelector('.a_d_s-card');
// setTimeout(() => {document.querySelector('.skip').innerHTML = '10';}, 0);
// setTimeout(() => {document.querySelector('.skip').innerHTML = '9';}, 1000);
// setTimeout(() => {document.querySelector('.skip').innerHTML = '8';}, 2000);
// setTimeout(() => {document.querySelector('.skip').innerHTML = '7';}, 3000);
// setTimeout(() => {document.querySelector('.skip').innerHTML = '6';}, 4000);
// setTimeout(() => {document.querySelector('.skip').innerHTML = '5';}, 5000);
// setTimeout(() => {document.querySelector('.skip').innerHTML = '4';}, 6000);
// setTimeout(() => {document.querySelector('.skip').innerHTML = '3';}, 7000);
// setTimeout(() => {document.querySelector('.skip').innerHTML = '2';}, 8000);
// setTimeout(() => {document.querySelector('.skip').innerHTML = '1';}, 9000);
// setTimeout(() => {
//   document.querySelector('.skip').disabled = false;
//   document.querySelector('.skip').innerHTML = 'Regarder le film';
// }, 10000);

// function SkipA_D_S() {
//   a_d_s.style.display = "none";
//   video.style.display = "block";
// }

