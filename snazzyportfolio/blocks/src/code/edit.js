import { __ } from "@wordpress/i18n";
import { RichText, useBlockProps } from "@wordpress/block-editor";
import { createBlock, getDefaultBlockName } from "@wordpress/blocks";

export default function EditComponent({
  attributes: { code },
  setAttributes,
  onRemove,
  mergeBlocks,
}) {
  const blockProps = useBlockProps();

  return (
    <pre {...blockProps}>
      <RichText
        tagName="code"
        identifier="content"
        value={code}
        onChange={(code) => setAttributes({ code })}
        onRemove={onRemove}
        onMerge={mergeBlocks}
        placeholder={__("Write code…")}
        aria-label={__("Code")}
        preserveWhiteSpace
        __unstablePastePlainText
        __unstableOnSplitAtDoubleLineEnd={() =>
          insertBlocksAfter(createBlock(getDefaultBlockName()))
        }
      />
    </pre>
  );
}
