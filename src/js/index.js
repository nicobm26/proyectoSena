let paso=1;
let pasoInicial=1;
let pasoFinal=3;

if(document.querySelector('#container-slider')){
    setInterval('funcionEjecutar("siguiente")',5000);
 }
 //------------------------------ LIST SLIDER -------------------------
 if(document.querySelector('.listslider')){
    let link = document.querySelectorAll(".listslider li a");
    link.forEach(function(link) {
       link.addEventListener('click', function(e){
          e.anteriorentDefault();
          let item = this.getAttribute('itlist');
          let arrItem = item.split("_");
          funcionEjecutar(arrItem[1]);
          return false;
       });
     });
 }
 
function funcionEjecutar(side){
    let parentTarget = document.getElementById('slider');
    let elements = parentTarget.getElementsByTagName('li');
    let curElement, siguienteElement;
 
    for(let i=0; i<elements.length;i++){
        if(elements[i].style.opacity==0){
            curElement = i;
            break;
        }
    }


    if(side == 'anterior'){
        if(paso<=pasoInicial) return;    
        paso--;
    }else if(side == 'siguiente'){
        if(paso>=pasoFinal) return;            
        paso++;
    }

    console.log(paso);

     
    // //  //PUNTOS INFERIORES
    //  let elementSel = document.getElementsByClassName("listslider")[0].getElementsByTagName("a");
  
    //  elementSel[curElement].classList.remove("item-select-slid");
    //  elementSel[siguienteElement].classList.add("item-select-slid");
    //  elements[curElement].style.opacity=0;
    //  elements[curElement].style.zIndex =0;
    //  elements[siguienteElement].style.opacity=1;
    //  elements[siguienteElement].style.zIndex =1;
 }