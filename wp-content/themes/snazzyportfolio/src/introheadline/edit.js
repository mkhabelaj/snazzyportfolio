import { useBlockProps, RichText } from "@wordpress/block-editor";

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
            className={`sp-text-4xl sp-md:sp-text-${size} mb-1 md:mb-3 font-bold text-slate-200`}
            value={text}
            onChange={(value) => setAttributes({ text: value })}
          />
        </div>
      </div>
    </>
  );
}
