import { registerBlockType } from "@wordpress/blocks";
import metadata from "./block.json";
import Edit from "./edit";
import { RichText } from "@wordpress/block-editor";

registerBlockType(metadata.name, {
  edit: Edit,
  save: (props) => (
    <RichText.Content
      tagName="h1"
      className={`sp-text-4xl sp-md:sp-text-${props.attributes.size} mb-1 md:mb-3 font-bold text-slate-200`}
      value={props.attributes.text}
    />
  ),
});
