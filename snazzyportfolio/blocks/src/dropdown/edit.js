import {
  useBlockProps,
  useInnerBlocksProps,
  InspectorControls,
} from "@wordpress/block-editor";
import {
  Panel,
  PanelBody,
  PanelRow,
  TextControl,
  ToggleControl,
} from "@wordpress/components";

export default function EditComponent({
  attributes: { title, initialOpen },
  setAttributes,
}) {
  const blockProps = useBlockProps();

  const innerBlocksProps = useInnerBlocksProps(blockProps);

  return (
    <>
      <InspectorControls>
        <Panel header="Snazzy Dropdown Settings">
          <PanelBody title="Settings" initialOpen>
            <PanelRow>
              <TextControl
                label="Dropdown Title"
                value={title}
                onChange={(value) => setAttributes({ title: value })}
              />
            </PanelRow>
            <PanelRow>
              <ToggleControl
                label="Initial Open"
                checked={initialOpen}
                onChange={(value) => setAttributes({ initialOpen: value })}
              />
            </PanelRow>
          </PanelBody>
        </Panel>
      </InspectorControls>
      <div {...innerBlocksProps} />
    </>
  );
}
