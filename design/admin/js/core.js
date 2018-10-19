/* Custom JS */
/**
 * DEVANDA ANDREVIANTO - devanda.work@gmail.com, devandaandresmg@gmail.com
 * 
 */

$(window).load(function(){
  $(".loaderpage").fadeOut("slow");
});

// CKEDITOR
$(document).ready(function(){
    // CKEDITOR.replace('editor');
    $(".textarea").wysihtml5();

    $("#btnbrowse").click(function(){
       window.KCFinder = {
          callBack: function(url) {
             $('#header_post').val(url);
             window.KCFinder = null;             
          }
       };
       window.open(base_url_+"assets/jLib/kcfinder/browse.php?type=images", 'kcfinder_textbox',
       'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
       'resizable=1, scrollbars=0, width=100, height=600'
       );
       return false;
    });

 });

if (document.getElementById("soal") != null) {
    var ckeditor = CKEDITOR.replace('soal', {
        filebrowserBrowseUrl: base_url_+"design/admin/js/kcfinder/browse.php?type=files",
        filebrowserImageBrowseUrl: base_url_+"design/admin/js/kcfinder/browse.php?type=images",
        filebrowserFlashBrowseUrl: base_url_+"design/admin/js/kcfinder/browse.php?type=flash",
        filebrowserUploadUrl: base_url_+"design/admin/js/kcfinder/upload.php?type=files",
        filebrowserImageUploadUrl: base_url_+"design/admin/js/kcfinder/upload.php?type=images",
        filebrowserFlashUploadUrl: base_url_+"design/admin/js/kcfinder/upload.php?type=flash"
    });
    CKEDITOR.disableAutoInline = true;
}

if (document.getElementById("editor") != null) {
    var ckeditor = CKEDITOR.replace('editor', {
        filebrowserBrowseUrl: base_url_+"design/admin/js/kcfinder/browse.php?type=files",
        filebrowserImageBrowseUrl: base_url_+"design/admin/js/kcfinder/browse.php?type=images",
        filebrowserFlashBrowseUrl: base_url_+"design/admin/js/kcfinder/browse.php?type=flash",
        filebrowserUploadUrl: base_url_+"design/admin/js/kcfinder/upload.php?type=files",
        filebrowserImageUploadUrl: base_url_+"design/admin/js/kcfinder/upload.php?type=images",
        filebrowserFlashUploadUrl: base_url_+"design/admin/js/kcfinder/upload.php?type=flash"
    });
    CKEDITOR.disableAutoInline = true;
}

// END CKEDITOR
