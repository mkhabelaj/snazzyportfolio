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
            className={`${textSizeVariant[size]} sp-mt-4  s-mb-5 sp-text-slate-200 sp-tracking-widest`}
            value={text}
            onChange={(value) => setAttributes({ text: value })}
          />
        </div>
      </div>
    </>
  );
}
