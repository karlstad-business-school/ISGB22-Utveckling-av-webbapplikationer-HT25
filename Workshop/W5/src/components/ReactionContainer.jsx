import Reaction from "./Reaction";
import { useEffect, useState } from "react";

function ReactionContainer() {

    const [pokemonList, setPokemonList] = useState([]);
    const [dummyList, setDummyList] = useState([]);

    useEffect(() => {
        let dummyData = [
            {
                "id": 1,
                "name": "Bulbasaur",
                "image": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon"
            },
            {
                "id": 2,
                "name": "Ivysaur",
                "image": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon"
            },

            {
                "id": 3,
                "name": "Venusaur",
                "image": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon"
            }
        ]

        setDummyList(dummyData);
        setPokemonList(dummyData);
    }, []);

    const filterPokemon = (e) => {
        //console.log(e);
        let text = e.target.value.toLowerCase();
        let pokemons = pokemonList;
        
        let search = pokemons.filter(pokemon => pokemon.name.toLowerCase().includes(text));
        
        setDummyList(search);
    }

    return (
        <div className="pokemon-container">
            <h2 className="pokemon-title">Pokemon List</h2>
            <div className="pokemon-search">
                <input type="text" placeholder="Search Pokemon" onChange={filterPokemon} />
            </div>
            {
                /*
                dummyList.length > 0 && (
                <Reaction 
                id={dummyList[0].id} 
                name={dummyList[0].name} 
                image={dummyList[0].image + "/" + dummyList[0].id + ".png"}
                />
                )
                */
            }

            {
                dummyList.length == 0 ? (
                    <h2>No Pokémons found!</h2>
                ) : (
                    //Item == en pokemon i dummyList
                    //Map loopar igenom alla
                    //Varv 1 -> item === dummyList[0]
                    //Varv 2 -> item === dummyList[1]
                    //Varv 3 -> item === dummyList[2]
                    dummyList.map((item, index) => {
                        return <Reaction key={index} id={item.id} name={item.name} image={item.image + "/" + item.id + ".png"}/>
                    })
                )
            }
        </div>
    );
}

export default ReactionContainer;




/*
 let dummyData = [
            {
                "id": 1,
                "name": "Bulbasaur",
                "image": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon"
            },
            {
                "id": 2,
                "name": "Ivysaur",
                "image": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon"
            },

            {
                "id": 3,
                "name": "Venusaur",
                "image": "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon"
            }
        ]

*/