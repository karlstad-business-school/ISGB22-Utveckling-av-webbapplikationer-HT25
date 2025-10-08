function Main(props){

    const setColor = (r, g, b) => {
        return {red: r, green: g, blue: b}
    }

    let {r, g, b} = props;
    let {red, green, blue} = setColor(r, g, b);
    console.log(r, g, b);

    let css = {
        height: 300 + "px",
        backgroundColor: "rgb(" + red + ", " + green + ", " + blue + ")"
    }

    return (
        <>
            <main style={css}>Detta är main</main>
        </>
    );
}


export default Main;



