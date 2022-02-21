export default function UniqueGasStation({id, reservatorio, coords}) {
    return (
        <div className="gas-station">
            <h3>Posto {id} </h3>
            <h5>Capacidade:</h5>
            <div className="holder-tank-capacity-animation">
                <div className="tank-capacity" style={{width:`${reservatorio}%`}}>{reservatorio}%</div>
            </div>
            <h5>Latitude: {coords.latitude}</h5>
            <h5>Longitude: {coords.longitude}</h5>
        </div>
    );
}