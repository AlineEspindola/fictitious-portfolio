const nav=document.getElementsByTagName("a");
const modalProjetos=document.querySelector('.modalProjetos');
const modalJornada=document.querySelector('.modalJornada')
const body=document.querySelector("body");
const fechar=document.querySelector('.fechar')
aux=true;

for(let i=1; i<nav.length; i++){

    // Abrir modals
    nav[1].addEventListener("click", function(){
        modalJornada.style.display="block"
        body.classList.add("corpo")
        aux=false
    })
    nav[2].addEventListener("click", function(){
        modalProjetos.style.display="block"
        body.classList.add("corpo")
        aux=false
    })

    // Sublinhar o Nav
    nav[i].addEventListener("mouseover", function(){
        nav[i].style.borderBottom="1px solid black"
    })
    nav[i].addEventListener("mouseout", function(){
        if(aux){
            nav[i].style.borderBottom="none"
        }
    })

    // Fechar Nav
    fechar.addEventListener("click",function(){
        modalJornada.style.display="none"
        body.classList.remove("corpo")
        nav[i].style.borderBottom="none"
        aux=true
    })
}


const p1=document.querySelector(".p1");
const p2=document.querySelector(".p2");
const texto1="Sou uma designer de interfaces de usuário (UI) com uma paixão profunda por criar experiências digitais envolventes e esteticamente agradáveis. Minha jornada no mundo do design começou quando cursei um curso técnico de informática no IFSC, onde fui introduzida ao vasto e fascinante universo da computação. Durante esse período, minha curiosidade pelo design de interfaces foi despertada.";
const texto2="Essa paixão me levou a buscar conhecimento e aprimoramento, e então decidi cursar Ciência da Computação na renomada Universidade Federal de Santa Catarina (UFSC). Durante minha graduação, mergulhei fundo nos aspectos teóricos e práticos da computação, o que me proporcionou uma compreensão sólida dos fundamentos tecnológicos.";
const intervaloJornada=40; 

nav[1].addEventListener("click", function(){
    p1.innerHTML="";
    p2.innerHTML="";
    fechar.style.display="none";
    animacaoTexto1(p1, texto1, intervaloJornada);
})

function animacaoTexto1(p1, texto1, intervaloJornada){
    const letra1=texto1.split("").reverse(); //o split pega cada letra do texto e faz um array, o reverse serve para corrigir o pop posteriormente
    const digitador1=setInterval(()=>{

    if(!letra1.length){ // verificar se a array letra1 está vazia
        clearInterval(digitador1); //termina a função
        animacaoTexto2(p2, texto2, intervaloJornada);
        return;
    }

    const proximo1=letra1.pop(); // pop remove o último elemento de um array e retorna aquele valor
    p1.innerHTML+=proximo1;

}, intervaloJornada)

}

function animacaoTexto2(p2, texto2, intervaloJornada){
    const letra2=texto2.split("").reverse();
    const digitador2=setInterval(()=>{

    if(!letra2.length){
        clearInterval(digitador2);
        fechar.style.display="inline";
        return;
    }

    const proximo2=letra2.pop();
    p2.innerHTML+=proximo2;

}, intervaloJornada)

}

let intervaloProjetos2=5000;
let intervaloProjetos3=5500;
let min=1;
let max=30;
const textoProjetos=document.querySelector(".textoProjetos");
const h3=document.querySelector(".titulo");

nav[2].addEventListener("click", function(){
    let intervaloProjetos1=10;
    h3.innerHTML="Selecionando Projeto...";
    for(var i=min; i<=max; i++){
        setTimeout(function(){
            let sorteio= Math.random()*5;
            sorteio=Math.ceil(sorteio);

            textoProjetos.innerHTML=sorteio;

        }, i*(intervaloProjetos1+=5))
    }

    setTimeout(function(){
        h3.innerHTML="Projeto Selecionado!";
    }, intervaloProjetos2)

    setTimeout(function(){
        if(textoProjetos.innerHTML==1){
            window.open('http://aline.aluno.vip/fashion_finds/', '_blank');
        }else if(textoProjetos.innerHTML==2){
            window.open('projetos/Futebola');
        }else if(textoProjetos.innerHTML==3){
            window.open('projetos/trabalhodeartes');
        }else if(textoProjetos.innerHTML==4){
            window.open('projetos/parisatabriz') 
        }else if(textoProjetos.innerHTML==5){
            window.open('projetos/cadastropetshop/petshop.html') 
        }
        modalProjetos.style.display="none"
        body.classList.remove("corpo")
        nav[2].style.borderBottom="none"
        aux=true
    }, intervaloProjetos3)
})