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
        "snazzyportfolio/dropdown",
        {
          title: "Project Overview",
        },
        [["snazzyportfolio/overview", {}]],
      ],
      [
        "snazzyportfolio/dropdown",
        {
          title: "Related Posts",
        },
        [
          [
            "snazzyportfolio/project-post",
            {
              showLabel: false,
            },
          ],
        ],
      ],
      [
        "snazzyportfolio/dropdown",
        {
          title: "Related Timeline",
        },
        [
          [
            "snazzyportfolio/project-timeline",
            {
              showLabel: false,
              marginB: "sp-mb-0",
            },
          ],
        ],
      ],
      [
        "snazzyportfolio/dropdown",
        {
          title: "Tech Stack",
          marginB: "sp-mb-4",
        },
        [
          [
            "snazzyportfolio/project-tech-list",
            {
              showLabel: false,
              marginB: "sp-mb-0",
            },
          ],
        ],
      ],
      [
        "core/post-title",
        {
          placeholder: "Project Title",
          level: 1,
        },
      ],
      ["snazzyportfolio/excerpt", {}],
      [
        "snazzyportfolio/dropdown",
        {
          title: "Project Showcase",
          initialOpen: true,
          marginB: "sp-mb-4",
        },
        [
          [
            "snazzyportfolio/image-carousel",
            {
              imageSize: "projectLandscapeXXl",
            },
          ],
        ],
      ],
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
