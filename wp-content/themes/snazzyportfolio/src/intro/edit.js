import { InnerBlocks, useBlockProps } from "@wordpress/block-editor";

export default function EditComponent() {
  const blockProps = useBlockProps();
  return (
    <div {...blockProps}>
      <div
        className="
        sp-bg-slate-900 
        sp-text-slate-400 
        sp-font-inter
        sp-selection:bg-teal-300 
        sp-selection:text-teal-900 
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
