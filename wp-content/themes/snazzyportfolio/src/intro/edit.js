import { InnerBlocks, useBlockProps } from "@wordpress/block-editor";

export default function EditComponent() {
  const blockProps = useBlockProps();
  return (
    <div {...blockProps}>
      <div className="sp-p-40 ">
        <p className="sp-text-center sp-bg-black sp-text-white">
          Developer intro
        </p>
        <InnerBlocks />
      </div>
    </div>
  );
}
