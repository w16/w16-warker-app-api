import axios from 'axios';
import React, {Component} from 'react';

export default class Home extends Component{
    
    componentDidMount(){
      

        axios.get('http://127.0.0.1:8000/user', config).then(
            res =>{
                this.setState({
                    user: res.data
                });
            },
            err=>{
                console.log(err);
            }
        )
    }
    render(){
        if(this.state.user){
            return(
                <h2>Ola senhor {this.state.user.name}</h2>
            )
        }
        return(
           <div>Logado</div>

        )
    }
}