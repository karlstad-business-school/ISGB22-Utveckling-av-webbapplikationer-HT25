
// CountryCard-komponent som tar emot props och visar ett land
const CountryCard = ({ country }) => {
    return (
        <div className="col-md-6 col-lg-4 mb-4">
            <div className="card h-100 shadow-sm">
                <img 
                    src={country.flags.png} 
                    className="card-img-top" 
                    alt={`${country.name.common} flagga`}
                    style={{ height: '200px', objectFit: 'cover' }}
                />
                <div className="card-body">
                    <h5 className="card-title">{country.name.common}</h5>
                    <p className="card-text">
                        <strong>Officiellt namn:</strong> {country.name.official}
                    </p>
                    <p className="card-text">
                        <strong>Huvudstad:</strong> {country.capital ? country.capital[0] : 'Ingen huvudstad'}
                    </p>
                    <p className="card-text">
                        <strong>Yta:</strong> {country.area.toLocaleString('sv-SE')} km²
                    </p>
                    <p className="card-text">
                        <strong>Befolkning:</strong> {country.population.toLocaleString('sv-SE')}
                    </p>
                    <p className="card-text">
                        <strong>Region:</strong> {country.region}
                    </p>
                </div>
            </div>
        </div>
    );
};
export default CountryCard;