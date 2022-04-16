
function vDocencia() {
    vdate1 = document.getElementById("docencia").value;
     if(vdate1<0 || vdate1>10){
       document.getElementById("ms-docencia").innerHTML = ("Número válido del 0 al 10.");
     }else {
       document.getElementById("ms-docencia").innerHTML = (" ");
     };
}

function vExperiment() {
    vdate2 = document.getElementById("experimento_aplicacion").value;
     if(vdate2<0 || vdate2>10){
       document.getElementById("ms-experimento").innerHTML = ("Número válido del 0 al 10.");
     }else {
       document.getElementById("ms-experimento").innerHTML = (" ");
     };
}

function vTrabajo() {
    vdate3 = document.getElementById("trabajo_autonomo").value;
     if(vdate3<0 || vdate3>10){
       document.getElementById("ms-trabajo").innerHTML = ("Número válido del 0 al 10.");
     }else {
       document.getElementById("ms-trabajo").innerHTML = (" ");
     };
}

function vExamen() {
    vdate4 = document.getElementById("examen_principal").value;
     if(vdate4<0 || vdate4>10){
       document.getElementById("ms-examen").innerHTML = ("Número válido del 0 al 10.");
     }else {
       document.getElementById("ms-examen").innerHTML = (" ");
     };
}

function vPorcentaje() {
    vdate5 = document.getElementById("porcentaje_asistencia").value;
     if(vdate5<0 || vdate5>100){
       document.getElementById("ms-porcentaje").innerHTML = ("Número válido del 0 al 100.");
     }else {
       document.getElementById("ms-porcentaje").innerHTML = (" ");
     };
}
