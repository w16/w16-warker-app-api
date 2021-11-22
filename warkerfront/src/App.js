import './App.css';
import ListCidade from './components/ListCidade';
import RegisterCidade from './components/RegisterCidade'; 
function App() {
  return (
    <div>
        <div className="card">
      <div className="card-header">Cidades</div>
      <div className="card-body">        
      <ListCidade></ListCidade>

      <RegisterCidade></RegisterCidade>
    </div>
    </div>
    </div>
  );
}

export default App;
