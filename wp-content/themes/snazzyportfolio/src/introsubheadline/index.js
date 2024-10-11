import { registerBlockType } from "@wordpress/blocks";
import metadata from "./block.json";
import Edit from "./edit";
import { RichText } from "@wordpress/block-editor";

registerBlockType(metadata.name, {
  edit: Edit,
  save: (props) => (
    <RichText.Content
      tagName="p"
      className={`sp-text-base sp-md:text-${props.attributes.size} sp-mb-3 sp-font-medium sp-text-slate-200`}
      value={props.attributes.text}
    />
  ),
});
