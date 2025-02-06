import { registerBlockType } from "@wordpress/blocks";
import metadata from "./block.json";
import Edit from "./edit";
import { RichText } from "@wordpress/block-editor";

import Prism from "prismjs";

registerBlockType(metadata.name, {
  edit: Edit,
  save: (props) => {
    const highlightedCode = Prism.highlight(
      props.attributes.code,
      Prism.languages.javascript,
      "javascript",
    );
    return (
      <div className="main-content">
        <div class="sub-main-content">
          <pre className="language-js" tabIndex="0">
            <code
              className="language-js"
              dangerouslySetInnerHTML={{ __html: highlightedCode }}
            />
          </pre>
        </div>
      </div>
    );
  },
});
