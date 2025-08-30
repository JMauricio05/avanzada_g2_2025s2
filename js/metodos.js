function multiplicar(num1, num2) {
    return num1 * num2;
}
console.log(multiplicar(2, 3));

function suma(num1, num2) {
    console.log(num1 + num2);
}
suma(2, 5);

const sumar = function (num1, num2) {
    return num1 + num2;
}
console.log(sumar(2, 8));

const dividir = (num1, num2) => {
    return num1 / num2;
};
console.log(dividir(4, 2));

const dividirDos = (num1, num2) => num1 / num2;
console.log(dividirDos(8, 2));

const sumarDos = (num1, num2 = 10) => {
    return num1 + num2;
}
console.log(sumarDos(2));
console.log(sumarDos(2, 8));

console.log('ok', 1, true, [], {}, 'pl', 23);

const sumarTres = (...args) => {
    let resl = 0;
    for (let num of args) {
        resl += num;
    }
    return resl;
};

console.log(sumarTres());
console.log(sumarTres(2));
console.log(sumarTres(2, 3));
console.log(sumarTres(4, 5, 6));
console.log(sumarTres(4, 5, 6, 7));
console.log(sumarTres(4, 5, 'a', true));

const operaciones = (ejecutar) => {
    return ejecutar();
}

console.log(operaciones(() => 2 + 8));
console.log(operaciones(() => {
    return 5 + 6;
}));
console.log(operaciones(function () {
    return 9 / 3;
}));
console.log(operaciones(() => sumarTres(5, 9, 7)));

class Persona {
    constructor(nombre, edad) {
        this.nombre = nombre;
        this.edad = edad;
    }

    toString() {
        return `${this.nombre} ${this.edad}`;
    }
}

const persona = new Persona('Juan', 27);
console.log(persona.toString());