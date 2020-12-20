const userBtn = document.querySelector('.user-btn')
const userBox = document.querySelector('.user-box')

userBtn.addEventListener('click', function() {
   userBox.classList.toggle('block')
})

