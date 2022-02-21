import React, {useState, useReducer, useEffect} from 'react';

export default function Register () {

    const initialState = {name: '', email: '', password: ''};

    const [name, setName] = useState('');
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    async function sendRegisterData (name, email, password) {
        const requestUrl = `http://127.0.0.1:8000/api/cidades`;

        const response = await fetch(requestUrl);

        if (response.status === 200) {
            const result = await response.json();

            console.log(result);
        }

        return false;
    }

    const validateForm = () => {
        if (name === '' || name.length < 4) {
            return {
                error: true, 
                message: 'Atenção, erro no nome.'
            };
        }

        if (email === '' || email.length < 5 || email.indexOf('@') === -1 || email.indexOf('.') === -1 ) {
            return {
                error: true, 
                message: 'Atenção, erro no e-mail.'
            };
        }

        if (password === '' || password.length < 5) {
            return {
                error: true, 
                message: 'Atenção, erro na senha.'
            };
        }

        sendRegisterData(name, email, password);
    }


    useEffect(
        () => {
            console.log(validateForm());
        }, 
        [name, email, password]
    );

    return (
        <div className='d-flex flex-column align-items-center'>
            <h1 className='logo'>Warker</h1>
            <h2 className='mt-4 text-center fw-bold'>
                Crie sua conta!
            </h2>
            <div className='d-flex flex-column align-items-center'>
                <input type='text' placeholder='Seu Nome' name='name' 
                    onChange={ e => setName(e.target.value) }
                />
                <input type='email' placeholder='Seu E-mail' name='email' 
                    onChange={ e => setEmail(e.target.value) }/>
                <input type='password' placeholder='Sua Senha' name='password' 
                    onChange={ (e) => setPassword(e.target.value) }/>
                <button className='register-button' onClick={() => validateForm()}>
                    Cadastrar
                </button>
            </div>
        </div>
    );
}