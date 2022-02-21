import React, {useState, useEffect} from 'react';
import { Icon } from '@iconify/react';
import UniqueGasStation from './UniqueGasStation';

export default function GasStations({choosedCity, hideCityModal}) {
    const [gasStationsFromCity, setGasStationsFromCity] = useState();

    useEffect( () => {
        async function getGasStationsFromCity () {
            const requestUrl = `http://127.0.0.1:8000/api/cidade/${choosedCity}`;
            const response = await fetch(requestUrl);
            
            if (response.status === 200) {
                const result = await response.json();
                return result;
            }
    
            return false;
        };
        
        getGasStationsFromCity().then(data => {
            setGasStationsFromCity(data);
            console.log(data);
        });
        
    }, []);

    return (
            <div className="gas-station-modal">
             { 
                gasStationsFromCity &&
                <>
                    <div className="city-info">
                        <div className="title-and-close">
                            <h1>{gasStationsFromCity.cidade}</h1>
                            <Icon icon="fa:times-circle" className='close-modal-icon' onClick={hideCityModal}/>
                        </div>
                        <h4>Latitude: {gasStationsFromCity.coords.latitude}</h4>
                        <h4>Longitude: {gasStationsFromCity.coords.longitude}</h4>
                    </div>
                    <h5>Lista de Postos</h5>
                    <div className="gas-station-list">
                        {gasStationsFromCity.postos.map( ({id, reservatorio, coords}) => {
                            return (
                                <UniqueGasStation 
                                    id={id}
                                    reservatorio={reservatorio}
                                    coords={coords}
                                    key={id}
                                />
                            );
                        })}

                    </div>
                </>
             }
            </div>
    );

}