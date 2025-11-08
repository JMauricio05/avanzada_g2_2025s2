const loginForm = document.forms['loginForm'];

const login = async (username, password) => {
    fetch('http://127.0.0.1:8000/login', {
        method: 'post',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            user: username,
            pwd: password
        })
    }).then((response) => {
        if (response.status >= 400) {
            throw new Error("Error");
        }
        return response.json();
    }).then(data => {
        alert(`El usuario ${data.userName} acaba de inicar sesión`);
    }).catch(() => {
        console.error('Error en la conexión');
    });
}

loginForm.addEventListener('submit',(ev)=>{
    ev.preventDefault();
    const user = loginForm['username'].value;
    const pwd = loginForm['password'].value;
    login(user, pwd);
});