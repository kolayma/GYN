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

/* Получаем элементы модального окна и кнопки*/
// let modal = document.getElementById('myModal');
// let openModalBtn = document.getElementById('openModal');
// let closeModalBtn = document.getElementsByClassName('close')[0];

// // Функция для открытия модального окна
// function openModal() {
//   modal.classList.add('show');
// }

// // Функция для закрытия модального окна
// function closeModal() {
//   modal.classList.remove('show');
// }

// // Открываем модальное окно при клике на кнопку "Записаться"
// openModalBtn.addEventListener('click', openModal);

// // Закрываем модальное окно при клике на кнопку "Закрыть"
// closeModalBtn.addEventListener('click', closeModal);

// // Закрываем модальное окно при клике вне его области
// window.addEventListener('click', function(event) {
//   if (event.target === modal) {
//     closeModal();
//   }
// });