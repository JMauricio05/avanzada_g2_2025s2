const loginForm = document.forms['loginForm'];
const usersTb = document.getElementById('usersTb');

const login = (username, password) => {
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

const login2 = async (username, password) => {
    try {
        const response = await fetch('http://127.0.0.1:8000/login', {
            method: 'post',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                user: username,
                pwd: password
            })
        });
        if (response.status >= 400) {
            throw new Error("Error");
        }
        const data = await response.json();
        alert(`El usuario ${data.userName} acaba de inicar sesión`);
        queryAllUser();
    } catch (ex) {
        console.error('Error en la conexión');
    }
}

const queryAllUser = async()=>{
    try {
        const response = await fetch('http://127.0.0.1:8000/users/');
        if (response.status >= 400) {
            throw new Error("Error");
        } else if(response.status==201){
            alert('No hay datos del usuario');
            return;
        }
        const data = await response.json();
        const tbody = usersTb.getElementsByTagName('tbody')[0];
        tbody.innerHTML = '';
        data.forEach(item => {
            const tr = document.createElement('tr');
            const idTd = document.createElement('td');
            const usernameTd = document.createElement('td');
            idTd.textContent = item.id;
            usernameTd.textContent = item.userName;
            tr.appendChild(idTd);
            tr.appendChild(usernameTd);
            tbody.appendChild(tr);
        });
    } catch (error) {
        console.error('Error en la consulta', error);
    }
}


loginForm.addEventListener('submit', (ev) => {
    ev.preventDefault();
    const user = loginForm['username'].value;
    const pwd = loginForm['password'].value;
    login2(user, pwd);
});