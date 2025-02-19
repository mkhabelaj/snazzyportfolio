import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import clsx from "clsx";

export default function EditComponent({ attributes: { styles } }) {
  const blockProps = useBlockProps({
    className: "main-content sp-max-w-5xl sp-w-11/12 sp-mx-auto",
  });

  const innerBlocksProps = useInnerBlocksProps({
    className: clsx(styles),
  });

  return (
    <div {...blockProps}>
      <div {...innerBlocksProps}></div>
    </div>
  );
}
