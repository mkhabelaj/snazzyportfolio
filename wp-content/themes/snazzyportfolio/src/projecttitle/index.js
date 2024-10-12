import { registerBlockType } from "@wordpress/blocks";
import metadata from "./block.json";
import Edit from "./edit";
import { RichText } from "@wordpress/block-editor";
import textSizeVariant from "./textSize";

registerBlockType(metadata.name, {
  edit: Edit,
  save: (props) => (
    <RichText.Content
      tagName="h1"
      className={`${
        textSizeVariant[props.attributes.size]
      } mt-4 decoration-4 mb-5 text-slate-200 uppercase tracking-widest`}
      value={props.attributes.text}
    />
  ),
});
