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
            className={`sp-text-${size} sp-max-w-xl sp-mb-6 sp-leading-normal sp-font-bold`}
            value={text}
            onChange={(value) => setAttributes({ text: value })}
          />
        </div>
      </div>
    </>
  );
}
