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
            tagName="p"
            className={`sp-text-base sp-md:text-${size} sp-mb-3 sp-font-medium sp-text-slate-200`}
            value={text}
            onChange={(value) => setAttributes({ text: value })}
          />
        </div>
      </div>
    </>
  );
}
