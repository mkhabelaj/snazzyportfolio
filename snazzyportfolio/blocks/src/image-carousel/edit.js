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
  ToggleControl,
} from "@wordpress/components";
import { Icon, cancelCircleFilled } from "@wordpress/icons";
import { useState } from "@wordpress/element";
import { MarginPanelRow } from "../../../lib/script/margin/margin";

const imageSizes = [
  { value: "full", label: "Full" },
  { value: "thumbnail", label: "Thumbnail" },
  { value: "medium", label: "Medium" },
  { value: "large", label: "Large" },
  { value: "pageBanner", label: "Page Banner" },
  { value: "projectLandscapeXXl", label: "Project Landscape XXL" },
  { value: "projectLandscapeXl", label: "Project Landscape XL" },
  { value: "projectLandscapeLg", label: "Project Landscape LG" },
  { value: "projectLandscapeSm", label: "Project Landscape SM" },
];

function ObjectControl({ config, setAttributes, label }) {
  const [key, setKey] = useState("");
  const [val, setValue] = useState("");
  const configuration = Object.entries(config);
  function removeSetting(keyToRemove) {
    const newObj = Object.fromEntries(
      Object.entries(config).filter(([key]) => key !== keyToRemove),
    );
    setAttributes({ config: newObj });
  }
  function updateSetting(e) {
    e.preventDefault();
    if (!key || !val) return;
    const newObj = Object.fromEntries([...Object.entries(config), [key, val]]);
    setAttributes({ config: newObj });
    setKey("");
    setValue("");
  }

  function handleKeyChange(e) {
    setKey(e.target.value);
  }
  function handleValueChange(e) {
    if (e.target.value === "true") {
      setValue(true);
      return;
    }

    if (e.target.value === "false") {
      setValue(false);
      return;
    }

    if (!isNaN(e.target.value)) {
      setValue(parseInt(e.target.value));
      return;
    }
    setValue(e.target.value);
  }
  return (
    <div className="sp-pt-2 sp-pb-2 sp-flex sp-flex-col sp-gap-2 ">
      <div className="sp-uppercase sp-text-xs sp-font-semibold sp-mb-2">
        {label}
      </div>
      <a href="https://glidejs.com/docs/api/" target="_blank">
        Glide Docs
      </a>
      {configuration.map(([key, val]) => {
        return (
          <div key={key} className="sp-relative sp-flex sp-gap-2 sp-flex-col">
            <div className="sp-mb-4" key={key}>
              <div className="sp-flex sp-gap-2 sp-border-solid sp-border-gray-600 sp-border sp-p-1 sp-bg-gray-300 sp-text-gray-800">
                <div>{key}</div>
                <div>{val.toString()}</div>
              </div>
            </div>
            <Icon
              onClick={() => removeSetting(key)}
              className="
              sp-absolute -sp-right-3 -sp-top-3 sp-p-1 
              sp-stroke-red-700 sp-fill-red-400 hover:sp-stroke-red-400 hover:sp-fill-red-700
              "
              icon={cancelCircleFilled}
              size={33}
            />
          </div>
        );
      })}
      <div className="sp-mb-2">Add New Setting</div>
      <form onSubmit={updateSetting} className="sp-flex sp-flex-col sp-gap-2">
        <input
          type="text"
          name="key"
          value={key}
          onChange={handleKeyChange}
          placeholder="Key"
        />
        <input
          type="text"
          name="value"
          value={val}
          onChange={handleValueChange}
          placeholder="Value"
        />
        <button
          className="sp-bg-blue-500 sp-text-white  sp-p-2 sp-rounded-md"
          type="submit"
        >
          Submit
        </button>
      </form>
    </div>
  );
}

export default function EditComponent({
  attributes: { images, imageSize, config, marginB },
  setAttributes,
}) {
  const blockProps = useBlockProps();

  function onFileSelect(images) {
    setAttributes({
      images,
    });
  }

  const imagesElements =
    (images &&
      images.length > 0 &&
      images.map((image) => (
        <img src={image.sizes.thumbnail.url} key={image.id} />
      ))) ||
    [];

  return (
    <>
      <InspectorControls>
        <Panel header="Snazzy Image Settings & Uploads">
          <PanelBody title="Snazzy Upload" initialOpen>
            <PanelRow>
              <MediaUploadCheck>
                <MediaUpload
                  onSelect={onFileSelect}
                  multiple={true}
                  value={(images && images.map((image) => image.id)) || []}
                  render={({ open }) => (
                    <Button onClick={open}>Select Images</Button>
                  )}
                />
              </MediaUploadCheck>
            </PanelRow>
          </PanelBody>
          <PanelBody title="Snazzy Image Settings" initialOpen>
            <PanelRow>
              <SelectControl
                label="Image Size"
                value={imageSize}
                options={imageSizes}
                onChange={(imageSize) => setAttributes({ imageSize })}
              />
            </PanelRow>
            <PanelRow>
              <ObjectControl
                label="Glide Configuration"
                config={config}
                setAttributes={setAttributes}
              />
            </PanelRow>
            <MarginPanelRow marginB={marginB} setAttributes={setAttributes} />
          </PanelBody>
        </Panel>
      </InspectorControls>

      <div {...blockProps}>
        {imagesElements.length > 0 ? (
          <div className="sp-grid sp-grid-cols-4 sp-gap-4">
            {imagesElements}
          </div>
        ) : (
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
        sp-text-2xl
        sp-font-bold
        "
          >
            Upload Images to Carousel
          </div>
        )}
      </div>
    </>
  );
}
