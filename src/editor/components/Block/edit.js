/* eslint-disable react/jsx-props-no-spreading */
const { useBlockProps } = wp.blockEditor;
/**
 * Edit component.
 *
 * @component
 * @param {object} props
 */
const Edit = () => {
  const blockProps = useBlockProps();
  return <p {...blockProps}>Boilerplate Editor</p>;
};

export default Edit;
