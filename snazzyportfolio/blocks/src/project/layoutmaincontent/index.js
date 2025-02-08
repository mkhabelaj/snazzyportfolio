import { registerBlockType } from "@wordpress/blocks";
import metadata from "./block.json";
import Edit from "./edit";
import { InnerBlocks } from "@wordpress/block-editor";

registerBlockType(metadata.name, {
  edit: Edit,
  save: () => (
    <div className="sp-flex-1 sp-p-4">
      <InnerBlocks.Content />
    </div>
  ),
});
