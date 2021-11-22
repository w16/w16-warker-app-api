import {React, useState,useEffect} from 'react';
import Axios from "axios";


const  ListCidade = () =>{
    const [listCard, setListCard] = useState([]);
    console.log(listCard);

   // listar dados
    useEffect(() => {
        Axios.get("http://127.0.0.1:8000/api/cidade/").then((response) => {
        setListCard(response.data);
        });
    }, []);

    return(
        
       <div>
           <table className="table">
               <thead>
                   <tr>
                        <th>#</th>

                       <th>Nome</th>
                       <th>Latitude</th>
                       <th>Longitude</th>
                       <th>Ações</th>
                   </tr>
               </thead>
               <tbody>
                {listCard.map((val) => (                    
                    <tr>
                        <td>{val.id}</td>
                        <td>{val.nome}</td>
                        <td>{val.latitude}</td>
                        <td>{val.longitude}</td>

                    </tr>
                   
                ))}
               </tbody>
            </table>
           
       </div>
    );    
}
export default ListCidade;

