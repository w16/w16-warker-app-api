import axios from 'axios';
import React, {Component} from 'react';

export default class Home extends Component{
    
    componentDidMount(){
        const config ={ 
            headers:{
                Authorization:'Bearer '+localStorage.getItem('token')
            }
        };

        axios.get('http://127.0.0.1:8000/user', config).then(
            res =>{
                console.log(res);
            },
            err=>{
                console.log(err);
            }
        )
    }
    render(){
        return(
           <div>Logado</div>

        )
    }
}