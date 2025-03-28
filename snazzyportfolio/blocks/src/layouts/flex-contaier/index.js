import { registerBlockType } from "@wordpress/blocks";
import metadata from "./block.json";
import Edit from "./edit";
import { InnerBlocks } from "@wordpress/block-editor";

registerBlockType(metadata.name, {
  edit: Edit,
  save: () => (
    <div
      className="
        sp-flex md:sp-flex-row md:sp-gap-10 sp-flex-col"
    >
      <InnerBlocks.Content />
    </div>
  ),
});
