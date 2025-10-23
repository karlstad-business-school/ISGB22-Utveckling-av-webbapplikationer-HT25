import "./SingleView.css";
import { Link, useParams, useNavigate } from "react-router-dom";
import { useEffect, useState } from "react";

function SingleView(){
    const [pokemon, setPokemon] = useState(null);
    let { id } = useParams();
    let navigate = useNavigate();


    const isValid = (id) => {
        let intId = parseInt(id);
        if(isNaN(intId)){
            return false;
        }

        if(intId < 1 || intId > 1025){
            return false;
        }

        return true;
    }

    useEffect(() => {
        if(isValid(id) == false){
            navigate("/view/instructions", {replace: true})
            return
        }

        const fetchPokemon = async () => {
            try {
                console.log("Fetching pokemon with id: " + id);
                const response = await fetch(`https://pokeapi.co/api/v2/pokemon/${id}`);
                const data = await response.json();
                console.log(data);
                setPokemon(data);

                
            } 
            catch (error) {
                console.log(error);
            }
        }

        fetchPokemon();
    }, []);


    return (
        (pokemon && (
            <div className="single-view">
                <h4>ID : {id}</h4>
                <h4>Name: {pokemon.name}</h4>
            </div>
        )))
      
}


export default SingleView;