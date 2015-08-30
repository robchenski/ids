<?php defined('C5_EXECUTE') or die(_("Access Denied."));
 
/* Override core model so TinyMCE editor looks for /css/tinymce.css instead of typography.css 
 
class PageThemeEditableStyle extends Concrete5_Model_PageThemeEditableStyle {}
class PageThemeEditableStyleFont extends Concrete5_Model_PageThemeEditableStyleFont {}
class PageThemeFile extends Concrete5_Model_PageThemeFile {}
 
class PageTheme extends Concrete5_Model_PageTheme {
    public function getThemeEditorCSS() {
        $theme_dir = $this->ptURL . '/';
        $css_file = 'css/tinymce.css'; //<--change this as needed
        return $theme_dir . $css_file;
    }
}*/
public function registerAssets()
{
 //   $this->requireAsset('css', 'font-awesome');
    $this->requireAsset('javascript', 'jquery');
}