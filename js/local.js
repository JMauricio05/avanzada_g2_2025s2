// Variables----------------
const form = document.forms['multplicarForm'];
const result = document.getElementById('resultado');
const verLogs = document.getElementById('verLogs');

localStorage.setItem('nameApp', 'Ejemplo de almacenamiento');
console.log(localStorage.getItem('nameApp'));
sessionStorage.setItem('sesion1', 'Prueba');
console.log(localStorage.key(0));
console.log(JSON.parse('{"nombre": "Pepe"}'));

//Metodos--------------
const multiplicar = (factorA, factorB) => {
    return factorA * factorB;
};

const showResult = (num) => {
    result.textContent = `El resultado es ${num}`;
};

const saveLog = (datos) => {
    const log = {
        fecha: new Date(),
        operacion: datos,
    };
    const num = localStorage.length;
    const key = `operacion_${num}`;
    localStorage.setItem(key, JSON.stringify(log));
};

//Eventos--------------
form.addEventListener('submit', (ev) => {
    ev.preventDefault();
    const factorA = form['factor1'].value;
    const factorB = form['factor2'].value;
    const res = multiplicar(Number(factorA), Number(factorB));
    showResult(res);
    const datos = {
        factorA, factorB, resultado: res
    };

    saveLog(datos);
    form.reset();

});

verLogs.addEventListener('click', () => {
    
});
