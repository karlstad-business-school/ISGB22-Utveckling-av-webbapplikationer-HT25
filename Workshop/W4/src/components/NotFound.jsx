import { Link } from "react-router-dom";

function NotFound(){
    return (
        <div className="single-view">
            <h1>Page not found!</h1>
            <Link to="/">Back to home</Link>
        </div>
    )
}

export default NotFound;