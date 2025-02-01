import { registerBlockType } from "@wordpress/blocks";
import metadata from "./block.json";
import Edit from "./edit";

registerBlockType(metadata.name, {
  edit: Edit,
  save: (props) => (
    <>
      {props.attributes.imgURL && (
        <div>
          <img src={props.attributes.imgURL} alt="" />
        </div>
      )}
      {!props.attributes.imgURL && <div>No Uploaded</div>}
    </>
  ),
});
