import {React, useState} from 'react';
import Axios from "axios";


const  RegisterCidade = () =>{
    const [values, setValues] = useState({});
    const handleaddValues = (value) => {
        setValues((prevValues) => ({
        ...prevValues,
        [value.target.name]: value.target.value,
        }));
    };
    const handleCadastrar= () => {
        Axios.post("http://127.0.0.1:8000/api/cidade/store", {
            nome: values.nome,
            latitude:values.latitude,
            longitude:values.longitude
        }).then((response)=>{
            alert(response);

        });
    };

    return(
        <div>
        <div className="form-group">
            <input type="text" className="form-control" name="nome" placeholder="Nome" required onChange={handleaddValues}  />
        </div>
        <div className="form-group">
            <input type="number" className="form-control" name="latitude" placeholder="Latitude" required  onChange={handleaddValues} />
        </div>
        <div className="form-group">
            <input type="number" className="form-control" name="longitude" placeholder="Longitude"  required  onChange={handleaddValues}/>
        </div>
        <button type="submit"  onClick={handleCadastrar}  className="btn btn-default">Cadastrar</button>
        </div>
  );    
}
export default RegisterCidade;

