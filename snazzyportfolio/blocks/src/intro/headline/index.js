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
      className={`sp-text-4xl ${
        textSizeVariant[props.attributes.size]
      } sp-mb-1 md:sp-mb-3 sp-font-bold sp-text-slate-200`}
      value={props.attributes.text}
    />
  ),
});
