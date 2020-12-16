/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.fillEmptyBlocks = false;
	config.entities = false;
	config.basicEntities = false;
	config.baseHref='<?php echo $this->config->item('base_url');?>';

	config.removeDialogTabs = 'image:advanced'; 
   config.filebrowserUploadMethod = 'form';
	config.filebrowserBrowseUrl = 'http://localhost/stu-quiz/editor/kcfinder/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl = 'http://localhost/stu-quiz/editor/kcfinder/browse.php?opener=ckeditor&type=images';
   //config.filebrowserFlashBrowseUrl = 'kcfinder/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl = 'http://localhost/stu-quiz/editor/kcfinder/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl = 'http://localhost/stu-quiz/editor/kcfinder/upload.php?opener=ckeditor&type=images';
   //config.filebrowserFlashUploadUrl = 'kcfinder/upload.php?opener=ckeditor&type=flash';
};
