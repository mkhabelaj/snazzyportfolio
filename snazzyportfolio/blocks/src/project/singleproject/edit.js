import { useBlockProps } from "@wordpress/block-editor";

export default function Edit() {
  const blockProps = useBlockProps();
  return (
    <div {...blockProps}>
      <div
        className="
        sp-font-inter
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
        Single Project Placeholder
      </div>
    </div>
  );
}
