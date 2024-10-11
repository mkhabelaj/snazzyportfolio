import { registerBlockType } from "@wordpress/blocks";
import metadata from "./block.json";
import Edit from "./edit";
import { RichText } from "@wordpress/block-editor";
import textSizeVariant from "./textSize";

registerBlockType(metadata.name, {
  edit: Edit,
  save: (props) => (
    <RichText.Content
      tagName="p"
      className={`sp-text-base ${
        textSizeVariant[props.attributes.size]
      } sp-mb-3 sp-font-medium sp-text-slate-200`}
      value={props.attributes.text}
    />
  ),
});
