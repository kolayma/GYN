let modal = document.getElementById('myModal')
let openModalBtn = document.getElementById('openModal')
let closeModalBtn = document.getElementsByClassName('close')[0]

openModalBtn.onclick = function () {
  modal.style.display = 'block'
}

closeModalBtn.onclick = function () {
  modal.style.display = 'none'
}

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = 'none'
  }
}
