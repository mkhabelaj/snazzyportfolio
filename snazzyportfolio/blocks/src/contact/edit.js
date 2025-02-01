import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { PanelBody, PanelRow, TextControl } from "@wordpress/components";

export default function Edit({ attributes: { action }, setAttributes }) {
  const blockProps = useBlockProps();

  return (
    <>
      <InspectorControls>
        <PanelBody title="Contact Form" initialOpen>
          <PanelRow>
            <TextControl
              label="Action"
              value={action}
              onChange={(value) => {
                setAttributes({ action: value });
              }}
            />
          </PanelRow>
        </PanelBody>
      </InspectorControls>
      <div {...blockProps}>
        <div
          className="
        sp-font-inter
        selection:sp-bg-teal-300 
        selection:sp-text-teal-900 
        sp-leading-relaxed
        sp-antialiased
        sp-flex sp-items-center 
        sp-flex-col 
        sp-text-center
        sp-p-10
        sp-text-5xl
        sp-font-bold
        "
        >
          <h1>Snazzy Portfolio Contact Form Placeholder</h1>
        </div>
      </div>
    </>
  );
}
