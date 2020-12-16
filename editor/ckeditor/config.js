/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
var base_url = "https://daitunglamhoasen.org/";
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.fillEmptyBlocks = false;
	config.entities = false;
	config.basicEntities = false;
	config.baseHref=base_url;

	config.removeDialogTabs = 'image:advanced'; 
   config.filebrowserUploadMethod = 'form';
	config.filebrowserBrowseUrl =  base_url+'editor/kcfinder/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl = base_url+'editor/kcfinder/browse.php?opener=ckeditor&type=images';
   //config.filebrowserFlashBrowseUrl = 'kcfinder/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl = base_url+'editor/kcfinder/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl =  base_url+'editor/kcfinder/upload.php?opener=ckeditor&type=images';
   //config.filebrowserFlashUploadUrl = 'kcfinder/upload.php?opener=ckeditor&type=flash';
};
