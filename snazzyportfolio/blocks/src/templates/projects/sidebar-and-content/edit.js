import {
  useBlockProps,
  useInnerBlocksProps,
  store as bllockEditorStore,
} from "@wordpress/block-editor";
import { useSelect } from "@wordpress/data";

const LAYOUT_TEMPLATE = [
  [
    "snazzyportfolio/layout-container", // Parent block
    { styles: ["sp-max-w-5xl sp-w-full sp-mx-auto sp-p-4"] }, // Attributes (empty in this case)
    [
      [
        "snazzyportfolio/flex-container",
        {}, // Attributes
        [
          [
            "snazzyportfolio/layout-main-content",
            {}, // Attributes
            [
              [
                "core/post-title",
                {
                  placeholder: "Project Title",
                  level: 1,
                },
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
                {
                  placeholder: "Enter Project Text here ...",
                },
              ],
              [
                "snazzyportfolio/image",
                {
                  fullWidth: true,
                },
              ],
            ],
          ],
          [
            "snazzyportfolio/layout-side-content",
            {},
            [
              ["snazzyportfolio/project-tech-list", {}],
              ["snazzyportfolio/project-timeline", {}],
              ["snazzyportfolio/project-post", {}],

              [
                "snazzyportfolio/dropdown",
                {
                  title: "Project Overview",
                  initialOpen: true,
                },
                [["snazzyportfolio/overview", {}]],
              ],
            ],
          ], // Side content block with empty attributes
        ],
      ],
    ],
  ],
];

import clsx from "clsx";

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
