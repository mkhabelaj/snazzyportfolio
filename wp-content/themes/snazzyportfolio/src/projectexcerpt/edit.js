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
            className={`${textSizeVariant[size]} 
                sp-italic md:sp-max-w-[600px] sp-whitespace-pre-wrap my-5 sp-font-medium sp-leading-tight`}
            value={text}
            onChange={(value) => setAttributes({ text: value })}
          />
        </div>
      </div>
    </>
  );
}
