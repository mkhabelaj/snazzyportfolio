import { useBlockProps, RichText } from "@wordpress/block-editor";
import textSizeVariant from "./textSize";

export default function EditComponent({
  attributes: { size, text },
  setAttributes,
}) {
  const blockProps = useBlockProps();
  return (
    <>
      <div {...blockProps}>
        <div>
          <RichText
            tagName="h1"
            className={`sp-text-4xl ${textSizeVariant[size]} sp-mb-1 md:sp-mb-3 sp-font-bold sp-text-slate-200`}
            value={text}
            onChange={(value) => setAttributes({ text: value })}
          />
        </div>
      </div>
    </>
  );
}
