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
      className={`${
        textSizeVariant[props.attributes.size]
      } md:sp-max-w-[800px] sp-mb-6 sp-leading-normal sp-font-bold`}
      value={props.attributes.text}
    />
  ),
});
