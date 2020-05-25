// Récupération des boutons
const btn = document.querySelector('.response');
const mini = document.querySelector('#mini');
const maxi = document.querySelector('#maxi');
const btnControl = document.querySelector('#control');

//Récupération des title-bar
const titleBar = document.querySelector('.title-bar');
const maxiTitleBar = document.querySelectorAll('.title-bar')[1];

//Récupération du main
const main = document.getElementById('main')

//Découvre la réponse ou non
const answer = () => {
    btn.classList.toggle('non-active');
    btn.classList.toggle('active');
}

//Question suivante, AJAX non supporté par l'API distante
const next = () => {
    location.reload(false);
}

//Minimise ou remet la fenetre maxi
const change = () => {
    maxi.classList.toggle('non-active')
    maxi.classList.toggle('active')
    mini.classList.toggle('non-active')
    mini.classList.toggle('active')
    titleBar.classList.add('inactive')

}

//Passe la fentre maxi en full screen ou non
const maximise = ()=>{
    maxi.classList.toggle('content')
    maxi.classList.toggle('full-screen')
    const h1 = document.getElementsByTagName('h1')[0]
    const h2 = document.getElementsByTagName('h2')[0]
    h1.classList.toggle('non-active')
    h2.classList.toggle('non-active')
    //Gestion de l'icone de la fenetre
    if (maxi.classList[2] == "full-screen"  ) {
        btnControl.setAttribute('aria-label', "Restore")
    } else if (maxi.classList[2] == "content") {
        btnControl.setAttribute('aria-label', "Maximize")
    }  
}

//Fermeture de la fenetre maxi
const toClose = () => {
    maxi.classList.toggle('active')
    maxi.classList.toggle('non-active')
}


//Event de gestion de clique hors fenetre active et fenetre inactive
main.addEventListener('click', (el) => {
    if (el.target.id == "main" ) {
        let timer = 0;
        let maxiOpen = setInterval(toFlash, 100);
            function toFlash() {
                if (timer == 6) {
                    clearInterval(maxiOpen)
                } else {
                    maxiTitleBar.classList.toggle('inactive')
                    timer++;
                }
            }        
    }
    
    const maxiClass = maxi.classList;
    maxiClass.forEach(element => {
        if (element == "active" || element == "full-screen" || element == "content") {
            titleBar.classList.add('inactive')
        } else if (element == "non-active") {
            titleBar.classList.remove('inactive')
        }
    });    
})

//Initialisation des coordonnées pour le déplacement de la fenetre maxi
let x = 0;
let y = 0;
iteration = 0


//Fonction bougeant la fenetre
function toMove(e) {
    maxi.classList.add('moving');
    main.onmousemove = function(evt){
        console.log(evt);
        console.log("i = " + iteration);
        
        if (iteration == 0) {
            x = evt.clientX
            y = evt.clientY
            console.log("x : " + x);
            console.log("y : " + y);
            
        } else {
            coordX = evt.clientX - x
            coordY = evt.clientY - y
            console.log("x : " + coordX);
            console.log("y : " + coordY);

            maxi.style.left = coordX + "px";
            maxi.style.top = coordY + "px";
        }
        iteration++;
    }
}

//Suspension du déplacement de la fenetre maxi
function toUnMove() {    
    main.onmousemove = null;  
}

