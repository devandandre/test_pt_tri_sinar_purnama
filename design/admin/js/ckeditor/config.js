/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// rest of config
    config.extraPlugins = 'dragdrop';
    config.FormatOutput = 'false' ;

    // configure the backend service and credentials
    // aws requires a few extra..
    config.dragdropConfig = {
    backend: 's3',
    settings: {
    bucket: 'bucketname',
    region: 'your-region',
    accessKeyId: 'key',
    secretAccessKey: 'secret-key'
    }
    };
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
