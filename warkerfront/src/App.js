import { Link } from "react-router-dom";

import './App.css';
import ListCidade from './components/ListCidade';
import RegisterCidade from './components/RegisterCidade'; 
import Login from './components/Login';

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

      <Login></Login>

    </div>
  );
}

export default App;
