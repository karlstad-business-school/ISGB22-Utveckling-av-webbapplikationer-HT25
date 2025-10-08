import { useEffect, useState } from "react";

function Test(){
    const[color, setColor] = useState({r: 255, g: 255, b: 255});

    const changeColor = () => {
        setColor(prev => ({
            ...prev,
            r: 0,
        }));
    }

    const changeColorNoUpdate = () => {
        color.r = 100;
        color.g = 100;
        color.b = 100;
        console.log(color);
        a += 1;
    }

    const[number, addNumber] = useState(0);

    const increase = (prev) => {
        addNumber(prev => prev + 1);
        //addNumber(number + 1);
    }


    useEffect(() => {
        console.log("Value of number: " + number);
    }, [number])


    return (
        <>
            <main>
                <h1>Detta är main</h1>
                <p>R: {color.r}</p>
                <p>G: {color.g}</p>
                <p>B: {color.b}</p>
                <button onClick={increase}>Ändra färg</button>
            </main>
        </>
    );
}


export default Test;