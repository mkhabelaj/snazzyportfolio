import { InspectorControls } from "@wordpress/block-editor";
import {
  Panel,
  PanelBody,
  PanelRow,
  SelectControl,
} from "@wordpress/components";

const options = [
  { label: "zero", value: "sp-mb-0" },
  { label: "xs", value: "sp-mb-1" },
  { label: "sm", value: "sp-mb-2" },
  { label: "md", value: "sp-mb-3" },
  { label: "lg", value: "sp-mb-4" },
  { label: "xl", value: "sp-mb-5" },
  { label: "xxl", value: "sp-mb-6" },
];
export function MarginPanelRow({ marginB, setAttributes }) {
  return (
    <PanelRow>
      <SelectControl
        label="Margin Bottom"
        value={marginB}
        options={options}
        onChange={(marginB) => setAttributes({ marginB })}
      />
    </PanelRow>
  );
}

export function MarginInspectorSettings({ marginB, setAttributes }) {
  return (
    <>
      <InspectorControls>
        <Panel header="Margin Settings">
          <PanelBody title="Settings" initialOpen>
            <MarginPanelRow marginB={marginB} setAttributes={setAttributes} />
          </PanelBody>
        </Panel>
      </InspectorControls>
    </>
  );
}
