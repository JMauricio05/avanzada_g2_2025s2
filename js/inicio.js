console.log('Hola desde js');
console.error("ok 2");
console.log(`ok 3`);
/**
 * Bloque
 */
// linea
/**
 * Variables: var let const
 */


let nombre = "Pepe";
let apellido = 'Perez';

const nombreCompleto = `${nombre} ${apellido}`;
//nombreCompleto = nombre + ' '+apellido;
alert(nombreCompleto);

let edad = 25;
let salario = 12.5;
let mayorEdad = true;// false
let a = null;
let b = undefined;
console.log(apellido);
let numeros = [];
numeros = new Array(12);
numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
let otro = ['asdf', 12, 12.5, true, [1, 2, 3], null];
const persona = {
    nombre: 'Ana',
    apellido: 'Gomez',
    edad: 30,
    mayorEdad: true,
    jobs: []
};
console.log(numeros[1]);
console.log(persona.nombre, persona.apellido);
persona.nombre = 'Ana Maria';
console.log(persona.nombre, persona.apellido);

console.log('Ciclos---------------------');
console.log('For---------------------');
for (let index = 0; index < numeros.length; index++) {
    const mod = numeros[index] % 2;
    if (mod == 0) {
        console.log(numeros[index], 'par');
    } else {
        console.log(numeros[index], 'impar');
    }
}
console.log('For in---------------------');
for (let index in numeros) {
    const mod = numeros[index] % 2;
    if (mod == 0) {
        console.log(numeros[index], 'par');
    } else {
        console.log(numeros[index], 'impar');
    }
}
console.log('For of---------------------');
for (let numero of numeros){
    const mod = numero % 2;
    if (mod == 0) {
        console.log(numero, 'par');
    } else {
        console.log(numero, 'impar');
    }
}

