const search = document.querySelector('.search');
const btn = document.querySelector('.btn');
const input = document.querySelector('.input');
const inscription = document.querySelector('.sinscrire');
const connexion = document.querySelector('.seconnecter');
const formulaire1 = document.querySelector('.formfield');
const formulaire2 = document.querySelector('.formfield1');


//barre de recherche
//Lors du clique, la classe passe en mode actif
btn.addEventListener('click', () => {
    search.classList.toggle('active');
    input.focus();
});
//menu burger
let navSlide = () => {
    let burger = document.querySelector('#burger');
    let navMenu = document.querySelector('#nav-menu');
    let navlinks = document.querySelectorAll('#nav-menu li');

    burger.addEventListener('click', () => {
        navMenu.classList.toggle('active');

        navlinks.forEach((link, index) => {

            if (link.style.animation) {
                link.style.animation = '';
            } else {
                link.style.animation = `navLinksFade 0.5s ease forwards ${index / 5 + 0.5}s`;
            }

        });

        burger.classList.toggle('active');

    });
}
navSlide();
/*To do :
=>Recherches filtrées
=>la pagination
=>Affichage de 50 membres/page
*/