import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import clsx from "clsx";

export default function EditComponent() {
  const className = clsx("main-content");
  const blockProps = useBlockProps();

  const innerBlocksProps = useInnerBlocksProps();

  return (
    <div class="main-content" {...blockProps}>
      <div class="sub-main-content" {...innerBlocksProps}></div>
    </div>
  );
}
