/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'ru';

	// config.uiColor = '#AADC6E';

    // разрешить теги <style>
    config.protectedSource.push(/<(style)[^>]*>.*<\/style>/ig);
    // разрешить теги <script>
    config.protectedSource.push(/<(script)[^>]*>.*<\/script>/ig);

    config.allowedContent = true;

    // разрешить php-код
    // config.protectedSource.push(/<\?[\s\S]*?\?>/g);
    
    // разрешить любой код: <!--dev-->код писать вот тут<!--/dev-->
    // config.protectedSource.push(/<!--dev-->[\s\S]*<!--\/dev-->/g);

};
