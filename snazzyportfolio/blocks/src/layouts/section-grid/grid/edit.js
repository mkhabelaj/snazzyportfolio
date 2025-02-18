import {
  useBlockProps,
  useInnerBlocksProps,
  store as bllockEditorStore,
} from "@wordpress/block-editor";
import { useSelect } from "@wordpress/data";

import clsx from "clsx";

export default function EditComponent({ clientId, attributes: { styles } }) {
  const { innerBlockCount } = useSelect((select) => {
    const { getBlockCount } = select(bllockEditorStore);
    return {
      innerBlockCount: getBlockCount(clientId),
    };
  });
  const className = clsx(
    {
      "sp-border-slate-400 sp-border-2": innerBlockCount === 0,
    },
    styles,
  );

  const blockProps = useBlockProps({ className });

  const innerBlocksProps = useInnerBlocksProps(blockProps);
  return <div {...innerBlocksProps} />;
}
