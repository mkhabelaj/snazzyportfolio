import { registerBlockType } from "@wordpress/blocks";
import metadata from "./block.json";
import Edit from "./edit";
import { InnerBlocks } from "@wordpress/block-editor";

registerBlockType(metadata.name, {
  edit: Edit,
  save: () => (
    <div
      className="
        sp-flex md:sp-flex-row sp-gap-4"
    >
      <InnerBlocks.Content />
    </div>
  ),
});
