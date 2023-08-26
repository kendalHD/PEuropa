let carrusel = [
    'carrusel1.jpeg',
    'carrusel2.jpg',
    'carrusel3.jpeg',
    'carrusel5.jpg'
];
let contadorImagen = 0;
function fSiguienteImagen(){
    contadorImagen += 1;
    document.getElementById('carrusel').style.backgroundImage = carrusel[contadorImagen];
}
function fAnteriorImagen(){
    contadorImagen -= 1;
    document.getElementById('carrusel').style.backgroundImage = carrusel[contadorImagen];
}


