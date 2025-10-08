import Main from "./Main.jsx";
import Header from "./Header.jsx";
import Footer from "./Footer.jsx";

function UIRoot(){
    let colors = {r: 255, g: 45, b:100};
    return (
        <>
            <Header/>
            <Main r="255" g="45" b="100"/>
            <Footer/>
        
        </>

    );
}

export default UIRoot;


