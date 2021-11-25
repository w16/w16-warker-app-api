import { Link } from "react-router-dom";

import './App.css';
import ListCidade from './components/ListCidade';
import RegisterCidade from './components/RegisterCidade'; 

function App() {
  return (
    <div>
      <nav
        style={{
          borderBottom: "solid 1px",
          paddingBottom: "1rem"
        }}
      >
        <Link to="/cidade">Listar</Link> |{" "}
        <Link to="/cidade/add">Cadastrar</Link>
      </nav>

      <ListCidade></ListCidade>

      <RegisterCidade></RegisterCidade>

   
    </div>
  );
}

export default App;
