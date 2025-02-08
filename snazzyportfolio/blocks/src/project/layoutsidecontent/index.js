import { registerBlockType } from "@wordpress/blocks";
import metadata from "./block.json";
import Edit from "./edit";
import { InnerBlocks } from "@wordpress/block-editor";

registerBlockType(metadata.name, {
  edit: Edit,
  save: () => (
    <aside className="sp-p-2 md:sp-mt-52 md:sp-w-1/4 md:sp-min-w-[300px] md:sp-max-w-[400px]">
      <InnerBlocks.Content />
    </aside>
  ),
});
