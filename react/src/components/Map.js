import React, { useEffect, useState } from 'react';
import GoogleMapReact from 'google-map-react';
import LocationPin from './LocationPin';
import GasStations from './GasStations';

export default function Map () {
    const location = {
        address: 'W16',
        lat: -27.5968342,
        lng: -48.5203327,
    }

    const [cities, setCities] = useState([]);
    const [cityModal, setCityModal] = useState(false);
    const [choosedCity, setChoosedCity] = useState(false);


    useEffect( () => {
        async function getRegisteredCities () {
            const requestUrl = `http://127.0.0.1:8000/api/cidades`;
            const response = await fetch(requestUrl);
            
            if (response.status === 200) {
                const result = await response.json();
                return result;
            }
    
            return false;
        };
        
        getRegisteredCities().then(data => {
            setCities(data);
        });
        
    }, []);

    return (
        <>
            {
                cityModal && 
                <GasStations 
                    hideCityModal={() => setCityModal(false)}
                    choosedCity={choosedCity}
                />
            }
            <div className='map'>
                <GoogleMapReact
                    bootstrapURLKeys={{ key: 'AIzaSyDf78G7Ns_txjJd61HZvFRcH67pGCKUcnA' }}
                    defaultCenter={location}
                    defaultZoom={1}
                >
                {cities.map((item) => {
                    return (
                        <LocationPin
                            lat={item.latitude}
                            lng={item.longitude}
                            id={item.id}
                            text={item.nome_da_cidade}
                            className='pin'
                            key={item.id}
                            setChoosedCity={() => setChoosedCity(item.id)}
                            showCityModal={() => setCityModal(true)}
                        />
                    );
                })}
                </GoogleMapReact>
            </div>
        </>
    );
}