import { RichText, useBlockProps } from "@wordpress/block-editor";
import textSizeVariant from "./textSize";

export default function SaveComponent(props) {
  const blockProps = useBlockProps.save({
    className: `${
      textSizeVariant[props.attributes.size]
    } sp-text-slate-200 sp-tracking-widest sp-uppercase`,
  });
  return (
    <RichText.Content
      {...blockProps}
      value={props.attributes.text}
      tagName={props.attributes.tag}
    />
  );
}
