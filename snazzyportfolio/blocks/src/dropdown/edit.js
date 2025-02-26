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
import { MarginPanelRow } from "../../../lib/script/margin/margin";

export default function EditComponent({
  attributes: { title, initialOpen, marginB },
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
            <MarginPanelRow marginB={marginB} setAttributes={setAttributes} />
          </PanelBody>
        </Panel>
      </InspectorControls>
      <div {...innerBlocksProps} />
    </>
  );
}
