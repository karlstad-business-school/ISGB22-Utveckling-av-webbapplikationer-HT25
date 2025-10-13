import { Link } from "react-router-dom";

function Reaction(props) {

    let {id, name, image} = props;

    return (
        <div className="pokemon-card">
            <img
            className="pokemon-card-image"
            alt="a pokemon"
            src={image}
            />
            <p className="pokemon-card-id"># {id}</p>
            <p className="pokemon-card-name">{name}</p>
            <Link to={"/view/" + id} className="pokemon-card-view">View</Link>
        </div>
    );
}

export default Reaction;
