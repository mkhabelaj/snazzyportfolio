import { useBlockProps, RichText } from "@wordpress/block-editor";
import textSizeVariant from "./textSize";

export default function EditComponent({
  attributes: { size, text },
  setAttributes,
}) {
  const blockProps = useBlockProps({
    className: "sp-w-[950px] sp-flex sp-justify-center",
  });
  //variant text-sm-lg
  return (
    <>
      <div {...blockProps}>
        <RichText
          tagName="p"
          className={`${textSizeVariant[size]} md:sp-max-w-[850px] sp-mb-6 sp-leading-normal sp-font-bold text-center`}
          value={text}
          onChange={(value) => setAttributes({ text: value })}
        />
      </div>
    </>
  );
}
