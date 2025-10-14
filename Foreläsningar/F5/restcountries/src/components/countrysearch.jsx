import React, { useState } from 'react';
import CountryCard from './countrycard';



const CountrySearch = () => {

    const [searchTerm, setSearchTerm] = useState('');
    const [countries, setCountries] = useState([]);

    //setCountries([]);

    const searchCountries = async () => {
    
        try {
            const response = await fetch(`https://restcountries.com/v3.1/name/${searchTerm}`);
            const data = await response.json();
            console.log(data);
            setCountries(data);

        }
        catch (error) {
            console.error("Error fetching countries:", error);
        }
    
    }




    return (
    
        <div className="container py-5">
            <div className="row">
                <div className="col-12 mb-5">
                    <h1 className="display-4 mb-5">Länder i världen</h1>
                    <p className="lead text-muted">Sök efter länder och få information</p>
                </div>
            </div>
            <div className="row">
                <div className="col-12">
                    <div className="input-group input-group-lg">
                        <input type="text" 
                            value={searchTerm}
                            onChange={(e)=> setSearchTerm(e.target.value)}
                            className="form-control" 
                            placeholder="Sök efter ett land..." 
                            aria-label="Sök efter ett land" 
                            aria-describedby="button-search"/>
                        <button className="btn btn-primary"
                            type="button"
                            onClick={searchCountries}
                            >Sök</button>
                 
                    </div>

                    </div>
                </div>
            
                {
                    (countries.length > 0 && (
                        <div className="row mb-3">
                            <div className="col-12 mt-5">
                                <h3 className="text-center">Hoittade {countries.length}st länder
                                    
                                </h3>
                            </div>
                            
                        </div>
                
                    ) && (
                        <div className="row">
                            {countries.map((country) => (
                                <CountryCard key={country.cca3} country={country} />
                            ))}
                        </div>

                    )) 

                    
            
                }
            
            </div>

    
    )











}
export default CountrySearch;
