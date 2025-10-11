const form = document.forms['borrarUsuarioForm'];
const modal = document.getElementById('borrarModal');

const borrar = (id) => {
    form['id'].value = id;
    modal.classList.add('show');
};

form.addEventListener('reset',()=>{
    form['id'].value = '';
    modal.classList.remove('show');
});