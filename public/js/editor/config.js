﻿/*
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
        config.filebrowserBrowseUrl ='http://en.tancangmientrung.local/public/js/ckfinder/ckfinder.html';
        config.filebrowserImageBrowseUrl = 'http://en.tancangmientrung.local/public/js/ckfinder/ckfinder.html?type=Images';
        config.filebrowserFlashBrowseUrl = 'http://en.tancangmientrung.local/public/js/ckfinder/ckfinder.html?type=Flash';
        config.filebrowserUploadUrl = 'http://en.tancangmientrung.local/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
        config.filebrowserImageUploadUrl = 'http://en.tancangmientrung.local/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
        config.filebrowserFlashUploadUrl = 'http://en.tancangmientrung.local/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
