import { useEffect, useState } from "react";

function Main(props){
    const [color, setColor] = useState({red: props.r, green: props.g, blue: props.b});
    const [time, setTime] = useState(0);
    const [showTime, setShowTime] = useState(false);

    useEffect(() => {
        let id = setInterval(() => {
            setTime((t) => {
                return t + 1;
            });
        }, 1000);

        return () => clearInterval(id);
    }, []);

    const randomColor = () => {
        setColor({
            red: Math.floor(Math.random() * 255),
            green: Math.floor(Math.random() * 255),
            blue: Math.floor(Math.random() * 255)
        });

        console.log(color);
    }


    const hideTimer = () => {
        setShowTime(!showTime);
    }


    let css = {
        height: 300 + "px",
        backgroundColor: "rgb(" + color.red + ", " + color.green + ", " + color.blue + ")"
    };

    return (
        <>
            <main style={css}>
                <h1>Detta är main</h1>
                {showTime && <p>Tiden är nu: {time}</p>}
                <button onClick={randomColor}>Byt färg</button>
                <button onClick={hideTimer}>Göm timer</button>
            </main>
        </>
    )
}


export default Main;




