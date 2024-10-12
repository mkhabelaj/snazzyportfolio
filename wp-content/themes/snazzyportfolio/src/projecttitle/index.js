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
      } sp-decoration-4 sp-mb-5 sp-text-slate-200 sp-uppercase sp-tracking-widest`}
      value={props.attributes.text}
    />
  ),
});
