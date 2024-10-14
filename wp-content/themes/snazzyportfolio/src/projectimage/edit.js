import {
  useBlockProps,
  InspectorControls,
  MediaUpload,
  MediaUploadCheck,
} from "@wordpress/block-editor";
import { Button, PanelBody, PanelRow } from "@wordpress/components";
import apiFetch from "@wordpress/api-fetch";
import { useEffect } from "@wordpress/element";

export default function EditComponent(props) {
  const blockProps = useBlockProps();

  useEffect(() => {
    async function fetchData() {
      if (props.attributes.imgID) {
        const response = await apiFetch({
          path: `/wp/v2/media/${props.attributes.imgID}`,
          method: "GET",
        });
        props.setAttributes({
          imgURL: response.media_details.sizes.projectLandscapeLg.source_url,
        });
      }
    }
    fetchData();
  }, [props, props.attributes.imgID]);
  function onFileSelect(image) {
    props.setAttributes({
      imgID: image.id,
    });
  }

  return (
    <>
      <InspectorControls>
        <PanelBody title="Select Project Image" initialOpen>
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
      </InspectorControls>
      <div {...blockProps}>
        {props.attributes.imgURL && (
          <div>
            <img src={props.attributes.imgURL} alt="" />
          </div>
        )}
        {!props.attributes.imgURL && <div>Please upload an image</div>}
      </div>
    </>
  );
}
