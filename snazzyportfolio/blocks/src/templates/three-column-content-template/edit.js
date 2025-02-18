import {
  useBlockProps,
  useInnerBlocksProps,
  store as bllockEditorStore,
} from "@wordpress/block-editor";
import { useSelect } from "@wordpress/data";

const styles = [
  "sp-grid sp-gap-4 sp-gp-4",
  "[grid-template-areas:'header''content''sidebar''footer']",
  "md:[grid-template-areas:'header_header''sidebar_content''footer_footer']",
  "sp-grid-cols-1 sm:sp-grid-cols-2",
];
const LAYOUT_TEMPLATE = [
  [
    "snazzyportfolio/grid-container",
    { styles },
    [
      ["snazzyportfolio/grid-item", { area: "[grid-area:header]" }],
      ["snazzyportfolio/grid-item", { area: "[grid-area:content]" }],
      ["snazzyportfolio/grid-item", { area: "[grid-area:sidebar]" }],
      ["snazzyportfolio/grid-item", { area: "[grid-area:footer]" }],
    ],
  ],
];

export default function EditComponent() {
  const blockProps = useBlockProps();

  const innerBlocksProps = useInnerBlocksProps(blockProps, {
    template: LAYOUT_TEMPLATE,
  });
  return <div {...innerBlocksProps} />;
}
