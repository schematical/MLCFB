<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user1a
 * Date: 4/7/13
 * Time: 3:18 PM
 * To change this template use File | Settings | File Templates.
 */
class MJaxFBShareLink extends MJaxLinkButton{
    protected $intAppId = null;//app_id - Your app's unique identifier. Required.
    protected $strRedirectUri = null;//redirect_uri - The URL to redirect to after a person clicks a button on the dialog. Required when using URL redirection.
    protected $strDisplay = 'popup';//display - Determines how the dialog is rendered.
    protected $strFrom = null;//from - The ID or username of the person posting the message. If this is unspecified, it defaults to the current person. If specified, it must be the ID of the person or of a page that the person administers.
    protected $strTo = null;//to - The ID or username of the profile that this story will be published to. If this is unspecified, it defaults to the value of from.
    protected $strLink = null;//link -The link attached to this post
    protected $strPictureUrl = null;//picture - The URL of a picture attached to this post. The picture must be at least 200px by 200px. See our documentation on maximizing distribution for media content for more information on sizes.
    protected $strAttachemntUrl = null;//source - The URL of a media file (either SWF or MP3) attached to this post. If both source and picture are specified, only source is used.
    protected $strAttachmentName = null;//name - The name of the link attachment.
    protected $strCaption = null;//caption - The caption of the link (appears beneath the link name). If not specified, this field is automatically populated with the URL of the link.
    protected $strDescription = null;//description - The description of the link (appears beneath the link caption). If not specified, this field is automatically populated by information scraped from the link, typically the title of the page.
    protected $arrProperties = array();//properties - A JSON object of key/value pairs which will appear in the stream attachment beneath the description, with each property on its own line. Keys must be strings, and values can be either strings or JSON objects with the keys text and href.
    protected $arrActions = array();//actions - A JSON array containing a single object describing the action link which will appear next to the 'Comment' and 'Like' link under posts. The contained object must have the keys name and link.
    protected $strRef = null;//ref - A string (must be less than 50 characters and contain only alphanumeric or +/=-.:_ characters) reference for the category of feed post. This category is used in Facebook Insights to help you measure the performance of different types of post




    public function __construct($objParentControl,$strControlId = null) {
        parent::__construct($objParentControl,$strControlId);
        if(defined('FB_APP_ID')){
            $this->intAppId = FB_APP_ID;
        }
        if(defined('FB_APP_REDIRECT_URI')){
            $this->strRedirectUri = FB_APP_REDIRECT_URI;
        }
        $this->Attr('target','_blank');
        //$this->objForm->AddJSCall('!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");');

    }

    public function UpdateUrl(){
        $strHref = 'https://www.facebook.com/dialog/feed?';
        $arrUrlData = array();
        if(!is_null($this->intAppId)){
            $arrUrlData['app_id'] = $this->intAppId;
        }
        if(!is_null($this->strRedirectUri)){
            $arrUrlData['redirect_uri'] = $this->strRedirectUri;
        }
        if(!is_null($this->strDisplay)){
            $arrUrlData['display'] = $this->strDisplay;
        }
        if(!is_null($this->strTo)){
            $arrUrlData['to'] = $this->strTo;
        }
        if(!is_null($this->strFrom)){
            $arrUrlData['from'] = $this->strFrom;
        }
        if(!is_null($this->strPictureUrl)){
            $arrUrlData['picture'] = $this->strPictureUrl;
        }
        if(!is_null($this->strCaption)){
            $arrUrlData['caption'] = $this->strCaption;
        }
        if(!is_null($this->strDescription)){
            $arrUrlData['description'] = $this->strDescription;
        }
        if(!is_null($this->strLink)){
            $arrUrlData['link'] = $this->strLink;
        }
        if(!is_null($this->strRef)){
            $arrUrlData['ref'] = $this->strRef;
        }


        $strHref .= http_build_query($arrUrlData);
        $this->Href = $strHref;
        $this->Attr('href', $strHref);
    }
    /////////////////////////
    // Public Properties: GET
    /////////////////////////

    public function __get($strName) {
        switch ($strName) {

            case "AppId": return $this->intAppId;
            case "RedirectUri": return $this->strRedirectUri;
            case "Display": return $this->strDisplay;
            case "From": return $this->strFrom;
            case "To": return $this->strTo;
            case "Link": return $this->strLink;
            case "PictureUrl": return $this->strPictureUrl;
            case "AttachemntUrl": return $this->strAttachemntUrl;
            case "AttachmentName": return $this->strAttachmentName;
            case "Caption": return $this->strCaption;
            case "Description": return $this->strDescription;
            case "Properties": return $this->arrProperties;
            case "Actions": return $this->arrActions;
            case "Ref": return $this->strRef;
            default:
                return parent::__get($strName);

        }
    }

    /////////////////////////
    // Public Properties: SET
    /////////////////////////

    public function __set($strName, $mixValue) {
        switch ($strName) {
            case "AppId": return $this->intAppId = $mixValue;
            case "RedirectUri": return $this->strRedirectUri = $mixValue;
            case "Display": return $this->strDisplay = $mixValue;
            case "From": return $this->strFrom = $mixValue;
            case "To": return $this->strTo = $mixValue;
            case "Link": return $this->strLink = $mixValue;
            case "PictureUrl": return $this->strPictureUrl = $mixValue;
            case "AttachemntUrl": return $this->strAttachemntUrl = $mixValue;
            case "AttachmentName": return $this->strAttachmentName = $mixValue;
            case "Caption": return $this->strCaption = $mixValue;
            case "Description": return $this->strDescription = $mixValue;
            case "Properties": return $this->arrProperties = $mixValue;
            case "Actions": return $this->arrActions = $mixValue;
            case "Ref": return $this->strRef = $mixValue;
            default:
                return parent::__set($strName, $mixValue);

        }
    }
    public function Render($blnPrint = true, $blnAjaxFormating = false){
        $this->UpdateUrl();
        return parent::Render($blnPrint, $blnAjaxFormating);
    }


}