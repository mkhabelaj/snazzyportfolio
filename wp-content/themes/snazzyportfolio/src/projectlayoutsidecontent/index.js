import { registerBlockType } from "@wordpress/blocks";
import metadata from "./block.json";
import Edit from "./edit";
import { InnerBlocks } from "@wordpress/block-editor";

registerBlockType(metadata.name, {
  edit: Edit,
  save: () => (
    <div className="md:sp-basis-80 sp-p-2 md:sp-mt-96">
      <InnerBlocks.Content />
    </div>
  ),
});
