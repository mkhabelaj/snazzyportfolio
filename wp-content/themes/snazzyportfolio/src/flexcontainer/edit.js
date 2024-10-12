import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

export default function EditComponent() {
  const blockProps = useBlockProps({
    className: "sp-flex md:sp-flex-row sp-gap-4 sp-flex-col-reverse sp-p-10",
  });

  const innerBlocksProps = useInnerBlocksProps(blockProps);
  return <div {...innerBlocksProps} />;
}
