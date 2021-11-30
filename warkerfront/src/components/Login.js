import axios from 'axios';
import React, {Component} from 'react';

export default class Login extends Component{
    handleSubmit = e =>{
        e.preventDefault();
        const data = {
            email: this.email,
            apassword: this.password
        }
        console.log(data);
        axios.post('http://127.0.0.1:8000/login', data).then(
            res => {
                 localStorage.setItem('token', res.data.token);

            }
        ).catch(
            err=> {
                console.log(err);
            }
        )
    }

    render(){
        return(
           <form onSubmit={this.handleSubmit}>
               <h3>Login</h3>
               <div className="form-group">
                    <input type="email" className="form-control" placeholder="Email" onChange={e=> this.email = e.target.value} />          
               </div>
               <div className="form-group">
                    <input type="password" className="form-control" placeholder="Senha" onChange={e=> this.password = e.target.value} />          
               </div>
               <button className="btn btn-primary btn-block">Login</button>
           </form>

        )
    }
}