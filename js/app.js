const menu = document.querySelector('.hamburgesa');
const navegacion = document.querySelector('.navegacion');
const imagenes = document.querySelector('img');
document.addEventListener('DOMcontentloaded',()=>{
  eventos();
  articulos();
});

const eventos = () =>{
  menu.addEventListener('click',abrirmenu);
}

const abrirmenu = () =>{
  navegacion.classlist.remove('ocultar');
  botoncerrar();
}

const botoncerrar = () =>{
  const btncerrar = document.createElement('p');
  const overlay = document.createElement('div');
  overlay.classList.add('pantalla-completa');
  const body = document.querySelector('body');
  if(document.querySelectorAll('.pantalla-completa').length > 0) return;
  body.appendChild(overlay);
  btncerrar.textContent='x';
  btncerrar.classList.add('btn.cerrar');


  navegacion.appendChild(btncerrar);
  cerrarmenu(btncerrar,overlay);
}

const observer = new IntersectionObserver((entries, observer)=>{
  entries.forEach(entry=>{
    if(entry.isIntersecting){
      const imagen = entry.target;
      observer.unobserve(imagen);
    }
  });
});
  
imagenes.forEach(imagen=>{
  imagen.src = imagen.dataset.src;
  observer.observe(imagen);
})


const cerrarmenu = (boton,overlay) =>{
  boton.addEventlistener('click',()=>{
    navegacion.classlist.add('ocultar');
    overlay.remove();
  });

  overlay.onclick = function(){
    overlay.remove();
    navegacion.classList.add('ocultar');
    boton.remove();
  }
}
