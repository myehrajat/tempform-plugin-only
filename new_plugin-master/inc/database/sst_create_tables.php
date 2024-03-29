<?php
/**************************************************
 *version 1.0.0
 *this function create core tables
 **************************************************/

function sst_create_tables() {
	global $wpdb;

	##################################################
	require_once( DBPATH . 'sst_collate_charset.php' );
	$collate_charset = sst_collate_charset();
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'options' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`key` VARCHAR(255) DEFAULT NULL," .
	"`value` LONGTEXT DEFAULT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_html_event_jsfunction' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`jsfunction` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";

	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_html_event' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`event` VARCHAR(255) NOT NULL," .
	"`jsfunction_ids` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_html_global_class' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`class` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_html_global_data' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`data_attribute` VARCHAR(255) NOT NULL," .
	"`data_value` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_html_global_itemprop' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`itemprop` VARCHAR(255) NOT NULL COMMENT 'Values:URL | String.NOTE: Disallow \':\' characters in non-URL values.Space and \'.\' is not allowed.'," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY id  (`id`)) $collate_charset;";	
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_html_global_itemref' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`itemref` VARCHAR(255) NOT NULL COMMENT 'Values:Id of other HTML element. Id rules: any string but with there are limitations as id\'s value must not contain whitespace (spaces, tabs etc.) .Using characters except ASCII letters, digits, _, - and . may cause compatibility problems, as they weren\'t allowed in HTML 4. Though this restriction has been lifted in HTML5, an ID should start with a letter for compatibility.'," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY id  (`id`)) $collate_charset;";	

	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_html_global_style' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`css_attribute` VARCHAR(255) NOT NULL COMMENT 'Values:properties defined in https://www.w3.org/Style/CSS/all-properties.en.html'," .
	"`css_value` VARCHAR(255) NOT NULL COMMENT 'Values:CSS properties values'," .
	"`important` VARCHAR(255) NOT NULL COMMENT 'Values:true | false'," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_input_file_accept' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`accept` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";

	################################################################################################################################
	# Global Attributes
	# These attributes is not specific to inputs and is for all HTML elements
	################################################################################################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_html_global' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`accesskey` VARCHAR(255) NOT NULL COMMENT 'Values:Single characters Usage:Access element by pressing ALT+Single characters'," .
	"`autocapitalize` VARCHAR(255) NOT NULL COMMENT 'Values:off or none(No capitalize letter) | on or sentences(First letter of sentence) | words(First letter of words) | characters(ALL characters uppercase)'," .
	"`class_ids` VARCHAR(255) NOT NULL COMMENT 'Values:Ids of attr_html_global_class table this support complex ids.'," .
	"`contenteditable` VARCHAR(255) NOT NULL COMMENT 'Values:true | false.'," .
	"`contextmenu` VARCHAR(255) NOT NULL COMMENT 'NOTE:This is obsolete Values:The id name of <menu> element'," .
	"`data_ids` VARCHAR(255) NOT NULL COMMENT 'Values:Ids of attr_html_global_data table this support complex ids.'," .
	"`dir` VARCHAR(255) NOT NULL COMMENT 'Values:ltr | rtl | auto. NOTE: IE/Edge does not support the auto keyword on elements'," .
	"`draggable` VARCHAR(255) NOT NULL COMMENT 'Values:true | false | auto.'," .
	"`dropzone` VARCHAR(255) NOT NULL COMMENT 'Values:copy | move | link. NOTE:The most of browser not support this attribute (Samsung browser supports). This is This is an experimental technology.'," .
	"`hidden` VARCHAR(255) NOT NULL COMMENT 'Values:true | false.'," .
	"`the_id` VARCHAR(255) NOT NULL COMMENT 'Values:Any string but with there are limitations as id\'s value must not contain whitespace (spaces, tabs etc.) .Using characters except ASCII letters, digits, _, - and . may cause compatibility problems, as they weren\'t allowed in HTML 4. Though this restriction has been lifted in HTML5, an ID should start with a letter for compatibility.'," .
	"`inputmode` VARCHAR(255) NOT NULL COMMENT 'Values:none | text | decimal | numeric | tel | search | email | url.'," .
	"`is` VARCHAR(255) NOT NULL COMMENT 'Values:JS class name. Specified custom element name has been successfully defined in the document, and extends the element type it is being applied to.'," .
	"`itemid` VARCHAR(255) NOT NULL COMMENT 'Values:The Whatwg.org definition specifies that an itemid must be a URL. However, URN may also be used. Note:An itemid attribute can only be specified for an element that has both itemscope and itemtype attributes'," .
	"`itemprop_ids` VARCHAR(255) NOT NULL COMMENT 'Values:Ids of attr_html_global_itemprop table this support complex ids.'," .
	"`itemref_ids` VARCHAR(255) NOT NULL COMMENT 'Values:Ids of attr_html_global_itemref table this support complex ids. NOTE: Itemref attribute can only be specified on elements that have an itemscope attribute specified.'," .
	"`itemscope` VARCHAR(255) NOT NULL COMMENT 'Values:Not NULL value define itemscope. NOTE:Itemscope has no value at all'," .
	"`itemtype` VARCHAR(255) NOT NULL COMMENT 'Values:URL. URL to schema project defined type see:http://schema.org/Thing'," .
	"`lang` VARCHAR(255) NOT NULL COMMENT 'Values:Language code,may with hyphen-separated language subtags. Visit this github project to see all subtag language codes:https://r12a.github.io/app-subtags/," .
	"`onevent_ids` VARCHAR(255) NOT NULL COMMENT 'Values:Ids of attr_html_event table this support complex ids.'," .
	"`slot` VARCHAR(255) NOT NULL COMMENT 'Values:The name of slot element.This is an experimental technology'," .
	"`spellcheck` VARCHAR(255) NOT NULL COMMENT 'Values:true | false.'," .
	"`style_ids` VARCHAR(255) NOT NULL COMMENT 'Values:Ids of attr_html_global_style table this support complex ids.," .
	"`tabindex` VARCHAR(255) NOT NULL COMMENT 'Values:-1 (Unreachable by tab) | 0 (Make reachable by tab) | Positive numbers (Sequence of reaching by tab).'," .
	"`title` VARCHAR(255) NOT NULL COMMENT 'Values:No limitation even multiline is acceptable.'," .
	"`translate` VARCHAR(255) NOT NULL COMMENT 'Values:yes | no.'," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY id  (`id`)) $collate_charset ".
	" COMMENT 'This table contain all HTML5 global tags this mean ALL not only input elements.'";
	##################################################
	/*
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_input_common' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`autofocus` VARCHAR(255) NOT NULL," .
	"`disabled` VARCHAR(255) NOT NULL," .
	"`form` VARCHAR(255) NOT NULL," .
	"`name` VARCHAR(255) NOT NULL," .
	"`type` VARCHAR(255) NOT NULL," .
	"`value` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
		*/
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_input_checkbox_radio' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`autofocus` VARCHAR(255) NOT NULL," .
	"`checked` VARCHAR(255) NOT NULL," .
	"`required` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_input_color' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`autocomplete` VARCHAR(255) NOT NULL," .
	"`autofocus` VARCHAR(255) NOT NULL," .
	"`list` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_input_file' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`accept_ids` VARCHAR(255) NOT NULL," .
	"`autofocus` VARCHAR(255) NOT NULL," .
	"`multiple` VARCHAR(255) NOT NULL," .
	"`required` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_input_submit' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`autofocus` VARCHAR(255) NOT NULL," .
	"`formaction` VARCHAR(255) NOT NULL," .
	"`formenctype` VARCHAR(255) NOT NULL," .
	"`formmethod` VARCHAR(255) NOT NULL," .
	"`formnovalidate` VARCHAR(255) NOT NULL," .
	"`formtarget` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_input_range' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`autocomplete` VARCHAR(255) NOT NULL," .
	"`autofocus` VARCHAR(255) NOT NULL," .
	"`list` VARCHAR(255) NOT NULL," .
	"`max` VARCHAR(255) NOT NULL," .
	"`min` VARCHAR(255) NOT NULL," .
	"`multiple` VARCHAR(255) NOT NULL," .
	"`step` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_input_date_time_related' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`autocomplete` VARCHAR(255) NOT NULL," .
	"`autofocus` VARCHAR(255) NOT NULL," .
	"`list` VARCHAR(255) NOT NULL," .
	"`max` VARCHAR(255) NOT NULL," .
	"`min` VARCHAR(255) NOT NULL," .
	"`readonly` VARCHAR(255) NOT NULL," .
	"`required` VARCHAR(255) NOT NULL," .
	"`step` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_input_password' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`autocomplete` VARCHAR(255) NOT NULL," .
	"`autofocus` VARCHAR(255) NOT NULL," .
	"`maxlength` VARCHAR(255) NOT NULL," .
	"`minlength` VARCHAR(255) NOT NULL," .
	"`pattern` VARCHAR(255) NOT NULL," .
	"`placeholder` VARCHAR(255) NOT NULL," .
	"`readonly` VARCHAR(255) NOT NULL," .
	"`required` VARCHAR(255) NOT NULL," .
	"`size` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_input_number' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`autocomplete` VARCHAR(255) NOT NULL," .
	"`autofocus` VARCHAR(255) NOT NULL," .
	"`list` VARCHAR(255) NOT NULL," .
	"`max` VARCHAR(255) NOT NULL," .
	"`min` VARCHAR(255) NOT NULL," .
	"`placeholder` VARCHAR(255) NOT NULL," .
	"`readonly` VARCHAR(255) NOT NULL," .
	"`required` VARCHAR(255) NOT NULL," .
	"`step` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_input_image' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`alt` VARCHAR(255) NOT NULL," .
	"`autofocus` VARCHAR(255) NOT NULL," .
	"`formaction` VARCHAR(255) NOT NULL," .
	"`formenctype` VARCHAR(255) NOT NULL," .
	"`formmethod` VARCHAR(255) NOT NULL," .
	"`formnovalidate` VARCHAR(255) NOT NULL," .
	"`formtarget` VARCHAR(255) NOT NULL," .
	"`height` VARCHAR(255) NOT NULL," .
	"`src` VARCHAR(255) NOT NULL," .
	"`width` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_input_tel_url' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`autocomplete` VARCHAR(255) NOT NULL," .
	"`autofocus` VARCHAR(255) NOT NULL," .
	"`list` VARCHAR(255) NOT NULL," .
	"`maxlength` VARCHAR(255) NOT NULL," .
	"`minlength` VARCHAR(255) NOT NULL," .
	"`pattern` VARCHAR(255) NOT NULL," .
	"`placeholder` VARCHAR(255) NOT NULL," .
	"`readonly` VARCHAR(255) NOT NULL," .
	"`required` VARCHAR(255) NOT NULL," .
	"`size` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_input_email' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`autocomplete` VARCHAR(255) NOT NULL," .
	"`autofocus` VARCHAR(255) NOT NULL," .
	"`list` VARCHAR(255) NOT NULL," .
	"`maxlength` VARCHAR(255) NOT NULL," .
	"`minlength` VARCHAR(255) NOT NULL," .
	"`multiple` VARCHAR(255) NOT NULL," .
	"`pattern` VARCHAR(255) NOT NULL," .
	"`placeholder` VARCHAR(255) NOT NULL," .
	"`readonly` VARCHAR(255) NOT NULL," .
	"`required` VARCHAR(255) NOT NULL," .
	"`size` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'attr_input_text_search' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`autocomplete` VARCHAR(255) NOT NULL," .
	"`autofocus` VARCHAR(255) NOT NULL," .
	"`dirname` VARCHAR(255) NOT NULL," .
	"`list` VARCHAR(255) NOT NULL," .
	"`maxlength` VARCHAR(255) NOT NULL," .
	"`minlength` VARCHAR(255) NOT NULL," .
	"`pattern` VARCHAR(255) NOT NULL," .
	"`placeholder` VARCHAR(255) NOT NULL," .
	"`readonly` VARCHAR(255) NOT NULL," .
	"`required` VARCHAR(255) NOT NULL," .
	"`size` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'language' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`language` VARCHAR(255) NOT NULL," .
	"`direction` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'input_type' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`html_type` VARCHAR(255) NOT NULL," .
	"`type` VARCHAR(255) NOT NULL," .
	"`function` VARCHAR(255) NOT NULL," .
	"`description` LONGTEXT NOT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	###################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'input' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`disabled` VARCHAR(255) NOT NULL," .
	"`form` VARCHAR(255) NOT NULL," .
	"`name` VARCHAR(255) NOT NULL," .
	"`type` VARCHAR(255) NOT NULL," .
	"`value` VARCHAR(255) NOT NULL," .
	"`attr_html_global_id` VARCHAR(255) NOT NULL," .//these include all html global attributes
	"`attr_input_specific_id` VARCHAR(255) NOT NULL," .//these include input type specific ones
	"`label_id_before` VARCHAR(255) NOT NULL," .
	"`label_id_after` VARCHAR(255) NOT NULL," .
	"`meta_ids` VARCHAR(255) NOT NULL," .
	"`pack_id` VARCHAR(255) NOT NULL," .
	"`controller_id`  VARCHAR(255) DEFAULT NULL," . //this is an attribute of field but is here
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";

	
	/*
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS  " . $GLOBALS[ 'sst_tables' ][ 'select_options' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`type` VARCHAR(255) NOT NULL," . //option or optgroup
	"`label` VARCHAR(255) NOT NULL," .
	"`content` VARCHAR(255) NOT NULL," .
	"`value` VARCHAR(255) NOT NULL," .
	"`optgroup_id` VARCHAR(255) DEFAULT NULL," . //if all options are in optgroups use only the top level optgroups ids
	"`order_type` VARCHAR(255) NOT NULL," . //define the order type ascending/ descending/ non
	"`selected` VARCHAR(255) NOT NULL," .
	"`language_id` VARCHAR(255) NOT NULL," .
	"`event_ids` VARCHAR(255) NOT NULL," .
	"`appearance_id` VARCHAR(255) NOT NULL," .
	"`disabled` VARCHAR(255) NOT NULL," .
	"`the_id`  VARCHAR(255) DEFAULT NULL," . //this is an attribute of field but is here
	"`meta_ids` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################

	$sql[] = "CREATE TABLE IF NOT EXISTS  " . $GLOBALS[ 'sst_tables' ][ 'standard' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`value` LONGTEXT NOT NULL," .
	"`option_ids` VARCHAR(255) NOT NULL," .
	"`order_type` VARCHAR(255) NOT NULL," . //define the order type ascending/ descending/ non
	"`checked` VARCHAR(255) NOT NULL," .
	"`max` VARCHAR(255) NOT NULL," . //ADDED NEW HTML5
	"`min` VARCHAR(255) NOT NULL," . //ADDED NEW HTML5
	"`pattern` VARCHAR(255) NOT NULL," . //ADDED NEW HTML5
	"`required` VARCHAR(255) NOT NULL," . //ADDED NEW HTML5
	"`step` VARCHAR(255) NOT NULL," . //ADDED NEW HTML5
	"`maxlength` VARCHAR(255) NOT NULL," .
	"`size` VARCHAR(255) NOT NULL," .
	"`cols` VARCHAR(255) NOT NULL," .
	"`rows` VARCHAR(255) NOT NULL," .
	"`wrap` VARCHAR(255) NOT NULL," .
	"`label` VARCHAR(255) NOT NULL," .
	"`content` LONGTEXT NOT NULL," .
	"`multiple` VARCHAR(255) NOT NULL," .
	"`disabled` VARCHAR(255) NOT NULL," .
	"`readonly` VARCHAR(255) NOT NULL," .
	"`alt` VARCHAR(255) NOT NULL," .
	"`scr` VARCHAR(255) NOT NULL," .
	"`ismap` VARCHAR(255) NOT NULL," .
	"`usemap` VARCHAR(255) NOT NULL," .
	"`dynscr` VARCHAR(255) NOT NULL," .
	"`loop` VARCHAR(255) NOT NULL," .
	"`datafld` VARCHAR(255) NOT NULL," .
	"`datascr` VARCHAR(255) NOT NULL," .
	"`height` VARCHAR(255) NOT NULL," .
	"`width` VARCHAR(255) NOT NULL," .
	"`hspace` VARCHAR(255) NOT NULL," .
	"`vspace` VARCHAR(255) NOT NULL," .
	"`meta_ids` VARCHAR(255) NOT NULL," .
	"`standard_db_id` VARCHAR(255) NOT NULL," .
	"`standard_condition_ids` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'standard_db' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`table` VARCHAR(255) NOT NULL," .
	"`value_col` VARCHAR(255) NOT NULL," .
	"`value_function` LONGTEXT NOT NULL," .
	"`label_col` VARCHAR(255) NOT NULL," .
	"`label_function` LONGTEXT NOT NULL," .
	"`id_col` VARCHAR(255) NOT NULL," .
	"`id_function` LONGTEXT NOT NULL," .
	"`order` VARCHAR(255) NOT NULL," .
	"`where` VARCHAR(255) NOT NULL," .
	"`group` VARCHAR(255) NOT NULL," .
	"`having` VARCHAR(255) NOT NULL," .
	"`limit` VARCHAR(255) NOT NULL," .
	"`join` VARCHAR(255) NOT NULL," .
	"`custom_query` LONGTEXT NOT NULL," .
	"`next_id` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'standard_condition' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`operator` VARCHAR(255) NOT NULL," .
	"`value` VARCHAR(255) NOT NULL," .
	"`dependent_field_id` VARCHAR(255) NOT NULL," .
	"`dependent_select_option_ids` VARCHAR(255) NOT NULL," .
	"`dependent_standard_db_id` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'standard_meta' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`attribute` VARCHAR(255) NOT NULL," .
	"`value` LONGTEXT NOT NULL," .
	"`description` LONGTEXT NOT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'pack' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`pre` VARCHAR(255) NOT NULL," .
	"`post` VARCHAR(255) NOT NULL," .
	"`the_id` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'default_pack' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`form` VARCHAR(255) NOT NULL," .
	"`block` VARCHAR(255) NOT NULL," .
	"`field` VARCHAR(255) NOT NULL," .
	"`input` VARCHAR(255) NOT NULL," .
	"`label` VARCHAR(255) NOT NULL," .
	"`text` VARCHAR(255) NOT NULL," .
	"`note` VARCHAR(255) NOT NULL," .
	"`tooltip` VARCHAR(255) NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'label' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`text` VARCHAR(255) NOT NULL," .
	"`note` VARCHAR(255) NOT NULL," .
	"`tooltip` VARCHAR(255) NOT NULL," .
	"`appearance_id` VARCHAR(255) NOT NULL," .
	"`pack_id` VARCHAR(255) NOT NULL," .
	"`the_id`  VARCHAR(255) DEFAULT NULL," .
	"`default_pack_id`  VARCHAR(255) DEFAULT NULL," .
	"`description` LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'field' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`label_id_before` VARCHAR(255) NOT NULL," .
	"`label_id_after` VARCHAR(255) NOT NULL," .
	"`input_ids` VARCHAR(255) NOT NULL," .
	"`required` VARCHAR(255) NOT NULL," .
	"`extra` VARCHAR(255) NOT NULL," .
	"`max_extra` VARCHAR(255) NOT NULL," .
	"`appearance_id` VARCHAR(255) NOT NULL," .
	"`pack_id` VARCHAR(255) NOT NULL," .
	"`the_id`  VARCHAR(255) DEFAULT NULL," .
	"`default_pack_id`  VARCHAR(255) DEFAULT NULL," .
	"`show_to`  VARCHAR(255) DEFAULT NULL," .
	"`hide_from`  VARCHAR(255) DEFAULT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'block' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`field_ids` VARCHAR(255) NOT NULL," .
	"`block_ids` VARCHAR(255) NOT NULL," .
	"`required_field_ids` VARCHAR(255) NOT NULL," .
	"`extra` VARCHAR(255) NOT NULL," .
	"`max_extra` VARCHAR(255) NOT NULL," .
	"`appearance_id` VARCHAR(255) NOT NULL," .
	"`pack_id` VARCHAR(255) NOT NULL," .
	"`the_id`  VARCHAR(255) DEFAULT NULL," .
	"`default_pack_id` VARCHAR(255) DEFAULT NULL," .
	"`show_to` VARCHAR(255) DEFAULT NULL," .
	"`hide_from` VARCHAR(255) DEFAULT NULL," .
	"`description` LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'condition' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`condition` VARCHAR(255) DEFAULT NULL," . //else/the condition
	"`next_id` VARCHAR(255) DEFAULT NULL," .
	"`goto` VARCHAR(255) DEFAULT NULL," .
	"`value` LONGTEXT NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'data_action_colval' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`type` VARCHAR(255) NOT NULL," . //constant/variable/code
	"`reference` VARCHAR(255) NOT NULL," . //the changed data will be saved in $ref['field_name']
	"`column` VARCHAR(255) NOT NULL," .
	"`value` LONGTEXT NOT NULL," .
	"`file_destination` LONGTEXT NOT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'data_action' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`type` VARCHAR(255) NOT NULL," . //all/all-unsaved/simple/extra-simple/option/extra-option
	"`insert_reference` VARCHAR(255) NOT NULL," . //
	"`table` VARCHAR(255) NOT NULL," .
	"`extra_special` VARCHAR(255) NOT NULL," . //a hidden field for checking that is there any extra for blocks or fields
	"`colval_ids` VARCHAR(255) NOT NULL," .
	"`default_file_destination` LONGTEXT NULL," .
	"`allow_duplicate` LONGTEXT NULL," . //check that the duplicate entry is allowed. 1=yes/0 or null=no
	"`func_before`  LONGTEXT DEFAULT NULL," .
	"`func_after`  LONGTEXT DEFAULT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'form' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`epithet` VARCHAR(255) NOT NULL," .
	"`slug` VARCHAR(255) NOT NULL," .
	"`block_ids` VARCHAR(255) NOT NULL," .
	"`field_ids` VARCHAR(255) NOT NULL," .
	"`required_field_ids` VARCHAR(255) NOT NULL," .
	"`method` VARCHAR(255) NOT NULL," . //post/get
	"`name` VARCHAR(255) NOT NULL," .
	"`target` VARCHAR(255) NOT NULL," . //_top/_parent/_self/_new/_blank
	"`enctype` VARCHAR(255) NOT NULL," . //"multipart/form-data"/"application/x-www-form-urlencoded"/any other mime type
	"`action` VARCHAR(255) NOT NULL," .
	"`header` LONGTEXT NULL," .
	"`footer` LONGTEXT NULL," .
	"`data_action_ids` VARCHAR(255) NOT NULL," .
	"`condition_ids` VARCHAR(255) NOT NULL," .
	"`appearance_id` INT(10) NOT NULL," .
	"`language_id` INT(10) NOT NULL," .
	"`event_ids` VARCHAR(255) NOT NULL," .
	"`pack_id` INT(10) NOT NULL," .
	"`the_id`  VARCHAR(255) DEFAULT NULL," .
	"`default_pack_id`  VARCHAR(255) DEFAULT NULL," .
	"`show_to`  VARCHAR(255) DEFAULT NULL," .
	"`hide_from`  VARCHAR(255) DEFAULT NULL," .
	"`func_before`  LONGTEXT DEFAULT NULL," .
	"`func_after`  LONGTEXT DEFAULT NULL," .
	"`description` LONGTEXT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
	##################################################
	$sql[] = "CREATE TABLE IF NOT EXISTS " . $GLOBALS[ 'sst_tables' ][ 'vals' ] . " (" .
	"`id` INT(10) NOT NULL auto_increment," .
	"`key` LONGTEXT DEFAULT NULL," .
	"`value` LONGTEXT DEFAULT NULL," .
	"`description`  LONGTEXT DEFAULT NULL," .
	"`owner` VARCHAR(255) DEFAULT NULL," .
	"`created` DATETIME NOT NULL DEFAULT NOW()," .
	"`modified` DATETIME NOT NULL DEFAULT NOW(),
        PRIMARY KEY id  (`id`)) $collate_charset;";
*/
	foreach ( $sql as $table_query ) {
		$wpdb->query( $table_query );
		if ( $wpdb->last_error !== '' ) {
			echo $GLOBALS[ 'sst_errors' ][ 0 ];
			$wpdb->print_error();
			sst_error_log( 'Creation tables failed due to syntax error.' );
			die;
		}
	}
}
sst_create_tables();