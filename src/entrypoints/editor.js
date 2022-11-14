/* eslint-disable jsdoc/require-jsdoc */
import BlockEdit from '../editor/components/Block/edit';
import blockMetadata from '../../inc/Block/block.json';

import '../editor/styles/editor-styles.scss';

const { registerBlockType } = wp.blocks;
const { InnerBlocks } = wp.blockEditor;

wp.domReady(() => {
  registerBlockType(blockMetadata, {
    edit: BlockEdit,
    save() {
      return <InnerBlocks.Content />;
    },
  });
});
