import Reaction from "./Reaction";

function ReactionContainer() {
  return (
    <div>
      <h2>Pokemon List</h2>
      <div>
        <input type="text" placeholder="Search Pokemon" />
      </div>
      <Reaction />
    </div>
  );
}

export default ReactionContainer;
