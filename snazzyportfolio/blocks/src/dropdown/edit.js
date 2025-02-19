import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

export default function EditComponent({ clientId, attributes: { title } }) {
  const blockProps = useBlockProps();

  const innerBlocksProps = useInnerBlocksProps(blockProps);

  return <div {...innerBlocksProps}>{title}</div>;
}
