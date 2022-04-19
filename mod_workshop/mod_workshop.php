
<?php

defined('_JEXEC') || die('Restricted access');


/*Note*/
/*new way of creating extensions in joomla 3.8 and higher
    using namespaces
    first it was used to be Jplugin
*/

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Factory;

class PlgDummy extends CMSPlugin{

   
    public function onBeforeCompileHead(){
       $dumdum = $this->params->get('mytextarea',"HI");
      echo "alert('$dumdum')"; 
        $app = Factory::getApplication();
        if($app->isClient('administrator')){
            return;
        }
        $document = Factory::getDocument();
      /* $ama = "
         <script type='text/javascript'>
             wnidow.addEvent('domready, function() {
            alert('go');
             });
         </script>

       ";
       $document->addScriptDeclaration($ama);*/

        //Factory::getDocument()->addScriptDeclaration("var page_task_container.innerHTML= '$dumdum' ");
        //$document->addScript('/plugins/system/mod_workshop/dummy.js');

       $document->addScriptDeclaration('
            wnidow.addEventListner("DOMContentLoaded", function() {
                alert("go");
                var change = document.getElementsByClassName("page-header");

                var allheadings = change[0].querySelectorAll("h1,h2,h3,h4,h5,h6");
                allheadings.forEach((hTag,i) => {
                    document.getElementsByTagName(hTag).innerHTML =$dumdum;   
                });
            });
        ');
        //Factory::getDocument()->addScriptDeclaration("var page_task_container.innerHTML= '$dumdum'");
    }
        
}
?>
<head>

    <script type="text/javascript">
        window.addEventListener("DOMContentLoaded",()=>{

                alert("lo");
                var change = document.getElementsByTagName("body");

                var allheadings = change[0].querySelectorAll("h1,h2,h3,h4,h5,h6");
                allheadings.forEach((hTag,i) => {
                    console.log(hTag);
                    document.getElementsByTagName(hTag).value ="Arzit"; 
                    console.log(hTag);
  
                });
        });

    </script>
</head>

