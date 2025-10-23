import UIRoot from "./components/UIRoot";
import "./App.css";
import { BrowserRouter } from "react-router-dom";

function App() {
  return (
    <>
      <BrowserRouter>
        <UIRoot />
      </BrowserRouter>
    </>
  );
}

export default App;
