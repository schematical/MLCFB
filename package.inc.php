<?php
define('__MLC_FB__', dirname(__FILE__));

define('__MLC_FB_CORE__', __MLC_FB__ . '/_core');
define('__MLC_FB_CORE_CTL__', __MLC_FB_CORE__ . '/ctl');
define('__MLC_FB_CORE_MODEL__', __MLC_FB_CORE__ . '/model');
define('__MLC_FB_CORE_VIEW__', __MLC_FB_CORE__ . '/view');
MLCApplicationBase::$arrClassFiles['MJaxFBShareLink'] = __MLC_FB_CORE_CTL__ . '/MJaxFBShareLink.class.php';


require_once(__MLC_FB_CORE__ . '/_enum.inc.php');
