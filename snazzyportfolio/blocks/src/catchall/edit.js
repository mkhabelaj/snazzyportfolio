import { useBlockProps } from "@wordpress/block-editor";

export default function Edit() {
  const blockProps = useBlockProps();
  return (
    <div {...blockProps}>
      <p className="sp-text-md project-paragraph sp-whitespace-pre-wrap sp-my-5 sp-font-medium sp-leading-tight">
        Catchall - like a 404
      </p>
    </div>
  );
}
