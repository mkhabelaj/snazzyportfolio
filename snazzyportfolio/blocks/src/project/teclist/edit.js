import { useBlockProps } from "@wordpress/block-editor";
import { InspectorControls } from "@wordpress/block-editor";
import { Panel, PanelBody, PanelRow } from "@wordpress/components";
import { CheckboxControl } from "@wordpress/components";

export default function Edit(props) {
  const blockProps = useBlockProps();
  return (
    <>
      <InspectorControls>
        <Panel header="Tech List Settings">
          <PanelBody title="Options" initialOpen>
            <PanelRow>
              <CheckboxControl
                label="Show Label"
                checked={props.attributes.showLabel}
                onChange={(value) => props.setAttributes({ showLabel: value })}
              />
            </PanelRow>
          </PanelBody>
        </Panel>
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
          Tech List Placeholder
        </div>
      </div>
    </>
  );
}
