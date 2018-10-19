/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */


CKEDITOR.editorConfig = function( config ) {


    config.extraPlugins = 'eqneditor';
    config.toolbarGroups = [
        { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
        { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
        { name: 'links' },
        { name: 'insert' },
        { name: 'forms' },
        { name: 'tools' },
        { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] },
        { name: 'others' },
        '/',
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
        { name: 'styles' },
        { name: 'colors' },
        { name: 'about' }
    ];

    
    config.removeButtons = 'Underline,Subscript,Superscript';
    config.format_tags = 'p;h1;h2;h3;pre';
    config.removeDialogTabs = 'image:advanced;link:advanced';
    config.extraPlugins = 'uploadimage';
    config.extraPlugins = 'mathjax';
    config.forceSimpleAmpersand = true;

};





 <script data-sample="1">
                CKEDITOR.replace( 'editor', {
                            toolbar : [ [ 'EqnEditor', 'Bold', 'Italic' ] ]
            extraPlugins: 'mathjax',
             extraPlugins = 'eqneditor',
            mathJaxLib: 'http://cdn.mathjax.org/mathjax/2.6-latest/MathJax.js?config=TeX-AMS_HTML',
            height: 320

                    // Configure your file manager integration. This example uses CKFinder 3 for PHP.
                    filebrowserBrowseUrl: 'test/ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl: '/test/ckfinder/ckfinder.html?type=Images',
                    filebrowserUploadUrl: '/test/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl: '/test/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
                } );

                    if ( CKEDITOR.env.ie && CKEDITOR.env.version == 8 ) {
            document.getElementById( 'ie8-warning' ).className = 'tip alert';
        }
            </script>
