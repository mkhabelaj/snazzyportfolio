import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import {
  PanelBody,
  PanelRow,
  Panel,
  TextareaControl,
} from "@wordpress/components";
import clsx from "clsx";

export default function Edit({
  attributes: { container, content },
  setAttributes,
}) {
  const blockProps = useBlockProps();
  const contentClasees = clsx();
  return (
    <>
      <InspectorControls>
        <Panel>
          <PanelBody title="Select Project Image" initialOpen>
            <PanelRow>
              <TextareaControl
                label="Container Class"
                value={container}
                onChange={(container) => setAttributes({ container })}
              />
            </PanelRow>
            <PanelRow>
              <TextareaControl
                label="Content Class"
                value={content}
                onChange={(content) => setAttributes({ content })}
              />
            </PanelRow>
          </PanelBody>
        </Panel>
      </InspectorControls>
      <div {...blockProps}>
        <div
          className="
        "
        >
          <p
            className={clsx([
              "sp-text-md sp-italic sp-whitespace-pre-wrap sp-my-5 sp-font-medium sp-leading-tight",
              content,
            ])}
          >
            The Snazzy Portfolio Excerpt will will be displayed here, Lorem
            ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in
            voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
            officia deserunt mollit anim id est laborum
          </p>
        </div>
      </div>
    </>
  );
}
