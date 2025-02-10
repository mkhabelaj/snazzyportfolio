import { registerBlockType } from "@wordpress/blocks";
import metadata from "./block.json";
import Edit from "./edit";
import { useInnerBlocksProps } from "@wordpress/block-editor";

import Prism from "prismjs";

registerBlockType(metadata.name, {
  edit: Edit,
  save: (props) => {
    const language = props.attributes.lang;
    const className = `language-${language}`;
    const blockProps = useInnerBlocksProps.save({
      className: "sp-mb-4 md:sp-mb-8",
    });
    const highlightedCode = Prism.highlight(
      props.attributes.code,
      Prism.languages.javascript,
      language,
    );
    return (
      <div {...blockProps}>
        <pre className={className} tabIndex="0">
          <code
            className={className}
            dangerouslySetInnerHTML={{ __html: highlightedCode }}
          />
        </pre>
      </div>
    );
  },
});
