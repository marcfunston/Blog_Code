<?php
/*
 * Title: Blogowiz Blog Entry Object
 * Author: Marc Funston
 * Purpose: This page provides the object used to build blog entries. 
 * Bugs: None known at this time
 * Last Edit Date: 4/05/2018
 * 1 - Corrected get functions
 * 
 */

class Entry
{
    public $entry_title;
    public $entry_date;
    public $entry_number;
    public $image_name;
    public $short_text;
    public $long_text; 
    public $view_number;
    public $comment = array('Bob' => 'wow!','fred' => 'no way');
    
    public function setEntry_title($entry_title) { 
        $this->entry_title = $entry_title; 
    }
    public function getEntry_title() { 
        return $this->entry_title; 
    }

    public function setEntry_date($entry_date) { 
        $this->entry_date = $entry_date; 
    }
    public function getEntry_date() { 
        return $this->entry_date; 
    }

    public function setEntry_number($entry_number) { 
        $this->entry_number = $entry_number; 
    }
    public function getEntry_number() { 
        return $this->entry_number; 
    }

    public function setImage_name($image_name) { 
        $this->image_name = $image_name; 
    }
    public function getImage_name() { 
        return $this->image_name; 
    }

    public function setShort_text($short_text) { 
        $this->short_text = $short_text; 
    }
    public function getShort_text() { 
        return $this->short_textt; 
    }

    public function setLong_text($long_text) { 
        $this->long_text = $long_text; 
    }
    public function getLong_text() { 
        return $this->long_text; 
    }

    public function setView_number($view_number) { 
        $this->view_number = $view_number; 
    }
    public function getView_number() { 
        return $this->view_number; 
    }

    public function setComment($comment) { 
        $this->comment = $comment; 
    }
    public function getComment() { 
        return $this->comment; 
    } 

    function StartEntry()
    {
        
echo"        <!-- Blog entry -->\n";
echo"         <div class=\"w3-card-4 w3-margin w3-white\">\n";
echo"           <img src=\"../uploads/$this->image_name\" alt=\"Norway\" style=\"width:100%\">\n\n";
echo"             <div class=\"w3-container\">\n";
echo"               <h3><b>$this->entry_title</b><span class=\"w3-opacity\">&nbsp&nbsp&nbsp&nbspBlog # $this->entry_number</span></h3>\n";
echo"               <h5>$this->short_text<span class=\"w3-opacity\">&nbsp&nbsp&nbsp&nbsp$this->entry_date</span></h5>\n";
echo"             </div>\n\n";
echo"             <div class=\"w3-container\">\n";
echo"               \n";
echo"               <p id=\"entry$this->entry_number\" class=\"w3-hide\">$this->long_text</p>\n\n";
echo"               </p> \n";
echo"               <div class=\"w3-row\">\n";
echo"                 <div class=\"w3-col m8 s12\">\n";
echo"                   <p><button onclick=\"myFunction('entry$this->entry_number')\" class=\"w3-button w3-padding-large w3-white w3-border\"><b>READ MORE &raquo;</b></button></p>\n";
echo"                 </div>\n";
echo"                 <div class=\"w3-col m4 w3-hide-small\">\n";
echo"                   <p><span class=\"w3-padding-large w3-right\"><b>Views &nbsp;</b> <span class=\"w3-badge\">$this->view_number</span></span></p>\n";
echo"                 </div>\n";
echo"               </div>\n";
echo"             </div>\n";
echo"           </div>\n";
echo"         <!-- END BLOG -->\n\n";
        

    }



    function EndEntry()
    {

    }


}
?>