import {
  useBlockProps,
  InspectorControls,
  MediaUpload,
  MediaUploadCheck,
} from "@wordpress/block-editor";
import {
  Button,
  PanelBody,
  PanelRow,
  Panel,
  SelectControl,
  CheckboxControl,
} from "@wordpress/components";

const options = [
  { value: "sm", label: "Small" },
  { value: "lg", label: "Large" },
  { value: "xl", label: "Extra Large" },
  { value: "2xl", label: "2X Large" },
  { value: "3xl", label: "3X Large" },
];
export default function EditComponent(props) {
  const blockProps = useBlockProps();

  function onFileSelect(image) {
    props.setAttributes({
      imgID: image.id,
    });
  }

  return (
    <>
      <InspectorControls>
        <Panel header="Snazzy Image Settings & Uploads">
          <PanelBody title="Snazzy Upload" initialOpen>
            <PanelRow>
              <MediaUploadCheck>
                <MediaUpload
                  onSelect={onFileSelect}
                  value={props.attributes.imgID}
                  render={({ open }) => (
                    <Button onClick={open}>Choose Image</Button>
                  )}
                />
              </MediaUploadCheck>
            </PanelRow>
          </PanelBody>
          <PanelBody title="Snazzy Image Settings" initialOpen>
            <PanelRow>
              <SelectControl
                label="Image Size"
                value={props.attributes.size}
                options={options}
                onChange={(value) => props.setAttributes({ size: value })}
              />
            </PanelRow>
            <PanelRow>
              <CheckboxControl
                label="Center Image"
                checked={props.attributes.center}
                onChange={(value) => props.setAttributes({ center: value })}
              />
            </PanelRow>
            <PanelRow>
              <CheckboxControl
                label="Full Width"
                checked={props.attributes.fullWidth}
                onChange={(value) => props.setAttributes({ fullWidth: value })}
              />
            </PanelRow>
            <PanelRow>
              <CheckboxControl
                label="Auto Height"
                checked={props.attributes.autoHeight}
                onChange={(value) => props.setAttributes({ autoHeight: value })}
              />
            </PanelRow>
          </PanelBody>
        </Panel>
      </InspectorControls>
      <div {...blockProps}>
        <p className="sp-font-inter sp-text-3xl sp-text-center sp-font-bold">
          {props.attributes.text}
        </p>
      </div>
    </>
  );
}
