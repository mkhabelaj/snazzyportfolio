import { __ } from "@wordpress/i18n";
import {
  RichText,
  useBlockProps,
  InspectorControls,
} from "@wordpress/block-editor";
import { createBlock, getDefaultBlockName } from "@wordpress/blocks";
import { PanelBody, PanelRow, SelectControl } from "@wordpress/components";
import LanguageOptions from "./prismOptions.js";
import { MarginPanelRow } from "../../../lib/script/margin/margin";

export default function EditComponent({
  attributes: { code, lang, marginB },
  setAttributes,
  onRemove,
  mergeBlocks,
}) {
  const blockProps = useBlockProps();

  return (
    <>
      <InspectorControls>
        <PanelBody title="Programming Language" initialOpen>
          <PanelRow>
            <SelectControl
              label="Language"
              value={lang}
              onChange={(lang) => {
                setAttributes({ lang });
              }}
              options={LanguageOptions}
            />
          </PanelRow>
          <MarginPanelRow marginB={marginB} setAttributes={setAttributes} />
        </PanelBody>
      </InspectorControls>
      <div className="sp-flex sp-flex-col sp-justify-center">
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
      </div>
    </>
  );
}
