import {
  InnerBlocks,
  useBlockProps,
  useInnerBlocksProps,
} from "@wordpress/block-editor";

export default function EditComponent() {
  const blockProps = useBlockProps({
    className: "sp-flex-grow sp-p-10 sp-border-2",
  });

  const innerBlocksProps = useInnerBlocksProps(blockProps);

  return <div {...innerBlocksProps} />;
}
