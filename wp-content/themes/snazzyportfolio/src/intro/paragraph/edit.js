import { useBlockProps, RichText } from "@wordpress/block-editor";
import textSizeVariant from "./textSize";

export default function EditComponent({
  attributes: { size, text },
  setAttributes,
}) {
  const blockProps = useBlockProps();
  //variant text-sm-lg
  return (
    <>
      <div {...blockProps}>
        <div>
          <RichText
            tagName="p"
            className={`${textSizeVariant[size]} sp-max-w-xl sp-mb-6 sp-leading-normal sp-font-bold`}
            value={text}
            onChange={(value) => setAttributes({ text: value })}
          />
        </div>
      </div>
    </>
  );
}
