import {
  useBlockProps,
  useInnerBlocksProps,
  store as bllockEditorStore,
} from "@wordpress/block-editor";
import { useSelect } from "@wordpress/data";

import clsx from "clsx";
const LAYOUT_TEMPLATE = [
  [
    "snazzyportfolio/layout-container", // Parent block
    { styles: ["sp-max-w-5xl sp-w-full sp-mx-auto sp-p-4"] }, // Attributes (empty in this case)
    [
      [
        "core/post-title",
        {
          placeholder: "Project Title",
          level: 1,
        },
      ],
      [
        "snazzyportfolio/dropdown",
        {
          title: "Project Overview",
        },
        [["snazzyportfolio/overview", {}]],
      ],
      ["snazzyportfolio/excerpt", {}],
      [
        "snazzyportfolio/snazzyportfolio-genericheading",
        {
          placeholder: "Enter Project subtitle here ...",
        },
      ],
      [
        "snazzyportfolio/paragraph",
        { placeholder: "Enter Project Text here ..." },
      ],
      [
        "snazzyportfolio/paragraph",
        { placeholder: "Enter Project Text here ..." },
      ],
      [
        "snazzyportfolio/image",
        {
          fullWidth: true,
        },
      ],
    ],
  ],
];

export default function EditComponent({ clientId }) {
  const { innerBlockCount } = useSelect((select) => {
    const { getBlockCount } = select(bllockEditorStore);
    return {
      innerBlockCount: getBlockCount(clientId),
    };
  });
  const className = clsx({
    "sp-border-slate-400 sp-border-2": innerBlockCount === 0,
  });

  const blockProps = useBlockProps({ className });

  const innerBlocksProps = useInnerBlocksProps(blockProps, {
    template: LAYOUT_TEMPLATE,
  });
  return <div {...innerBlocksProps} />;
}
