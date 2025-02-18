import {
  RichText,
  BlockControls,
  useBlockProps,
} from "@wordpress/block-editor";
import { ToolbarGroup, ToolbarButton } from "@wordpress/components";
import textSizeVariant from "./textSize";
import tags from "./tags";

export default function EditComponent(props) {
  function handleTextChange(value) {
    props.setAttributes({ text: value });
  }
  const blockProps = useBlockProps({
    className: `${
      textSizeVariant[props.attributes.size]
    } sp-text-slate-200 sp-tracking-widest sp-uppercase`,
  });
  return (
    <>
      <BlockControls>
        <ToolbarGroup>
          {Object.keys(textSizeVariant).map((size) => (
            <ToolbarButton
              key={size}
              isPressed={props.attributes.size === size}
              onClick={() => props.setAttributes({ size })}
            >
              {size}
            </ToolbarButton>
          ))}
        </ToolbarGroup>
        <ToolbarGroup>
          {tags.map((tag) => (
            <ToolbarButton
              key={tag}
              isPressed={props.attributes.tag === tag}
              onClick={() => props.setAttributes({ tag })}
            >
              {tag}
            </ToolbarButton>
          ))}
        </ToolbarGroup>
      </BlockControls>
      <div>
        <RichText
          {...blockProps}
          value={props.attributes.text}
          onChange={handleTextChange}
          tagName={props.attributes.tag}
          placeholder={props.attributes.placeholder}
        />
      </div>
    </>
  );
}
