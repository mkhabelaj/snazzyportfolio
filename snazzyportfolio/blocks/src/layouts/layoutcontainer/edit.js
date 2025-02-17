import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

export default function EditComponent() {
  const blockProps = useBlockProps({
    className: "main-content sp-max-w-5xl sp-w-11/12 sp-mx-auto",
  });

  const innerBlocksProps = useInnerBlocksProps({
    className: "sub-main-content",
  });

  return (
    <div {...blockProps}>
      <div {...innerBlocksProps}></div>
    </div>
  );
}
