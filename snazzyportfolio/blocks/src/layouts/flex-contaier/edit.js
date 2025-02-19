import {
  useBlockProps,
  useInnerBlocksProps,
  store as blockEditorStore,
} from "@wordpress/block-editor";
import { useSelect } from "@wordpress/data";
import clsx from "clsx";

export default function EditComponent({ clientId, attributes: { styles } }) {
  const { innerBlockCount } = useSelect((select) => {
    const { getBlockCount } = select(blockEditorStore);
    return {
      innerBlockCount: getBlockCount(clientId),
    };
  });

  const className = clsx(
    styles,
    `
      sp-min-h-screen font-inter
      selection:sp-bg-teal-300 
      selection:sp-text-teal-900 
      sp-leading-relaxed
      sp-antialiased
      sp-flex md:sp-flex-row sp-gap-4 sp-flex-col sp-p-1`,
    {
      "sp-border-slate-400 sp-border-2": innerBlockCount === 0,
    },
  );

  console.log({ innerBlockCount });

  const blockProps = useBlockProps({ className });

  const innerBlocksProps = useInnerBlocksProps(blockProps);

  return <div {...innerBlocksProps} />;
}
