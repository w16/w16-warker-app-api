import React from "react";
import FormDialog from "./dialog/dialogForm";
import "./Cidade.css";

export default function Cidade(props) {
  const [open, setOpen] = React.useState(false);

  return (
    <>
      <FormDialog
        open={open}
        setOpen={setOpen}
        nome={props.nome}
        latitude={props.latitude}
        longitude={props.longitude}
        listCard={props.listCard}
        setListCard={props.setListCard}
        id={props.id}
      />
     
      <tr className="card-container" onClick={() => setOpen(true)}>
        <td>{props.id}</td>

        <td>{props.nome}</td>
        <td>{props.latitude}</td>
        <td>{props.longitude}</td>
      </tr>
    </>
  );
}