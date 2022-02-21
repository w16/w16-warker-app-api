import { Icon } from '@iconify/react';


export default function LocationPin({text, id, showCityModal, setChoosedCity}) {
    return (
        <div className='pin' 
            onClick={() => {
                showCityModal(true); 
                setChoosedCity(id);
            }}
        >
            <Icon icon="oi:map-marker" className="pin-icon"/>
            <p className="pin-text">{text}</p>
        </div>
    );
}