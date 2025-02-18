import {
  useBlockProps,
  useInnerBlocksProps,
  store as blockEditorStore,
} from "@wordpress/block-editor";
import { useSelect } from "@wordpress/data";
import clsx from "clsx";

export default function EditComponent({ clientId, attributes: { area } }) {
  const { innerBlockCount } = useSelect((select) => {
    const { getBlockCount } = select(blockEditorStore);
    return {
      innerBlockCount: getBlockCount(clientId),
    };
  });
  const className = clsx(area, {
    " sp-p-10 sp-border-2": innerBlockCount === 0,
  });
  const blockProps = useBlockProps({ className });

  const innerBlocksProps = useInnerBlocksProps(blockProps);

  return <div {...innerBlocksProps} />;
}
