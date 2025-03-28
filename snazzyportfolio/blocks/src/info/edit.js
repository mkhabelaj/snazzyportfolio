import {
  useBlockProps,
  InspectorControls,
  RichText,
} from "@wordpress/block-editor";
import {
  PanelBody,
  PanelRow,
  Panel,
  SelectControl,
} from "@wordpress/components";
import { MarginPanelRow } from "../../../lib/script/margin/margin";

const OPTIONS = [
  { label: "Infomation", value: "info" },
  { label: "Warning", value: "warn" },
  { label: "Error", value: "erro" },
];
export default function Edit({
  attributes: { type, content, marginB },
  setAttributes,
}) {
  const blockProps = useBlockProps();
  return (
    <>
      <InspectorControls>
        <Panel>
          <PanelBody title="Select Info Block Type" initialOpen>
            <PanelRow>
              <SelectControl
                label="Type"
                options={OPTIONS}
                value={type}
                onChange={(value) => setAttributes({ type: value })}
              />
            </PanelRow>
            <MarginPanelRow marginB={marginB} setAttributes={setAttributes} />
          </PanelBody>
        </Panel>
      </InspectorControls>
      <div {...blockProps}>
        <RichText
          tagName="p"
          className="sp-text-md project-paragraph sp-whitespace-pre-wrap sp-my-5 sp-font-medium sp-leading-tight"
          value={content}
          onChange={(value) => setAttributes({ content: value })}
        />
      </div>
    </>
  );
}
