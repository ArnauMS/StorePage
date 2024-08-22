/* fixer que ens serveix per mostrar la barra de les categories a la hora de fer click al botó */

const boto = document.querySelector('.boto');
const barra = document.querySelector('#barra');

boto.addEventListener('click', () => {
    barra.classList.toggle('active');
})
