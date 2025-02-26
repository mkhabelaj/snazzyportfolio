import { useBlockProps, RichText } from "@wordpress/block-editor";
import textSizeVariant from "./textSize";
import { MarginInspectorSettings } from "../../../lib/script/margin/margin";

export default function EditComponent({
  attributes: { size, text, placeholder, marginB },
  setAttributes,
}) {
  const blockProps = useBlockProps();
  return (
    <>
      <MarginInspectorSettings
        marginB={marginB}
        setAttributes={setAttributes}
      />
      <div {...blockProps}>
        <div>
          <RichText
            tagName="p"
            className={`${textSizeVariant[size]} 
                sp-whitespace-pre-wrap sp-mb-5 sp-leading-tight project-paragraph`}
            value={text}
            onChange={(value) => setAttributes({ text: value })}
            placeholder={placeholder}
          />
        </div>
      </div>
    </>
  );
}
