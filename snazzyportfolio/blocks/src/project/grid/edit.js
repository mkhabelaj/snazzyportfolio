import { useBlockProps } from "@wordpress/block-editor";

export default function Edit() {
  const blockProps = useBlockProps();
  return (
    <div {...blockProps}>
      <div
        className="
        sp-font-inter
        selection:sp-bg-teal-300 
        selection:sp-text-teal-900 
        sp-leading-relaxed
        sp-antialiased
        sp-flex sp-items-center 
         sp-flex-col 
        sp-text-center
        sp-p-10
        sp-text-5xl
        sp-font-bold
        "
      >
        Project Grid Placeholder
      </div>
    </div>
  );
}
