import {
  useBlockProps,
  useInnerBlocksProps,
  store as bllockEditorStore,
} from "@wordpress/block-editor";
import { useSelect } from "@wordpress/data";

const LAYOUT_TEMPLATE = [
  ["snazzyportfolio/column"],
  ["snazzyportfolio/column"],
  ["snazzyportfolio/column"],
];
import clsx from "clsx";

export default function EditComponent({ clientId }) {
  const { innerBlockCount } = useSelect((select) => {
    const { getBlockCount } = select(bllockEditorStore);
    return {
      innerBlockCount: getBlockCount(clientId),
    };
  });
  const className = clsx(
    `
       sp-min-h-screen font-inter
       selection:sp-bg-teal-300 
       selection:sp-text-teal-900 
       sp-leading-relaxed
       sp-antialiased
       sp-flex md:sp-flex-row sp-gap-4 sp-p-1`,
    {
      "sp-border-slate-400 sp-border-2": innerBlockCount === 0,
    },
  );

  const blockProps = useBlockProps({ className });

  const innerBlocksProps = useInnerBlocksProps(blockProps, {
    template: LAYOUT_TEMPLATE,
  });
  return <div {...innerBlocksProps} />;
}
