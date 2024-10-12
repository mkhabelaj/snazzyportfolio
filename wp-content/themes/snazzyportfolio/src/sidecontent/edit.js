import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

export default function EditComponent() {
  const blockProps = useBlockProps({
    className:
      "md:sp-basis-80 sp-p-2 md:sp-mt-[5%] sp-border-2 sp-border-slate-400 ",
  });
  const innerBlocksProps = useInnerBlocksProps(blockProps);
  return <div {...innerBlocksProps} />;
}
