import {
  useBlockProps,
  useInnerBlocksProps,
  store as bllockEditorStore,
} from "@wordpress/block-editor";
import { useSelect } from "@wordpress/data";

const LAYOUT_TEMPLATE = [
  ["snazzyportfolio/project-layout-main-content"],
  ["snazzyportfolio/project-layout-side-content"],
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
    `sp-bg-slate-900 
       sp-text-slate-400 
       sp-min-h-screen font-inter
       selection:sp-bg-teal-300 
       selection:sp-text-teal-900 
       sp-leading-relaxed
       sp-antialiased
       sp-flex md:sp-flex-row sp-gap-4 sp-flex-col-reverse sp-p-1`,
    {
      "sp-border-slate-400 sp-border-2": innerBlockCount === 0,
    },
  );

  console.log({ innerBlockCount });
  const blockProps = useBlockProps({ className });

  const innerBlocksProps = useInnerBlocksProps(blockProps, {
    template: LAYOUT_TEMPLATE,
  });
  return <div {...innerBlocksProps} />;
}
