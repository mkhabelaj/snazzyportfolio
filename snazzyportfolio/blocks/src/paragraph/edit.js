import { useBlockProps, RichText } from "@wordpress/block-editor";
import textSizeVariant from "./textSize";

export default function EditComponent({
  attributes: { size, text, placeholder },
  setAttributes,
}) {
  const blockProps = useBlockProps();
  return (
    <>
      <div {...blockProps}>
        <div>
          <RichText
            tagName="p"
            className={`${textSizeVariant[size]} 
                sp-whitespace-pre-wrap sp-my-5 sp-leading-tight project-paragraph`}
            value={text}
            onChange={(value) => setAttributes({ text: value })}
            placeholder={placeholder}
          />
        </div>
      </div>
    </>
  );
}
