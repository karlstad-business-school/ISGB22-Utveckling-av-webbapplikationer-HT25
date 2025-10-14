import "./SingleView.css";
import { Link, useParams, useNavigate } from "react-router-dom";
import { useEffect } from "react";

function SingleView(){
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
        }
    }, []);


    return (
        <div className="single-view">
            <Link className="back-btn" to="/">Back</Link>
            <h4>ID: { id }</h4>
        </div>
    )
}


export default SingleView;