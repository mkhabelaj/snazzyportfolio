import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import clsx from "clsx";

export default function EditComponent() {
  const className = clsx("main-content");
  const blockProps = useBlockProps();

  const innerBlocksProps = useInnerBlocksProps();

  return (
    <div className="main-content" {...blockProps}>
      <div className="sub-main-content" {...innerBlocksProps}></div>
    </div>
  );
}
