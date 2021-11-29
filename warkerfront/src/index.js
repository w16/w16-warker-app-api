import { render } from "react-dom";
import {
  BrowserRouter,
  Routes,
  Route
} from "react-router-dom";
import App from "./App";
import RegisterCidade from "./components/RegisterCidade";
import ListCidade from "./components/ListCidade";
import axios from "axios";

const rootElement = document.getElementById("root");
render(
  <BrowserRouter>
    <Routes>
      <Route path="/" element={<App />} />
      <Route path="/cidade/add" element={<RegisterCidade />} />
      <Route path="/cidade" element={<ListCidade />} />
    </Routes>
  </BrowserRouter>,
  rootElement
);