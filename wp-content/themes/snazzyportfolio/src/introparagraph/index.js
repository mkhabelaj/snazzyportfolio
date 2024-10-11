import { registerBlockType } from "@wordpress/blocks";
import metadata from "./block.json";
import Edit from "./edit";
import { RichText } from "@wordpress/block-editor";

registerBlockType(metadata.name, {
  edit: Edit,
  save: (props) => (
    <RichText.Content
      tagName="p"
      className={`sp-text-${props.attributes.size} sp-max-w-xl sp-mb-6 sp-leading-normal sp-font-bold`}
      value={props.attributes.text}
    />
  ),
});
