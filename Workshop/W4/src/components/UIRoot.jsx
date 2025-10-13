import Header from "./Header";
import ReactionContainer from "./ReactionContainer";
import {Route, Routes} from "react-router-dom";
import SingleView from "./SingleView";
import Instructions from "./Instructions";
import NotFound from "./NotFound";

function UIRoot() {

  const getReactionContainer = () => {
    return <ReactionContainer/>
  }

  return (
    <>
      <Header />
      <Routes>
        <Route path="/" element={getReactionContainer()}/>
        <Route path="/view/:id" element={<SingleView abc="123"/>}/>
        <Route path="/view/instructions" element={<Instructions/>}/>
        <Route path="*" element={<NotFound/>}/>
      </Routes>
    </>
  );
}

export default UIRoot;
