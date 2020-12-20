"use strict";

var userBtn = document.querySelector('.user-btn');
var userBox = document.querySelector('.user-box');
userBtn.addEventListener('click', function () {
  userBox.classList.toggle('block');
});