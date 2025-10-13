import { Link } from "react-router-dom";

function Instructions(){
    return (
        <div className="single-view">
            <h1>How to View a single Pokemon</h1>
            <p>
                Please select a valid Pokemon ID between <strong>1</strong> and <strong>1025</strong>. For example <Link to="/view/1">Bulbasaur</Link>
            </p>
        </div>
    )
}

export default Instructions;