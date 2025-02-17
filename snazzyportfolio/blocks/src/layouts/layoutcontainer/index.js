import { registerBlockType } from "@wordpress/blocks";
import metadata from "./block.json";
import Edit from "./edit";
import { InnerBlocks } from "@wordpress/block-editor";

registerBlockType(metadata.name, {
  edit: Edit,
  save: () => (
    <div class="main-content">
      <div class="sub-main-content">
        <InnerBlocks.Content />
      </div>
    </div>
  ),
});
