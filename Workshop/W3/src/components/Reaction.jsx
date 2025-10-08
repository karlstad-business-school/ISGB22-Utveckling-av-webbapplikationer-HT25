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
            <a href="#" className="pokemon-card-view">View</a>
        </div>
    );
}

export default Reaction;
