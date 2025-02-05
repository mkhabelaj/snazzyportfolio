import { InnerBlocks, useBlockProps } from "@wordpress/block-editor";

export default function EditComponent() {
  const blockProps = useBlockProps();
  return (
    <div {...blockProps}>
      <div
        className="
        sp-font-inter
        sp-leading-relaxed
        sp-antialiase
        sp-flex sp-items-center 
        sp-justify-center sp-flex-col 
        sp-text-center
        sp-p-10
        "
      >
        <p>Developer intro</p>
        <InnerBlocks />
      </div>
    </div>
  );
}
