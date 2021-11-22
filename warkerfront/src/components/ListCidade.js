import {React, useState,useEffect} from 'react';
import Cidade from "./Cidade";

import Axios from "axios";


const  ListCidade = () =>{
    const [listCard, setListCard] = useState([]);
    
   // listar dados
    useEffect(() => {
        Axios.get("http://127.0.0.1:8000/api/cidade/").then((response) => {
        setListCard(response.data.data);
        });
    }, []);
    return(
        
       <div>
           <table className="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th>#</th>

                        <th>Nome</th>
                        <th>latitude</th>
                        <th>longitude</th>

                    </tr>
                </thead>
                <tbody>
                {listCard.map((val) => (
        <Cidade
          listCard={listCard}
          setListCard={setListCard}
          key={val.id}
          id={val.id}
          nome={val.nome}
          latitude={val.latitude}
          longitude={val.longitude}
        />
        ))}
                </tbody>
           </table>
              
               
           
       </div>
    );    
}
export default ListCidade;

